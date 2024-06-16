<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\RequestWallet;
use Braintree\Gateway; // Add this use statement at the top of your controller

use Braintree\Transaction;
use Braintree\Customer;
use Braintree\BraintreeCustomerSearch;


class WalletController extends Controller
{

     public function index()
    {

        $user = Auth::user(); // Get the authenticated user
        $user = User::where('id',Auth::user()->id)->first();

$requested = RequestWallet::where('from_user_id',Auth::user()->id)->where('approval',0)->with('RequestfromUser')->get();


$deposits = Wallet::where('user_id',Auth::user()->id)->with('fromUser')->orderBy('id','desc')->get(); //->limit(2)->get();
$withdraws = Wallet::where('from_user_id',Auth::user()->id)->with('user')->orderBy('id','desc')->get(); //->limit(2)->get();
$requestedfrom = RequestWallet::where('user_id',Auth::user()->id)->where('approval',0)->with('Requestuser')->get();

  // Calculate the total amount
    $totalAmount = $withdraws->sum('amount');
    // Calculate the total amount
    $totalDeposits = $deposits->sum('amount');

//Requestuser

  //      dd($requestedfrom,$requested,$deposits,$withdraws);

$gateway = new Gateway([
        'environment' => 'sandbox',
        'merchantId' => 'ky5th6y8d4mp2qwf',
        'publicKey' => 'zt54ghn8yv3wrhgr',
        'privateKey' => 'b6ca1ce36ce4343047b4c4796bcbad73'
    ]);
      $token = $gateway->clientToken()->generate();
      $customer = $gateway->customer()->find($user->braintree);
        // Access credit card details
        $creditCards = $customer->creditCards;
//$customerBalance = $gateway->customer()->balance([$user->braintree]);

$transaction = $gateway->transaction()->find('d92d45nw');

$transaction2 = $gateway->transaction()->find('4paw65qw');

$trans = $gateway->transaction()->find('72bje822');

$braintreetoken = $user->braintree;

$customer2 = $gateway->customer()->find($braintreetoken);

//dd($customer,$transaction,$transaction2,$trans,$customer2);


/*
 $result = $gateway->transaction()->sale([
        'customerId' => '49681111134', //$customerID,
        'paymentMethodToken' =>  '3ycfe5hf',  //$paymentMethodToken,
        'amount' => '550.00',
        'options' => [
            'submitForSettlement' => true, // Automatically submit for settlement
        ],
    ]);


 dd($result);
*/



/*

        // Get customer IDs from the request (assuming it's sent from the frontend)
        $senderCustomerId =  '49681111134'; //              $request->input('49681111134');
        $receiverCustomerId = '40885802583';             //  $request->input('40885802583');

        // Charge Customer-1's credit card
        $result = $gateway->transaction()->sale([
            'amount' => '25.00', // Amount to charge ($25)
            'paymentMethodToken' =>  '3ycfe5hf', //    'customer-1-payment-method-token', // Payment method token for Customer-1's credit card
            'options' => [
                'submitForSettlement' => true, // Automatically submit for settlement
            ],
        ]);

        if ($result->success) {
            // Transaction successful, update Customer-2's account balance
 

//            $customer2 = User::where('braintree_customer_id', $receiverCustomerId)->first();
//            if ($customer2) {
//                $customer2->update(['balance' => $customer2->balance + 25.00]); // Update balance for Customer-2
//                return response()->json(['message' => 'Funds transferred successfully'], 200);
//            } else {
//                return response()->json(['error' => 'Receiver customer not found'], 404);
//            }

        } else {
            // Transaction failed
            return response()->json(['error' => $result->message], 400);
        }
    




dd($result);



*/







 //= Wallet::where('user_id',$user)->with('fromUser')->orderBy('id','desc')->get(); //->limit(2)->get();
 //= Wallet::where('from_user_id',$user)->with('user')->orderBy('id','desc')->get(); //->limit(2)->get();


 return view('wallet.index',compact('user','deposits','withdraws','requested','requestedfrom','totalAmount','totalDeposits')); //,compact('users')); 

    }





public function addFunds(Request $request)
{
    $customerID = $request->user()->braintree_customer_id; // Assuming you store Braintree customer IDs for users
    $paymentMethodToken = $request->input('payment_method_token');
    $amount = $request->input('amount');

    $result = Transaction::sale([
        'customerId' => $customerID,
        'paymentMethodToken' => $paymentMethodToken,
        'amount' => $amount,
        'options' => [
            'submitForSettlement' => true, // Automatically submit for settlement
        ],
    ]);

    if ($result->success) {
        // Update customer's account balance in your database
        // Provide success message to the customer
        return redirect()->back()->with('success', 'Funds added successfully.');
    } else {
        // Handle transaction failure
        $error = $result->message;
        return redirect()->back()->with('error', $error);
    }
}








   







   
     public function paymentPage()
    {

$users = User::all();
//dd($users);


        return view('payments.payment_page',compact('users')); // Assuming 'payments.payment_page' is your blade view file
    }


     public function processPayment(Request $request)
    {
        // Handle form submission here
        $action = $request->input('action');
        $amount = $request->input('amount');

        if ($action === 'pay') {
            // Process payment
            // from_user_id YOU 
            // To user_id WHO
          $who= $request->input('who');
          $from_user_id = Auth::user()->id; // Get the authenticated user
          $user_id = User::where('email',$who)->first();

            // update the wallet and user.wallet
          $wallet = new Wallet();
          $wallet->user_id = $user_id->id; // Assign the user_id
          $wallet->from_user_id = $from_user_id; // Assign the from_user_id
          $wallet->amount = $amount; // Assign the amount
          $wallet->save();

          $user = User::find($user_id->id); 
            if ($user) {
                $user->wallet += $amount; // Add the new amount to the existing wallet amount
                $user->save();
            } else {
                    // Handle case where user with $userId does not exist
            }
          $minuser = User::find($from_user_id); // Assuming $userId is the ID of the user
            if ($minuser) {
                $minuser->wallet -= $amount; // Subtract the new amount to the existing wallet amount
                $minuser->save();
            } else {
                    // Handle case where user with $userId does not exist
            }
 return redirect()->route('home')->with('status', 'Payment processed successfully.');

        } elseif ($action === 'request') {
            // Request payment

         $who= $request->input('who');
          $from_user_id = Auth::user()->id; // Get the authenticated user
          $user_id = User::where('email',$who)->first();

  // update the wallet and user.wallet
          $wallet = new RequestWallet();
          $wallet->user_id = $user_id->id; // Assign the user_id
          $wallet->from_user_id = $from_user_id; // Assign the from_user_id
          $wallet->amount = $amount; // Assign the amount
           $wallet->approval = 0; // Assign the amount
          $wallet->save();

//dd($request);
        return redirect()->route('home')->with('status', 'Request was made successfully.');
 
        }

        return redirect()->route('home')->with('status', 'Payment processed successfully.');
    }



 public function approveReject(Request $request)
    {
        // Handle Approve or Reject actions here
        $action = $request->input('action');

        if ($action === 'approve') {
            // Handle Approve action
            $transaction = $request->input('tid');
            $who = $request->input('who');
            $amount = $request->input('amount');
            $me = Auth::user()->id; // Get the authenticated user
 
//dd($who);

            $trans = RequestWallet::find($transaction); 
            if ($trans) {
                $trans->approval = 1; // Add the new amount to the existing wallet amount
                $trans->save();

               $wallet = new Wallet();
               $wallet->user_id = $who; // Assign the user_id
               $wallet->from_user_id = $me; // Assign the from_user_id
               $wallet->amount = $amount; // Assign the amount
               $wallet->save();

               $user = User::find($who); 
            if ($user) {
                $user->wallet += $amount; // Add the new amount to the existing wallet amount
                $user->save();
            } else {
                    // Handle case where user with $userId does not exist
            }
          $minuser = User::find($me); // Assuming $userId is the ID of the user
            if ($minuser) {
                $minuser->wallet -= $amount; // Subtract the new amount to the existing wallet amount
                $minuser->save();
            } else {
                    // Handle case where user with $userId does not exist
            }
 //dd($request);
 return redirect()->route('home')->with('status', 'Payment processed successfully.');


            } else {
                    // Handle case where user with $userId does not exist
            }


           
        } elseif ($action === 'reject') {
            // Handle Reject action
            $transaction =$request->input('tid');
            $trans = RequestWallet::find($transaction); 
            if ($trans) {
                $trans->approval = 3; // Add the new amount to the existing wallet amount
                $trans->save();

                   return redirect()->route('home')->with('status', 'Request was made successfully.');
            } else {
                    // Handle case where user with $userId does not exist
            }
        }

        // Redirect or return a response as needed
    }




}
