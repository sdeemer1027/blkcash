<x-app-layout>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                    Balance Wallet: {{$user->wallet}}  <BR>
                    <a href="{{route('braintree.form')}}">GOTO Bank</a>

<BR><BR>
                    {{--$withdraws-- }}

Withdraw :<BR>
<table class="table" width="100%">
<tr>
    <td></td>
    <td><b>You Paid</b></td>
    <td></td>
    <td></td>
</tr>
@foreach($withdraws as $withdraw)

<tr class="table-danger">
    <td>
    @if ($withdraw->user['profile_picture'])
        <img src="{{ asset('storage/' . $withdraw->user['profile_picture']) }}" alt="Profile Picture" width="20px" style="border-radius: 30%;">
    @else
        <img src="logo.png" alt="Default Profile Picture" width="20px" style="border-radius: 30%;">
    @endif
    </td>
    <td>{{$withdraw->user['name']}}</td>
    <td> {{$withdraw->amount}}</td>
    <td>{{--$withdraw->updated_at-- }}{{ Carbon\Carbon::parse($withdraw->updated_at)->format('F - d/y') }}</td>
</tr>
@endforeach
<tr class="table-primary">
    <td>Total</td>
    <td></td>
    <td><b>{{$totalAmount}}</b></td>
    <td></td>
</tr>
</table>

Deposit  : {{--$deposits-- }}<BR>

<table  class="table" width="100%">
  <tr>
    <td></td>
    <td><b>You Collected </b></td>
    <td></td>
    <td></td>
</tr>
@foreach($deposits as $deposit)
<tr class="table-success">
    <td>
    @if ($deposit->fromUser->profile_picture)
        <img src="{{ asset('storage/' . $deposit->fromUser->profile_picture) }}" alt="Profile Picture" width="20px" style="border-radius: 30%;">
    @else
        <img src="logo.png" alt="Default Profile Picture" width="20px" style="border-radius: 30%;">
    @endif
    </td>
    <td>{{$deposit->fromUser->name}} </td>
    <td> {{$deposit->amount}}</td>
    <td>{{--$deposit->updated_at-- }}{{ Carbon\Carbon::parse($deposit->updated_at)->format('F - d/y') }}</td>
</tr>

@endforeach
<tr class="table-primary">
    <td>Total</td>
    <td></td>
    <td><b>{{$totalDeposits}}</b></td>
    <td></td>
</tr>

</table>
--}













 {{--$withdraws-- }}
<BR>
---------------------------------------------------------------
<BR>
Deposit  : {{$deposits}}<BR>

Requested : {{$requested}}<BR>
Request From : {{$requestedfrom}}<BR>

<HR>Ignore Me<BR>---------------<BR>
{{$user--}}





                </div>
            </div>
        </div>
    </div>
</x-app-layout>
