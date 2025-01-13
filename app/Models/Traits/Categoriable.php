<?php

namespace App\Models\Traits;

use App\Models\Category;

trait Categoriable
{
    /**
     * Get the category that this model belongs to.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Set the category for this model.
     *
     * @param Category $category
     * @return void
     */
    public function setCategory(Category $category)
    {
        $this->category()->associate($category);
        $this->save();
    }

    /**
     * Get the category of this model.
     *
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
