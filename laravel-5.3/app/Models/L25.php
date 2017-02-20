<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class L25 extends Model
{
    protected $table = 'l25';

    public function scopePriority($query)
    {
        return $query->orderBy('priority', 'asc');
    }
}
