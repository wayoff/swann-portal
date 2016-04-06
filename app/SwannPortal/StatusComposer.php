<?php
namespace App\SwannPortal;

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