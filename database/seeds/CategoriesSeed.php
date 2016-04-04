<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'     => 'Test Category'
        ]);
        Category::create([
            'name'     => 'Test Category2'
        ]);
        Category::create([
            'name'     => 'Test Category3'
        ]);
        Category::create([
            'name'     => 'Test Category4'
        ]);
    }
}
