<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
     {
        // Usuario 1 -> admin
        $admin = User::find(1);
        if ($admin) {
            $admin->assignRole('admin');
        }

        // Usuario 2 -> editor (temporal, lo puedes cambiar luego)
        $editor = User::find(2);
        if ($editor) {
            $editor->assignRole('editor');
        }

        // Usuario 3 -> user (temporal)
        $user = User::find(3);
        if ($user) {
            $user->assignRole('user');
        }
    }

}
