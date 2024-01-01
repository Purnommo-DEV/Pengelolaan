<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_superadmin = Role::updateOrCreate([
            'name' => 'superadmin'
        ], [
            'name' => 'superadmin'
        ]);

        $role_pengguna = Role::updateOrCreate([
            'name' => 'pengguna'
        ], [
            'name' => 'pengguna'
        ]);

        $permission = Permission::updateOrCreate([
            'name' => 'view_port'
        ], [
            'name' => 'view_port'
        ]);

        $permission_2 = Permission::updateOrCreate([
            'name' => 'tambah_perusahaan'
        ], [
            'name' => 'tambah_perusahaan'
        ]);

        $role_superadmin->givePermissionTo($permission);
        $role_pengguna->givePermissionTo($permission);

        $role_superadmin->givePermissionTo($permission_2);

        $superadmin = User::find(1);
        $superadmin->assignRole('superadmin');
        // $superadmin->assignRole(['superadmin', 'pengguna']); 1 User 2 Role
    }
}
