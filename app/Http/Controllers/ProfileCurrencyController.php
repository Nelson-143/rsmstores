<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\lOG;
use App\Models\Account;

class ProfileCurrencyController extends Controller
{
    public function update(Request $request)
    {
        Log::info('Currency update request:', $request->all());

    $request->validate([
        'currency' => 'required|string|in:TZS,KES,UGX,USD,EUR',
        'activate_currency' => 'nullable|boolean',
    ]);

    // Get the logged-in user's account
    $account = Auth::user()->account;
    Log::info('Updated currency:', ['currency' => $account->currency]);
    // Update the account's currency settings
    $account->currency = $request->currency;
    $account->is_currency_active = $request->has('activate_currency');
    $account->save();

    return redirect()->back()->with('success', 'Currency settings updated successfully.');
}

}