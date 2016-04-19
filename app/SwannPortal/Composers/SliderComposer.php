<?php
namespace App\SwannPortal\Composers;

use App\Models\Slider;
use Illuminate\View\View;

class SliderComposer
{
    protected $sliders;

    function __construct(Slider $sliders)
    {
        $this->sliders = $sliders;
    }

    public function compose(View $view)
    {
        $sliders = $this->sliders->all();

        return $view->with('sliders', $sliders);
    }
}