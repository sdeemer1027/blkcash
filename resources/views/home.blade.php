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



.icon-container {
    margin-top: 20px;
}

.icon {
    text-align: center;
}

.icon-circle {
    width: 80px;
    height: 75px;
    line-height: 80px;
    border-radius: 25%;
}

.icon-circle i {
    font-size: 30px;
    color: white;
}

.icon-text {
    margin-top: 5px;
    font-size: 14px;
}


.rounded-circle {
    border-radius: 20%!important;
}
</style>

<a href="/credit-cards/add" style="float: right;">Add Card</a><BR>
<div class="slide-container">
 <div class="slide">
     @if(!$buser->braintree) 

  @foreach($cc as $credit)
    <div class="box-credit">
            <div class="box-crdits">
              <img credit-logo src="logo.png" />
              <div class="top-cips">
                <img src="img/chip.png" class="chip-s" />
                <img src="img/visa.png" class="visa-s" />
              </div>
              <div class="accnt-nusm tst-lta">
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
@else


@foreach($customer['creditCards'] as $credit)

<div class="box-credit">
            <div class="box-crdits">
              <img credit-logo src="logo.png" />
              <div class="top-cips">
                <img src="img/chip.png" class="chip-s" />
                <img src="{{$credit->imageUrl}}" class="visa-s" />
                <!--img src="img/visa.png" class="visa-s" /-->
              </div>
              <div class="accnt-nusm tst-lta">
                <span> **** </span>
                <span> **** </span>
                <span> **** </span>
                <span>
                  {{$credit->last4}}
                </span>
              </div>
              <div class="tst-lta">
                <p>Name <span>  
                    @if(!$credit->cardholderName)
                      {{$customer['firstName']}} {{$customer['lastName']}}
                    @else
                      {{$credit->cardholderName}} 
                    @endif
                   </span>
                </p>
                <p>
                  Exp Date <span> {{$credit->expirationYear}}</span>
                </p>
              </div>
            </div>
   </div>
  @endforeach
  @endif

  
 </div>
  
</div>
{{--$credit}}
<HR>
{{$customer--}}

{{--$buser--}}
<hr>



<!-- Home page navigations   -->

<div class="icon-container d-flex justify-content-around">
    <div class="icon">
        <div class="icon-circle bg-success rounded-circle">
            <i class="fa fa-university" aria-hidden="true"></i>            
        </div>
        <div class="icon-text">Transactions</div>
    </div>

    <div class="icon">        
        <a href="{{ route('payments.page') }}">
        <div class="icon-circle bg-success rounded-circle">         
         <i class="fa fa-forward" aria-hidden="true"></i>
          {{-- <i class="fas fa-dollar" aria-hidden="true"></i>--}}
          {{-- <i class="fas fa-user"><BR><span class="icon-text">Send</span></i> --}}
        </div>
        </a>
        <div class="icon-text">Send/Request</div>
    </div>

    <div class="icon">
        <a href="{{ route('wallet.index') }}">
        <div class="icon-circle bg-success rounded-circle">
            <i class="fa fa-suitcase" aria-hidden="true"></i>
          
            {{-- <i class="fas fa-envelope"></i> <i class="fa fa-money" aria-hidden="true"></i> --}}
        </div>
        </a>
        <div class="icon-text">Wallet</div>
    </div>
    <div class="icon">
        <div class="icon-circle bg-success rounded-circle">
            <i class="fas fa-cog"></i>
        </div>
        <div class="icon-text">Settings</div>
    </div>
</div>



<BR><BR>

<!-- END Home page navigations   -->








{{-- 
New Transaction <BR>
<a href="{{ route('payments.page') }}">Go to Payment Page</a>
<hr>
--}}
@if(!$requested == null) 
<b>Who You Sent a Request To:</b><BR>
<div class="flex">

 <div class="table-responsive">
<table  class="table" width="100%">
    <tr>
        <td>Email</td>
        <td>Amount</td>
        <td colspan="2">Actions</td>
    </tr>
  @foreach($requested as $newrequest)
  <tr>
    <td>{{$newrequest->RequestfromUser->email}}</td>
    <td>${{$newrequest->amount}}</td>
    <td><button href="#" class="btn-sm btn-success">Reminder</button></td>
    <td><button href="#" class="btn-sm btn-danger">Cancel</button></td>
  </tr>
  @endforeach
</table>
</div>

</div>
@endif


@if(!empty($requestedfrom))

<HR>
<b>Who Sent You a Request:</b><BR>
<div class="flex">

<div class="table-responsive">
<table  class="table" width="100%">
    <tr>
        <td>Email</td>
        <td>Amount</td>
        <td colspan="2">Actions</td>
    </tr>
  @foreach($requestedfrom as $newrequestedfrom)
  <tr>
    <td>{{$newrequestedfrom->Requestuser->firstname}}</td>
    <td>${{$newrequestedfrom->amount}}</td>
    <td>
        <form action="{{ route('wallet.approve-reject') }}" method="POST">
          @csrf
        <input type="hidden" name="action" value="approve">
        <input type="hidden" value="{{$newrequestedfrom->id}}" name="tid">
        <input type="hidden" name="who" value="{{$newrequestedfrom->Requestuser->id}}">
        <input type="hidden" name="amount" value="{{$newrequestedfrom->amount}}">
        <button type="submit"  class="btn-sm btn-success">Approve</button>
        </form>
    </td>
    <td>
        <form action="{{ route('wallet.approve-reject') }}" method="POST">
          @csrf
        <input type="hidden" name="action" value="reject">
        <input type="hidden" value="{{$newrequestedfrom->id}}" name="tid">
        <input type="hidden" name="who" value="{{$newrequestedfrom->id}}">
        <input type="hidden" name="amount" value="{{$newrequestedfrom->amount}}">
        <button type="submit" class="btn-sm btn-danger">Reject</button>
        </form>
    </td>
  </tr>
  @endforeach
</table>
</div>

</div>
<hr>
@endif



 <b>Transactions </b>: <BR>
<table  class="table" width="100%">
  <tr>
    <td></td>
    <td><b>Collected </b></td>
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
    <td></td>
</tr>

@endforeach
<tr>
    <td></td>
    <td><b>Paid</b></td>
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
    <td></td>
</tr>
@endforeach
</table>



<hr>

                    <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                    <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>
  

                    </p>
                 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
