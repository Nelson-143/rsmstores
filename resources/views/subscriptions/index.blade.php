@extends('layouts.tabler')
@section('title', 'Subscriptions🪙')
@section('content')
<div class="container">
    <h2 class="mb-4">Subscription Management</h2>

    <!-- Subscription Plans -->
    <div class="card mb-4">
        <div class="card-header">Available Subscription Plans</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Max Branches</th>
                        <th>Max Users</th>
                        <th>Features</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subscriptions as $subscription)
                        <tr>
                            <td>{{ $subscription->name }}</td>
                            <td>${{ number_format($subscription->price, 2) }}</td>
                            <td>{{ $subscription->max_branches ?? 'Unlimited' }}</td>
                            <td>{{ $subscription->max_users ?? 'Unlimited' }}</td>
                            <td>
                                <ul>
                                    @foreach (json_decode($subscription->features, true) as $feature)
                                        <li>{{ $feature }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- User Subscription Info -->
<div class="card mb-4">
    <div class="card-header">Your Subscription</div>
    <div class="card-body">
        @if($userSubscription)
            <p><strong>Plan:</strong> {{ $userSubscription->name }}</p>
            <p><strong>Expires On:</strong> {{ $userSubscription->ends_at ? $userSubscription->ends_at->format('d M Y') : 'Active' }}</p>
            <p><strong>Trial Ends:</strong> {{ $userSubscription->trial_ends_at ? $userSubscription->trial_ends_at->format('d M Y') : 'No Trial' }}</p>
        @else
            <p>You do not have an active subscription.</p>
        @endif
    </div>
</div>


    <!-- Subscription Payment History -->
    <div class="card">
        <div class="card-header">Payment History</div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                @if($payments->isNotEmpty())
    <tbody>
        @foreach ($payments as $payment)
            <tr>
                <td>{{ $payment->created_at->format('d M Y') }}</td>
                <td>${{ number_format($payment->amount, 2) }}</td>
                <td>{{ ucfirst($payment->status) }}</td>
            </tr>
        @endforeach
    </tbody>
@else
    <tr>
        <td colspan="3">No payments found.</td>
    </tr>
@endif

            </table>
        </div>
    </div>
</div>
@endsection