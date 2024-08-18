<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'dashboard' => [
                'chart-user',
            ],
            'profile' => [
                'edit',
                'change-avatar',
                'change-password',
                'destroy-account',
            ],
            'management-user' => [
                'show',
                'create',
                'edit-profile',
                'edit-role',
                'destroy',
            ],
//            'management-permission' => [
//                'show',
//                'create',
//                'edit',
//                'destroy',
//            ],
            'management-role' => [
                'show',
                'edit',
                'edit-permissions',
//                'destroy',
            ],
            'my-integration' => [
                'show',
                'create',
                'edit',
                'show-id',
                'destroy'
            ],
            'all-integration' => [
                'show',
                'show-id',
                'destroy'
            ],
        ];

        foreach ($permissions as $permission => $val){
            foreach ($val as $i){
                Permission::create(['name' => "$i-$permission"]);
            }
        }
    }
}
