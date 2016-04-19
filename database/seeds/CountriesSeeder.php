<?php

use App\Models\Countries;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Countries::create([
            'name'     => 'Australia'
        ]);
        Countries::create([
            'name'     => 'United Kingdom'
        ]);
        Countries::create([
            'name'     => 'United States'
        ]);
    }
}
