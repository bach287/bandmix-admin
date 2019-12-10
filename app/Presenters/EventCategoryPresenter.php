<?php

namespace App\Presenters;

use App\Transformers\EventCategoryTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EventCategoryPresenter.
 *
 * @package namespace App\Presenters;
 */
class EventCategoryPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EventCategoryTransformer();
    }
}
