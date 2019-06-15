<?php

use Carbon\Carbon;
use App\Models\Cattle;
use Illuminate\Database\Seeder;

class CattleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gender = Array('M', 'H');
        
        $cattle = new Cattle();
        $cattle->number = 77777;
        $cattle->gender = array_random($gender);
        $cattle->birth_date = Carbon::parse('2018-09-18');
        $cattle->weight = 120;
        $cattle->lot_id = rand(1,4);
        $cattle->category_id = rand(1,4);
        $cattle->race_id = rand(1,6);
        $cattle->save();

        $cattle = new Cattle();
        $cattle->number = 80303;
        $cattle->gender = array_random($gender);
        $cattle->birth_date = Carbon::parse('2018-01-30');
        $cattle->weight = 300;
        $cattle->lot_id = rand(1,4);
        $cattle->category_id = rand(1,4);
        $cattle->race_id = rand(1,6);
        $cattle->save();

        $cattle = new Cattle();
        $cattle->number = 81733;
        $cattle->gender = array_random($gender);
        $cattle->birth_date = Carbon::parse('2018-04-19');
        $cattle->weight = 250;
        $cattle->lot_id = rand(1,4);
        $cattle->category_id = rand(1,4);
        $cattle->race_id = rand(1,6);
        $cattle->save();

        $cattle = new Cattle();
        $cattle->number = 83547;
        $cattle->gender = array_random($gender);
        $cattle->birth_date = Carbon::parse('2018-12-19');
        $cattle->weight = 170;
        $cattle->lot_id = rand(1,4);
        $cattle->category_id = rand(1,4);
        $cattle->race_id = rand(1,6);
        $cattle->save();

        $cattle = new Cattle();
        $cattle->number = 90121;
        $cattle->gender = array_random($gender);
        $cattle->birth_date = Carbon::parse('2018-11-08');
        $cattle->weight = 310;
        $cattle->lot_id = rand(1,4);
        $cattle->category_id = rand(1,4);
        $cattle->race_id = rand(1,6);
        $cattle->save();
    }
}
