<?php
namespace App\SwannPortal\Composers;

use App\Models\Country;
use App\Models\Warranty;
use Illuminate\View\View;

class WarrantiesComposer
{
    protected $warranties;
    protected $countries;

    function __construct(Warranty $warranties, Country $countries)
    {
        $this->warranties = $warranties;
        $this->countries = $countries;
    }

    public function compose(View $view)
    {
        $warranties = $this->warranties->doesntHave('countries')->get();
        $countries = $this->countries->get();

        return $view->with('warranties', $warranties)
                    ->with('countries', $countries);
    }
}