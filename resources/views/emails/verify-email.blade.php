@extends('layouts.email')

@section('content')
<div class="email-container">
        <div class="email-header">
            <div class="logo-container">
                <img src="{{ asset('static/logo2.png') }}" style="width: 200px; height: auto;" alt="Roman Stock Manager" class="navbar-brand-image">
            </div>
        </div>
        <div class="email-body">
            <h1>Welcome to Roman Stock Manager<br> Being a champion 😎</h1>
            <p>You're about to experience stock management like never before. Roman Stock Manager combines powerful analytics, intuitive design, and cutting-edge technology to transform how you manage investments.</p>
            
            <a href="{{ $verificationUrl }}" class="btn">Activate Your Account</a>
            
            <p style="font-size: 14px; color: #64748b;">Please verify your email within 24 hours to complete your registration</p>
            
            <div class="features">
                <div class="feature">
                    <div class="feature-icon">📊</div>
                    <div class="feature-text">Advanced Analytics</div>
                </div>
                <div class="feature">
                    <div class="feature-icon">🚀</div>
                    <div class="feature-text">Champion-Level Inventory Control</div>
                </div>
                <div class="feature">
                    <div class="feature-icon">📱</div>
                    <div class="feature-text">Seamless Experience</div>
                </div>
            </div>
        </div>
        <div class="email-footer">
            <p>If you did not request this account, please disregard this email.</p>
            <div class="separator"></div>
         
            <p>&copy; {{ date('Y') }} Roman Stock Manager. All rights reserved.</p>
            <div class="contact-info">
                <p>Roman Stock Manager | Tanzania,Dar es salaam | <a href="mailto:support@romanstockmanager.com" style="color: #1a3c6e; text-decoration: none;">support@romanstockmanager.com</a></p>
                <p><a href="#" style="color: #1a3c6e; text-decoration: none;">Privacy Policy</a> | <a href="#" style="color: #1a3c6e; text-decoration: none;">Terms of Service</a></p>
            </div>
        </div>
    </div>
@endsection


