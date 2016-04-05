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
            'name'     => 'HIK units'
        ]);
        Category::create([
            'name'     => 'BC units'
        ]);
        Category::create([
            'name'     => 'Wireless units'
        ]);
        Category::create([
            'name'     => 'Cameras'
        ]);
    }
}
