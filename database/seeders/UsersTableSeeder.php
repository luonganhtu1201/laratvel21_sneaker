<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate(); //Xóa toàn bộ data test
        for($i = 0; $i<5;$i++){
            DB::table('users')->insert([
                'name' => 'Admin '.$i,
                'email' => 'admin'.$i.'@gmail.com',
                'password' => bcrypt('12333')
            ]);
        }
        DB::table('users_info')->truncate(); //Xóa toàn bộ data test
        for($i = 0; $i<5;$i++){
            DB::table('users_info')->insert([
                'address' => 'Ha Noi',
                'phone' => '1224104',
                'avatar' => 'https://cdn3.vectorstock.com/i/1000x1000/30/97/flat-business-man-user-profile-avatar-icon-vector-4333097.jpg',
                'gender' => 0,
                'user_id' => $i
            ]);
        }
        DB::table('images')->truncate(); //Xóa toàn bộ data test
        for($i = 0; $i<5;$i++){
            DB::table('images')->insert([
                'name' => 'San Pham',
                'path' => 'https://salt.tikicdn.com/cache/w444/ts/product/e4/be/7b/e3171402652708086f1b4791a8c832cf.jpg',
                'product_id' => $i
            ]);
        }
    }
}
