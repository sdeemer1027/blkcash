<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Braintree\Gateway; // Add this use statement at the top of your controller



class CreditCardController extends Controller
{
    //




    public function addCreditCard(Request $request)
    {
$user = Auth::user(); // Get the authenticated user



/*
dd($user);

if(!$request->user()->braintree){

//dd($user->email);
$gateway = new Gateway([
        'environment' => 'sandbox',
        'merchantId' => 'ky5th6y8d4mp2qwf',
        'publicKey' => 'zt54ghn8yv3wrhgr',
        'privateKey' => 'b6ca1ce36ce4343047b4c4796bcbad73'
    ]);
      $token = $gateway->clientToken()->generate();



// Create a Braintree customer
    $result = $gateway->customer()->create([
        'firstName' => ''.$request->user()->name.'', // Sample first name (you can use data from the request)
        'lastName' => 'Doe', // Sample last name
        'email' => ''.$request->user()->email.'', // Sample email address
        'paymentMethodNonce' => '', //$request->input('payment_method_nonce'), // Payment method nonce obtained from Braintree client-side SDK
    ]);

    if ($result->success) {
        // Customer created successfully
        $customerToken = $result->customer->id; // Retrieve the customer token
        // Save $customerToken to your database users table for the user
        // Return the customer token or any other response as needed
        auth()->user()->update(['braintree' => $customerToken]);
     //   return response()->json(['token' => $token, 'customerToken' => $customerToken]);
    } else {
        // Handle error if customer creation fails
        return response()->json(['error' => 'Customer creation failed'], 500);
    }

}


*/




    }
}
