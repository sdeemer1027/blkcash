<?php

namespace App\Http\Controllers;

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
//$user = User::where('id',$user->id)->with('creditCards')->get();
$buser = User::where('id' , $user)->first();
$cc = CreditCard::where('user_id',$user)->with('user')->get();
$requested = RequestWallet::where('from_user_id',$user)->where('approval',0)->with('RequestfromUser')->get();
$countrequest =RequestWallet::where('from_user_id',$user)->where('approval',0)->with('RequestfromUser')->count();
$deposits = Wallet::where('user_id',$user)->with('fromUser')->orderBy('id','desc')->limit(2)->get(); //get(); //->limit(2)->get();
$withdraws = Wallet::where('from_user_id',$user)->with('user')->orderBy('id','desc')->limit(2)->get(); //get(); //->limit(2)->get();
$requestedfrom = RequestWallet::where('user_id',$user)->where('approval',0)->with('Requestuser')->get();
         $countrequestfrom = RequestWallet::where('user_id',$user)->where('approval',0)->with('Requestuser')->count();
         $totalcount = $countrequestfrom + $countrequest;
//dd($countrequest,$countrequestfrom,$totalcount);
$braincc = [];

         Auth::user()->totalcount = $totalcount;

//dd($user,$buser);

foreach($cc as $creditcard){
     if($creditcard->braintree_token != '1111'){
          //dd($creditcard->braintree_token);
     }
}
//if($cc->braintree_token != '1111'){

 //    dd($cc->braintree_token);
//}

$gateway = new Gateway([
        'environment' => 'sandbox',
        'merchantId' => 'ky5th6y8d4mp2qwf',
        'publicKey' => 'zt54ghn8yv3wrhgr',
        'privateKey' => 'b6ca1ce36ce4343047b4c4796bcbad73'
    ]);
      $token = $gateway->clientToken()->generate();
      $customer = $gateway->customer()->find($buser->braintree);
$customer= collect($customer);
//dd($buser,$customer);

//dd($user,$users);

        return view('home', compact('user','cc','deposits','withdraws','requested','requestedfrom','buser','customer','totalcount')); // Return the home view
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
