<?php
namespace App\SwannPortal\Composers;

use Illuminate\View\View;
use App\Models\Footer;

class FooterComposer
{
    protected $footers;

    function __construct(Footer $footers)
    {
        $this->footers = $footers;
    }

    public function compose(View $view)
    {
        $footers = $this->footers->get();

        return $view->with('footers', $footers);
    }
}