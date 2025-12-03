<?php

namespace Database\Seeders;
use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Si por alguna razón no hubiera usuarios, podemos crear al menos uno.
        // Pero en tu caso, PostSeeder ya crea usuarios, así que esto es solo "seguro extra".
        if (User::count() === 0) {
            User::factory()->create([
                'name'  => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        // Para cada usuario que no tenga address, le creamos una
        User::all()->each(function (User $user) {
            if (!$user->address) {
                Address::factory()->create([
                    'user_id' => $user->id,
                ]);
            }
        });
    }
}
