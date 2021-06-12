<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
        for($i = 0; $i<20;$i++){
            DB::table('products')->insert([
                'name' => 'Iphone 13 Pro '.$i,
                'slug' => 'i-phone-13-'.$i,
                'origin_price' => '2'.$i.'000000',
                'sale_price' => '21'.$i.'00000',
                'size'=>37,
                'color'=>'Đỏ',
                'import_goods'=>12,
                'user_id'=>'1',
                'category_id'=>1
            ]);
        }
        
    }
}
