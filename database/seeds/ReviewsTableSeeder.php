<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'userId' => "1",
            'userFirst'=>"User",
            'userLast'=>"Smith",
            'reviewerId' =>"2",
            'reviewerFirst'=>"Pro",
            'reviewerLast'=>"Bob",
            'rating' => "4",
            'tagline' => "Easy Payment!",
            'description' => "Easy to work with",

        ]);

        DB::table('reviews')->insert([
            'userId' => "2",
            'userFirst'=>"Pro",
            'userLast'=>"Bob",
            'reviewerId' => "3",
            'reviewerFirst'=>"Adam",
            'reviewerLast'=>"Nagao",
            'rating' => "3",
            'tagline' => "Quick Service, nice price!",
            'description' => "They put a new roof on my house",

        ]);

        DB::table('reviews')->insert([
            'userId' => "2",
            'userFirst'=>"Pro",
            'userLast'=>"Bob",
            'reviewerId' =>"1",
            'reviewerFirst'=>"User",
            'reviewerLast'=>"Smith",
            'rating' => "4",
            'tagline' => "Easy Payment!",
            'description' => "Easy to work with",

        ]);
        DB::table('reviews')->insert([
            'userId' => "4",    
            'userFirst'=>"Admin",
            'userLast'=>"Jones",
            'reviewerId'=>"1",
            'reviewerFirst'=>"User",
            'reviewerLast'=>"Smith",
            'rating' => "5",
            'tagline' => "Easy service",
            'description' => "Fixed my house",

        ]);
    }
}
