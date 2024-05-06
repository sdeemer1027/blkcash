<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Braintree\Gateway; // Add this use statement at the top of your controller
use App\Models\CreditCard;
use App\Models\User;


class CreditCardController extends Controller
{
    //




    public function addCreditCard(Request $request)
    {
$user = Auth::user(); // Get the authenticated user
$user = User::where('id',Auth::user()->id)->first();

$creditcards = CreditCard::where('user_id',Auth::user()->id)->get();


if($user->braintree == null){
    $gateway = new Gateway([
        'environment' => 'sandbox',
        'merchantId' => 'ky5th6y8d4mp2qwf',
        'publicKey' => 'zt54ghn8yv3wrhgr',
        'privateKey' => 'b6ca1ce36ce4343047b4c4796bcbad73'
    ]);
      $token = $gateway->clientToken()->generate();

// Create a Braintree customer
    $result = $gateway->customer()->create([
        'firstName' => ''.$user->firstname.'', 
        'lastName' => ''.$user->lastname.'', 
        'email' => ''.$user->email.'', // Sample email address
        'paymentMethodNonce' => '', //$request->input('payment_method_nonce'), // Payment method nonce obtained from Braintree client-side SDK
    ]);

    if ($result->success) {
        // Customer created successfully
        $customerToken = $result->customer->id; // Retrieve the customer token
        // Save $customerToken to your database users table for the user
        // Return the customer token or any other response as needed
        auth()->user()->update(['braintree' => $customerToken]);
 //       return response()->json(['token' => $token, 'customerToken' => $customerToken]);
    } else {
        // Handle error if customer creation fails
        return response()->json(['error' => 'Customer creation failed'], 500);
    }
}else{


$gateway = new Gateway([
        'environment' => 'sandbox',
        'merchantId' => 'ky5th6y8d4mp2qwf',
        'publicKey' => 'zt54ghn8yv3wrhgr',
        'privateKey' => 'b6ca1ce36ce4343047b4c4796bcbad73'
    ]);
      $token = $gateway->clientToken()->generate();
      $customer = $gateway->customer()->find($user->braintree);




    foreach($customer->creditCards as $cust){
       foreach($creditcards as $creditcard){
           if($cust->token == $creditcard->braintree_token){

//dd($cust->token,$creditcard->braintree_token,$creditcards);
           }else{
//CreditCard::update

           }
        }
    }

//$creditcards
//dd($creditcards,$user->braintree,$customer->creditCards,$cust->token,$creditcard->braintree_token);

/*
$result = $gateway->creditCard()->create([
    'customerId' => $user->braintree,
    'number' => '4111111111111111',
    'expirationDate' => '06/28',
    'cvv' => '100'
    ]);


dd($result,$customer);
*/



 return view('creditcard', compact('user','creditcards','customer')); // Return the home view
}













  return view('creditcard', compact('user','creditcards')); // Return the home view



    }
}
