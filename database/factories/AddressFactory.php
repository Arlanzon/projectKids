<?php

namespace Database\Factories;
use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * El modelo asociado a esta factory.
     *
     * @var class-string<\App\Models\Address>
     */

    protected $model = Address::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
         // user_id lo pondremos desde el seeder para respetar el uno-a-uno
            'codigo' => $this->faker->postcode(), 
        ];
    }
}
