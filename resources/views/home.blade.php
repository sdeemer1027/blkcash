<x-app-layout>   
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
.slide-container {
    overflow-x: auto; /* Enable horizontal scrolling */
    white-space: nowrap; /* Prevent cards from wrapping to next line */
}

.slide {
    display: inline-block;
}

.box-credit {
    display: inline-block;
    width: 300px; /* Set a fixed width for each credit card box */
    margin-right: 20px; /* Add margin between cards */
}
    .box-crdits {
        background:#3f4949;
        /*
         -image: var(--ion-color-gradient2);
        */
        width: 100%;
        padding: 25px;
        margin-bottom: 45px;
        position: relative;
        z-index: 1;
        overflow: hidden;   
        border-radius: 12px;
        box-shadow: 1px 4px 10px rgba(0, 0, 0, 0.07);
        margin-top: 10px;
        .top-cips {
            display: flex;
            align-items: center;
            justify-content: space-between;
            img.chip-s {
                height: 35px;
            }
            img.visa-s {
                height: 20px;
            }
        }
        [credit-logo] 
        {
            position: absolute;
            top: 0px;
            bottom: 0px;
            left: 0px;
            right: 0px;
            margin: auto;
            width: 130px;
            z-index: -1;
            opacity: 1;
        }
        &:before 
        {
            position: absolute;
            content: "";
            top: 0px;
            bottom: 0px;
            left: 0px;
            right: 0px;
            background: url(img/credit-card-pattern.png) no-repeat center center/cover;
            opacity: 0.08;
            z-index:-1;
        }       
    }


    .tst-lta {
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: space-between;
        text-align: initial;
        p {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 0px;
            span {
                display: block;
                font-size: 14px;
                font-weight: 500;
                letter-spacing: 2px;
            }
        }
    }
</style>

<a href="#" style="float: right;">Add Card</a><BR>
<div class="slide-container">
<div class="slide">
@foreach($cc as $credit)

  <div class="box-credit">

            <div class="box-crdits">
              <img credit-logo src="logo.png" />
              <div class="top-cips">
                <img src="img/chip.png" class="chip-s" />
                <img src="img/visa.png" class="visa-s" />
              </div>
              <div class="accnt-nusm">
                <span> **** </span>
                <span> **** </span>
                <span> **** </span>
                <span>
                  {{$credit->braintree_token}}
                </span>
              </div>
              <div class="tst-lta">
                <p>Name <span> {{$credit->name}} </span></p>
                <p>
                  Exp Date <span> {{$credit->expires}}</span>
                </p>
              </div>
            </div>
</div>


@endforeach
</div>
</div>


<hr>
{{--$deposits--}}
<BR>
{{--$deposits--}} <b>Transactions </b>: <BR>
<table  class="table" width="100%">
  <tr>
    <td></td>
    <td><b>Collected </b></td>
    <td></td>
</tr>
@foreach($deposits as $deposit)
<tr class="table-success">
    <td>
    @if ($deposit->fromUser->profile_picture)
        <img src="{{ asset('storage/' . $deposit->fromUser->profile_picture) }}" alt="Profile Picture" width="25px" style="border-radius: 30%;">
    @else
        <img src="logo.png" alt="Default Profile Picture" width="40px" style="border-radius: 30%;">
    @endif
    </td>
    <td>{{$deposit->fromUser->name}} </td>
    <td> {{$deposit->amount}}</td>
</tr>

@endforeach
<tr>
    <td></td>
    <td><b>Paid</b></td>
    <td></td>
</tr>
@foreach($withdraws as $withdraw)
<tr class="table-danger">
    <td>
    @if ($withdraw->user['profile_picture'])
        <img src="{{ asset('storage/' . $withdraw->user['profile_picture']) }}" alt="Profile Picture" width="25px" style="border-radius: 30%;">
    @else
        <img src="logo.png" alt="Default Profile Picture" width="40px" style="border-radius: 30%;">
    @endif
    </td>
    <td>{{$withdraw->user_id}} {{$withdraw->user['name']}}</td>
    <td> {{$withdraw->amount}}</td>
</tr>
@endforeach
</table>



<hr>
{{--$withdraws--}}
                    <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                    <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>
                        
@foreach ($deposits as $transaction)
    @if ($transaction && isset($transaction['amount']) && isset($transaction['from_user']) && isset($transaction['from_user']['name']))
        <div>
            <p>Amount: ${{ $transaction['amount'] }}</p>
            <p>Name: {{ $transaction['from_user']['name'] }}</p>
        </div>
    @endif
@endforeach

                    </p>
                    <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>

{{--$deposits--}} Collected : <BR>
@foreach($deposits as $deposit)
{{$deposit->id}} {{$deposit->name}} : {{$deposit->amount}}<br>
@endforeach







@foreach ($deposits as $transaction)
    @if ($transaction && $transaction->amount && $transaction->fromUser && $transaction->fromUser->firstname)
        <div>
            <p>Firstname: {{ $transaction->fromUser->firstname }}</p>
            <p>Amount: ${{ $transaction->amount }}</p>
        </div>
    @endif
@endforeach



                    </p> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
