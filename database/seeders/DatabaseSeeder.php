<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
       $this->call(SettingSeeder::class);
       $this->call(TestimonialSeeder::class);
       $this->call(CategorySeeder::class);
       $this->call(DestinationSeeder::class);
       $this->call(ToureventSeeder::class);
       $this->call(PartnerSeeder::class);
       $this->call(SubscribeSeeder::class);
       $this->call(StepSeeder::class);
       $this->call(PostSeeder::class);
       $this->call(PageSeeder::class);
       $this->call(UsersTableSeeder::class);
       $this->call(CountrySeeder::class);
       $this->call(CitySeeder::class);
       $this->call(AccommodationSeeder::class);
       $this->call(BookingSeeder::class);
       $this->call(EventsSeeder::class);
       $this->call(BookingEventSeeder::class);
       $this->call(ImagesSeeder::class);
       $this->call(LandmarksSeeder::class);
    }
}
