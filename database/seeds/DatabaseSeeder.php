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
          'name' => "Expedit Direct LLC",
          'owner_id' => 1,
          'phone' => '(706) 870-5200',
          'address1' => '364 Boiling Springs Drive',
          'address2' => 'Lexington, KY 40511',
          'contact_name' => 'Olivia Davis',
          'contact_email' => 'Expeditdirect@gmail.com',
          'contact_phone' => '(706) 870-5200',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);

        DB::table('companies')->insert([
          'name' => "DirectSell.com",
          'owner_id' => 1,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);

        DB::table('companies')->insert([
          'name' => "My Freight Company",
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

        DB::table('trucks')->insert([
          'company_id' => 1,
          'name' => "Expedit 1",
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);

        DB::table('trucks')->insert([
          'company_id' => 1,
          'name' => "Expedit 2",
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);

        DB::table('customers')->insert([
          'company_id' => 1,
          'name' => "J.B. Hunt Transport, Inc.", 
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);

        DB::table('customers')->insert([
          'company_id' => 1,
          'name' => "XPO Logistics",
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);

        DB::table('customers')->insert([
          'company_id' => 3,
          'name' => "J.D. Smith Transport, Inc.",
          'phone' => "(859) 888-7170",
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);

        DB::table('customers')->insert([
          'company_id' => 3,
          'address1' => '123 Rose St',
          'address2' => '45454 New York, NY',
          'name' => "C.H. Robinsons",
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);

        DB::table('loads')->insert([
          'company_id' => 1,
          'customer_id' => 1,
          'internal_number' => '602513',
          'external_number' => "MM24175",
          'pickup_address1' => '555 Driveway Lane',
          'pickup_address2' => 'Moncks Corner, SC, 99192',
          'dropoff_address1' => '123 Laneway Drive',
          'dropoff_address2' => 'Rabun Gap, GA, 15120',
          'rate' => 140000,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);

        DB::table('loads')->insert([
          'company_id' => 1,
          'customer_id' => 2,
          'internal_number' => '602532',
          'external_number' => "6544275",
          'pickup_address1' => '555 Driveway Lane',
          'pickup_address2' => 'Mountain Top, PA, 15113',
          'dropoff_address1' => '123 Laneway Drive',
          'dropoff_address2' => 'Uxbridge, MA, 88663',
          'rate' => 175000,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);

        DB::table('loads')->insert([
          'company_id' => 3,
          'customer_id' => 3,
          'internal_number' => '602513',
          'external_number' => "MM24175",
          'pickup_address1' => '1500 Trent Blvd',
          'pickup_address2' => 'Lexington, KY, 40515',
          'dropoff_address1' => '1600 Pennsylvania Avenue',
          'dropoff_address2' => 'Washington, DC, 20500',
          'rate' => 220000,
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);
    }
}
