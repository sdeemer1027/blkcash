<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Braintree\Gateway; // Add this use statement at the top of your controller


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:13'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'string', 'max:255'],
        ]);


    $gateway = new Gateway([
        'environment' => 'sandbox',
        'merchantId' => 'ky5th6y8d4mp2qwf',
        'publicKey' => 'zt54ghn8yv3wrhgr',
        'privateKey' => 'b6ca1ce36ce4343047b4c4796bcbad73'
    ]);
      $token = $gateway->clientToken()->generate();

//dd($token);

// Create a Braintree customer
    $result = $gateway->customer()->create([
        'firstName' => ''.$request->firstname.'', 
        'lastName' => ''.$request->lastname.'', 
        'email' => ''.$request->email.'', // Sample email address
        'phone' => ''.$request->phone.'', 
//        'billingAddress' => ''.$request->address.'',
//        'phoneNumber' => ''.$request->phone.'', 
//        'postalCode' => ''.$request->zip.'', 
//        'streetAddress' => ''.$request->address.'',
        'paymentMethodNonce' => '',
    ]);

    if ($result->success) {
        // Customer created successfully
        $customerToken = $result->customer->id; // Retrieve the customer token
 
//dd($customerToken);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'braintree' => $customerToken,
        ]);

        event(new Registered($user));








        Auth::login($user);






        return redirect(RouteServiceProvider::HOME);
    



 } else {
        // Handle error if customer creation fails
        return response()->json(['error' => 'Customer creation failed'], 500);
    }






}







}
