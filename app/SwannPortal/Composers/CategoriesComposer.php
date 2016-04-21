<?php
namespace App\SwannPortal\Composers;

use App\Models\Category;
use Illuminate\View\View;

class CategoriesComposer
{
    protected $categories;

    function __construct(Category $categories)
    {
        $this->categories = $categories;
    }

    public function compose(View $view)
    {
        // $allParentId = $this->categories->where('parent_id', '!=', 0)->get();
        // $allParentId = $allParentId->pluck('id');

        // $categories = $this->categories->whereNotIn('id', $allParentId)->get();
        
        $categories = $this->categories->with(
                    ['children', 'children.children']
        )->where('parent_id', 0)->orderBy('order', 'ASC')->get();

        return $view->with('categories', $categories);
    }
}