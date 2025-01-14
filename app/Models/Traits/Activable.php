<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Activable
{
    /**
     * Define a polymorphic one-to-many relationship to the Activity model.
     *
     * @return MorphMany
     */
    public function activities(): MorphMany
    {
        return $this->morphMany(\App\Models\Activity::class, 'activable');
    }

    /**
     * Create a new activity for the activable model.
     *
     * @param array $attributes
     * @return \App\Models\Activity
     */
    public function addActivity(array $attributes)
    {
        return $this->activities()->create($attributes);
    }

    /**
     * Update an existing activity for the activable model.
     *
     * @param int $activityId
     * @param array $attributes
     * @return bool
     */
    public function updateActivity(int $activityId, array $attributes): bool
    {
        $activity = $this->activities()->find($activityId);
        if ($activity) {
            return $activity->update($attributes);
        }

        return false;
    }

    /**
     * Delete an activity for the activable model.
     *
     * @param int $activityId
     * @return bool
     */
    public function deleteActivity(int $activityId): bool
    {
        $activity = $this->activities()->find($activityId);
        if ($activity) {
            return $activity->delete();
        }

        return false;
    }

    /**
     * Get all activities for the activable model within a date range.
     *
     * @param string $startDate
     * @param string $endDate
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getActivitiesWithinDateRange(string $startDate, string $endDate)
    {
        return $this->activities()
            ->whereBetween('date', [$startDate, $endDate])
            ->get();
    }

    /**
     * Check if the activable model has any activities.
     *
     * @return bool
     */
    public function hasActivities(): bool
    {
        return $this->activities()->exists();
    }

    /**
     * Count the number of activities for the activable model.
     *
     * @return int
     */
    public function countActivities(): int
    {
        return $this->activities()->count();
    }
}
