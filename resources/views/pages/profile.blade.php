@extends('layouts.defaultWithSidebar')
@section('head')

<style type="text/css"> 
   //This is to fix the top margin on the profile page which for some reason is different from the others
   .rating {
   overflow: hidden;
   display: inline-block;
   }
   .rating-input {
   float: right;
   width: 16px;
   height: 16px;
   padding: 0;
   margin: 0 0 0 -16px;
   opacity: 0;
   }
   .rating-star {
   position: relative;
   float: right;
   display: block;
   width: 24px;
   height: 24px;
   background: url('../img/empty_star.png') 0 0px;
   }
   .rating:hover .rating-star:hover,
   .rating:hover .rating-star:hover ~ .rating-star,
   .rating-input:checked ~ .rating-star {
   background: url('../img/star.png') 0 0px;
   }
</style>
@endsection
@section('content')
<div class="container" >
   <div class="row my-2">
      <div class="col-lg-8 order-lg-2">
         <div class="tab-content py-4">
            <div class="tab-pane active" id="profile">
               <h2 class="mb-3">{{{$user->first}}},{{{$user->last}}} Profile</h2>
               <div class="row">
                  <div class="col-md-6">
                     <h6>About</h6>
                     <p>
                        {{{$user->address}}},{{{$user->city}}},{{{$user->state}}}
                     </p>
                     <p>
                        {{{$user->phonenumber}}},{{{$user->email}}}
                     </p>
                     <h6>Rating</h6>
                     <p>{{{$user->rating}}} stars with {{{$user->numOfRating}}} reviews</p>
                  </div>
                  <div class="col-md-6">
                     <p>Contact</p>
                     <a href="#" class="btn">Website</a>
                     <a href="#" class="btn">Email</a>
                  </div>
                  <div class="col-md-12">
                     <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Review's</h5>
                     <table class="table table-sm table-hover table-striped">
                        <tbody>
                           @foreach($reviews as $review)
                           <tr>
                              <td>
                                 <h4>{{ $review->reviewerFirst}} , {{$review->reviewerLast}}</h4>
                                 <strong>{{$review->tagline}}</strong>  
                                 <p>Description: {{$review->description}}</p>
                                 <p>Rating: {{$review->rating}}</p>
                              </td>
                           </tr>
                           @endforeach                                  
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-4 order-lg-1 text-center">
         <div class="row">
            @if(Auth::id() != $user->id)
            <h3>Leave a Review for {{$user->first}},{{$user->last}}</h3>
            <form action='../completeReview/{{$user->id}}' method="POST">
               {{csrf_field()}}
               <div class="form-group">
                  <label for="tagline">Tagline</label>
                  <input type="text" name="tagline">
                  <br><br\>
                  <label for="description">Service Description</label>
                  <input type="text" name="description">
                  <br><br\> 
                  <span class="rating">
                  <input type="radio" class="rating-input" id="rating-input-1-5" name="rating-input-1" value="5">
                  <label for="rating-input-1-5" class="rating-star"></label>
                  <input type="radio" class="rating-input" id="rating-input-1-4" name="rating-input-1" value="4">
                  <label for="rating-input-1-4" class="rating-star"></label>
                  <input type="radio" class="rating-input" id="rating-input-1-3" name="rating-input-1" value="3">
                  <label for="rating-input-1-3" class="rating-star"></label>
                  <input type="radio" class="rating-input" id="rating-input-1-2" name="rating-input-1" value="2">
                  <label for="rating-input-1-2" class="rating-star"></label>
                  <input type="radio" class="rating-input" id="rating-input-1-1" name="rating-input-1" value="1">
                  <label for="rating-input-1-1" class="rating-star"></label>
                  </span>
               </div>
               <input class="btn btn-primary" type="submit" value="Submit">
               </input>
            </form>
         </div>
         @endif
      </div>
   </div>
</div>
@endsection
