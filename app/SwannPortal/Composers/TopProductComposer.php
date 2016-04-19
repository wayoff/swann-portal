<?php
namespace App\SwannPortal\Composers;

use App\Models\Product;
use Illuminate\View\View;

class TopProductComposer
{
    protected $products;

    function __construct(Product $products)
    {
        $this->products = $products;
    }

    public function compose(View $view)
    {
        $products = $this->products->featured()->lastUpdated()->limit(5)->get();

        return $view->with('topProducts', $products);
    }
}