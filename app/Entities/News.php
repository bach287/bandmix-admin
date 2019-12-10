<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class News.
 *
 * @package namespace App\Entities;
 */
class News extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','title','description','body','status','is_show_home','category_id','avatar','slug'];

    public function category(){
    	return $this->belongsTo('App\Entities\Category');
	}

	public function user(){
        return $this->belongsTo('App\User');
    }

}
