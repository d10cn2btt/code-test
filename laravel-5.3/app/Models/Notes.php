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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * @param null $status
     *
     * @return array|mixed
     */
    public static function getStatus($status = null)
    {
        $listStatus = array(
            self::STATUS_DEACTIVE => trans('admin.notes.fields.status_deactive'),
            self::STATUS_DRAW     => trans('admin.notes.fields.status_draw'),
            self::STATUS_ACTIVE   => trans('admin.notes.fields.status_active'),
        );

        if ($status !== null && isset($listStatus[$status])) {
            return $listStatus[$status];
        }

        return $listStatus;
    }

    /**
     * @param $request
     * @param null $idNote
     * @return bool|static
     */
    public static function saveNote($request, $idNote = null)
    {
        $transaction = false;
        $data        = array(
            'title'      => $request->title,
            'body'       => $request->body,
            'status'     => $request->status,
            'created_by' => \Auth::id(),
        );

        if ($idNote === null) {
            // create
            $transaction = self::create($data);
        } else {
            // update
            $note        = self::find($idNote);
            $transaction = $note->fill($data)->save();
        }

        return $transaction;
    }

    /**
     * Example Scope
     * @param $query
     * @param $status
     * @return mixed
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Example Accessor
     * @param $value
     * @return string
     */
    public function getTitleAttribute($value)
    {
        return strtoupper($value);
    }

    /**
     * example function mutator
     * @param $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value . " example function mutator";
    }
}
