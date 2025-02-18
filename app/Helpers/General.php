<?php

namespace App\Helpers;


use Illuminate\Support\Facades\DB;

class General
{

    public static function getPreferedLang()
    {
        $lang = request()->header('X-Localization');
        preg_match('/^[a-zA-Z]{1,10}/', $lang, $matches);
        return !empty($matches[0]) ? $matches[0] : null;
    }


    public static function remove_utf8_bom($text)
    {
        $bom = pack('H*', 'EFBBBF');
        $text = preg_replace("/^$bom/", '', $text);
        return $text;
    }

    public static function generateReservationNumber(): string
    {
        $prefix = 'ULA2030'; // Prefix representing AlUla and Vision 2030

        // Retrieve the last reservation number from the database
        $lastNumber = DB::table('bookings')->max('reservation_number');

        // Extract the numeric part and increment
        if ($lastNumber) {
            // Extract the number part after the prefix (ULA2030-XXXX)
            preg_match('/ULA2030-(\d+)/', $lastNumber, $matches);
            $nextNumber = isset($matches[1]) ? intval($matches[1]) + 1 : 1;
        } else {
            $nextNumber = 1; // Start from 1 if no records exist
        }

        // Ensure it is always 6 digits (e.g., ULA2030-000001)
        $formattedNumber = str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

        return $prefix . '-' . $formattedNumber;
    }
}
