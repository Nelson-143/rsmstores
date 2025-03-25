@extends('layouts.tabler')

@section('title', 'Loan Calculation Result')

@section('content')
<div class="container-xl">
    <h3 class="mb-4">{{ __('Loan Calculation Result') }}</h3>
    <div class="card">
        <div class="card-body">
            <h5>{{ __('Loan Amount') }}: {{ auth()->user()->account->currency }} {{ number_format($request['amount'], 2) }}</h5>
            <h5>{{ __('Monthly Payment') }}: {{ auth()->user()->account->currency }} {{ number_format($monthly_payment, 2) }}</h5>
            <h5>{{ __('Total Interest') }}: {{ auth()->user()->account->currency }} {{ number_format($total_interest, 2) }}</h5>
            <h5>{{ __('Affordability') }}: {{ $affordable ? __('Affordable') : __('Not Affordable') }}</h5>
        </div>
    </div>
    <a href="{{ route('loan.calculator') }}" class="btn btn-secondary mt-3">Back to Calculator</a>
</div>
@endsection