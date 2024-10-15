<?php

namespace App\Http\Controllers;

use App\Models\bankaccount;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use App\Models\CreditCard;
use App\Models\Wallet;
use App\Models\RequestWallet;
use Braintree\Gateway; // Add this use statement at the top of your controller
use Illuminate\Support\Collection;


class HomeController extends Controller
{
     public function index()
    {
         $user = Auth::user()->id; // Get the authenticated user

         $buser = User::where('id' , $user)->first();
         $cc = CreditCard::where('user_id',$user)->with('user')->get();
         $requested = RequestWallet::where('from_user_id',$user)->where('approval',0)->with('RequestfromUser')->get();
         $requestedfrom = RequestWallet::where('user_id',$user)->where('approval',0)->with('Requestuser')->get();
         $countrequest =RequestWallet::where('from_user_id',$user)->where('approval',0)->with('RequestfromUser')->count();
         $deposits = Wallet::where('user_id',$user)->with('fromUser')->orderBy('id','desc')->limit(2)->get(); //get(); //->limit(2)->get();
         $withdraws = Wallet::where('from_user_id',$user)->with('user')->orderBy('id','desc')->limit(2)->get(); //get(); //->limit(2)->get();

         // Merging deposits and withdraws into one collection
         $mergedTransactions = $deposits->concat($withdraws);
         // Sort the merged collection by 'updated_at' in descending order
         $mergedTransactions = $mergedTransactions->sortByDesc('updated_at');

         $countrequestfrom = RequestWallet::where('user_id',$user)->where('approval',0)->with('Requestuser')->count();
         $totalcount = $countrequestfrom + $countrequest;

         Auth::user()->totalcount = $totalcount;
         foreach($cc as $creditcard){
             if($creditcard->braintree_token != '1111'){
                 }
    }

    $gateway = new Gateway([
        'environment' => 'sandbox',
        'merchantId' => 'ky5th6y8d4mp2qwf',
        'publicKey' => 'zt54ghn8yv3wrhgr',
        'privateKey' => 'b6ca1ce36ce4343047b4c4796bcbad73'
    ]);
      $token = $gateway->clientToken()->generate();
      $customer = $gateway->customer()->find($buser->braintree);
      $customer= collect($customer);

       return view('home', compact('user','cc','deposits','withdraws',
                                               'requested','requestedfrom','buser','customer',
                                               'totalcount','mergedTransactions')); // Return the home view
    }

    public function dashboardcount()
    {
        // Get the authenticated user's ID
        $userId = Auth::id();

        // Retrieve the requested data
        $totalcount = RequestWallet::where('user_id', $userId)
            ->where('approval', 0)
            ->get();

       // dd($totalcount);

        // Pass the data to the view
        return view('layouts.app', compact('totalcount'));
    }







}
