<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Braintree\Gateway;

class BraintreeController extends Controller
{
    protected $gateway;

    public function __construct()
    {
        $this->gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT', 'sandbox'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
        ]);
    }

    public function index()
    {
        $user = Auth::user();
        $customerId = $user->braintree;
        $clientToken = $this->gateway->clientToken()->generate();

        return view('braintree.form', compact('customerId', 'clientToken'));
    }

    public function addBankAccount(Request $request)
    {
        $request->validate([
            'account_number' => 'required',
            'routing_number' => 'required',
            'payment_method_nonce' => 'required',
        ]);

        $user = Auth::user();
        $customerId = $user->braintree;

        $result = $this->gateway->paymentMethod()->create([
            'customerId' => $customerId,
            'paymentMethodNonce' => $request->input('payment_method_nonce'),
            'options' => [
                'verifyCard' => true,
            ],
        ]);

        if ($result->success) {
            return back()->with('success', 'Bank account added successfully.');
        } else {
            return back()->withErrors('Error: ' . $result->message);
        }
    }

    public function getClientToken()
    {
        $clientToken = $this->gateway->clientToken()->generate();
        return response()->json(['clientToken' => $clientToken]);
    }
}
