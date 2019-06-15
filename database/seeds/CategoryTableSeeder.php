<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'CUT';
        $category->save();

        $category = new Category();
        $category->name = 'vaca';
        $category->save();

        $category = new Category();
        $category->name = 'ternera';
        $category->save();

        $category = new Category();
        $category->name = 'Desmamante';
        $category->save();
    }
}
