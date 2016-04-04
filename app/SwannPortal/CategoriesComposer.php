<?php
namespace App\SwannPortal;

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
        $categories = $this->categories->all();

        return $view->with('categories', $categories);
    }
}