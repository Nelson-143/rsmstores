<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProfileCurrencyController extends Controller
{
    public function currencyUpdate(Request $request)
    {
        $request->validate([
            'currency' => 'required|in:TZS,KES,UGX,USD,EUR',
            'activate_currency' => 'nullable|boolean',
            'tax_rate' => 'required|numeric|min:0|max:100',
        ]);

        $account = auth()->user()->account;
        $account->update([
            'currency' => $request->currency,
            'is_currency_active' => $request->boolean('activate_currency'),
            'tax_rate' => $request->tax_rate,
        ]);

        Log::info('Tax rate updated', ['tax_rate' => $request->tax_rate, 'account_id' => $account->id]);

        return redirect()->route('profile.settings')->with('success', 'Currency and tax settings updated successfully!');
    }
}