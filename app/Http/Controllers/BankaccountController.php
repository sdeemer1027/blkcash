<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Bankaccount;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class BankaccountController extends Controller
{
     public function index(){

        $user = Auth::user(); // Get the authenticated user
        $bankaccount= Bankaccount::where('user_id','=', $user->id)->get();


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
    public function edit(){
        $user = Auth::user(); // Get the authenticated user
        $user = auth()->user(); // Get the currently authenticated user
        $bankaccount = $user->bankaccount()->first();

        return view('bankaccount.edit',compact('bankaccount','user'));
    }

public function createnew(){

    return view('bankaccount.create');
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
if($request->id){
    // Find the bank account by its id
    $bankAccount = Bankaccount::find($request->id);

    // Check if the bank account exists
    if ($bankAccount) {
        $bankAccount->update([
            'name' => $request->name,
            'routing' => $request->routing,
            'account' => $request->account,
            'cash' => $request->cash,
        ]);
        return redirect()->route('bankaccount.index')->with('success', 'Bank account updated successfully.');
    }
//dd($request);
    }else{
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
    }
    // Redirect back or to a success page
    return redirect()->route('bankaccount.index')->with('success', 'Bank account created successfully.');
}








public function transfer(Request $request)
{
    $user = auth()->user(); // Get the authenticated user
    $wallet = $user->wallet; // Get the user's wallet
    $bankAccount = $user->bankaccount()->first(); // Get the user's bank account
    $feeaccount = Bankaccount::where('id','=','100')->first();
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

    $amountnew = $amount * 0.03; // 3% of the amount
    $fee = $amountnew;           // The fee is the same as $amountnew
    $bankAccount->cash += $amount - $fee; // Subtract the fee from the amount

    // Add to bank account's cash

    $bankAccount->save();

    $feeaccount->cash += $fee;
    $feeaccount->save();

    Transaction::create([
        'user_id' => $user->id,
        'amount' => $amount - $fee,
        'fee' => $fee,
        'transaction_type' => 'Instant',

    ]);


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
 //   dd($amountToWallet,$user->id);
    Transaction::create([
        'user_id' => $user->id,
        'amount' => $amountToWallet,
        'fee' => '0',
        'transaction_type' => 'Deposit',
    ]);

    return redirect()->back()->with('success', 'Funds transferred to wallet successfully.');
}





}
