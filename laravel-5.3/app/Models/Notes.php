<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $table = 'notes';

    protected $fillable = array('title', 'body', 'status', 'created_by');

    const STATUS_DEACTIVE = -1;
    const STATUS_DRAW = 0;
    const STATUS_ACTIVE = 1;

    public static function getStatus($status = null)
    {
        $listStatus = array(
            'STATUS_DEACTIVE' => trans('admin.field.note.status_deactive'),
            'STATUS_DRAW' => trans('admin.field.note.status_draw'),
            'STATUS_ACTIVE' => trans('admin.field.note.status_active'),
        );

        if (!empty($status) && isset($listStatus[$status])) {
            return $listStatus[$status];
        }

        return $listStatus;
    }
}
