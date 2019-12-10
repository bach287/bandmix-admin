<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\EventCategory;

/**
 * Class EventCategoryTransformer.
 *
 * @package namespace App\Transformers;
 */
class EventCategoryTransformer extends TransformerAbstract
{
    /**
     * Transform the EventCategory entity.
     *
     * @param \App\Entities\EventCategory $model
     *
     * @return array
     */
    public function transform(EventCategory $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
