<?php

use App\Models\Vaccine;
use Illuminate\Database\Seeder;

class VaccineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vaccine = new Vaccine();
        $vaccine->name = 'Endemicas';
        $vaccine->save();

        $vaccine = new Vaccine();
        $vaccine->name = 'Clostridial';
        $vaccine->save();

        $vaccine = new Vaccine();
        $vaccine->name = 'Brucelosis';
        $vaccine->save();

        $vaccine = new Vaccine();
        $vaccine->name = 'Aftosa 2019';
        $vaccine->save();

        $vaccine = new Vaccine();
        $vaccine->name = 'Aftosa 2018';
        $vaccine->save();

        $vaccine = new Vaccine();
        $vaccine->name = 'Aftosa 2017';
        $vaccine->save();

        $vaccine = new Vaccine();
        $vaccine->name = 'Aftosa 2016';
        $vaccine->save();
    }
}
