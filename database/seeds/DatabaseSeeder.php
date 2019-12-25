<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            ['first_name' => 'Test', 'last_name' => 'Testovic', 'email' => 'test@test.com', 'password' => bcrypt('test1234')]
        );
        DB::table('managers')->insert(
            ['first_name' => 'Test', 'last_name' => 'Testovic', 'email' => 'test@test.com', 'image' => 'https://thebenclark.files.wordpress.com/2014/03/facebook-default-no-profile-pic.jpg', 'user_id' => 1]
        );

        DB::table('users')->insert(
            ['first_name' => 'Arsen', 'last_name' => 'Sekularac', 'email' => 'arsen@test.com', 'password' => bcrypt('test1234')]
        );
        DB::table('managers')->insert(
            ['first_name' => 'Arsen', 'last_name' => 'Sekularac', 'email' => 'arsen@test.com', 'image' => 'https://thebenclark.files.wordpress.com/2014/03/facebook-default-no-profile-pic.jpg', 'user_id' => 2]
        );

        DB::table('shops')->insert(
            ['name' => 'Emmi', 'logo' => 'https://poslovi.infostud.com/posao/logo/5a4f9aca112c4_emmilogo.jpg', 'manager_id' => 1, 'created_at' => Carbon::now()]
        );
        DB::table('managers')->where('id', 1)->update(['shop_id' => 1]);
        
        DB::table('shops')->insert(
            ['name' => 'WinWin', 'logo' => 'https://promenadanovisad.rs/wp-content/uploads/2018/10/WinWin-logo.jpg', 'created_at' => Carbon::now()]
        );
        DB::table('shops')->insert(
            ['name' => 'Gigatron', 'logo' => 'https://usceshoppingcenter.rs/wp-content/uploads/2017/03/gigatron-logo.jpg', 'created_at' => Carbon::now()]
        );
    }
}
