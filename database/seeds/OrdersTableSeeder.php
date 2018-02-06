<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'id' => "1",
            'userId'=>"1",
            'first' => 'John',
            'last' => 'Doe',
            'description' => 'Help my AC is not turning on!!!',
            'address' => '1234 Main Street',
            'city' => 'Northridge',
            'state' => 'CA',
            'phonenumber'=> '8187307533',
        ]);
        DB::table('orders')->insert([
            'id' => "2",
            'userId'=>"2",  
            'first' => 'Bob',
            'last' => 'Smith',
            'description' => 'My House needs new roofing',
            'address' => '2452 Beacon Street',
            'city' => 'Glendale',
            'state' => 'CA',
            'phonenumber'=> '818542894',
        ]);
        DB::table('orders')->insert([
            'id' => "3",
            'userId'=>"3",
            'first' => 'Jill',
            'last' => 'Bill',
            'description' => 'I need a new shower!',
            'address' => '1692 Hunginton Street',
            'city' => 'Pasadena',
            'state' => 'CA',
            'phonenumber'=> '8182238455',
        ]);
    }
}
