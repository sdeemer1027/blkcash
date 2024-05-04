<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; // Import Auth facade
use App\Models\CreditCard;

class HomeController extends Controller
{
     public function index()
    {
 $user = Auth::user()->id; // Get the authenticated user
//$user = User::where('id',$user->id)->with('creditCards')->get();

$cc = CreditCard::where('user_id',$user)->with('user')->get();


//firstname
//lastname
//email
//phone
//braintree


//dd($user,$users);

        return view('home', compact('user','cc')); // Return the home view
    }
}
