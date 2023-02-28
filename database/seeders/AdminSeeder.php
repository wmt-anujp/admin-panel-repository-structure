<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'slug' => 'admin-admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Admin@123'),
            'mobile_number' => '9685748574',
        ])->assignRole('admin');

        // $role = Role::create(['name' => 'admin']);
        // $permissions = Permission::pluck('id', 'id')->all();
        // $role->syncPermissions($permissions);
        // $user->assignRole([$role->id]);
    }
}
