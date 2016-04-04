<?php
namespace App\SwannPortal;

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
        $products = $this->products->where('featured', 1)->limit(5)->get();

        return $view->with('topProducts', $products);
    }
}