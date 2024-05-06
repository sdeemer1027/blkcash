<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Braintree\ClientToken;
use Braintree\Gateway; // Add this use statement at the top of your controller

class ProfileController extends Controller
{

public function getToken()
{
/*
BRAINTREE_ENV=sandbox
BRAINTREE_MERCHANT_ID=ky5th6y8d4mp2qwf
BRAINTREE_PUBLIC_KEY=zt54ghn8yv3wrhgr
BRAINTREE_PRIVATE_KEY=b6ca1ce36ce4343047b4c4796bcbad73
  $gateway = new Gateway([
        'environment' => config('braintree.environment'),
        'merchantId' => config('braintree.merchant_id'),
        'publicKey' => config('braintree.public_key'),
        'privateKey' => config('braintree.private_key')
    ]);
*/
$user = Auth::user(); // Get the authenticated user

//dd($user->email);
$gateway = new Gateway([
        'environment' => 'sandbox',
        'merchantId' => 'ky5th6y8d4mp2qwf',
        'publicKey' => 'zt54ghn8yv3wrhgr',
        'privateKey' => 'b6ca1ce36ce4343047b4c4796bcbad73'
    ]);
      $token = $gateway->clientToken()->generate();



// Create a Braintree customer
    $result = $gateway->customer()->create([
        'firstName' => ''.$user->firstname.'', 
        'lastName' => ''.$user->lastname.'', 
        'email' => ''.$user->email.'', // Sample email address
        'paymentMethodNonce' => '', //$request->input('payment_method_nonce'), // Payment method nonce obtained from Braintree client-side SDK
    ]);

    if ($result->success) {
        // Customer created successfully
        $customerToken = $result->customer->id; // Retrieve the customer token
        // Save $customerToken to your database users table for the user
        // Return the customer token or any other response as needed
        return response()->json(['token' => $token, 'customerToken' => $customerToken]);
    } else {
        // Handle error if customer creation fails
        return response()->json(['error' => 'Customer creation failed'], 500);
    }


















    return response()->json(['token' => $token]);
}


public function index()
{
$user = Auth::user(); // Get the authenticated user
//dd($user);

if($user->braintree == null){
    $gateway = new Gateway([
        'environment' => 'sandbox',
        'merchantId' => 'ky5th6y8d4mp2qwf',
        'publicKey' => 'zt54ghn8yv3wrhgr',
        'privateKey' => 'b6ca1ce36ce4343047b4c4796bcbad73'
    ]);
      $token = $gateway->clientToken()->generate();

// Create a Braintree customer
    $result = $gateway->customer()->create([
        'firstName' => ''.$user->firstname.'', 
        'lastName' => ''.$user->lastname.'', 
        'email' => ''.$user->email.'', // Sample email address
        'paymentMethodNonce' => '', //$request->input('payment_method_nonce'), // Payment method nonce obtained from Braintree client-side SDK
    ]);

    if ($result->success) {
        // Customer created successfully
        $customerToken = $result->customer->id; // Retrieve the customer token
        // Save $customerToken to your database users table for the user
        // Return the customer token or any other response as needed
        auth()->user()->update(['braintree' => $customerToken]);
 //       return response()->json(['token' => $token, 'customerToken' => $customerToken]);
    } else {
        // Handle error if customer creation fails
        return response()->json(['error' => 'Customer creation failed'], 500);
    }
}else{


}

/*
if($user->braintree == null){
    
}


//dd($user->email);
$gateway = new Gateway([
        'environment' => 'sandbox',
        'merchantId' => 'ky5th6y8d4mp2qwf',
        'publicKey' => 'zt54ghn8yv3wrhgr',
        'privateKey' => 'b6ca1ce36ce4343047b4c4796bcbad73'
    ]);
      $token = $gateway->clientToken()->generate();

// Create a Braintree customer
    $result = $gateway->customer()->create([
        'firstName' => ''.$user->firstname.'', 
        'lastName' => ''.$user->lastname.'', 
        'email' => ''.$user->email.'', // Sample email address
        'paymentMethodNonce' => '', //$request->input('payment_method_nonce'), // Payment method nonce obtained from Braintree client-side SDK
    ]);

    if ($result->success) {
        // Customer created successfully
        $customerToken = $result->customer->id; // Retrieve the customer token
        // Save $customerToken to your database users table for the user
        // Return the customer token or any other response as needed
        return response()->json(['token' => $token, 'customerToken' => $customerToken]);
    } else {
        // Handle error if customer creation fails
        return response()->json(['error' => 'Customer creation failed'], 500);
    }

*/



return view('profile.index', compact('user'));
}


    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        
    //    dd($request);
        /*
if(!$request->user()->braintree){




//dd($user->email);
$gateway = new Gateway([
        'environment' => 'sandbox',
        'merchantId' => 'ky5th6y8d4mp2qwf',
        'publicKey' => 'zt54ghn8yv3wrhgr',
        'privateKey' => 'b6ca1ce36ce4343047b4c4796bcbad73'
    ]);
      $token = $gateway->clientToken()->generate();



// Create a Braintree customer
    $result = $gateway->customer()->create([
        'firstName' => ''.$request->user()->name.'', // Sample first name (you can use data from the request)
        'lastName' => 'Doe', // Sample last name
        'email' => ''.$request->user()->email.'', // Sample email address
        'paymentMethodNonce' => '', //$request->input('payment_method_nonce'), // Payment method nonce obtained from Braintree client-side SDK
    ]);

    if ($result->success) {
        // Customer created successfully
        $customerToken = $result->customer->id; // Retrieve the customer token
        // Save $customerToken to your database users table for the user
        // Return the customer token or any other response as needed
        auth()->user()->update(['braintree' => $customerToken]);
     //   return response()->json(['token' => $token, 'customerToken' => $customerToken]);
    } else {
        // Handle error if customer creation fails
        return response()->json(['error' => 'Customer creation failed'], 500);
    }


*/

//}







  //  dd($request->user());
 // validation is found Request/ProfileUpdteRequest

$request->user()->fill($request->validated());
    if ($request->hasFile('profile_picture')) {
        $profilePicturePath = $request->file('profile_picture')->store('profile-pictures', 'public');
        auth()->user()->update(['profile_picture' => $profilePicturePath]);
    }
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.index')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
