<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['HTML', 'CSS', 'PHP', 'JAVASCRIPT', 'PYTHON', 'RUBY'];
        foreach ($data as $value) {

            $new_cat = new Category();
            $new_cat->name = $value;
            $new_cat->slug = $value = Str::slug($value, '-');
            $new_cat->save();
        }
    }
}
