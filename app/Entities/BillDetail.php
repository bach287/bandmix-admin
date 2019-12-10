<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class BillDetail.
 *
 * @package namespace App\Entities;
 */
class BillDetail extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function events(){
       return $this->belongsTo('App\Entities\Event','event_id');
    }
    public function books(){
        return $this->belongsTo('App\Entities\Book','book_id');
    }

}
