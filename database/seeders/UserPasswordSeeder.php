<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserPasswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Usuario 1 (admin)
        User::find(1)?->update([
            'password' => Hash::make('Admin1234'),
        ]);

        // Usuario 2 (editor)
        User::find(2)?->update([
            'password' => Hash::make('Editor1234'),
        ]);

        // Usuario 3 (user)
        User::find(3)?->update([
            'password' => Hash::make('User1234'),
        ]);
    }
}
