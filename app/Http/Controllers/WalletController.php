<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\RequestWallet;
use Braintree\Gateway; // Add this use statement at the top of your controller

use Braintree\Transaction;
use Braintree\Customer;
use Braintree\BraintreeCustomerSearch;

use App\Services\TwillioService;

class WalletController extends Controller
{

    protected $twilio;

    public function __construct(TwillioService $twilio)
    {
        $this->twilio = $twilio;
    }


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
   return view('wallet.index',compact('user','deposits','withdraws','requested','requestedfrom','totalAmount','totalDeposits')); //,compact('users'));

    }

     public function transaction(){


        $user = Auth::user(); // Get the authenticated user
        $user = User::where('id',Auth::user()->id)->first();

        $requested = RequestWallet::where('from_user_id',Auth::user()->id)->where('approval',0)->with('RequestfromUser')->get();


        $deposits = Wallet::where('user_id',Auth::user()->id)->with('fromUser')->orderBy('id','desc')->get(); //->limit(2)->get();
        $withdraws = Wallet::where('from_user_id',Auth::user()->id)->with('user')->orderBy('id','desc')->get(); //->limit(2)->get();
        $requestedfrom = RequestWallet::where('user_id',Auth::user()->id)->where('approval',0)->with('Requestuser')->get();

        // Calculate the total amount
        $totalAmount = $withdraws->sum('amount');
        // Calculate the total amount
        $totalDeposits = $deposits->sum('amount');

        return view('transactions.index',compact('user','deposits','withdraws','requested','requestedfrom','totalAmount','totalDeposits')); //,compact('users'));

    }

     public function bank()
    {

        $user = Auth::user(); // Get the authenticated user
        $user = User::where('id',Auth::user()->id)->first();

        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'ky5th6y8d4mp2qwf',
            'publicKey' => 'zt54ghn8yv3wrhgr',
            'privateKey' => 'b6ca1ce36ce4343047b4c4796bcbad73'
        ]);
        $token = $gateway->clientToken()->generate();
        $customer = $gateway->customer()->find($user->braintree);
        // Access credit card details
        $creditCards = $customer->creditCards;
//$customerBalance = $gateway->customer()->balance([$user->braintree]);
//dd($creditCards);

        return view('braintree.form');



        $transaction = $gateway->transaction()->find('d92d45nw');

        $transaction2 = $gateway->transaction()->find('4paw65qw');

        $trans = $gateway->transaction()->find('72bje822');

        $braintreetoken = $user->braintree;

        $customer2 = $gateway->customer()->find($braintreetoken);

//dd($customer,$transaction,$transaction2,$trans,$customer2);








        //= Wallet::where('user_id',$user)->with('fromUser')->orderBy('id','desc')->get(); //->limit(2)->get();
        //= Wallet::where('from_user_id',$user)->with('user')->orderBy('id','desc')->get(); //->limit(2)->get();


        return view('wallet.index',compact('user','deposits','withdraws','requested','requestedfrom','totalAmount','totalDeposits')); //,compact('users'));

    }




public function addFunds(Request $request)
{
    $customerID = $request->user()->braintree_customer_id; // Assuming you store Braintree customer IDs for users
    $paymentMethodToken = $request->input('payment_method_token');
    $amount = $request->input('amount');

    $result = Transaction::sale([
        'customerId' => $customerID,
        'paymentMethodToken' => $paymentMethodToken,
        'amount' => $amount,
        'options' => [
            'submitForSettlement' => true, // Automatically submit for settlement
        ],
    ]);

    if ($result->success) {
        // Update customer's account balance in your database
        // Provide success message to the customer
        return redirect()->back()->with('success', 'Funds added successfully.');
    } else {
        // Handle transaction failure
        $error = $result->message;
        return redirect()->back()->with('error', $error);
    }
}

















     public function paymentPage()
    {

$users = User::all();
//dd($users);


        return view('payments.payment_page',compact('users')); // Assuming 'payments.payment_page' is your blade view file
    }


     public function processPayment(Request $request)
    {
        
//dd($request);


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

           // $wallet->from_user_id
            $frm = User::where('id',$wallet->from_user_id)->first();
            $toooo = User::where('id',$user_id->id)->first();
if($toooo->validphone === 1 ) {
    //    dd($frm,$frm->name,$toooo,$toooo->phone);
// cKPViLWvlFwpVDiQhS.gif
    // Example phone number and message
    $phoneNumber = $toooo->phone;    //'+19543910398'; // The recipient's phone number
    $message = 'BLK.CASH Alert: You have a new money request from ' . $frm->name . '. Please login http://dashboard.blk.cash/login';

    // Send SMS
    $this->twilio->sendSMS($phoneNumber, $message);
}else{

}




//dd($request);
        return redirect()->route('home')->with('status', 'Request was made successfully.');

        }

        return redirect()->route('home')->with('status', 'Payment processed successfully.');
    }



    public function cancelRequest(Request $request)
    {

     //   dd($request->input('tid'));

        $request->validate([
            'tid' => 'required|exists:request_wallet,id', // Assuming you have a money_requests table
        ]);

        $transaction = $request->input('tid');
        $cancelrequest = RequestWallet::find($transaction);
        $canceltouser = User::find($cancelrequest->user_id);
        $fromuser = User::find($cancelrequest->from_user_id);

        $trans = RequestWallet::find($transaction);

        $trans->approval = 3; // Add the new amount to the existing wallet amount
        $trans->save();
        $message = 'BLK.CASH Alert: request from '.$fromuser->name.' for the amount of '.$trans->amount.' has been canceled Please login http://dashboard.blk.cash/login';

        if($canceltouser->validphone === 1){
            $phoneNumber = $canceltouser->phone;    // The recipient's phone number
            $this->twilio->sendSMS($phoneNumber, $message);

        }else{
// setup and send email as the message to remind them to pay
            // We Send an Email to the user
   //         dd($canceltouser->email,$message);
        }
        return redirect()->route('home')->with('status', 'Payment Canceled successfully.');
    }


    public function remindRequest(Request $request)
    {
        $transaction = $request->input('tid');
        $remind = RequestWallet::find($transaction);

        $reminduser = User::find($remind->user_id);
        $fromuser = User::find($remind->from_user_id);
        $message = 'BLK.CASH Alert: Reminder money request from '.$fromuser->name.'  Please login http://dashboard.blk.cash/login';

       if($reminduser->validphone === 1){
          $phoneNumber = $reminduser->phone;    // The recipient's phone number
          // Send SMS
          $this->twilio->sendSMS($phoneNumber, $message);
 //         dd($message);

       }else{
    // setup and send email as the message to remind them to pay
    // We Send an Email to the user
  //  dd($reminduser->email,$message);
    }
        return redirect()->route('home')->with('status', 'Payment Reminded successfully.');
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

                $user = User::find($user->id);
                $from = User::find($me);
                $message = 'BLK.CASH Alert:  money request to '.$from->name.' is paid. Please login http://dashboard.blk.cash/login';

                if($user->validphone === 1) {
                    $phoneNumber = $user->phone;    // The recipient's phone number
                    // Send SMS
                    $this->twilio->sendSMS($phoneNumber, $message);
                    //         dd($message);
   //                dd($from);
                }

            } else {
                    // Handle case where user with $userId does not exist
            }
          $minuser = User::find($me); // Assuming $userId is the ID of the user
            if ($minuser) {
                $minuser->wallet -= $amount; // Subtract the new amount to the existing wallet amount
                $minuser->save();

    //           dd($minuser);


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

               $sendrejection= User::find($trans->from_user_id);
               $whoreject = User::find($trans->user_id);

                $message = 'BLK.CASH Alert:  money request to '.$whoreject->name.' was Rejected. Please login http://dashboard.blk.cash/login';

                if($sendrejection->validphone === 1) {
                    $phoneNumber = $sendrejection->phone;    // The recipient's phone number
                    // Send SMS
                                $this->twilio->sendSMS($phoneNumber, $message);
    //                dd($trans, $sendrejection, $message);

                }

                   return redirect()->route('home')->with('status', 'Request was made successfully.');
            } else {
                    // Handle case where user with $userId does not exist
            }
        }

        // Redirect or return a response as needed
    }




}
