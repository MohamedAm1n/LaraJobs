<?php

namespace Database\Factories;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'job_title'=>$this->faker->sentence(10),
            'company'=>$this->faker->company(),
            'logo'=>$this->faker->image(),
            'tags'=>'laravel,api,php',
            'email'=>$this->faker->email(),
            'location'=>$this->faker->city(),
            'company_site'=>$this->faker->url(),
            'description'=>$this->faker->paragraph(10),
        ];
    }
}
