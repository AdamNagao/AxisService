<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Http\Requests;
use App\Product;
use Cookie;
use App\Notifications\CustomerSignedUp;
use App\User;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $currentuserid = Auth::user()->id;
            if(Auth::user()->role==0){
                //normal user sees only their orders
                $orders = Order::where('userId',$currentuserid)->get();
                return view('pages.orders',compact('orders'));   
                
            } else if(Auth::user()->role==1) {
                //pro user only sees their orders they accepted

                //need to check the proId string to see if it contains the current pros Id
                $orders = Order::where('proId', 'like', '%'.$currentuserid.'%')->get();
                return view('pages.orders',compact('orders'));

            } else {
                //admin user sees all orders
                $orders = Order::all();
                return view('pages.orders',compact('orders'));
            }
        }
        
    }

    public function viewJobs()
    {
        if(Auth::check()){
            if(Auth::user()->role==1) {
                //pro user is checking available jobs
                $orders = Order::where('active','!=','0')->get();
                return view('pages.viewJobs',compact('orders'));

            } 
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        //a user has created an order
        if (Auth::check()) {
            // The user is logged in...
            $id=Auth::id();
            Order::create(array_merge($request->all(), ['userId' => $id]));

            $user = User::where('id',$id)->first();
            $email = $user->email;
            $first = $request->first;
            $last = $request->last;
            $description = $request->description;
            $address = $request->address;
            $city = $request->city;
            $state = $request->state;
            $phoneNumber = $request->phonenumber;

            // The message
            $message = "A new order has been created!\r\n" . "Name: " . $first . ", " . $last . 
            "\r\n" . "Description: " . $description . "\r\n" . "Address: " . $address . "\r\n" . "City: " . $city . "\r\n" . "State: " . $state. "\r\n" . "Phone Number: " . $phoneNumber. "\r\n" . "Email: " . $email;

            $proList = User::where('role','1')->get();

            // In case any of our lines are larger than 70 characters, we should use wordwrap()
            $message = wordwrap($message, 70, "\r\n");

            ini_set("SMTP", "aspmx.l.google.com");
            ini_set("sendmail_from", "axishomeimprovements@gmail.com");

            foreach ($proList as $pro) {
            
                mail($pro->email, 'Axis Service: A new order has been created', $message);
            }

            return redirect("/orders");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order= Restaurant::where('id',$id)->first();

        return view('pages.edit')->with('order',$order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //pro user has accepted a job
        $proId=Auth::id();

        $order=Order::where('id',$id)->first();

        if(!empty($order->proId)){  //create a running list of the pro's who have signed up
            $proIdList = $order->proId . "," . $proId;
        } else {
            $proIdList = $proId;
        }

        if($order->active != 3) {
            $order->update(array_merge($request->all(), ['proId' => $proIdList,'active'=>2]));
        } else {
            //order has been quoted already
            $order->update(array_merge($request->all(), ['proId' => $proIdList]));
        }

        return redirect("/home");

    }

    /**
     * pro user has been choosen for the job
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function selectPro(Request $request,$proId,$orderId)
    {
        //pro user with $id has been chosen for the job!
        if (Auth::check()) {
            // The user is logged in...
            $order=Order::where('id',$orderId)->first(); //get the user's order

            $products = Product::where([['orderId', '=', $orderId],['proId', '=', $proId],])->get(); //get the products from the quote 

            $runningSum = 0;
            $tax = 0;
            $fee = 0;
            $total = 0;

            foreach($products as $product){
                $runningSum += $product->price;
            }

            $tax = 0.1 * $runningSum;
            $fee = 0.2 * $runningSum;
            $total = $tax + $fee + $runningSum;

            $order->update(array_merge($request->all(), ['active' => 4,'proId'=>$proId,'balance'=>$total]));  //4 denotes the job is has a pro selected and a pending balance
            return redirect()->back();
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function completeJob(Request $request, $id)
    {
        //pro user has marked a job complete
        $order=Order::where('id',$id)->first();

        $order->update(array_merge($request->all(), ['active' => 0]));

        return redirect()->back();

    }

    public function logout() {
        // logout and then redirect to the login page
        Auth::logout();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



/*

postPayWithStripe() – responsible for getting the parameters. We pass a product object and the stripeToken, which comes from the request. This token holds the credit information from the client.

chargeCustomer() – we need to make sure that the user is in the Stripe system. Thus, we check if the user is already a Stripe customer. If positive, we retrieve it. Otherwise, a function create a new customer. In the end, we will have created or retrieved a customer.

createStripeCharge() – we can pass values to create a charge using the Charge::create. An important detail is that the “customer” attribute is equal to the customer ID. This is not the user ID on our application, but the Stripe ID. Remember, when dealing the customers we are talking about Stripe.

createStripeCustomer() – creates a new Stripe Customer. We also set the stripe_id in our database as the customer ID. Note that we’re always referring to the user Auth::user().

isStripeCustomer() – to check if a user is a Stripe customer we only need to see if the stripe_id is not null. Remember that in the createStripeCustomer we set the stripe_id to the customer ID.

postStoreOrder() – finally, we create a new Order redirect the user to the index page.

*/
   /**
    * Make a Stripe payment.
    *
    * @param Illuminate\Http\Request $request
    * @param App\Product $product
    * @return chargeCustomer()
    */
    public function postPayWithStripe(Request $request, \App\Product $product,$orderId)
    {
 
        return $this->chargeCustomer($product->id, $request->amount, $product->name,$orderId, $request->input('stripeToken'));
    }
 
   /**
    * Charge a Stripe customer.
    *
    * @var Stripe\Customer $customer
    * @param integer $product_id
    * @param integer $product_price
    * @param string $product_name
    * @param string $token
    * @return createStripeCharge()
    */
    public function chargeCustomer($product_id, $product_price, $product_name,$orderId, $token)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        
        if (!$this->isStripeCustomer())
        {
            $customer = $this->createStripeCustomer($token);
        }
        else
        {
            $customer = \Stripe\Customer::retrieve(Auth::user()->stripe_id);
        }
 
        return $this->createStripeCharge($product_id, $product_price, $product_name, $customer,$orderId);
    }
 
   /**
    * Create a Stripe charge.
    *
    * @var Stripe\Charge $charge
    * @var Stripe\Error\Card $e
    * @param integer $product_id
    * @param integer $product_price
    * @param string $product_name
    * @param Stripe\Customer $customer
    * @return postStoreOrder()
    */
    public function createStripeCharge($product_id, $payment, $product_name, $customer,$orderId)
    {
        try {
            
            $charge = \Stripe\Charge::create(array(
                "amount" => $payment,
                "currency" => "usd",
                "customer" => $customer->id,
                "description" => "Order ID : " . $orderId,
            ));


        } catch(\Stripe\Error\Card $e) {
            return redirect()   
                ->route('index')
                ->with('error', 'Your credit card was been declined. Please try again or contact us.');
    }
 
        return $this->postStoreOrder($orderId,$payment);
    }
 
   /**
    * Create a new Stripe customer for a given user.
    *
    * @var Stripe\Customer $customer
    * @param string $token
    * @return Stripe\Customer $customer
    */
    public function createStripeCustomer($token)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
 
        $customer = \Stripe\Customer::create(array(
            "description" => Auth::user()->email,
            "source" => $token
        ));
 
        Auth::user()->stripe_id = $customer->id;
        Auth::user()->save();
 
        return $customer;
    }
 
   /**
    * Check if the Stripe customer exists.
    *
    * @return boolean
    */
    public function isStripeCustomer()
    {
        return Auth::user() && \App\User::where('id', Auth::user()->id)->whereNotNull('stripe_id')->first();
    }
 
   /**
    * Store a order.
    *
    * @param string $product_name
    * @return redirect()
    */
    public function postStoreOrder($orderId,$payment)
    {
        //update the order balance and redirect
        $order=Order::where('id',$orderId)->first();

        $balance = $order->balance;
        $balance -= $payment;

        $order->update(array_merge(['balance' => $balance]));


        return redirect()
            ->action('OrderController@index');

           // ->with('msg', 'Thanks for your purchase!');
    }
}
