<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  let's clear the users table first
        User::truncate();

        $faker = \Faker\Factory::create();

        //  let's make sure everyone has the same password 
        //  and let's hash it before the loop, or else our seeder
        //  will be too slow.
        $password = Hash::make('Logg5843');
        // $id = '1234';
        $facebook_id = '1234';
        $first_time = '1';
        $transaction_quantity = '0';
        $invite_code = '1234';
        $location_id = '1';
        $contact_number = '010-1234567';
        $gender_id = '1';


        User::create([
        	'name' => 'weilogg',
        	'email' => 'weilogg@gmail.com',
        	'password' => $password,
        	// 'id' => $id,
        	'facebook_id' => $facebook_id,
        	'first_time' => $first_time,
        	'transaction_quantity' => $transaction_quantity,
        	'invite_code' => $invite_code,
        	'location_id' => $location_id,
        	'contact_number' => $contact_number,
        	'gender_id' => $gender_id,

        ]);

        //  and now let's generate a few dozen users for our app:
        for($i=0 ; $i<10 ; $i++)
        {
        	User::create([
        		'name' => $faker->name,
        		'email' => $faker->email,
        		'password' => $password,
	        	// 'id' => $id+$i+1,
	        	'facebook_id' => $facebook_id,
	        	'first_time' => $first_time,
	        	'transaction_quantity' => $transaction_quantity,
	        	'invite_code' => $invite_code+$i+1,
	        	'location_id' => '2',
	        	'contact_number' => $contact_number,
	        	'gender_id' => $gender_id,
        	]);
        }
    }
}
