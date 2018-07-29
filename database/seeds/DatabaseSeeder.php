<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('secret'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('menus')->insert([
            'name' => 'Pan-Asian cuisine',
            'enabledFrom' => Carbon::now()->toDateString() . ' 12:00:00',
            'enabledUntil' => Carbon::now()->toDateString() . ' 16:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('menus')->insert([
            'name' => 'Buryat cuisine',
            'enabledFrom' => Carbon::now()->toDateString() . ' 16:00:00',
            'enabledUntil' => Carbon::now()->toDateString() . ' 20:00:00',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('products')->insert([
            'name' => 'Quesadilla',
            'menu_id' => 1,
            'position' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('products')->insert([
            'name' => 'Ramen',
            'menu_id' => 1,
            'position' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('products')->insert([
            'name' => 'Tom-Yam',
            'menu_id' => 1,
            'position' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('products')->insert([
            'name' => 'Bouza\'s',
            'menu_id' => 2,
            'position' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('products')->insert([
            'name' => 'Tea',
            'menu_id' => 2,
            'position' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
