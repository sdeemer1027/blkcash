<x-app-layout>   
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


          <span>Name</span><span style="float: right;">{{$user->firstname}} {{$user->lastname}}</span><hr>
          


<form action="{{ route('credit-cards.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Name on Card:</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Enter name on card" required>
    </div>

    <div class="form-group">
        <label for="expirationDate">Expiration Date:</label>
        <input type="text" id="expirationDate" name="expirationDate" class="form-control" placeholder="Enter expirationDate mm/yyyy" required>
    </div>
 <div class="form-group">
        <label for="card_number">Credit Card Number:</label>
        <input type="text" id="card_number" name="card_number" class="form-control" placeholder="Enter credit card number" required>
    </div>
    <div class="form-group">
        <label for="cvv">Cvv:</label>
        <input type="text" id="cvv" name="cvv" class="form-control" placeholder="Enter cvv number" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Credit Card</button>
</form>


                    <p><HR></p>

                    <p>
                        {{--
<pre>
    $result = $gateway->creditCard()->create([
    'customerId' => $customerId,
    'number' => '4111111111111111',
    'expirationDate' => '06/22',
    'cvv' => '100'
    ]);
    </pre> 
    --}}
    <pre>
        To Add Test Card : 
for visa: 4111111111111111
for mastercard:    5555555555554444
{{--
for American Express: 378282246310005 --}}
</pre>

<p>
Bank routing numbers
Bank routing numbers must pass a checksum, much like credit card numbers. 
The following routing numbers are valid, and can be passed to the sandbox:<BR><BR>

071101307<BR>
071000013
                            
                        </p>

</p>



                    <p>&nbsp;</p>
                    <p>

{{--
Cards on file with Braintree
--}}
@foreach($customer->creditCards as $credit)
{{--$credit->firstName--}} 
{{--$credit->maskedNumber}}  {{$credit->token--}}  

{{--
<form action="{{ route('credit-cards.store') }}" method="POST">
    @csrf
    <input type="hidden" id="token" name="token" class="form-control" value="{{$credit->token}}">
   <button type="submit" class="btn btn-primary">delete Card</button>
</form>
--}}

@endforeach

 

{{--
<pre>
bin=555555, 
expirationMonth=12, 
expirationYear=2025, 
last4=4444, 
cardType=MasterCard, 
cardholderName=BoB Seeker, 
commercial=Unknown, 
countryOfIssuance=Unknown, 
createdAt=Monday, 
06-May-24 23:22:01 UTC, 
customerId=40885802583, 
customerGlobalId=Y3VzdG9tZXJfNDA4ODU4MDI1ODM, 
customerLocation=US, 
debit=Unknown, 
default=, 
durbinRegulated=Unknown, 
expired=, 
globalId=cGF5bWVudG1ldGhvZF9jY184NzZkNjV3Nw, 
healthcare=Unknown, 
imageUrl=https://assets.braintreegateway.com/payment_method_logo/mastercard.png?environment=sandbox, 
issuingBank=Unknown, 
payroll=Unknown, 
prepaid=Unknown, 
productId=Unknown, 
subscriptions=, 
token=876d65w7, 
uniqueNumberIdentifier=11377884ef231b7df2e3715d4402f601, 
updatedAt=Monday, 
06-May-24 23:22:01 UTC, 
venmoSdk=, 
verifications=, 
isNetworkTokenized=, 
billingAddress=, 
graphQLId=cGF5bWVudG1ldGhvZF9jY184NzZkNjV3Nw, 
expirationDate=12/2025, 
maskedNumber=555555******4444
</pre>
--}}
                    {{--$customer--}}</p>
                    


                    <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                    <p>&nbsp;</p><p>
                       
{{--
                    </p><p>&nbsp;</p>


                    <p><HR>Not Public Info Only System for testing<BR><BR>

Token : {{$user->braintree}} <BR><BR>

{{$customer}}
                    </p>
                    --}}
                    <p></p> 




                </div>
            </div>
        </div>
    </div>
</x-app-layout>
