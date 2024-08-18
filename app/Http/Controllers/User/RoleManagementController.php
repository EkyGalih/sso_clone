<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\UpdateInformationRequest;
use App\Http\Requests\Role\UpdatePermissionRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleManagementController extends Controller
{
    public function index(): View
    {
        $data = Role::query();
        if ($q = request()->get('q')){
            $data = $data->where('name', 'like', '%'.$q.'%');
        }
        return view('roles.index',[
            'data' => $data->paginate(10)
        ]);
    }

    public function show(Role $role): View
    {
        return view('roles.show',[
            'role' => $role,
            'permissions' => Permission::all(),
        ]);
    }

    public function updateInformation(Role $role, UpdateInformationRequest $request): RedirectResponse
    {
        $role->update($request->validated());
        return Redirect::route('role.show', $role)->with('status', 'information-updated');
    }

    public function updatePermission(Role $role, UpdatePermissionRequest $request): RedirectResponse
    {
        $role->syncPermissions($request->validated());
        return Redirect::route('role.show', $role)->with('status', 'permissions-updated');
    }
}
