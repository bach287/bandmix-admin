<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Band.
 *
 * @package namespace App\Entities;
 */
class Band extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','doc','avatar','genre','status','about','achievements','like_count','rate','phone_manager','member_id','slug'];

    public function member()
    {
        return $this->belongsTo('App\Entities\Member');
    }

    public function genre()
    {
        return $this->belongsTo('App\Entities\Genre');
    }

}
