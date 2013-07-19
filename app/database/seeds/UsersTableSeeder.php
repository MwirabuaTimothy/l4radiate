<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	// DB::table('users')->delete();

        $users = array(
        	['firstname' => 'lee', 'lastname' => 'Ibrah', 'email' => 'lee@trascope.com', 'password' => Hash::make('lee'), 'password_confirmation' => Hash::make('lee'), 'terms' => 0, 'school' => 'Harvard School', 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
        	['firstname' => 'timo', 'lastname' => 'Yimod', 'email' => 'timo@gmail.com', 'password' => Hash::make('timo'), 'password_confirmation' => Hash::make('timo'), 'terms' => 1, 'school' => 'MIT School', 'created_at' => new DateTime(), 'updated_at' => new DateTime()]
        
        );

        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }

}