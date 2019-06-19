<?php

use Carbon\Carbon;
use App\Models\Feedlot;
use Illuminate\Database\Seeder;

class FeedlotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feedlot = new Feedlot();
        $feedlot->cattle_id = 1;
        $feedlot->lot_id = 1;
        $feedlot->weight = 125;
        $feedlot->date = Carbon::parse('2019-04-01');
        $feedlot->save();

        $feedlot = new Feedlot();
        $feedlot->cattle_id = 1;
        $feedlot->lot_id = 1;
        $feedlot->weight = 137;
        $feedlot->date = Carbon::parse('2019-04-10');
        $feedlot->save();

        $feedlot = new Feedlot();
        $feedlot->cattle_id = 1;
        $feedlot->lot_id = 1;
        $feedlot->weight = 140;
        $feedlot->date = Carbon::parse('2019-04-20');
        $feedlot->save();

        $feedlot = new Feedlot();
        $feedlot->cattle_id = 1;
        $feedlot->lot_id = 2;
        $feedlot->weight = 145;
        $feedlot->date = Carbon::parse('2019-04-30');
        $feedlot->save();

        $feedlot = new Feedlot();
        $feedlot->cattle_id = 1;
        $feedlot->lot_id = 2;
        $feedlot->weight = 152;
        $feedlot->date = Carbon::parse('2019-05-10');
        $feedlot->save();

        //******************************************************
        $feedlot = new Feedlot();
        $feedlot->cattle_id = 2;
        $feedlot->lot_id = 3;
        $feedlot->weight = 320;
        $feedlot->date = Carbon::parse('2019-04-01');
        $feedlot->save();

        $feedlot = new Feedlot();
        $feedlot->cattle_id = 2;
        $feedlot->lot_id = 3;
        $feedlot->weight = 330;
        $feedlot->date = Carbon::parse('2019-04-10');
        $feedlot->save();

        $feedlot = new Feedlot();
        $feedlot->cattle_id = 2;
        $feedlot->lot_id = 3;
        $feedlot->weight = 344;
        $feedlot->date = Carbon::parse('2019-04-20');
        $feedlot->save();

        $feedlot = new Feedlot();
        $feedlot->cattle_id = 2;
        $feedlot->lot_id = 4;
        $feedlot->weight = 370;
        $feedlot->date = Carbon::parse('2019-04-30');
        $feedlot->save();

        $feedlot = new Feedlot();
        $feedlot->cattle_id = 2;
        $feedlot->lot_id = 4;
        $feedlot->weight = 375;
        $feedlot->date = Carbon::parse('2019-05-20');
        $feedlot->save();



        //*******************************************************
        $feedlot = new Feedlot();
        $feedlot->cattle_id = 3;
        $feedlot->lot_id = 1;
        $feedlot->weight = 258;
        $feedlot->date = Carbon::parse('2019-04-01');
        $feedlot->save();

        $feedlot = new Feedlot();
        $feedlot->cattle_id = 3;
        $feedlot->lot_id = 1;
        $feedlot->weight = 260;
        $feedlot->date = Carbon::parse('2019-04-10');
        $feedlot->save();

        $feedlot = new Feedlot();
        $feedlot->cattle_id = 3;
        $feedlot->lot_id = 2;
        $feedlot->weight = 270;
        $feedlot->date = Carbon::parse('2019-04-20');
        $feedlot->save();

        $feedlot = new Feedlot();
        $feedlot->cattle_id = 3;
        $feedlot->lot_id = 2;
        $feedlot->weight = 277;
        $feedlot->date = Carbon::parse('2019-04-30');
        $feedlot->save();

        $feedlot = new Feedlot();
        $feedlot->cattle_id = 3;
        $feedlot->lot_id = 3;
        $feedlot->weight = 285;
        $feedlot->date = Carbon::parse('2019-05-10');
        $feedlot->save();

        $feedlot = new Feedlot();
        $feedlot->cattle_id = 3;
        $feedlot->lot_id = 3;
        $feedlot->weight = 300;
        $feedlot->date = Carbon::parse('2019-05-20');
        $feedlot->save();

    }
}
