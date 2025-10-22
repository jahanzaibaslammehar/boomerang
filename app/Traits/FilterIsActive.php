<?php

namespace App\Traits;

trait FilterIsActive
{
    /**
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        if (request()->has('is_active')) {
            return $query->where('is_active', request()->input('is_active'));
        }

        return $query;
    }
}
