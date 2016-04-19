<?php

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'name'     => 'Australia'
        ]);
        Country::create([
            'name'     => 'United Kingdom'
        ]);
        Country::create([
            'name'     => 'United States'
        ]);
    }
}
