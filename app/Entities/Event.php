<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Event.
 *
 * @package namespace App\Entities;
 */
class Event extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','avatar','description','detail','location','time','vacancy','price','member_id','slug'];

    public function member() {
        return $this->belongsTo('App\Entities\Member');
    }
    public function location(){
        return $this->belongsTo('App\Entities\Location');
    }

    public function genre()
    {
        return $this->belongsToMany('App\Entities\Genre');
    }

}
