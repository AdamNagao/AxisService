<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'first' => 'User',
            'last' =>'Smith',
            'rating'=> '4',
            'numOfRating'=>'1',
            'address'=>'1234 Main Street',
            'City' => 'Alhambra',
            'state'=>'California',
            'phonenumber'=>'8187307434',
            'role' => '0',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'first' => 'Adam',
            'last' =>'Nagao',
            'rating'=>'0',
            'numOfRating'=>'0',
            'address'=>'3421 Awesome Street',
            'City' => 'Glendale',
            'state'=>'California',
            'phonenumber'=>'3235607784',
            'role' => '1',
            'licenseNum' => '676752',
            'insuranceNum' => '9878987',
            'liabilityNum' => '787667',
            'email' => 'nagaoadam223@gmail.com',
            'password' => bcrypt('password'),
        ]);

        DB::table('users')->insert([
            'first' => 'Admin',
            'last' =>'Jones',
            'rating'=>'5',
            'numOfRating'=>'1',
            'address'=>'5212 Broadway Street',
            'City' => 'Burbank',
            'state'=>'California',
            'phonenumber'=>'626235624',
            'role' => '2',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
