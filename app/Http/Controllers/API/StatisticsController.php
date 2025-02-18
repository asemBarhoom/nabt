<?php

namespace App\Http\Controllers\API;

use App\Helpers\FileHelper;
use App\Helpers\Response;
use Illuminate\Support\Facades\Auth;

class StatisticsController
{
    /**
     * Statistics Configuration
     */
    protected array $statisticsConfig = [
        'bookings'    => ['label' => 'Total Bookings', 'icon' => 'calendar-check-solid.svg'],
        'favorites'   => ['label' => 'Favorites', 'icon' => 'heart-solid.svg'],
        'activities'  => ['label' => 'Activities Joined', 'icon' => 'person-running-solid.svg'],
        'comments'    => ['label' => 'Comments Posted', 'icon' => 'comment-solid.svg'],
        'wheelies'    => ['label' => 'Wheelies Performed', 'icon' => 'car-solid.svg'],
        'restaurants' => ['label' => 'Restaurants Visited', 'icon' => 'utensils-solid.svg'],
        'redemptions' => ['label' => 'Rewards Redeemed', 'icon' => 'gift-solid.svg'],
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
            'key'   => $key,
            'label' => t($config['label']),
            'icon'  => FileHelper::getFullPathSingleAsset('icons/'.$config['icon']),
            'count' => $user->{$key}->count() ?? 0,
        ], array_keys($this->statisticsConfig), $this->statisticsConfig);
    }
}
