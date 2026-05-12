<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $roles = ['masyarakat', 'staff', 'lurah'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        $users = User::all();
        foreach ($users as $user) {
            if ($user->role && in_array($user->role, $roles)) {
                $user->assignRole($user->role);
            }
        }
    }
}
