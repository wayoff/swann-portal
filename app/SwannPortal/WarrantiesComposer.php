<?php
namespace App\SwannPortal;

use App\Models\Warranty;
use Illuminate\View\View;

class WarrantiesComposer
{
    protected $warranties;

    function __construct(Warranty $warranties)
    {
        $this->warranties = $warranties;
    }

    public function compose(View $view)
    {
        $warranties = $this->warranties->all();

        return $view->with('warranties', $warranties);
    }
}