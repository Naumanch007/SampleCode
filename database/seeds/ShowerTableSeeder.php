<?php

use App\Shower;
use Illuminate\Database\Seeder;

class ShowerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shower::insert([

            [
                'short' => 'free',
                'description' => 'Free',
            ],
            [
                'short' => 'fee',
                'description' => 'Fee',
            ],
            [
                'short' => 'no',
                'description' => 'No',
            ]

        ]);
    }
}
