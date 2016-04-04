<?php
namespace App\SwannPortal;

use App\Models\Product;
use Illuminate\View\View;

class RandomProductComposer
{
    protected $products;

    function __construct(Product $products)
    {
        $this->products = $products;
    }

    public function compose(View $view)
    {
        $products = $this->products->with('photo')->whereNotNull('photo_id')->orderByRaw("RAND()")->limit(6)->get();

        return $view->with('randomProducts', $products);
    }
}