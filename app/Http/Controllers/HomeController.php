<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Model\user;
use Illuminate\Support\Facades\Auth; // Import Auth facade

class HomeController extends Controller
{
     public function index()
    {
 $user = Auth::user(); // Get the authenticated user

//firstname
//lastname
//email
//phone
//braintree


dd($user);

        return view('home', compact('user')); // Return the home view
    }
}
