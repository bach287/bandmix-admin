<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Book.
 *
 * @package namespace App\Entities;
 */
class Book extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['book_time','total_price','number_of_ticket','number_phone','address','status','ship_form','member_id','event_id'];

    public function member()
    {
        return $this->belongsTo('App\Entities\Member');
    }
    public function event()
    {
        return $this->belongsTo('App\Entities\Event');
    }
    public function bills()
    {
        return $this->hasOne('App\Entities\Bill');
    }
}
