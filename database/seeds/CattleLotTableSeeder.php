<?php

use Carbon\Carbon;
use App\Models\CattleLot;
use Illuminate\Database\Seeder;

class CattleLotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $log = new CattleLot();
        $log->cattle_id = 1;
        $log->lot_id = 1;
        $log->start_date = Carbon::parse('2019-04-01');
        $log->end_date = Carbon::parse('2019-04-22');
        $log->save();

        $log = new CattleLot();
        $log->cattle_id = 1;
        $log->lot_id = 2;
        $log->start_date = Carbon::parse('2019-04-22');
        $log->end_date = Carbon::parse('2019-05-22');
        $log->save();

        //*****************************************************************/
        $log = new CattleLot();
        $log->cattle_id = 2;
        $log->lot_id = 3;
        $log->start_date = Carbon::parse('2019-04-01');
        $log->end_date = Carbon::parse('2019-04-25');
        $log->save();
 
        $log = new CattleLot();
        $log->cattle_id = 2;
        $log->lot_id = 4;
        $log->start_date = Carbon::parse('2019-04-25');
        $log->end_date = null;
        $log->save();


        //*****************************************************************/
        $log = new CattleLot();
        $log->cattle_id = 3;
        $log->lot_id = 1;
        $log->start_date = Carbon::parse('2019-04-01');
        $log->end_date = Carbon::parse('2019-04-12');
        $log->save();

        $log = new CattleLot();
        $log->cattle_id = 3;
        $log->lot_id = 2;
        $log->start_date = Carbon::parse('2019-04-12');
        $log->end_date = Carbon::parse('2019-05-01');
        $log->save();

        $log = new CattleLot();
        $log->cattle_id = 3;
        $log->lot_id = 3;
        $log->start_date = Carbon::parse('2019-05-01');
        $log->end_date = Carbon::parse('2019-05-22');
        $log->save();
    }
    
}
