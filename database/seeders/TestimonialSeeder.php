<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create some sample users
        $users = User::factory()->count(10)->create();

        // Generate sample testimonials
        Testimonial::factory()->count(40)->make()->each(function ($testimonial) use ($users) {
            // Randomly assign a user
            $testimonial->user_id = $users->random()->id;

            // Set a random rating
            $testimonial->rating = rand(1, 5) ; // Generate rating between 0.1 and 0.5

            // Set a random status
            $testimonial->status = rand(0, 1); // 0 for inactive, 1 for active

            // Set a random polymorphic relationship (optional)
            $randomType = ['App\Models\Destination', 'App\Models\Booking', 'App\Models\Tourevent', 'App\Models\Accommodation'];
            $testimonial->testimonialsable_type = $randomType[array_rand($randomType)];
            if ($testimonial->testimonialsable_type) {
                $testimonial->testimonialsable_id = rand(1, 10); // Example IDs
            }

            $testimonial->save();
        });
    }
}
