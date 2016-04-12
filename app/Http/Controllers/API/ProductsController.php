<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    protected $products;

    public function __construct(Product $products)
    {
        $this->products = $products;
    }

    public function index(Request $request)
    {
        $limit = $request->input('limit')?: 7;
        $products = $this->products;

        if ($request->input('q')) {
            $products = $products->searchByNameAndModel($request->input('q'));
        }

        return $products->limit($limit)->get();
    }
}
