<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateInformationRequest;
use App\Http\Requests\User\UpdateRoleRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class UserManagementController extends Controller
{
    public function index() : View
    {
        $data = User::query();
        if ($q = request()->get('q')){
            $data = $data->where('name', 'like', '%'.$q.'%')
                ->orWhere('email', 'like', '%'.$q.'%');
        }
        return view('user.index',[
           'data' => $data->paginate(10)
        ]);
    }

    public function create() : View
    {
        return view('user.create');
    }

    public function store(StoreUserRequest $request) : RedirectResponse
    {
        $request->validated();
        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());
        return Redirect::route('user.show', $user->id);
    }

    public function show(User $user): View
    {
        return view('user.show',[
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return Redirect::back();
    }

    public function updateInformation(User $user, UpdateInformationRequest $request): RedirectResponse
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
        return Redirect::route('user.show', $user)->with('status', 'profile-updated');
    }

    public function updateRole(User $user, UpdateRoleRequest $request): RedirectResponse
    {
        $user->syncRoles($request->validated());
        return Redirect::route('user.show', $user)->with('status', 'roles-updated');
    }


}
