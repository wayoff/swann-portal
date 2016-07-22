<?php

use App\Models\Footer;
use Illuminate\Database\Seeder;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $footers = [
            [
            'position' => '1',
            'content'  => ''
            ],
            [
            'position' => '2',
            'content'  => ''
            ],
            [
            'position' => '3',
            'content'  => ''
            ]
        ];

        Footer::insert($footers);
    }
}
