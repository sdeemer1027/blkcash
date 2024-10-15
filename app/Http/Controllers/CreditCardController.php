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


   public function store(Request $request)
    {
        $user = Auth::user(); // Get the authenticated user
        $user = User::where('id',Auth::user()->id)->first();


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

/*
if($request->input('token')){
    $toke = $request->input('token');
$result = $gateway->paymentMethod()->delete('$toke');

$result->success
}
*/



$gateway = new Gateway([
        'environment' => 'sandbox',
        'merchantId' => 'ky5th6y8d4mp2qwf',
        'publicKey' => 'zt54ghn8yv3wrhgr',
        'privateKey' => 'b6ca1ce36ce4343047b4c4796bcbad73'
    ]);
      $token = $gateway->clientToken()->generate();
      $customer = $gateway->customer()->find($user->braintree);

$name = $request->input('name');
$number = $request->input('card_number');
$expirationDate = $request->input('expirationDate');
$cvv = $request->input('cvv');

$result = $gateway->creditCard()->create([
    'customerId' => $user->braintree,
    'cardholderName' => $name,
    'number' => $number,
    'expirationDate' => $expirationDate ,
    'cvv' => $cvv
    ]);



//foreach($result->creditcard as $the){   $result->creditCard->bin

//dd($result->creditCard);

 $docard = CreditCard::create([
        'braintree_token' => $result->creditCard->token,
        'user_id' => $user->id,
        'expirationDate' => $result->creditCard->expirationDate,
        'last4' => $result->creditCard->last4,
        'cardType' => $result->creditCard->cardType,
        // 'cvv' => $cust->cvv
    ]);


return view('dashboard'); // Return the home view
}


















/*
$gateway = new Gateway([
        'environment' => 'sandbox',
        'merchantId' => 'ky5th6y8d4mp2qwf',
        'publicKey' => 'zt54ghn8yv3wrhgr',
        'privateKey' => 'b6ca1ce36ce4343047b4c4796bcbad73'
    ]);
      $token = $gateway->clientToken()->generate();
      $customer = $gateway->customer()->find($user->braintree);

$name = $request->input('name');
$number = $request->input('card_number');
$expirationDate = $request->input('expirationDate');
$cvv = $request->input('cvv');



$result = $gateway->creditCard()->create([
    'customerId' => $user->braintree,
    'cardholderName' => $name,
    'number' => $number,
    'expirationDate' => $expirationDate ,
    'cvv' => $cvv
    ]);
*/
/*
    foreach($customer->creditCards as $cust){
       foreach($creditcards as $creditcard){
           if($cust->token == $creditcard->braintree_token){

//dd($cust->token,$creditcard->braintree_token,$creditcards);
           }else{
//CreditCard::update

           }
        }
    }
*/




 return view('dashboard'); // Return the home view


    }

    public function addCreditCard(Request $request)
    {
$user = Auth::user(); // Get the authenticated user
$user = User::where('id',Auth::user()->id)->first();

$creditcards = CreditCard::where('user_id',Auth::user()->id)->get();

/*
BRAINTREE_ENV=sandbox
BRAINTREE_MERCHANT_ID=ky5th6y8d4mp2qwf
BRAINTREE_PUBLIC_KEY=zt54ghn8yv3wrhgr
BRAINTREE_PRIVATE_KEY=b6ca1ce36ce4343047b4c4796bcbad73
*/
//dd(env('BRAINTREE_ENV')); // Dump the specific variable you are trying to access
//dd($_ENV); // Dump all loaded environment variables
//    $braintreeEnv1 = env('BRAINTREE_ENV');
//$braintreeEnv2 = config('braintree.environment');
// $appUrl = config('braintree.environment');
//    $databaseName = config('database.connections.mysql.database');
//
//    dd($appUrl, $databaseName,$braintreeEnv1,$braintreeEnv2);





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
        auth()->user()->update(['braintree' => $customerToken]);

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

$ifcard = CreditCard::where('user_id', $user->id)
                    ->where('braintree_token', $cust->token)
                    ->first();

if (!$ifcard) {
    $docard = CreditCard::create([
        'braintree_token' => $cust->token,
        'user_id' => $user->id,
        'expirationDate' => $cust->expirationDate,
        'last4' => $cust->last4,
        'cardType' => $cust->cardType,
        // 'cvv' => $cust->cvv
    ]);
} else {
    // Handle if the card already exists, maybe log or throw an exception
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
$result = $gateway->creditCard()->create([
    'customerId' => $user->braintree,
    'number' => '5555555555554444',
    'expirationDate' => '06/28',
    'cvv' => '100'
    ]);
$result = $gateway->creditCard()->create([
    'customerId' => $user->braintree,
    'number' => '378282246310005',
    'expirationDate' => '06/28',
    'cvv' => '100'
    ]);




dd($result,$customer);
*/



 return view('creditcard', compact('user','creditcards','customer')); // Return the home view
}













  return view('creditcard', compact('user','creditcards')); // Return the home view



    }

    public function details()
    {
        $user = Auth::user(); // Get the authenticated user


        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'ky5th6y8d4mp2qwf',
            'publicKey' => 'zt54ghn8yv3wrhgr',
            'privateKey' => 'b6ca1ce36ce4343047b4c4796bcbad73'
        ]);
        $token = $gateway->clientToken()->generate();
        $customer = $gateway->customer()->find($user->braintree);


        foreach ($customer->creditCards as $cust) {

            $ifcard = CreditCard::where('user_id', $user->id)
                ->where('braintree_token', $cust->token)
                ->first();

            if (!$ifcard) {
                $docard = CreditCard::create([
                    'braintree_token' => $cust->token,
                    'user_id' => $user->id,
                    'expirationDate' => $cust->expirationDate,
                    'last4' => $cust->last4,
                    'cardType' => $cust->cardType,
                    // 'cvv' => $cust->cvv
                ]);
            } else {
                // Handle if the card already exists, maybe log or throw an exception
            }
     //       dd($customer,$ifcard);


            return view('creditcards.index', compact('user','customer')); // Return the home view   ,'creditcards'
        }
    }


    public function deleteCreditCard($token)
    {
/*
credit_card->braintree_token is = $customer->creditCard->token
need to create a soft delete
*/
//dd($token);
        $delToken = $token;
        $user = Auth::user(); // Get the authenticated user

        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'ky5th6y8d4mp2qwf',
            'publicKey' => 'zt54ghn8yv3wrhgr',
            'privateKey' => 'b6ca1ce36ce4343047b4c4796bcbad73'
        ]);
        $token = $gateway->clientToken()->generate();
 //       $customer = $gateway->customer()->find($user->braintree);
        $result = $gateway->paymentMethod()->delete($delToken);


    }

}
