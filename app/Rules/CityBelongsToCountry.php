<?php

namespace App\Rules;

use App\Models\City;
use Illuminate\Contracts\Validation\Rule;

class CityBelongsToCountry implements Rule
{
    protected $countryId;

    // Constructor to accept the country_id
    public function __construct($countryId)
    {
        $this->countryId = $countryId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (is_null($value)) {
            return true; // Skip validation if city_id is null (nullable)
        }

        // Check if the city exists and belongs to the specified country
        $city = City::find($value);

        return $city && $city->country_id == $this->countryId;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The selected city does not belong to the selected country.';
    }
}
