<?php
namespace App\SwannPortal\Composers;

use Illuminate\View\View;

class AdminComposer
{

    function __construct()
    {
        //
    }

    public function compose(View $view)
    {
        return $view->with('admin', auth()->user());
    }
}