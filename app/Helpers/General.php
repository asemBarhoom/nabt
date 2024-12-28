<?php

namespace App\Helpers;


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

    /**
     * Generate a unique reservation number.
     *
     * @return string
     */
    public static function generateReservationNumber(): string
    {
        $prefix = 'ULA2030'; // Prefix representing AlUla and Vision 2030
        $uniqueId = strtoupper(uniqid()); // Generate a unique identifier
        $randomNumber = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT); // Generate a random 4-digit number

        return $prefix . '-' . $randomNumber . '-' . substr($uniqueId, -5); // Combine all parts
    }
}
