<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class NotificationController extends Controller
{
 public function index(){
    $notifications = Notification::where('user_id', Auth::id())->get();
    return view('notifications.index', compact('notifications'));

 }

    public function markAllRead()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return redirect()->back();
    }

    public function fetchNotifications()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Fetch and group notifications
        $notifications = Notification::where('notifiable_id', $user->id)
            ->where('notifiable_type', get_class($user))
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function ($notification) {
                return $notification->read_at ? 'read' : 'unread';
            });

        // Format and return response
        return response()->json([
            'unread' => $notifications['unread'] ?? [],
            'read' => $notifications['read'] ?? [],
        ]);
    }

    // Mark notification as read
    public function markAsRead($id)
    {
        $notification = Notification::find($id);

        if ($notification && $notification->notifiable_id === Auth::id()) {
            $notification->update(['read_at' => now()]);
            return response()->json(['message' => 'Notification marked as read.']);
        }

        return response()->json(['error' => 'Notification not found or unauthorized.'], 404);
    }

    // Mark all as read 
    public function markAllAsRead()
    {
        $user = Auth::user();

        Notification::where('notifiable_id', $user->id)
            ->where('notifiable_type', get_class($user))
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return response()->json(['message' => 'All notifications marked as read.']);
    }
}