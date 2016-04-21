<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Product;
use App\Models\Category;
use App\Models\FaqCategory;
use App\Models\ProcedureCategory;

use Illuminate\Http\Request;

class CategoryProductsController extends Controller
{
    protected $products;

    public function __construct(Product $products)
    {
        $this->products = $products;
    }

    public function index($categoryId, Category $categories, Request $request)
    {
        $q = null;
        $category = $categories->findOrFail($categoryId);

        $model = $category->products()->with('photo');

        if (null !== $request->input('q')) {
            $q = $request->input('q');

            $model = $model
                        ->distinct()
                        ->searchByNameAndModel($q)
                        ->groupBy('products.id');
        }

        $products = $model->paginate(30);

        return view('pages.category-products.index', compact('products', 'category', 'q'));
    }

    public function show(
        Category $categories,
        FaqCategory $faqCategories,
        ProcedureCategory $procedureCategories,
        $categoryId,
        $productId)
    {
        $product = $this->products->with([
                'procedures.steps.document', 'procedures.steps.photo',
                'videos', 'procedures', 'procedures.document',
                'photo', 'questions', 'questions.document',
                'questions.faqcategory', 'photos'
            ])->findOrFail($productId);

        $faqCategories = $faqCategories->get();
        $procedureCategories = $procedureCategories->get();

        return view('pages.category-products.show',
                compact('product', 'faqCategories', 'procedureCategories')
        );
    }
}
