<?php

use App\Models\Dose;
use Illuminate\Database\Seeder;

class DoseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dose = new Dose();
        $dose->vaccine_id = 1;
        $dose->name = 'rabia';
        $dose->save();

        $dose = new Dose();
        $dose->vaccine_id = 1;
        $dose->name = 'carbunclo';
        $dose->save();

        $dose = new Dose();
        $dose->vaccine_id = 2;
        $dose->name = 'clostridial 1';
        $dose->save();

        $dose = new Dose();
        $dose->vaccine_id = 2;
        $dose->name = 'clostridial 2';
        $dose->save();

        $dose = new Dose();
        $dose->vaccine_id = 3;
        $dose->name = 'brucelosis';
        $dose->save();

        $dose = new Dose();
        $dose->vaccine_id = 4;
        $dose->name = 'uno';
        $dose->save();

        $dose = new Dose();
        $dose->vaccine_id = 4;
        $dose->name = 'dos';
        $dose->save();

        $dose = new Dose();
        $dose->vaccine_id = 4;
        $dose->name = 'tres';
        $dose->save();

        $dose = new Dose();
        $dose->vaccine_id = 5;
        $dose->name = 'uno';
        $dose->save();

        $dose = new Dose();
        $dose->vaccine_id = 5;
        $dose->name = 'dos';
        $dose->save();

        $dose = new Dose();
        $dose->vaccine_id = 5;
        $dose->name = 'tres';
        $dose->save();

        $dose = new Dose();
        $dose->vaccine_id = 6;
        $dose->name = 'uno';
        $dose->save();

        $dose = new Dose();
        $dose->vaccine_id = 6;
        $dose->name = 'dos';
        $dose->save();

        $dose = new Dose();
        $dose->vaccine_id = 6;
        $dose->name = 'tres';
        $dose->save();

        $dose = new Dose();
        $dose->vaccine_id = 7;
        $dose->name = 'uno';
        $dose->save();

        $dose = new Dose();
        $dose->vaccine_id = 7;
        $dose->name = 'dos';
        $dose->save();

        $dose = new Dose();
        $dose->vaccine_id = 7;
        $dose->name = 'tres';
        $dose->save();

       
    }
}
