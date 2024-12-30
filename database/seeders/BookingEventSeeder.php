<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\BookingEvent;
use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bookings = Booking::all();
        $events = Event::all();

        foreach ($bookings as $booking) {
            foreach ($events as $event) {
                // Randomly associate bookings with events
                if (rand(0, 1)) {
                    $bookingEvent = new BookingEvent();
                    $bookingEvent->booking_id = $booking->id;
                    $bookingEvent->event_id = $event->id;
                    $bookingEvent->save();
                }
            }
        }
    }
}
