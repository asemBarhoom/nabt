<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'body' => $this->faker->paragraph(rand(2, 5)),
            'rating' => rand(1, 5) / 10, // Rating between 0.1 and 0.5
            'status' => $this->faker->boolean(),
        ];
    }

    public function forUser()
    {
        return $this->state(function (array $attributes) {
            return [
                'user_id' => User::factory()->create()->id,
            ];
        });
    }

    public function forModel($model)
    {
        return $this->state(function (array $attributes) use ($model) {
            return [
                'testimonialsable_type' => get_class($model),
                'testimonialsable_id' => $model->id,
            ];
        });
    }
}
