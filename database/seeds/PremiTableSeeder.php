<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class PremiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('premi')->insert([
            [
                'title' => 'Premio1',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
            [
                'title' => 'Premio2',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
            [
                'title' => 'Premio3',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
            [
                'title' => 'Premio4',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
            [
                'title' => 'Premio5',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
            [
                'title' => 'Premio6',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
            [
                'title' => 'Premio7',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
            [
                'title' => 'Premio8',
                'description' => 'description',
                'place' => 'place',
                'date' => Carbon::now(),
                'active' => false,
                'link' => null
            ],
        ]);
    }
}
