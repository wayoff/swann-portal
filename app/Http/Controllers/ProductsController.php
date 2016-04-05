<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Product;

class ProductsController extends Controller
{
    protected $products;

    public function __construct(Product $products)
    {
        $this->products = $products;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $models = $this->products;
        $q = null;

        if (null !== $request->input('q')) {
            $q = $request->input('q');

            $models = $models
                        ->where('model_no', 'like', '%'. $q .'%')
                        ->orWhere('name', 'like', '%' . $q . '%');
        }

        $products = $models->paginate(20);

        return view('pages.products.index', compact('products', 'q'));
    }
}
