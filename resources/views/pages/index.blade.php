@extends('layouts.default')
@section('content')

<div class="container">
   <div class="row">
      <div class="col-xs-12">
         <div class="text-xs-center">
            <i class="fa fa-search-plus float-xs-left icon"></i>
            <h2>Invoice for purchase #33221</h2>
         </div>
         <hr>
         <div class="row">
            <div class="col-xs-12 col-md-3 col-lg-3 float-xs-left">
               
            </div>
            <div class="col-xs-12 col-md-3 col-lg-3">
               
            </div>
            <div class="col-xs-12 col-md-3 col-lg-3">
              
            </div>
            <div class="col-xs-12 col-md-3 col-lg-3 float-xs-right">
             
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12">
         <div class="card ">
            <div class="card-header">
               <h3 class="text-xs-center"><strong>Quote summary</strong></h3>
            </div>
            <div class="card-block">
               <div class="table-responsive">
                  <table class="table table-sm">
                     <thead>
                        <tr>
                           <td><strong>Item Name</strong></td>
                           <td class="text-xs-center"><strong>Item Price</strong></td>
                           <td class="text-xs-center"><strong>Item Quantity</strong></td>
                           <td class="text-xs-right"><strong>Total</strong></td>
                        </tr>
                     </thead>
                     <tbody>
                        @php
                        $runningSum = 0;
                        @endphp
                        @foreach ($products as $product)
                        @php
                        $productPrice = 0;
                        @endphp  
                        @php
                        $productPrice = ($product->price / 100);
                        $runningSum += $productPrice;
                        @endphp
                        <tr>
                           <td>{{ $product->name }}</td>
                           <td class="text-xs-center">${{ $productPrice }}</td>
                           <td class="text-xs-center">1</td>
                           <td class="text-xs-right">${{ $productPrice}}</td>
                        </tr>
                        @endforeach
                        <tr>
                           <td class="highrow"></td>
                           <td class="highrow"></td>
                           <td class="highrow text-xs-center"><strong>Subtotal</strong></td>
                           <td class="highrow text-xs-right">${{$runningSum}}</td>
                        </tr>
                        <tr>
                           <td class="emptyrow"></td>
                           <td class="emptyrow"></td>
                           <td class="emptyrow text-xs-center"><strong>Tax</strong></td>
                           <td class="emptyrow text-xs-right">$0</td>
                        </tr>
                        <tr>
                           <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                           <td class="emptyrow"></td>
                           <td class="emptyrow text-xs-center"><strong>Total</strong></td>
                           <td class="emptyrow text-xs-right">Total: ${{$runningSum}}</td>
                        </tr>
                     </tbody>
                  </table>

                  
                  <form action="{{ route('pay', $product->id) }}" method="POST">
                     {{ csrf_field() }}
                     @php
                      $runningSum *= 100;
                     @endphp
                     <p>
                        <script
                           src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                           data-key="{{ env('STRIPE_KEY') }}"
                           data-amount="{{$runningSum}}"
                           data-name="Stripe.com"
                           data-description="Widget"
                           data-locale="auto"
                           data-currency="usd"></script>
                     </p>
                  </form>

                  
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<style>
   .height {
   min-height: 200px;
   }
   .icon {
   font-size: 47px;
   color: #5CB85C;
   }
   .iconbig {
   font-size: 77px;
   color: #5CB85C;
   }
   .table > tbody > tr > .emptyrow {
   border-top: none;
   }
   .table > thead > tr > .emptyrow {
   border-bottom: none;
   }
   .table > tbody > tr > .highrow {
   border-top: 3px solid;
   }
</style>
@endsection