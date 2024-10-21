<x-app-layout>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

                    Balance Wallet: {{$user->wallet}}  <BR>
                    {{--
                    <a href="{{route('braintree.form')}}">GOTO Bank</a>
                    --}}
                    <BR>
                    <table width="100%">
                        <tr>
                            <td><a href="{{route('bankaccount.index')}}" class="btn btn-primary btn-sm">Bank Details</a></td>
                            <td><a href="{{route('credit-cards.details')}}" class="btn btn-primary btn-sm">CreditCard Details</a></td>
                        </tr>
                        <tr>
                            <td>
                                <li>Add your bank</li>
                                <li>Edit your bank</li>
                                <li>Tranfere to your bank</li>
                                <li>Add Money to your wallet</li>
{{--
                                Bank details holds where you can add your bank information if you do not have any yet
                            Once it is confirmed you will be able to Add money to your wallet or
                            tranfere money from your wallet to your bank--}}</td>
                            <td>
                                <li>Add Credit Card</li>
                                <li>Edit Credit Card</li>
                                <li>Delete Credit Card</li>

                                {{--
                                Credit card details is where you can add new credit cards delete current cards
                                as well as edit the credit card details when and where needed
--}}
                            </td>
                        </tr>
                    </table>

                    &nbsp;&nbsp;&nbsp;

<BR><BR>

                </div>
            </div>
        </div>
    </div>
    {{$totalAmount}}
</x-app-layout>
