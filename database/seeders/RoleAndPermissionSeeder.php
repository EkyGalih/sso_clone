<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'ADMINISTRATOR' => [
                'chart-user-dashboard',

                'show-management-user',
                'create-management-user',
                'edit-profile-management-user',
                'edit-role-management-user',
                'destroy-management-user',

                'show-management-role',
                'edit-management-role',
                'edit-permissions-management-role',

                'show-my-integration',
                'create-my-integration',
                'edit-my-integration',
                'show-id-my-integration',
                'destroy-my-integration',

                'show-all-integration',
                'show-id-all-integration',
                'destroy-all-integration',
            ],
            'DEVELOPER' => [
                'show-my-integration',
                'create-my-integration',
                'edit-my-integration',
                'show-id-my-integration',
                'destroy-my-integration',
            ],
            'EMPLOYEE' => [],
            'PUBLIC' => []
        ];

        foreach ($roles as $role => $val){
            $r = Role::create(['name' => $role]);
            foreach ($val as $i){
                $r->givePermissionTo($i);
            }
        }
    }
}
