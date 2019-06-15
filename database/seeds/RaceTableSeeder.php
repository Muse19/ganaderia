<?php

use App\Models\Race;
use Illuminate\Database\Seeder;

class RaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $race = new Race();
        $race->name = 'Hereford';
        $race->save();

        $race = new Race();
        $race->name = 'Aberdeen Angus';
        $race->save();

        $race = new Race();
        $race->name = 'Limousin';
        $race->save();

        $race = new Race();
        $race->name = 'Charolais';
        $race->save();

        $race = new Race();
        $race->name = 'Holando';
        $race->save();

        $race = new Race();
        $race->name = 'Jersey';
        $race->save();
    }
}
