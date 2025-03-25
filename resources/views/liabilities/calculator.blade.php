@extends('layouts.tabler')

@section('title', 'Loan Calculator')

@section('content')
<div class="container-xl">
    <h3 class="mb-4">{{ __('Loan Calculator') }}</h3>
<h5 class="text-muted">{{ __('Check to see if the loan is affordable to your business') }}</h5>
    <form action="{{ route('calculate.loan') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">{{ __('Loan Amount') }}</label>
            <input type="number" name="amount" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label"> {{ __('Interest Rate') }}(%)</label>
            <input type="number" name="interest_rate" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ __('Term (Years)') }}</label>
            <input type="number" name="term" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Calculate') }}</button>
    </form>
</div>
@endsection