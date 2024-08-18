<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $root = User::create([
            'name' => 'root',
            'email' => 'root@admin.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('ntbd3v')
        ]);
        $root->syncRoles(Role::all());

//        User::create([
//            'name' => 'Romi',
//            'email' => 'romichoirudin33@gmail.com',
//            'email_verified_at' => Carbon::now(),
//            'password' => Hash::make('password')
//        ]);
    }
}
