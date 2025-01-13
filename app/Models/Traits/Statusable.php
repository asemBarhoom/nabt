<?php

namespace App\Models\Traits;

use App\Models\Booking;
use App\Models\Status;
use Carbon\Carbon;

trait Statusable
{
    // Define the inverse polymorphic relationship
    public function statuses()
    {
        return $this->morphMany(Status::class, 'statusable');
    }

    // Get the current status of this model
    public function currentStatus()
    {
        return $this->statuses()->latest()->first();
    }

    // Check if this model has a specific status
    public function hasStatus($status)
    {
        return $this->statuses()->where('status', $status)->exists();
    }

    // Add a status to this model
    public function addStatus($status, $user = null)
    {
        return $this->statuses()->updateOrCreate(
            [
                'status' => $status, // Condition for matching existing record
                'user_id' => object_get($user, 'id'), // Ensure the user_id is correct
            ],
            [
                'status' => $status, // Update status value
                'color' => Booking::STATUS_COLORS[$status], // Update status value
                'user_id' => object_get($user, 'id'), // Update user_id if available
                'updated_at' => Carbon::now(), // Ensure the updated timestamp is set
                'created_at' => Carbon::now(), // Ensure the created timestamp is set if it's a new status
            ]
        );
    }

    // Remove all statuses of this model
    public function clearStatuses()
    {
        return $this->statuses()->delete();
    }

    // Get the next status based on a predefined flow
    public static function getNextStatus(string $currentStatus): ?string
    {
        if (!defined('static::STATUS_FLOW')) {
            throw new \LogicException('STATUS_FLOW is not defined in the model using Statusable.');
        }

        $index = array_search($currentStatus, static::STATUS_FLOW);

        return $index !== false && isset(static::STATUS_FLOW[$index + 1])
            ? static::STATUS_FLOW[$index + 1]
            : null; // Return null if no next status exists
    }
}
