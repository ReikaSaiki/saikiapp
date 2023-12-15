<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
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
            'user_id'=>'1',
            'name'=>'イベント１',
            'date'=>'2024/01/09',
            'contents'=>'早押しクイズ',
            'type_flg'=>'1',
            'capacity'=>'100',
            'fee'=>'500',
            'link'=>'event1.com',
            'del_flg'=>'1',
            ],
            [
                'user_id'=>'2',
                'name'=>'イベント2',
                'date'=>'2024/01/15',
                'contents'=>'画像クイズ',
                'type_flg'=>'0',
                'capacity'=>'10',
                'fee'=>'1000',
                'link'=>'event2.com',
                'del_flg'=>'1',
            ],
        ]  ;

    foreach($params as $param){
        DB::table('events')->insert($param);
    };
    
    }
}
