<?php

namespace App\Http\Controllers;

use App\Models\Bankaccount;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {

        //       $user = Auth::user(); // Get the authenticated user
        $user = User::where('id',Auth::user()->id)
            ->first();

        $transactions = Transaction::with('user')->paginate(5); //->get()
        // Fetch the Admin bank account (will return null if it doesn't exist)
        $adminbankaccount = Bankaccount::where('id','=','100')->first();

        return view('admin.index',compact('user','adminbankaccount','transactions')); //,compact('users'));

    }
    public function showuser($id)
    {
//        dd($id);
        //       $user = Auth::user(); // Get the authenticated user
        $user = User::where('id', $id)->firstOrFail();
//dd($user);
        // $users = User::paginate(5); // with('user')-> ->get()
        // Fetch the Admin bank account (will return null if it doesn't exist)
        // $adminbankaccount = Bankaccount::where('id','=','100')->first();

        return view('admin.getuser',compact('user')); //,compact('users'));

    }

    public function users()
    {

        //       $user = Auth::user(); // Get the authenticated user
        $user = User::where('id',Auth::user()->id)->first();

        $users = User::paginate(5); // with('user')-> ->get()
        // Fetch the Admin bank account (will return null if it doesn't exist)
        $adminbankaccount = Bankaccount::where('id','=','100')->first();

        return view('admin.users',compact('user','adminbankaccount','users')); //,compact('users'));

    }


}
