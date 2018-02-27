<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Order;
use App\Http\Requests;
class ProductController extends Controller
{
   /**
    * Show the index page.
    *
    * @var App\Product $products
    * @return Illuminate\View\View
    */
    public function index($orderId,$proId) {
        //need to return products where orderId and proId matches to find that pro's quote
        $products = Product::where([['orderId', '=', $orderId],['proId', '=', $proId],])->get();

       
        $runningSum = 0;
        $tax = 0;
        $fee = 0;
        $total = 0;

        foreach($products as $product) {
            $runningSum += $product->price;
        }

        $tax = 0.1 * $runningSum;
        $fee = 0.2 * $runningSum;
        $total = $tax + $fee + $runningSum;                   
                   

        $order = Order::where('id','=',$orderId)->first();

        return view('pages.index', compact('products','order','total','tax','fee','runningSum','proId'));
        
    }

    /**
     * Create new products.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$orderId)
    {       
        //this function should handle creation of 1 to many products at a time
        //print_r($_REQUEST);
        //print_r($orderId);
        /*
        *$request is formatted as following
        *[0] => Product/Service 1
        *[1] => Description 1
        *[2] => Price 1
        *[3] => Product/Service 2
        *[4] => Description 2
        *[5] => Price 2
        * Etc etc
        */
        $products = Product::where('orderId',$orderId)->first();

        if(is_null($products)){
            //this is the first quote for the order
            $field_values_array = $_REQUEST['addmore'];
            $length = count($field_values_array);
            $id = Auth::id();
            for($i = 0; $i < $length; $i+=3){
                $product = $field_values_array[$i];
                $description = $field_values_array[$i+1];
                $price = $field_values_array[$i+2] * 100;
                Product::create(['orderId'=>$orderId,'proId'=>$id, 'name'=>$product, 'description' =>$description, 'price'=>$price]); 

            }

            $order=Order::where('id',$orderId)->first(); //get the user's order

            $order->update(array_merge($request->all(), ['active' => 3]));  //3 denotes the job is quoted
            
            return redirect("/home");
        } else {
            //the order has already been quoted before so delete the previous quote
            Product::where('orderId',$orderId)->delete();

            //this is the first quote for the order
            $field_values_array = $_REQUEST['addmore'];
            $length = count($field_values_array);
            $id = Auth::id();
            for($i = 0; $i < $length; $i+=3){
                $product = $field_values_array[$i];
                $description = $field_values_array[$i+1];
                $price = $field_values_array[$i+2] * 100;
                Product::create(['orderId'=>$orderId,'proId'=>$id, 'name'=>$product, 'description' =>$description, 'price'=>$price]); 

            }

            $order=Order::where('id',$orderId)->first(); //get the user's order

            $order->update(array_merge($request->all(), ['active' => 3]));  //3 denotes the job is quoted
            
            return redirect("/home");
        }

    }


    public function editQuote($orderId){

        $products = Product::where('orderId','=',$orderId)->get();

        return view('pages.editQuote', compact('products','orderId'));
    }
}
