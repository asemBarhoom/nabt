<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Tourevent;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get all users
        $users = User::all();

        // Take only 20 Tourevents
        $tourevents = Tourevent::all()->take(20);

        foreach ($users as $user) {
            foreach ($tourevents as $tourevent) {
                // Generate random start and end times
                $startTime = Carbon::createFromTime(rand(8, 18), rand(0, 59), 0);
                $endTime = $startTime->copy()->addHours(1); // Ensure end time is 1 hour after start time

                // Generate a random date within a specific range (e.g., last 30 days)
                $randomDate = Carbon::now()->subDays(rand(0, 30))->toDateString();

                // Create the activity
                Activity::create([
                    'user_id' => $user->id,
                    'title' => [
                        'en' => $tourevent->getTranslation('name','en') ?? 'Tour Event Activity',
                        'ar' => $tourevent->getTranslation('name','ar') ?? 'نشاط حدث جولة'
                    ],
                    'description' => [
                        'en' => $tourevent->getTranslation('description','en') ?? 'Description for Tour Event Activity',
                        'ar' => $tourevent->getTranslation('description','en') ?? 'وصف لنشاط حدث جولة'
                    ],
                    'start_time' => $startTime->toTimeString(),
                    'end_time' => $endTime->toTimeString(),
                    'read_at' => null,
                    'date' => $randomDate,
                    'activable_type' => 'App\Models\Tourevent',
                    'activable_id' => $tourevent->id,
                ]);
            }
        }

        foreach ($users as $user) {
            foreach ($tourevents as $tourevent) {
                // Generate random start and end times
                $startTime = Carbon::createFromTime(rand(8, 18), rand(0, 59), 0);
                $endTime = $startTime->copy()->addHours(1); // Ensure end time is 1 hour after start time

                // Generate a random date within a specific range (e.g., last 30 days)
                $randomDate = Carbon::now()->toDateString();

                // Create the activity
                Activity::create([
                    'user_id' => $user->id,
                    'title' => [
                        'en' => $tourevent->getTranslation('name','en') ?? 'Tour Event Activity',
                        'ar' => $tourevent->getTranslation('name','ar') ?? 'نشاط حدث جولة'
                    ],
                    'description' => [
                        'en' => $tourevent->getTranslation('description','en') ?? 'Description for Tour Event Activity',
                        'ar' => $tourevent->getTranslation('description','en') ?? 'وصف لنشاط حدث جولة'
                    ],
                    'start_time' => $startTime->toTimeString(),
                    'end_time' => $endTime->toTimeString(),
                    'date' => $randomDate,
                    'activable_type' => 'App\Models\Tourevent',
                    'activable_id' => $tourevent->id,
                    'read_at' => null,

                ]);
            }
        }

    }
}
