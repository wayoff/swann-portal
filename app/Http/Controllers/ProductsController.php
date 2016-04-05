<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $products;

    public function __construct(Product $products)
    {
        $this->products = $products;
    }

    public function index($categoryId, Category $categories, Request $request)
    {
        // $models = $this->products->where('category_id', '=', $categoryId)->distinct()->get();
        $q = null;
        $model = $this->products->where('category_id', $categoryId);
        $model = $model->with('photo');

        if (null !== $request->input('q')) {
            $q = $request->input('q');

            $model = $model
                        ->where('model_no', 'like', '%'. $q .'%')
                        ->orWhere('name', 'like', '%' . $q . '%');
        }

        $products = $model->paginate(30);

        $category = $categories->findOrFail($categoryId);

        return view('pages.products.index', compact('products', 'category', 'q'));
    }

    public function show(Category $categories, $categoryId, $productId)
    {
        $product = $this->products->findOrFail($productId);

        $category = $categories->findOrFail($categoryId);

        return view('pages.products.show', compact('product', 'category'));
    }
}
