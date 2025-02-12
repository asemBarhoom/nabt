<?php

namespace App\Http\Controllers\API;

use App\Helpers\Response;
use Illuminate\Support\Facades\Auth;

class StatisticsController
{
    /**
     * Statistics Configuration
     */
    protected array $statisticsConfig = [
        'bookings'    => ['label' => 'Total Bookings', 'icon' => 'fas fa-calendar-check'],
        'favorites'   => ['label' => 'Favorites', 'icon' => 'fas fa-heart'],
        'activities'  => ['label' => 'Activities Joined', 'icon' => 'fas fa-running'],
        'comments'    => ['label' => 'Comments Posted', 'icon' => 'fas fa-comment'],
        'wheelies'    => ['label' => 'Wheelies Performed', 'icon' => 'fas fa-biking'],
        'restaurants' => ['label' => 'Restaurants Visited', 'icon' => 'fas fa-utensils'],
        'redemptions' => ['label' => 'Rewards Redeemed', 'icon' => 'fas fa-gift'],
    ];

    public function index()
    {
        $user = Auth::guard('api')->user()->load(array_keys($this->statisticsConfig));

        return Response::respondSuccess(Response::SUCCESS, $this->formatStatistics($user));
    }

    /**
     * Format the statistics array dynamically.
     */
    private function formatStatistics($user): array
    {
        return array_map(fn($key, $config) => [
            'key'   => t($key),
            'label' => $config['label'],
            'icon'  => $config['icon'],
            'count' => $user->{$key}->count() ?? 0,
        ], array_keys($this->statisticsConfig), $this->statisticsConfig);
    }
}
