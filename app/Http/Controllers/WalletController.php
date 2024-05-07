<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\RequestWallet;


class WalletController extends Controller
{
   
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
