<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user_1 = User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@billingsystem.test',
        ]);

        $user_2 = User::factory()->create([
            'name' => 'Test',
            'email' => 'test@billingsystem.com',
        ]);

        $user_3 = User::factory()->create([
            'name' => 'Guest',
            'email' => 'guest@billingsystem.com',
        ]);

        $role_1 = Role::factory()->create([
            'name' => 'admin',
            'description' => ''
        ]);

        $role_2 = Role::factory()->create([
            'name' => 'guest',
            'description' => ''
        ]);

        $role_3 = Role::factory()->create([
            'name' => 'viewer',
            'description' => ''
        ]);

        $permission_1 = Permission::factory()->create([
            'name' => 'Users',
            'action' => 'index',
            'http_method' => 'GET',
            'uri' => '/users',
            'route' => 'users'
        ]);

        $permission_2 = Permission::factory()->create([
            'name' => 'Dashboard',
            'action' => 'index',
            'http_method' => 'GET',
            'uri' => '/dashboard',
            'route' => 'dashboard'
        ]);

        $role_1->permissions()->sync([$permission_1->id]);

        $role_2->permissions()->sync([$permission_2->id]);

        $user_1->roles()->sync([$role_1->id]);

        $user_2->roles()->sync([$role_2->id, $role_3->id]);

        $user_3->roles()->sync([$role_3->id]);

        //$this->call(MessagesTableSeeder::class);
        //$this->call(UsersTableSeeder::class);
    }
}
