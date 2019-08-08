<?php

use App\Contract;
use Illuminate\Database\Seeder;

class ContractTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contract::insert([

            [
                'short' => '24m',
                'description' => '24 months',
            ],
            [
                'short' => '12m',
                'description' => '12 months',
            ],
            [
                'short' => '1m',
                'description' => '1 month',
            ]

        ]);
    }
}
