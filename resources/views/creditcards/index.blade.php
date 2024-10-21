<x-app-layout>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                    <a href="{{route('home')}}">Home</a> -> <a href="{{route('wallet.index')}}">Wallet</a> -> <a href="{{route('bankaccount.index')}}">Bank Details</a> -> <b>Credit Card Details</b>
                    {{--
                                       <style>

                                           .icon-container {
                                               display: flex;
                                               justify-content: center;
                                               align-items: center;
                                               /*  height: 100vh;*/ /* Full viewport height for vertical centering */
                                               flex-direction: column; /* Stack icon and text vertically */
                                               /*   margin-top: 20px; */
                                           }

                                           .icon {
                                               text-align: center;
                                           }

                                           .icon-circle {
                                               width: 80px;
                                               height: 75px;
                                               display: flex; /* Align the image inside the circle */
                                               justify-content: center;
                                               align-items: center;
                                               border-radius: 25%;
                                           }
                                           .icon-circle img {
                                               width: 100%; /* Ensure the image fits inside the circle */
                                               height: 100%;
                                               object-fit: cover; /* Maintain aspect ratio */
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
                                       <div class="icon-container">
                                           <div class="icon">
                                               <a href="{{ route('wallet.index') }}">
                                                   <div class="icon-circle bg-success rounded-circle">
                                                       <img src="/img/IMG_8500cp.jpg">
                                                   </div>
                                               </a>
                                               <div class="icon-text">Your Wallet</div>
                                           </div>
                                       </div>


                   --}}
                    <br>

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
                            width: 250px; /* Set a fixed width for each credit card box */
                            margin-right: 20px; /* Add margin between cards */
                        }
                        .box-crdits {
                            background:#3f4949;
                            /*
                             -image: var(--ion-color-gradient2);
                            */
                            width: 100%;
                            padding: 25px;
                            margin-bottom: 10px;
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
                             background: url('/img/credit-card-pattern.png') no-repeat center center/cover;
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


                    <h3>Your Credit Cards</h3>
{{--$user->braintree}}<br>
                    {{$user--}}

                    <table class="table">
                        <thead>
                        <tr>
                            <th>Card</th>
                            <th><a href="/credit-cards/add" class="btn btn-primary btn-sm" style="float: right;width:95px;">Add Card</a></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($customer->creditCards as $creditCard)
                        <tr>
                            <td  style="text-align: center;">
                                <div class="box-credit">
                                    <div class="box-crdits">
                                        <img credit-logo src="/logo.png" />

                                        <div class="top-cips">
                                            <img src="/img/chip.png" class="chip-s" />
                                            <img src="/img/{{$creditCard->cardType}}.png" class="visa-s" />
                                        </div>
                                        <div class="accnt-nusm tst-lta">
                                            <span> **** </span>
                                            <span> **** </span>
                                            <span> **** </span>
                                            <span> {{$creditCard->last4}} </span>
                                        </div>
                                        <div class="tst-lta">
                                            <p>Name <span> {{$creditCard->cardholderName}}</span></p>
                                            <p>
                                                Exp Date <span> {{$creditCard->expirationMonth}}/{{$creditCard->expirationYear}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                {{-- $creditCard->cardholderName ?: 'No Cardholder Name Provided' --}}
                            </td>

                            <td  style="float: right;">
<BR>
                                {{--
                                                                <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                                }}<br>
                                {{$creditCard->token--}}

                                <form action="{{ route('credit-cards.delete', $creditCard->token) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" style=" width:95px;" onclick="return confirm('Are you sure you want to delete this card?')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                </form>
                                <BR><BR>
                                <a href="#" class="btn btn-warning btn-sm" style=" width:95px;"><i class="fa fa-edit" aria-hidden="true"></i> edit</a>

                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>


{{--<HR>
                    expirationMonth=10,
                    expirationYear=2028,
                    last4=4444,
                    cardType=MasterCard,
                    cardholderName=ssssss
{{$customer--}}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

