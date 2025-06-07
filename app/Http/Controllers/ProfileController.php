<?php

namespace App\Http\Controllers;

// use Nette\Utils\Image;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image; // ✅ pastikan ini
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', [
            'user' => auth()->user()
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . auth()->id()],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
            'phone' => ['nullable', 'string', 'max:20'],
            'bio' => ['nullable', 'string', 'max:500'],
            'current_password' => ['nullable', 'required_with:password', 'current_password'],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = auth()->user();
        $data = $request->only(['name', 'email', 'phone', 'bio']);

        // Handle avatar upload with compression
        if ($request->hasFile('avatar')) {
            $this->updateAvatar($user, $request->file('avatar'));
        }

        // Update password if provided
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('profile.edit')
            ->with('success', 'Profile updated successfully');
    }

    protected function updateAvatar($user, $file)
    {
        // Delete old avatar if exists
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        // Process and store new avatar
        $filename = 'avatars/' . uniqid() . '.webp';

        $image = Image::make($file)
            ->fit(512, 512)
            ->encode('webp', 80);

        Storage::disk('public')->put($filename, $image);

        $user->avatar = $filename;
        $user->save();
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Delete avatar if exists
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        auth()->logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Your account has been deleted');
    }
}
