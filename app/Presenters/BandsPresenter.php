<?php

namespace App\Presenters;

use App\Transformers\BandsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BandsPresenter.
 *
 * @package namespace App\Presenters;
 */
class BandsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BandsTransformer();
    }
}
