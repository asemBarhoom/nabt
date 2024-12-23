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
    }
}
