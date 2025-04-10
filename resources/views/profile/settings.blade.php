@extends('layouts.tabler')
@section('title', 'Profile Setting')

@section('content')
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="user"></i></div>
                            Account Settings - Settings
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-xl px-4 mt-4">
        @include('profile.component.menu')

        <hr class="mt-0 mb-4" />

        @include('partials.session')

        <div class="row">
            <div class="col-lg-8">
                <!-- Currency Settings -->
                <div class="card mb-4">
                    <div class="card-header">
                        <div>
                            <h3 class="card-title">
                                {{ __('Currency Settings') }}
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.currency.update') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="currency" class="form-label">{{ __('Select Currency') }}</label>
                                <select class="form-select" id="currency" name="currency" required>
                                    <option value="TZS" {{ auth()->user()->account->currency === 'TZS' ? 'selected' : '' }}>Tanzanian Shilling (TZS)</option>
                                    <option value="KES" {{ auth()->user()->account->currency === 'KES' ? 'selected' : '' }}>Kenyan Shillings (KES)</option>
                                    <option value="UGX" {{ auth()->user()->account->currency === 'UGX' ? 'selected' : '' }}>Ugandan Shillings (UGX)</option>
                                    <option value="USD" {{ auth()->user()->account->currency === 'USD' ? 'selected' : '' }}>US Dollar (USD)</option>
                                    <option value="EUR" {{ auth()->user()->account->currency === 'EUR' ? 'selected' : '' }}>Euro (EUR)</option>
                                </select>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="activateCurrency" name="activate_currency" {{ auth()->user()->account->is_currency_active ? 'checked' : '' }}>
                                <label class="form-check-label" for="activateCurrency">{{ __('Activate Currency') }}</label>
                            </div>
                            <!-- Tax Rate Slider -->
                            <div class="mb-3 mt-3">
                                <label for="tax_rate" class="form-label">{{ __('Tax Rate (%)') }}</label>
                                <input type="range" class="form-range" id="tax_rate" name="tax_rate" min="0" max="100" step="1" value="{{ auth()->user()->account->tax_rate ?? 0 }}" oninput="this.nextElementSibling.value = this.value">
                                <output class="mt-2 d-block">{{ auth()->user()->account->tax_rate ?? 0 }}%</output>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Change Password -->
                <div class="card mb-4">
                    <div class="card-header">
                        <div>
                            <h3 class="card-title">
                                {{ __('Change Password') }}
                            </h3>
                        </div>
                    </div>
                    <x-form action="{{ route('password.update') }}" method="PUT">
                        <div class="card-body">
                            <x-input type="password" name="current_password" label="{{ __('Current Password') }}" required />
                            <x-input type="password" name="password" label="{{ __('New Password') }}" required />
                            <x-input type="password" name="password_confirmation" label="{{ __('Confirm Password') }}" required />
                        </div>
                        <div class="card-footer text-end">
                            <x-button type="submit">{{ __('Save') }}</x-button>
                        </div>
                    </x-form>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Two-Factor Authentication -->
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('Two-Factor Authentication') }}
                    </div>
                    <div class="card-body">
                        <p>
                           {{ __(' Add another level of security to your account by enabling two-factor authentication.') }}
                        </p>
                        <form>
                            <div class="form-check">
                                <input class="form-check-input" id="twoFactorOn" type="radio" name="twoFactor" checked="" />
                                <label class="form-check-label" for="twoFactorOn">{{ __('On') }}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="twoFactorOff" type="radio" name="twoFactor" />
                                <label class="form-check-label" for="twoFactorOff">{{ __('Off') }}</label>
                            </div>
                        </form>
                    </div> 
                </div>

                <!-- Delete Account -->
                <div class="card mb-4">
                    <div class="card-header">
                        {{ __('Delete Account') }}
                    </div>
                    <div class="card-body">
                        <p>
                            {{ __('Deleting your account is a permanent action and cannot be undone.') }}
                        </p>
                        <button type="button" class="btn btn-danger-soft text-danger">
                            {{ __('I understand, delete my account') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page-scripts')
    <script src="{{ asset('assets/js/img-preview.js') }}"></script>
@endpush