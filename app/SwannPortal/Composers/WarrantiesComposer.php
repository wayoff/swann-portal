<?php
namespace App\SwannPortal\Composers;

use App\Models\Warranty;
use Illuminate\View\View;
use App\Models\PolicyCategory;

class WarrantiesComposer
{
    protected $warranties;
    protected $policyCategories;

    function __construct(Warranty $warranties, PolicyCategory $policyCategories)
    {
        $this->warranties = $warranties;
        $this->policyCategories = $policyCategories;
    }

    public function compose(View $view)
    {
        $warranties = $this->warranties
                            ->with('document')
                            ->doesntHave('categories')->get();
        $policyCategories = $this->policyCategories
                                ->where('parent_id', 0)
                                ->with(['parent', 'children'])
                                ->orderBy('order', 'ASC')
                                ->get();

        return $view->with('warranties', $warranties)
                    ->with('policyCategories', $policyCategories);
    }
}