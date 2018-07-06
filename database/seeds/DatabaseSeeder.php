<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
        	'name' => str_random(10),
       		'email' => str_random(10).'@gmail.com',
       		'password' => bcrypt('secret'),
       		'created_at' => Carbon::now(),
       		'updated_at' => Carbon::now()
       	]);


        DB::table('companies')->insert([
          'name' => "Expedit Direct",
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);

        DB::table('companies')->insert([
          'name' => "Truckin.com",
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);

        DB::table('companies')->insert([
          'name' => "Haulers",
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);
    }
}
