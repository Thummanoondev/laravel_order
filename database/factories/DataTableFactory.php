<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataTable>
 */
class DataTableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_c'=>fake()->name(),
            'id_code'=>fake()->regexify('[0-9]{4}-[0-9]{4}'),
            'name_car'=>fake()->sentence(),
            'wide'=>fake()->numberBetween(10, 99),
            'thick'=>fake()->numberBetween(10, 99),
            'color'=>fake()->colorName(),
            'screen'=>fake()->sentence(),
            'type'=>fake()->sentence(),
            'side'=>fake()->numberBetween(10, 99),
            'cnt_order'=>fake()->numberBetween(10, 99),
            'long_side'=>fake()->numberBetween(10, 99),
            'note'=>fake()->text(),
            'date_get'=>fake()->date(),
            'K_N'=>fake()->userName(),
            'mk05'=>fake()->numberBetween(0, 1),
            'stm'=>fake()->date(),
            'c_get'=>fake()->numberBetween(0, 1),
            'uname'=>fake()->userName(),
            'img'=>fake()->userName()
            

        ];
    }
}