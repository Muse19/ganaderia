<?php

use App\Models\Lot;
use Illuminate\Database\Seeder;

class LotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lot = new Lot();
        $lot->number = 121;
        $lot->save();

        $lot = new Lot();
        $lot->number = 123;
        $lot->save();

        $lot = new Lot();
        $lot->number = 145;
        $lot->save();

        $lot = new Lot();
        $lot->number = 254;
        $lot->save();
    }
}
