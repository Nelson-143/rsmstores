<?php

namespace app\Http\Controllers\Profile;

use app\Http\Controllers\Controller;
use app\Http\Requests\Profile\ProfileUpdateRequest;
use app\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        // Get the logged-in user's account_id
        $accountId = auth()->user()->account_id;

        return view('profile.edit', [
            'user' => $request->user(),
            'account_id' => $accountId,
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user()->fill($request->validated());

        $rules = [
            'name' => 'required|max:50',
            'photo' => 'image|file|max:1024',
            'email' => 'required|email|max:50|unique:users,email,' . $user->id,
            'username' => 'required|min:4|max:25|alpha_dash|unique:users,username,' . $user->id
        ];

        $validatedData = $request->validate($rules);

        if ($validatedData['email'] != $user->email) {
            $validatedData['email_verified_at'] = null;
        }

        /**
         * Handle upload image
         */
        if ($file = $request->file('photo')) {
            $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
            $path = 'public/profile/';

            /**
             * Delete an image if exists.
             */
            if ($user->photo) {
                Storage::delete($path . $user->photo);
            }

            /**
             * Store an image to Storage.
             */
            $file->storeAs($path, $fileName);
            $validatedData['photo'] = $fileName;
        }

        User::where('id', $user->id)->update($validatedData);

        return redirect()
            ->route('profile.edit')
            ->with('success', 'Profile has been updated!');
    }

    public function settings(Request $request)
    {
        return view('profile.settings', [
            'user' => $request->user(),
            'account_id' => auth()->user()->account_id,
        ]);
    }

    public function store_settings_store(Request $request)
    {
        $request->validate([
            'store_name' => 'required|max:50',
            'store_address' => 'required|max:50',
            "store_phone" => 'required|min:10',
            'store_email' => 'required|email|max:50|unique:users,store_email,' . auth()->id(),
        ]);

        User::find(auth()->id())->update([
            "store_name" => $request->store_name,
            "store_address" => $request->store_address,
            "store_phone" => $request->store_phone,
            "store_email" => $request->store_email,
        ]);

        return redirect()
            ->route('profile.store.settings')
            ->with('success', 'Store Information has been updated!');
    }

    public function store_settings()
    {
        return view('profile.store-settings', [
            'user' => auth()->user(),
            'account_id' => auth()->user()->account_id,
        ]);
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->to('/');
    }
}
