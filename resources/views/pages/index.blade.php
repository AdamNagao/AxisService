@extends('layouts.defaultWithSidebar')
@section('head')
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


@section('content')

<div class="container">
   <div class="row">
      <div class="col-xs-12">
         <div class="text-xs-center">
            <i class="fa fa-search-plus float-xs-left icon"></i>
            <h2>Invoice for purchase #{{$order->id}}</h2>
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
               <h3 class="text-xs-center"><strong>Quote Summary</strong></h3>
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

                        @foreach ($products as $product)
                        @php
                           $productPrice = $product->price;
                           $productPrice /= 100;
                        @endphp
                        <tr>
                           <td>{{ $product->name }}</td>
                           <td class="text-xs-center">${{$productPrice}}</td>
                           <td class="text-xs-center">1</td>
                           <td class="text-xs-right">${{$productPrice}}</td>
                        </tr>
                        @endforeach

                        @php
                           $runningSum /= 100;
                           $tax /=100;
                           $fee /=100;
                           $total /=100;

                        @endphp
                        <tr>
                           <td class="highrow"></td>
                           <td class="highrow"></td>
                           <td class="highrow text-xs-center"><strong>Subtotal</strong></td>
                           <td class="highrow text-xs-right">${{$runningSum}}</td>
                        </tr>

                        <tr>
                           <td class="emptyrow"></td>
                           <td class="emptyrow"></td>
                           <td class="emptyrow text-xs-center"><strong>Axis Fee (20%)</strong></td>
                           <td class="emptyrow text-xs-right">${{$fee}}</td>
                        </tr>
                        <tr>
                           <td class="emptyrow"></td>
                           <td class="emptyrow"></td>
                           <td class="emptyrow text-xs-center"><strong>Tax (10%)</strong></td>
                           <td class="emptyrow text-xs-right">${{$tax}}</td>
                        </tr>
                        <tr>
                           <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                           <td class="emptyrow"></td>
                           <td class="emptyrow text-xs-center"><strong>Total</strong></td>
                           <td class="emptyrow text-xs-right">Total: ${{$total}}</td>
                        </tr>
                     </tbody>
                  </table>

                  @php
                     $total *= 100;
                  @endphp

                  @if($order->active == 3)

                     <a href='../../selectPro/{{$proId}}/{{$order->id}}' type='button' class='btn btn-primary'>Select this Pro</a>

                  @elseif($order->active == 4)

                
                     <div class="custom-control custom-radio">
                        <input type="radio" name="radio" id="customRadio1" onclick="selector(document.getElementById(number).value);" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio1">Pay Custom Amount</label>
                        <input id="number" type="number" onChange= selector(this.value);>
                     </div>

                     <div class="custom-control custom-radio">
                        <input type="radio" name="radio" id="customRadio2" onclick="selector({{$total}});" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio2">Pay Remaining</label>
                     </div>

                     <form id="myForm" action='../../pay/{{$product->id}}/{{$order->id}}' method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" id="amount" name="amount"/>
                        <input type="hidden" id="stripeToken" name="stripeToken"/>
                        <input type="hidden" id="stripeEmail" name="stripeEmail"/>
                        <p>
                           <script src="https://checkout.stripe.com/checkout.js"></script>

                           <button id="customButton" class="btn-primary">Purchase</button>

                           <script>
                              function getCookie(cname) {
                                 var name = cname + "=";
                                 var decodedCookie = decodeURIComponent(document.cookie);
                                 var ca = decodedCookie.split(';');
                                 for(var i = 0; i <ca.length; i++) {
                                    var c = ca[i];
                                    while (c.charAt(0) == ' ') {
                                       c = c.substring(1);
                                    }
                                    if (c.indexOf(name) == 0) {
                                       return c.substring(name.length, c.length);
                                    }
                                 }
                                 return "";
                              }
                              function setCookie(cname, cvalue) {
                                 document.cookie = cname + "=" + cvalue + ";";
                              }
                              var handler = StripeCheckout.configure({
                                 key: "{{ env('STRIPE_KEY') }}",
                                 image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
                                 locale: 'auto',
                                 token: function(token) {
                                    // You can access the token ID with `token.id`.
                                    // Get the token ID to your server-side code for use.
                                    $("#stripeToken").val(token.id);
                                    $("#stripeEmail").val(token.email);
                                    $("#amount").val(getCookie('value'));
                                    $("#myForm").submit();
                                 }
                              });

                              document.getElementById('customButton').addEventListener('click', function(e) {

                                 var amt = parseInt(getCookie('value'));

                                 // Open Checkout with further options:
                                 handler.open({
                                 name: 'Demo Site',
                                 description: '2 widgets',
                                 amount: amt
                                 });
                                 e.preventDefault();
                              });

                              // Close Checkout on page navigation:
                              window.addEventListener('popstate', function() {
                                 handler.close();
                              });
                           </script>
                        </p>
                     </form>

                  @endif

                  
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection

@section('foot')
<script type="text/javascript">
   
   function selector(input) {
      if (document.getElementById("customRadio1").checked) {
         if(input){
            input *=100;
            setCookie("value", input);
         }
      
      } else if(document.getElementById("customRadio2").checked) {
         setCookie("value", input);
    
      }  
      console.log("Value of " + input);
   }

   function setCookie(cname, cvalue) {

      document.cookie.split(";").forEach(function(c) { document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;" + ";path=/"); });

      document.cookie = cname + "=" + cvalue + ";path=/";
   }
</script>
@endsection