<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Genre;

/**
 * Class GenreTransformer.
 *
 * @package namespace App\Transformers;
 */
class GenreTransformer extends TransformerAbstract
{
    /**
     * Transform the Genre entity.
     *
     * @param \App\Entities\Genre $model
     *
     * @return array
     */
    public function transform(Genre $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
