<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Review;
use App\User;

class ReviewsController extends Controller
{
    public function index(){

        if(Auth::check()){

            $currentuserid = Auth::user()->id;

    	    $reviews = Review::where('userId',$currentuserid)->get();

            return view('pages.home',compact('reviews'));
        }
    }

    public function indexProfile($Id){

        if(Auth::check()){

            $reviews = Review::where('userId',$Id)->get(); //get the user's reviews

            $user = \DB::table('users')->where('id', $Id)->first(); //get the user's information to populate the profile page

            return view('pages.profile',compact('reviews','user'));
        }
    }
    
    public function create($Id){

        /*
        *
        *   This function is unused in the project
        *   This was initially for a seperate create review page
        *
        */
    	if(Auth::check()){

            $user = \DB::table('users')->where('id', $Id)->first(); //get the user's information to populate the review page

            return view('pages.createReview',compact('user'));
        }
    }

    public function store(Request $request,$Id){

        if(Auth::check()){

            $data=$request->all();

            $currentuserid = Auth::user()->id;

            $rating = 0;
            $num = 0;
            $newRating = 0;

            $reviewer = \DB::table('users')->where('id', $currentuserid)->first(); //get the user doing the reviewing's information  

            $user=User::where('id',$Id)->first();
            
            $rating = $request->input('rating-input-1'); //get the rating from the star selector

            //need to calculate the updated review information for $user
            $num = $user->numOfRating + 1;

            $newRating = (($user->rating * $user->numOfRating) + $rating) / $num;

            $user->update(array_merge(['rating' => $newRating,'numOfRating'=>$num])); //update the rating and number of ratings of the user


            Review::create(array_merge($request->all(), ['rating'=>$rating,'userId'=>$Id,'userFirst'=>$user->first,'userLast'=>$user->last,
                'reviewerId'=>$reviewer->id,'reviewerFirst' => $reviewer->first,'reviewerLast'=>$reviewer->last])); 

            return redirect('home');  

        }
    }
}
