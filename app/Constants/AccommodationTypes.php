<?php

namespace App\Constants;

class AccommodationTypes
{
    private const TYPES = [
        'HOTEL' => 'HOTEL',
        'CARAVAN' => 'CARAVAN',
        'CHALET' => 'CHALET',
        'CAMP' => 'CAMP',
        'RESORT' => 'RESORT',
    ];

    /**
     * Get all accommodation types in English.
     *
     * @return array
     */
    public static function all(): array
    {
        return array_keys(self::TYPES);
    }

    /**
     * Get the Arabic translation of an accommodation type.
     *
     * @param string $type
     * @return string|null
     */
    public static function getTranslation(string $type): ?string
    {
        return self::TYPES[$type] ?? null;
    }

    /**
     * Get all translations.
     *
     * @return array
     */
    public static function allTranslations(): array
    {
        return self::TYPES;
    }
}
