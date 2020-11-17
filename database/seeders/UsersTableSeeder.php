<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Master\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name'       => 'Admin',
        ]);

        $user = User::create([
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'password'  => Hash::make('myAdmin123'),
        ]);

        $user->assignRole($role);
    }
}
