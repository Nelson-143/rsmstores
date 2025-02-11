<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Subscription;
use App\Models\SystemLog;
use Illuminate\Http\Request;

class DeveloperDashboardController extends CrudController
{
    public function index()
    {
        // Track new signups
        $newSignups = User::where('created_at', '>=', now()->subMonth())->count();
        
        // Monitor subscription growth
        $activeSubscriptions = Subscription::where('status', 'active')->count();
        $expiredSubscriptions = Subscription::where('status', 'expired')->count();
        
        // Fetch system error logs
        $errorLogs = SystemLog::latest()->take(10)->get();

        return view('admin.developer_dashboard', compact(
            'newSignups', 'activeSubscriptions', 'expiredSubscriptions', 'errorLogs'
        ));
    }

    public function banUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'banned']);
        Log::info("User ID {$id} has been banned by admin");
        return back()->with('success', 'User banned successfully.');
    }

    public function unbanUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'active']);
        Log::info("User ID {$id} has been unbanned by admin");
        return back()->with('success', 'User unbanned successfully.');
    }
}
