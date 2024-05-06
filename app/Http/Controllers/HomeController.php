<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use App\Models\CreditCard;
use App\Models\Wallet;
use App\Models\RequestWallet;


class HomeController extends Controller
{
     public function index()
    {
 $user = Auth::user()->id; // Get the authenticated user
//$user = User::where('id',$user->id)->with('creditCards')->get();

$cc = CreditCard::where('user_id',$user)->with('user')->get();
$deposits = Wallet::where('user_id',$user)->with('fromUser')->orderBy('id','desc')->get(); //->limit(2)->get();
$withdraws = Wallet::where('from_user_id',$user)->with('user')->orderBy('id','desc')->get(); //->limit(2)->get();
$requested = RequestWallet::where('from_user_id',$user)->where('approval',0)->with('RequestfromUser')->get();
$requestedfrom = RequestWallet::where('user_id',$user)->where('approval',0)->with('Requestuser')->get();

$braincc = [];

foreach($cc as $creditcard){
     if($creditcard->braintree_token != '1111'){
          dd($creditcard->braintree_token);
     }
}
//if($cc->braintree_token != '1111'){

 //    dd($cc->braintree_token);
//}


//dd($user,$users);

        return view('home', compact('user','cc','deposits','withdraws','requested','requestedfrom')); // Return the home view
    }
}
