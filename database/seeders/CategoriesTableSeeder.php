<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

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
        $categories = [
            'Nike','Adidas','Converse','Vans','Balenciaga','Bitis'
        ];
        DB::table('categories')->truncate();
        foreach($categories as $category){
            DB::table('categories')->insert([
                'name' => $category,
                'slug' => Str::slug($category)
            ]);
        }
        
    }
}
