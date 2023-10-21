<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create([
            'roleName'=>'superAdmin',
        ]);

        $role2 =  Role::create([
            'roleName'=>'Admin',
        ]);

        $role3= Role::create([
            'roleName'=>'user',
        ]);

         User::create([
            // 'image'=>'default.png',
            'name' => 'Elyes Boudhina',
            'email' => 'e-boudhina@live.fr',
            'role_id' => $role1->id,
            'password' => Hash::make('superadmin')
        ]);
        User::create([
            //'image'=>'default.png',
            'name' => 'SuperAdmin',
            'email' => 'superadmin@admin.com',
            'role_id' => $role1->id,
            'password' => Hash::make('superadmin')
        ]);
        User::create([
            //'image'=>'default.png',
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role_id' => $role2->id,
            'password' => Hash::make('admin')
        ]);

         User::create([
           // 'image'=>'default.png',
            'name' => 'User',
            'email' => 'user@user.com',
            'role_id' => $role3->id,
            'password' => Hash::make('user')
        ]);


    }
}
