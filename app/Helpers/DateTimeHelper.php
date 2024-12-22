<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateTimeHelper
{

    public static function getDateDiffInDays($date1, $date2)
    {
        return Carbon::parse($date1)->diffInDays(Carbon::parse($date2));
    }

    public static function getSinceDays($date)
    {
        return Carbon::parse($date)->diffForHumans();
    }

    public static function getDateDiffInMinutes($date1 , $date2)
    {
        return Carbon::parse($date2)->diffInMinutes(Carbon::parse($date1));
    }
}
