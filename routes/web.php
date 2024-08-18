<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserManagementController;
use App\Http\Controllers\User\RoleManagementController;
use App\Http\Controllers\Developer\MyIntegratiosAppsController;
use App\Http\Controllers\Developer\AllIntegrationsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/privacy-policy', [\App\Http\Controllers\HomeController::class, 'privacyPolicy'])->name('privacy-policy');

//Route::get('/test/authorize', [\App\Http\Controllers\TestingController::class, 'custom_authorize_passport_view']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile-avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update-avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/employee', [ProfileController::class, 'createEmployee'])->name('profile.create-employee');
    Route::patch('/employee', [ProfileController::class, 'updateEmployee'])->name('profile.update-employee');

    Route::get('user', [UserManagementController::class, 'index'])
        ->middleware(['permission:show-management-user'])
        ->name('user.index');
    Route::get('user/create', [UserManagementController::class, 'create'])
        ->middleware(['permission:create-management-user'])
        ->name('user.create');
    Route::post('user', [UserManagementController::class, 'store'])
        ->middleware(['permission:create-management-user'])
        ->name('user.store');
    Route::get('user/{user}', [UserManagementController::class, 'show'])
        ->middleware(['permission:show-management-user'])
        ->name('user.show');
    Route::delete('user/{user}', [UserManagementController::class, 'destroy'])
        ->middleware(['permission:show-management-user'])
        ->name('user.destroy');
    Route::patch('user/{user}/update-information', [UserManagementController::class, 'updateInformation'])
        ->middleware(['permission:edit-profile-management-user'])
        ->name('user.update-information');
    Route::patch('user/{user}/update-role', [UserManagementController::class, 'updateRole'])
        ->middleware(['permission:edit-role-management-user'])
        ->name('user.update-role');

    Route::get('role', [RoleManagementController::class, 'index'])
        ->middleware(['permission:show-management-role'])
        ->name('role.index');
    Route::get('role/{role}', [RoleManagementController::class, 'show'])
        ->middleware(['permission:show-management-role'])
        ->name('role.show');
    Route::patch('role/{role}/update-information', [RoleManagementController::class, 'updateInformation'])
        ->middleware(['permission:edit-management-role'])
        ->name('role.update-information');
    Route::patch('role/{role}/update-permission', [RoleManagementController::class, 'updatePermission'])
        ->middleware(['permission:edit-permissions-management-role'])
        ->name('role.update-permission');

    Route::prefix('developer')->as('developer.')->group(function () {
        Route::get('my-integrations', [MyIntegratiosAppsController::class, 'index'])
            ->middleware(['permission:show-my-integration'])
            ->name('my-integrations.index');
        Route::get('my-integrations/create', [MyIntegratiosAppsController::class, 'create'])
            ->middleware(['permission:create-my-integration'])
            ->name('my-integrations.create');
        Route::post('my-integrations', [MyIntegratiosAppsController::class, 'store'])
            ->middleware(['permission:create-my-integration'])
            ->name('my-integrations.store');
        Route::get('my-integrations/{clientId}', [MyIntegratiosAppsController::class, 'show'])
            ->middleware(['permission:show-my-integration'])
            ->name('my-integrations.show');
        Route::patch('my-integrations/{clientId}/update-information', [MyIntegratiosAppsController::class, 'updateInformation'])
            ->middleware(['permission:edit-my-integration'])
            ->name('my-integrations.update-information');
        Route::delete('my-integrations', [MyIntegratiosAppsController::class, 'destroy'])
            ->middleware(['permission:destroy-my-integration'])
            ->name('my-integrations.destroy');

        Route::get('all-integrations', [AllIntegrationsController::class, 'index'])
            ->middleware(['permission:show-all-integration'])
            ->name('all-integrations.index');
        Route::get('all-integrations/{clientId}', [AllIntegrationsController::class, 'show'])
            ->middleware(['permission:show-all-integration'])
            ->name('all-integrations.show');
        Route::delete('all-integrations', [AllIntegrationsController::class, 'destroy'])
            ->middleware(['permission:destroy-all-integration'])
            ->name('all-integrations.destroy');
    });
});

require __DIR__.'/auth.php';
