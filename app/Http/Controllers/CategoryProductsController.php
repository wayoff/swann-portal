<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\Product;
use App\Models\Category;
use App\Models\FaqCategory;
use App\Models\ProcedureCategory;
use App\Models\ScreenshotCategory;

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
        $children = $category->children;

        $ids = $children->pluck('id');

        $children->each(function($item, $key) use($ids) {
            $ids->push($item->id);
        });
        $ids->push($category->id);

        $model = $this->products->whereHas('categories', function( $q ) use ($ids) {
            $q->whereIn('categories.id', $ids);
        });

        $model = $model->with(['photo', 'procedures', 'troubleShooting']);

        if (null !== $request->input('q')) {
            $q = $request->input('q');

            $model = $model
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
        ScreenshotCategory $screenshotCategories,
        $categoryId,
        $productId)
    {
        $product = $this->products->with([
                // 'procedures.steps.document', 'procedures.steps.photo',
                'procedures', 'procedures.document',
                'procedures.trees',
                'photo', 'questions', 'questions.document',
                'questions.faqcategory', 'photos',
                'specifications', 'screenshots',
                'troubleShooting', 'specifications'
            ])->findOrFail($productId);

        $faqCategories = $faqCategories->get();
        $procedureCategories = $procedureCategories->get();
        $screenshotCategories = $screenshotCategories->orderBy('order')->get();

        return view('pages.category-products.show',
                compact(
                    'product',
                    'faqCategories',
                    'procedureCategories',
                    'screenshotCategories'
                )
        );
    }
}
