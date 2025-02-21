@extends('layouts.tabler')
@section('title')
    Payments History
@endsection
@section('content')
<div class="container">
    <h1>Payment History for {{ $debt->customer->name ?? 'Personal Debt' }}</h1>
    @if($payments->isEmpty())
        <p>No payment history found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Amount Paid</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($payment->paid_at)->toFormattedDateString() }}</td>
                        <td>Tsh{{ number_format($payment->amount_paid, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
