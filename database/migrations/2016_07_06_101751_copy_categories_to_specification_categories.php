<?php

use App\Models\Category;
use App\Models\SpecificationCategory;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CopyCategoriesToSpecificationCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = Category::orderBy('id', 'asc')->get();

        foreach($categories as $category):

            $specification = new SpecificationCategory();
            $specification->name = $category->name;
            $specification->parent_id = $category->parent_id;
            $specification->order = $category->order;
            $specification->save();
            
        endforeach;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
