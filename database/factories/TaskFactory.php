<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           
            'user_id' => 1,
            'type' => $this->faker->randomElement($array = array ('everyDay','everyMonday','Every-M-W-F','firstFiveDayMonth','fiveDayMonthMarch')),         
            'title' => $this->faker->word,
            'status' => $this->faker->randomElement($array = array ('Active','Inactive')),
            'content' => $this->faker->sentence,
            'end' => $this->faker->dateTimeBetween('now', '+1 weeks')
        ];
    }
}
