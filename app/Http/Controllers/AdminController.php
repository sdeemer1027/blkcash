<?php

namespace App\Http\Controllers;

use App\Models\bankaccount;
use App\Models\RequestWallet;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {

        //       $user = Auth::user(); // Get the authenticated user
        $user = User::where('id',Auth::user()->id)->first();

        $requested = RequestWallet::where('from_user_id',Auth::user()->id)->where('approval',0)->with('RequestfromUser')->get();

        $deposits = Wallet::where('user_id',Auth::user()->id)->with('fromUser')->orderBy('id','desc')->get(); //->limit(2)->get();
        $withdraws = Wallet::where('from_user_id',Auth::user()->id)->with('user')->orderBy('id','desc')->get(); //->limit(2)->get();
        $requestedfrom = RequestWallet::where('user_id',Auth::user()->id)->where('approval',0)->with('Requestuser')->get();

        // Calculate the total amount
        $totalAmount = $withdraws->sum('amount');
        // Calculate the total amount
        $totalDeposits = $deposits->sum('amount');
        // Fetch the user's bank account (will return null if it doesn't exist)
        $adminbankaccount = Bankaccount::where('id','=','100')->first();

        return view('admin.index',compact('user','deposits','withdraws','requested','requestedfrom','totalAmount','totalDeposits','adminbankaccount')); //,compact('users'));

    }
}
