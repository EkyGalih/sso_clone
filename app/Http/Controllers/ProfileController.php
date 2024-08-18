<?php

namespace App\Http\Controllers;

use App\Enums\StatusEmployee;
use App\Http\Requests\Profile\AvatarUpdateRequest;
use App\Http\Requests\Profile\EmployeeUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function updateAvatar(AvatarUpdateRequest $request): RedirectResponse
    {
        $request->validated();
        $image = $request->file('avatar');
        $name = time().'.'.$image->getClientOriginalExtension();

        $path = 'avatar';
        $request->user()->profile()->update([
            'avatar' => $avatar = $image->storeAs($path, $name),
        ]);
        $imageThumb = Image::make(Storage::get($avatar))
            ->fit(100, 100, function ($constraint){
                $constraint->aspectRatio();
            })
            ->stream();
        Storage::put('thumbnail/'.$avatar, $imageThumb);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        $request->user()->profile->update([
            'number_phone' => $request->get('number_phone'),
            'number_whatsapp' => $request->get('number_whatsapp'),
            'email_recovery' => $request->get('email_recovery'),
        ]);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
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

        return Redirect::to('/');
    }

    public function createEmployee(Request $request)
    {
        $request->user()->employee()->create(['status_kepegawaian' => StatusEmployee::PNS]);
        return Redirect::route('profile.edit');
    }

    public function updateEmployee(EmployeeUpdateRequest $request): RedirectResponse
    {
        $request->user()->employee->update($request->validated());
        return Redirect::route('profile.edit')->with('status', 'employee-updated');
    }
}
