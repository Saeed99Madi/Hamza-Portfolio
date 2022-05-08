<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Project;
use App\Models\Transaction;
use Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('site.menu');
    }
    public function index(Request $request){
        $subAmount = 0;
        $totalAmount = 0;
        $fees = 0;
        $cbfeatured =0;
        $objs = $request->cart_value;
        $objs = json_decode($objs, true);
        $objs = collect($objs);
        $objs = (object)$objs;
        foreach ($objs as $project){
            $id = (int)$project['id'];
            $subAmount = ($project['cost']*$project['quantity'])+$subAmount;
            $project['id']=$id;
        }
        $totalAmount = $subAmount;
        if($request->cbccfees==1){
            $fees = 3/100 *$totalAmount;
            $totalAmount +=$fees;
        }
        if($request->cbfeatured ==1){
            $totalAmount +=50;
            $cbfeatured=50;
        }
        return view('home.checkout',compact('objs','subAmount','totalAmount','fees','cbfeatured'));
    }
    public function placeOrder(Request $request){
        $validator = Validator::make($request->all(), [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email',
                'line1' => 'required',
                'country' => 'required',
                'city' => 'required',
                'phone' => 'required|numeric',
                'cc_number'=>'required|numeric',
                'cc_expiration_m'=>'required|numeric',
                'cc_expiration_y'=>'required|numeric',
                'cc_cvv'=>'required|numeric',
            ]
        );

        $order = new Order();
//        $order->user_id = Auth::user()->id;

        $order->subtotal = $request->subtotal;
        $order->total = $request->total;

        if($request->fees){
            $order->fees = $request->fees;
        }else{
            $order->fees =0;
        }

        if($request->forCompany){
            $order->forCompany = $request->forCompany;
        }else{
            $order->forCompany = 0;
        }

        $order->firstname = $request->firstname;
        $order->lastname = $request->lastname;
        $order->email = $request->email;
        $order->line1 = $request->line1;
        $order->country = $request->country;
        $order->city = $request->city;
        $order->phone = $request->phone;
        $order->status = 'failed';
        $order->save();

        $cart_items =  json_decode($request->cart, true);
        $cart_items = collect($cart_items);
        $cart_items = (object)$cart_items;

//        foreach ($cart as $cart_item){
//            $project = Project::findOrFail($cart_item['id']);
//            dd($project);
//        }

//        dd($cart);

        foreach ($cart_items as $item)
        {
            $orderItem = new OrderItem();
            $orderItem->project_id = $item['id'];
            $orderItem->order_id = $order->id;
            $orderItem->cost = $item['cost'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->save();
        }

//        if($this->paymentmode =='cod')
//        {
//            $this->makeTransaction($order->id,'pending');
//            $this->resetCart();
//        }


        $stripe = Stripe::make(config('app.STRIPE_KEY'));



        try {

            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => $request->cc_number,
                    'exp_month' => $request->cc_expiration_m,
                    'exp_year' => $request->cc_expiration_y,
                    'cvc' => $request->cc_cvv,
                ],
            ]);




            if (!isset($token['id'])) {
                session()->flash('stripe_error', 'the stripe token was not generated correctly!');
//                dd('the stripe token was not generated correctly!');
            }
            $customer = $stripe->customers()->create([
                'name' => $request->firstname . ' ' . $request->lastname,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => ['line1' => $request->line1,
//                    'postal_code' => $request->post_code,
                    'city' => $request->city,
                    'state' => $request->city,
                    'country' => $request->country],
                'source' => $token['id'],
            ]);
            $charge = $stripe->charges()->create([
                'customer' => $customer['id'],
                'currency' => 'EUR',
                'amount' => $request->total,
                'description' => 'payment for order no' . $order->id,
            ]);

                if ($charge['status'] == 'succeeded') {
                    $order->status = 'successful';
                    $order->save();
                    $transaction = new Transaction();
                    $transaction->username = $request->firstname . ' ' . $request->lastname;
                    $transaction->order_id = $order->id;
                    $transaction->mode='card';
                    $transaction->status = 'approved';
                    $transaction->save();

                    return view('welcome');

//                    $this->resetCart();
//                    $this->render();
                } else {
                    session()->flash('stripe_error', 'Error in Transaction!');
                    dd('Error in Transaction!');
                    redirect()->back();
                }


        } catch (\Exception $e) {
            session()->flash('stripe_error', $e->getMessage());
            dd($e->getMessage());
        }

    }
}
