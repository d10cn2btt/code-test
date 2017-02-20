<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class L35 extends Model
{
    protected $table = 'l35';

    public function scopePriority($query)
    {
        return $query->orderBy('priority', 'asc');
    }

    /**
     * @param $query
     * @param $parentId
     *
     * @return mixed
     */
    public function scopeParent($query, $parent)
    {
        if (is_array($parent)) {
            return $query->whereIn('parent', $parent);
        }

        return $query->where('parent', $parent);
    }
}
