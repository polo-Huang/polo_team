<?php

use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('homes')->insert([
            'name' => 'Polo Atelier',
            'title' => '为创造而生',
            'introduce' => '专研牛批二十年',
            'about' => '关于我们',
            'address' => '新河街 402号, 马安堂社区 龙岗区, 深圳市',
            'phone' => '17620400928',
            'email' => 'polo_07@163.com',
            'status' => 'active'
        ]);
    }
}
