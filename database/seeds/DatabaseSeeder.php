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
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
        	'name' => 'Dimitri',
       		'email' => 'admin@example.com',
       		'password' => bcrypt('password'),
       		'created_at' => Carbon::now(),
       		'updated_at' => Carbon::now()
       	]);

        DB::table('users')->insert([
          'name' => 'John',
          'email' => 'admin2@example.com',
          'password' => bcrypt('password'),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
          'name' => 'Jane',
          'email' => 'admin3@example.com',
          'password' => bcrypt('password'),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);


        DB::table('companies')->insert([
          'name' => "Expedit Direct",
          'owner_id' => 1,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);

        DB::table('companies')->insert([
          'name' => "Truckin.com",
          'owner_id' => 1,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);

        DB::table('companies')->insert([
          'name' => "Haulers",
          'owner_id' => 1,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);

        DB::table('companies')->insert([
          'name' => "Johns Co",
          'owner_id' => 2,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);

        DB::table('company_user')->insert([
          'company_id' => 1,
          'user_id' => 1,
          'is_admin' => 0
        ]);

        DB::table('company_user')->insert([
          'company_id' => 2,
          'user_id' => 1,
          'is_admin' => 0
        ]);

        DB::table('company_user')->insert([
          'company_id' => 3,
          'user_id' => 1,
          'is_admin' => 0
        ]);

        DB::table('company_user')->insert([
          'company_id' => 4,
          'user_id' => 2,
          'is_admin' => 0
        ]);
    }
}
