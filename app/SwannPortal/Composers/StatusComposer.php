<?php
namespace App\SwannPortal\Composers;

use Illuminate\View\View;

class StatusComposer
{

    function __construct()
    {
        //
    }

    public function compose(View $view)
    {
        return $view->with('status', session('status'));
    }
}