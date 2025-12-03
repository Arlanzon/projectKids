<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $postPermissions = [
            'posts.view',
            'posts.create',
            'posts.update',
            'posts.delete',
            'posts.update.own',
            'posts.delete.own',
        ];

        $categoryPermissions = [
            'categories.view',
            'categories.create',
            'categories.update',
            'categories.delete',
        ];

        foreach (array_merge($postPermissions, $categoryPermissions) as $p) {
            Permission::firstOrCreate(['name' => $p]);
        }

        $roleUser   = Role::firstOrCreate(['name' => 'user']);
        $roleAdmin  = Role::firstOrCreate(['name' => 'admin']);
        $roleEditor = Role::firstOrCreate(['name' => 'editor']);

        // Permisos user
        $roleUser->syncPermissions([
            'posts.view',
            'posts.create',
            'posts.update.own',
            'posts.delete.own',
            'categories.view'
        ]);

        // Permisos editor
        $roleEditor->syncPermissions([
            'posts.view',
            'posts.update',
            'posts.update.own',
            'categories.view',
            'categories.update',
        ]);

        // Permisos admin (todos)
        $roleAdmin->syncPermissions(Permission::all());

        
    }
    
}
