<?php

use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'id' => "1",
            'name' => 'AC Repair',
            'description' => 'Any repair or maintence required by an AC unit',
        ]);
    }
}
