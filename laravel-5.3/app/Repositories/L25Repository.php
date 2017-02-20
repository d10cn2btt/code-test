<?php
/**
 * Created by PhpStorm.
 * User: truongbt
 * Date: 12/02/2017
 * Time: 23:00
 */

namespace App\Repositories;


use App\Models\L25;

class L25Repository extends BaseRepository
{
    protected $l25;

    /**
     * Create a new L25Repository Instance.
     *
     * @param L25 $l25
     */
    public function __construct(L25 $l25)
    {
        $this->l25 = $l25;
    }
}