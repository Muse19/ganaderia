<?php

use Carbon\Carbon;
use App\Models\Cattle;
use Illuminate\Database\Seeder;

class PivotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cattle = Cattle::find(1);
        $cattle->doses()->attach([
            1 => ['date' => Carbon::parse('2019-03-01')],
            2 => ['date' => Carbon::parse('2019-04-01')],
            3 => ['date' => Carbon::parse('2019-03-10')],
            4 => ['date' => Carbon::parse('2019-04-01')],
        ]);

        $cattle = Cattle::find(2);
        $cattle->doses()->attach([
            1 => ['date' => Carbon::parse('2019-03-01')],
            2 => ['date' => Carbon::parse('2019-04-01')],
            3 => ['date' => Carbon::parse('2019-03-10')],
            4 => ['date' => Carbon::parse('2019-04-01')],
        ]);

        $cattle = Cattle::find(3);
        $cattle->doses()->attach([
            1 => ['date' => Carbon::parse('2019-03-01')],
            2 => ['date' => Carbon::parse('2019-04-01')],
            6 => ['date' => Carbon::parse('2019-03-10')],
            7 => ['date' => Carbon::parse('2019-04-01')],
        ]);
    }
}
