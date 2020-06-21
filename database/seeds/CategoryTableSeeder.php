<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create([
            'name' => 'fashion',
            'slug' => 'fashion',
        ]);
        $category = Category::create([
            'name' => 'health',
            'slug' => 'health',
        ]);
        $category = Category::create([
            'name' => 'communication',
            'slug' => 'communication',
        ]);
        $category = Category::create([
            'name' => 'sports',
            'slug' => 'sports',
        ]);
    }
}
