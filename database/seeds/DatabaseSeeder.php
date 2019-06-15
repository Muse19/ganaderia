<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(LotTableSeeder::class);
        $this->call(RaceTableSeeder::class);
        $this->call(CattleTableSeeder::class);
        $this->call(FeedlotTableSeeder::class);
        $this->call(VaccineTableSeeder::class);
        $this->call(DoseTableSeeder::class);
        $this->call(PivotTableSeeder::class);
    }
}
