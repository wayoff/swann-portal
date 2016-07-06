<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Product;
use App\Models\Specification;
use App\Http\Controllers\Controller;

class ProductSpecificationController extends Controller
{
    protected $products;
    protected $specifications;

    public function __construct(Specification $specifications, Product $products)
    {
        $this->products = $products;
        $this->specifications = $specifications;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product = $this->product($id);

        return view('admin.products.specifications.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = $this->product($id);

        return view('admin.products.specifications.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $product = $this->product($id);
        $product->specifications()->detach();

        foreach($product->specificationCategories as $category) :
                foreach($category->specifications as $specification) :
                    if ($request->input($specification->id)) {
                        $product->specifications()->attach( $specification->id,[
                                    'value'   => $request->input($specification->id),
                                    'link_to' => $request->input($specification->id.'_link_to')
                                ]);
                    }
                endforeach;        
        endforeach;

        return redirect(route('admin.products.{id}.specifications.index', $id))
                    ->with('status', 'Success on Updating Specification');
    }

    /**
     * Get Product By Id
     * @param  int $id
     * @return \Illuminate\Model
     */

    protected function product($id) 
    {
        return $this->products
                    ->with(['specificationCategories', 'specifications', 'specificationCategories.specifications'])
                    ->findOrFail($id);
    }
}
