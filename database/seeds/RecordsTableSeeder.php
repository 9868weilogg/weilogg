<?php

use Illuminate\Database\Seeder;
use App\gateready\Record;

class RecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        //  let's clear the users table first
        Record::truncate();

        $faker = \Faker\Factory::create();

        //  let's make sure everyone has the same password 
        //  and let's hash it before the loop, or else our seeder
        //  will be too slow.
        $reference_number = '12345';
        $gateready_user_id = '1234';
        $tracking_number = '1234TN';
        $courier_id = '1';
        $package_id = '1';
        $schedule_date = '2018-09-13';
        $time_range_id = '1';
        $status_id = '2';
        $message = 'nil';


        Record::create([
        	
        	'reference_number' => $reference_number,
        	'gateready_user_id' => $gateready_user_id,
        	'tracking_number' => $tracking_number,
        	'courier_id' => $courier_id,
        	'package_id' => $package_id,
        	'schedule_date' => $schedule_date,
        	'time_range_id' => $time_range_id,
        	'status_id' => $status_id,
        	'message' => $message,

        ]);

        //  and now let's generate a few dozen users for our app:
        for($i=0 ; $i<10 ; $i++)
        {
        	Record::create([
        		'reference_number' => $reference_number+$i+1,
	        	'gateready_user_id' => $gateready_user_id+$i+1,
	        	'tracking_number' => $tracking_number,
	        	'courier_id' => $courier_id,
	        	'package_id' => $package_id,
	        	'schedule_date' => $schedule_date,
	        	'time_range_id' => $time_range_id,
	        	'status_id' => $status_id,
	        	'message' => $message,
        	]);
        }
    }
}
