<?php

use App\Coaching;
use Illuminate\Database\Seeder;

class CoachingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coaching::insert([

            [
                'short' => 'no',
                'description' => 'No Coaching',
            ],
            [
                'short' => 'weekend',
                'description' => 'Only On Weekends',
            ],
            [
                'short' => 'weekdays',
                'description' => 'Only On Weekdays',
            ],
            [
                'short' => 'yes',
                'description' => 'Yes, Coaching Available',
            ]
        ]);
    }
}
