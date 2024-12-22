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
}
