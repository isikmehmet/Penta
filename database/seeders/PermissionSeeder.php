<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // USER MODEL
        $userPermission1 = Permission::create(['name' => 'create: user']);
        $userPermission2 = Permission::create(['name' => 'read: user']);
        $userPermission3 = Permission::create(['name' => 'update: user']);
        $userPermission4 = Permission::create(['name' => 'delete: user']);

        // ROLE MODEL
        $rolePermission1 = Permission::create(['name' => 'create: role']);
        $rolePermission2 = Permission::create(['name' => 'read: role']);
        $rolePermission3 = Permission::create(['name' => 'update: role']);
        $rolePermission4 = Permission::create(['name' => 'delete: role']);

        // PERMISSION MODEL
        $permission1 = Permission::create(['name' => 'create: permission']);
        $permission2 = Permission::create(['name' => 'read: permission']);
        $permission3 = Permission::create(['name' => 'update: permission']);
        $permission4 = Permission::create(['name' => 'delete: permission']);

        // ADMINS
        $adminPermission1 = Permission::create(['name' => 'read: admin']);
        $adminPermission2 = Permission::create(['name' => 'update: admin']);

        // Misc
        $miscPermission = Permission::create(['name' => 'N/A']);

        // CREATE ROLES
        $superAdminRole = Role::create(['name' => 'super-admin'])->syncPermissions([
            $userPermission1,
            $userPermission2,
            $userPermission3,
            $userPermission4,
            $rolePermission1,
            $rolePermission2,
            $rolePermission3,
            $rolePermission4,
            $permission1,
            $permission2,
            $permission3,
            $permission4,
            $adminPermission1,
            $adminPermission2,
            $userPermission1,
        ]);
        $adminRole = Role::create(['name' => 'admin'])->syncPermissions([
            $userPermission1,
            $userPermission2,
            $userPermission3,
            $userPermission4,
            $rolePermission1,
            $rolePermission2,
            $rolePermission3,
            $rolePermission4,
            $permission1,
            $permission2,
            $permission3,
            $permission4,
            $adminPermission1,
            $adminPermission2,
            $userPermission1,
        ]);
        $moderatorRole = Role::create(['name' => 'moderator'])->syncPermissions([
            $userPermission2,
            $rolePermission2,
            $permission2,
            $adminPermission1,
        ]);
        $developerRole = Role::create(['name' => 'developer'])->syncPermissions([
            $adminPermission1,
        ]);
        $userRole = Role::create(['name' => 'user'])->syncPermissions([
            $miscPermission,
        ]);

        $fake_pass = 'penta2023';

        // CREATE ADMINS & USERS
        User::create([
            'name' => 'super admin',
            'is_admin' => 1,
            'email' => 'superadmin@pentayazilim.com',
            'email_verified_at' => now(),
            'password' => Hash::make($fake_pass),
            'remember_token' => Str::random(10),
        ])->assignRole($superAdminRole);

        User::create([
            'name' => 'admin',
            'is_admin' => 1,
            'email' => 'admin@pentayazilim.com',
            'email_verified_at' => now(),
            'password' => Hash::make($fake_pass),
            'remember_token' => Str::random(10),
        ])->assignRole($adminRole);

        User::create([
            'name' => 'moderator',
            'is_admin' => 1,
            'email' => 'moderator@pentayazilim.com',
            'email_verified_at' => now(),
            'password' => Hash::make($fake_pass),
            'remember_token' => Str::random(10),
        ])->assignRole($moderatorRole);

        User::create([
            'name' => 'developer',
            'is_admin' => 1,
            'email' => 'developer@pentayazilim.com',
            'email_verified_at' => now(),
            'password' => Hash::make($fake_pass),
            'remember_token' => Str::random(10),
        ])->assignRole($developerRole);

        for ($i=1; $i <= 50; $i++) {
            User::create([
                'name' => 'Tester '.$i,
                'is_admin' => 0,
                'email' => 'tester_'.$i.'@pentayazilim.com',
                'email_verified_at' => now(),
                'password' => Hash::make($fake_pass), // password
                'remember_token' => Str::random(10),
            ])->assignRole($userRole);
        }
    }
}
