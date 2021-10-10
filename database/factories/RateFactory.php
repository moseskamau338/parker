<?php

namespace Database\Factories;

use App\Models\Rate;
use App\Models\Zone;
use Illuminate\Database\Eloquent\Factories\Factory;

class RateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'zone_id'=>Zone::factory(),
            'amount'=>rand(150,350),
        ];
    }
}
