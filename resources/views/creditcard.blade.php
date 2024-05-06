<x-app-layout>   
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


          <span>Name</span><span style="float: right;">{{$user->firstname}} {{$user->lastname}}</span><hr>

  <p>
                        
{{--$creditcards--}}
@foreach($creditcards as $creditcard)
@if($creditcard->braintree_token == '1111')
FAKE Card : {{$creditcard->braintree_token}}<BR>
@endif
@endforeach
                    </p>



{{--

          <span>First Name</span><span style="float: right;">{{$user->firstname}}</span><hr>
          <span>Last Name</span><span style="float: right;">{{$user->lastname}}</span><hr>
          <span>Email</span><span style="float: right;">{{$user->email}}</span><hr>
          <span>Phone</span><span style="float: right;">{{$user->phone}}</span><hr>
          <span>Address</span><span style="float: right;">{{$user->address}}</span><hr>
          <span>City</span><span style="float: right;">{{$user->city}}</span><hr>
          <span>State</span><span style="float: right;">{{$user->state}}</span><hr>
          <span>Zip</span><span style="float: right;">{{$user->zip}}</span><hr>

    --}}              




                    <p><HR></p>

                    <p>
<pre>
    $result = $gateway->creditCard()->create([
    'customerId' => $customerId,
    'number' => '4111111111111111',
    'expirationDate' => '06/22',
    'cvv' => '100'
    ]);
    </pre> 
</p>



                    <p>&nbsp;</p><p>&nbsp;</p>
                    <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                    <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>


                    <p><HR>Not Public Info Only System for testing<BR><BR>

Token : {{$user->braintree}} <BR><BR>

{{$customer}}
                    </p>
                    <p></p> 




                </div>
            </div>
        </div>
    </div>
</x-app-layout>
