<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'country_id',
        'city_id',
        'email',
        'password',
        'address',
        'prefix',
        'phone',
        'dob',
        'job',
        'image',
        'marketing_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Append valid_code attribute to the User model
    protected $appends = ['valid_code'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function generateMarketingUrl($queryParams = [], $tokenLength, $baseUrl = ''): string
    {
        // Generate a unique token

        // Use provided base URL or default to application URL
        $baseUrl = $baseUrl ?: url('/');
        $token = Str::random($tokenLength);
        $queryParams['token'] = $token;

        // Build the query string
        $queryString = http_build_query($queryParams);

        // Construct the full URL
        $url = $baseUrl . '/' . $this->marketing_token;
        if (!empty($queryString)) {
            $url .= '?' . $queryString;
        }

        $url = $this->update(['marketing_token' => $url]);

        return $url;
    }

    protected static function booted()
    {
        static::created(function ($user) {
            $user->generateMarketingUrl(
                [
                    'utm_source' => 'email',
                    'utm_medium' => 'referral',
                    'user_id' => $user->id,
                ],
                36,
                env('APP_URL')
            );
        });
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function wheelies()
    {
        return $this->hasMany(Wheely::class) ;
    }

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }


    public function redemptions()
    {
        return $this->hasMany(Redemption::class);
    }

    public function points()
    {
        return $this->hasMany(Point::class);
    }

    public function totalPoints(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->points()
                ->where('status', 'approved') // Only approved points
                ->where('redeemable', true)
                ->sum('points_earned')
        );
    }

    /**
     * Get the latest valid verification code for the user.
     *
     * @return string|null
     */
    public function getValidCodeAttribute()
    {
        $code = $this->vericodes()
            ->where('used', false)
            ->where('expires_at', '>', now())
            ->latest('expires_at')
            ->first();

        return $code ? $code->code : null;
    }

    /**
     * Define the relationship with the Vericode model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vericodes()
    {
        return $this->hasMany(Vericode::class);
    }
}
