<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Mark Jestoni Suner',
            'email'    => 'mark.suner@globalsky.com',
            'password' => 'suner321'
        ]);

        User::create([
            'name'     => 'Kevin Cautiverio',
            'email'    => 'kevin.cautiverio@globalsky.com',
            'password' => 'cautiverio321'
        ]);


        User::create([
            'name'     => 'John Justin Lozano',
            'email'    => 'john.lozano@globalsky.com',
            'password' => 'lozano321'
        ]);


        User::create([
            'name'     => 'Erickson Deguzman',
            'email'    => 'erickson.deguzman@globalsky.com',
            'password' => 'deguzman321'
        ]);


        User::create([
            'name'     => 'Joy Mercado',
            'email'    => 'joy.mercado@globalsky.com',
            'password' => 'mercado321'
        ]);

        User::create([
            'name'     => 'Zarah Licuanan',
            'email'    => 'zarah.licuanan@globalsky.com',
            'password' => 'licuanan321'
        ]);

        User::create([
            'name'     => 'Ted Seballos',
            'email'    => 'ted.seballos@globalsky.com',
            'password' => 'seballos321'
        ]);
    }
}