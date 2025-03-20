@extends('layouts.tabler')
@section('title', 'Subscriptions🪙')
@section('content')
<div class="container">
    <h2 class="mb-4">Subscription Management</h2>

  <div class="card mb-4">
    <div class="card-header text-center">Available Subscription Plans</div>
    <div class="card-body">
        <div class="row">
            @foreach ($subscriptions->sortBy('price') as $subscription)
                <div class="col-md-6 col-lg-3 mb-4"> <!-- 4 cards in one row -->
                    <div class="card h-100 {{ $loop->index == 2 ? 'border-primary' : '' }}"> <!-- Highlight 3rd card -->
                        <div class="card-header text-center {{ $loop->index == 2 ? 'bg-primary text-white' : '' }}">
                            {{ $subscription->name }}
                            @if ($loop->index == 2)
                                <span class="badge badge-light float-right">Most Popular</span>
                            @endif
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Tsh.{{ number_format($subscription->price, 2) }}</h5>
                            <p class="card-text">Max Branches: {{ $subscription->max_branches ?? 'Unlimited' }}</p>
                            <p class="card-text">Max Users: {{ $subscription->max_users ?? 'Unlimited' }}</p>
                            <ul class="list-unstyled">
                                @foreach (json_decode($subscription->features, true) as $feature)
                                    <li><i class="fa fa-check text-success"></i> {{ $feature }}</li>
                                @endforeach
                            </ul>
                            <a href="{{ route('subscriptions.pay', $subscription->id) }}" class="btn {{ $loop->index == 2 ? 'btn-primary' : 'btn-outline-primary' }} btn-block">Select Plan</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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