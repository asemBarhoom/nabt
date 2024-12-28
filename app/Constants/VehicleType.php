<?php


namespace App\Constants;

class VehicleType
{
    private const TYPES = [
        'CAR' => 'CAR',
        'BUS' => 'BUS',
        'VAN' => 'VAN',
        'MOTORCYCLE' => 'MOTORCYCLE',
        'OTHER' => 'OTHER',
    ];

    /**
     * Get all vehicle types in English.
     *
     * @return array
     */
    public static function all(): array
    {
        return array_keys(self::TYPES);
    }

    /**
     * Get the translation of a vehicle type.
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
