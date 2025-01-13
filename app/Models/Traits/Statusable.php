<?php

namespace App\Models\Traits;

use App\Models\Status;

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
        return $this->statuses()->create([
            'status' => $status,
            'user_id' => object_get($user, 'id'),
        ]);
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
