<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
            'name'=>'テスト1',
            'email'=>'test1@test.com',
            'email_verified_at'=>Carbon::now(),
            'password'=>'test1',
            'roll'=>'0',
            ],
            [
            'name'=>'テスト2',
            'email'=>'test2@test.com',
            'email_verified_at'=>Carbon::now(),
            'password'=>'test2',
            'roll'=>'1',
            ],
            [
            'name'=>'テスト3',
            'email'=>'test3@test.com',
            'email_verified_at'=>Carbon::now(),
            'password'=>'test3',
            'roll'=>'2',
            ],
        ]  ;

    foreach($params as $param){
        DB::table('users')->insert($param);
    };
}
}