<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bankaccount;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class BankaccountController extends Controller
{
     public function index(){

        $user = Auth::user(); // Get the authenticated user
        $bankaccount= bankaccount::where('user_id','=', $user->id)->get();

///$files = Imagesetting::where('is_active','=','1')->get();

//dd($user->id,$bankaccount,$user);


 $user = auth()->user(); // Get the currently authenticated user

    // Fetch the user's bank account (will return null if it doesn't exist)
    $bankaccount = $user->bankaccount()->first(); 

// If no bank account exists, pass null or an empty instance to the view
    if (!$bankaccount) {
        return view('bankaccount.create');
    }

    // If bank account exists, return the view showing the bank account details
        return view('bankaccount.index',compact('bankaccount','user')); // Return the home view

    }





public function store(Request $request)
{
    // Validate the form data
    $request->validate([
        'name' => 'required|string|max:255',
        'routing' => 'required|string|max:255',
        'account' => 'required|string|max:255',
        'cash' => 'required|numeric',
    ]);

    // Create the bank account
    Bankaccount::create([
        'user_id' => auth()->id(),
        'name' => $request->name,
        'routing' => $request->routing,
        'account' => $request->account,
        'cash' => $request->cash,
        'deposit' => 0,
        'withdraw' => 0,
    ]);

    // Redirect back or to a success page
    return redirect()->route('bankaccount.index')->with('success', 'Bank account created successfully.');
}








public function transfer(Request $request)
{
    $user = auth()->user(); // Get the authenticated user
    $wallet = $user->wallet; // Get the user's wallet
    $bankAccount = $user->bankaccount()->first(); // Get the user's bank account
//dd($wallet);
    // Validate the transfer amount
    $request->validate([
        'amount' => 'required|numeric|min:0.01|max:' . $wallet, // Ensure the user cannot transfer more than they have
    ]);

    $amount = $request->input('amount');

    // Check if user has enough funds in the wallet
    if ($wallet < $amount) {
        return redirect()->back()->with('error', 'Insufficient wallet balance.');
    }

    // Deduct from wallet
    $wallet -= $amount;
    $user->wallet-= $amount;
    $user->save();
//    $wallet->save();

    // Add to bank account's cash
    $bankAccount->cash += $amount;
    $bankAccount->save();

    return redirect()->back()->with('success', 'Funds transferred successfully.');
}





public function transferToWallet(Request $request)
{
    $user = auth()->user(); // Get the authenticated user
    $wallet = $user->wallet; // Get the user's wallet
    $bankAccount = $user->bankaccount()->first(); // Get the user's bank account

    // Validate the transfer amount
    $request->validate([
        'amountToWallet' => 'required|numeric|min:0.01|max:' . $bankAccount->cash, // Ensure the user cannot transfer more than available in the bank account
    ]);

    $amountToWallet = $request->input('amountToWallet');

//dd($bankAccount->cash,$amountToWallet,$bankAccount);
    // Check if the bank account has enough cash
    if ($bankAccount->cash < $amountToWallet) {
        return redirect()->back()->with('error', 'Insufficient bank account balance.');
    }

    // Deduct from bank account
    $bankAccount->cash -= $amountToWallet;
    $bankAccount->save();

    // Add to wallet
    // $wallet->amount += $amountToWallet;

 $user->wallet += $amountToWallet;
    $user->save();

  //  $wallet->save();

    return redirect()->back()->with('success', 'Funds transferred to wallet successfully.');
}





}
