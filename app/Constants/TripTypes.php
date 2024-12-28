<?php

namespace App\Constants;

class TripTypes
{
    private const TYPES = [
        'TOURIST' => 'TOURIST',
        'BUSINESS' => 'BUSINESS',
        'RELIGIOUS' => 'RELIGIOUS',
        'OTHER' => 'OTHER',
    ];

    /**
     * Get all trip types in English.
     *
     * @return array
     */
    public static function all(): array
    {
        return array_keys(self::TYPES);
    }

    /**
     * Get the translation of a trip type.
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
