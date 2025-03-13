<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\UserSubscription;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::withCount('userSubscriptions')->select('subscriptions.*', 'subscriptions.id as subscription_id')->get();
           // Fetch the authenticated user's subscription
           $userSubscription = UserSubscription::where('user_id', Auth::id())->first();
            // Fetch user's payments (if user has a subscription)
    $payments = $userSubscription ? $userSubscription->payments : collect([]);

        return view('subscriptions.index', compact('subscriptions', 'userSubscription','payments'));
    }

    public function create()
    {
        return view('subscriptions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'max_branches' => 'nullable|integer|min:0',
            'max_users' => 'nullable|integer|min:0',
            'features' => 'nullable|array',
        ]);

        $validated['features'] = json_encode($validated['features'] ?? []);
        $validated['uuid'] = Str::uuid(); // Generate UUID

        Subscription::create($validated);

        return redirect()->route('subscriptions.index')->with('success', 'Subscription created successfully.');
    }

    public function edit(Subscription $subscription)
    {
        return view('subscriptions.edit', compact('subscription'));
    }

    public function update(Request $request, Subscription $subscription)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'max_branches' => 'nullable|integer|min:0',
            'max_users' => 'nullable|integer|min:0',
            'features' => 'nullable|array',
        ]);

        $validated['features'] = json_encode($validated['features'] ?? []);

        $subscription->update($validated);

        return redirect()->route('subscriptions.index')->with('success', 'Subscription updated successfully.');
    }

    public function destroy(Subscription $subscription)
    {
        // Prevent deletion if users are subscribed
        if ($subscription->userSubscriptions()->exists()) {
            return redirect()->route('subscriptions.index')->with('error', 'Cannot delete, users are subscribed to this plan.');
        }

        $subscription->delete();
        return redirect()->route('subscriptions.index')->with('success', 'Subscription deleted successfully.');
    }

    public function showPlans()
{
    $plans = Subscription::all();
    return view('subscriptions.plans', compact('plans'));
}

public function subscribe(Request $request, $planId)
{
    $user = auth()->user();
    $plan = Subscription::findOrFail($planId);
//$user->subscription()->associate($plan);
//$user->save();
    return redirect()->route('dashboard')->with('success', 'You have successfully subscribed to the ' . $plan->name . ' plan.');
}
}
