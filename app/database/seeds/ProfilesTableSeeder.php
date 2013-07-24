<?php

class ProfilesTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	// DB::table('profiles')->delete();

        $profiles = array(
        	['name' => 'joe', 'mobile' => '92038', 'email' => 'joe@usa.com', 'college' => 'Harvard', 'password' => 'joe', 'new_pass' => 'joe1', 'confirm_pass' => 'joe1'];
        );

        // Uncomment the below to run the seeder
        DB::table('profiles')->insert($profiles);
    }

}