<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
            	'name' => 'Акции и скидки',
            	'description' => 'Торговый комплекс «Плаза» дарит Вам скидки на покупки!'
            ],
            [
            	'name' => 'Новости и события',
            	'description' => 'Только актуальные новости нашего торгового комплекса...'
            ],
        ]);

        DB::table('floors')->insert([
            ['name' => '1й этаж'],
            ['name' => '2й этаж'],
            ['name' => '3й этаж'],
            ['name' => 'Цокольный этаж'],
        ]);

        DB::table('shops')->insert([
            ['name' => 'Плаза 3'],
            ['name' => 'Плаза 4'],
        ]);

        // $this->call(UsersTableSeeder::class);
    }
}
