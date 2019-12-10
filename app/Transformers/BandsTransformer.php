<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Bands;

/**
 * Class BandsTransformer.
 *
 * @package namespace App\Transformers;
 */
class BandsTransformer extends TransformerAbstract
{
    /**
     * Transform the Bands entity.
     *
     * @param \App\Entities\Bands $model
     *
     * @return array
     */
    public function transform(Bands $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
