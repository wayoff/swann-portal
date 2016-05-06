<?php
namespace App\SwannPortal\Composers;

use Illuminate\View\View;
use App\Models\Commendation;

class CommendationComposer
{
    protected $commendations;

    function __construct(Commendation $commendations)
    {
        $this->commendations = $commendations;
    }

    public function compose(View $view)
    {
        $commendations = $this->commendations
                                ->with(['photo'])
                                ->orderByRaw("RAND()")
                                ->take(20)
                                ->get();

        return $view->with('commendations', $commendations);
    }
}