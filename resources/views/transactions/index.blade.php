<x-app-layout>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-3 text-gray-900">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                    <a href="{{route('home')}}">Home</a> -> <b>Transactions</b> -> <a href="#">Reports</a>
                    <style>
                        .whide-row {
                            display: none;
                        }
                        .dhide-row {
                            display: none;
                        }
                    </style>
                    <h3>Activity <!-- for the last 31 days --></h3>
                    From Wallet: {{--$withdraws--}}<BR>
                    <table class="table" width="100%">
                        <tr>
                            <td></td>
                            <td><b>You Paid</b></td>
                            <td></td>
                            <td style="float:right;">
                                <button class="btn btn-danger btn-sm" id="toggleButton" onclick="toggleRows()">Hide Rows</button>

{{--                                <button class="btn btn-danger btn-sm" id="toggleButton" onclick="toggleRows()">Show/Hide Rows</button>--}}
                            </td>
                        </tr>
                        @foreach($withdraws as $withdraw)
                            <tr class="table-danger whide-row" id="whide">
                                <td>
                                    @if ($withdraw->user['profile_picture'])
                                        <img src="{{ asset('storage/' . $withdraw->user['profile_picture']) }}" alt="Profile Picture" width="20px" style="border-radius: 30%;">
                                    @else
                                        <img src="logo.png" alt="Default Profile Picture" width="20px" style="border-radius: 30%;">
                                    @endif
                                </td>
                                <td>{{$withdraw->user['name']}}</td>
                                <td> {{$withdraw->amount}}</td>
                                <td>{{--$withdraw->updated_at--}}{{-- Carbon\Carbon::parse($withdraw->updated_at)->format('F - d/y') --}}
                                    {{$withdraw->updated_at->format('m/d/y')}}</td>
                            </tr>
                            @if($withdraw && !empty($withdraw->notes))
                                <tr class="table-secondary whide-row">
                                    <td colspan="4" style="text-align:center;font-size: small">{{$withdraw->notes}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr class="table-primary">
                            <td class="table-primary">&nbsp;</td>
                            <td class="table-primary">Total</td>
                            <td class="table-primary">&nbsp;</td>
                            <td class="table-primary text-end"><b>{{$totalAmount}}</b></td>
                        </tr>
                    </table>
{{--$withdraws->links()--}}
                    To Wallet: {{--$deposits--}}<BR>

                    <table  class="table" width="100%">
                        <tr>
                            <td></td>
                            <td><b>You Collected </b></td>
                            <td></td>
                            <td style="float:right;">
                                <button class="btn btn-danger btn-sm" id="toggleButton2" onclick="toggleRows2()">Hide Rows</button>
                            </td>
                        </tr>
                        @foreach($deposits as $deposit)
                            <tr class="table-success dhide-row" id="dhide">
                                <td>
                                    @if ($deposit->fromUser->profile_picture)
                                        <img src="{{ asset('storage/' . $deposit->fromUser->profile_picture) }}" alt="Profile Picture" width="20px" style="border-radius: 30%;">
                                    @else
                                        <img src="logo.png" alt="Default Profile Picture" width="20px" style="border-radius: 30%;">
                                    @endif
                                </td>
                                <td>{{$deposit->fromUser->name}} </td>
                                <td> {{$deposit->amount}}</td>
                                <td>{{--$deposit->updated_at--}}{{-- Carbon\Carbon::parse($deposit->updated_at)->format('F - d/y') --}}
                                    {{$deposit->updated_at->format('m/d/y')}}</td>
                            </tr>
                            @if($deposit && !empty($deposit->notes))
                                <tr class="table-secondary dhide-row">
                                    <td colspan="4" style="text-align:center;font-size: small">{{$deposit->notes}}</td>
                                </tr>
                            @endif
                        @endforeach

                        <tr class="table-primary">
                            <td class="table-primary">&nbsp;</td>
                            <td class="table-primary">Total</td>
                            <td class="table-primary">&nbsp;</td>
                            <td class="table-primary text-end"><b>{{$totalDeposits}}</b></td>
                        </tr>

                    </table>
                    {{--$deposits->links()--}}

<h3>Bank Activity</h3>
{{--$tansactions--}}
                    <table  class="table" width="100%">
                        <tr>
                            {{--
                            <th>UserName</th>
                            --}}
                            <th>Requested</th>
                            <th>Fee</th>
                            <th>Transfered</th>
                            <th>Type</th>
                            <th>Date</th>
                        </tr>
                        @foreach($tansactions as $transaction)
                            {{--$deposit--}}
                            <tr class="table-success">
                               {{-- <td>
                                    {{$transaction->user->name}}
                                </td> --}}
                                <td>{{$transaction->fee + $transaction->amount}}</td>
                                <td>{{$transaction->fee}} </td>
                                <td> {{$transaction->amount}}</td>
                                <td> @if($transaction->transaction_type == 'Deposit')
                                        <b>{{$transaction->transaction_type}}</b>
                                    @else
                                        {{$transaction->transaction_type}}
                                    @endif
                                </td>
                                <td>{{$transaction->created_at->format('m/d/y')}}</td>
                            </tr>


                        @endforeach
                        <tr class="table-primary">
                            <th>Total</th>
                            <th >${{$totalfee}}</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </table>



                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleRows() {
            // Select all rows with class="whide-row" and toggle their visibility
            var rows = document.querySelectorAll('.whide-row');
            var button = document.getElementById('toggleButton'); // Select the button to change its text
            var allHidden = true; // Flag to check if all rows are hidden

            rows.forEach(function(row) {
                if (row.style.display === "none" || row.style.display === "") {
                    row.style.display = "table-row"; // Show the row
                    allHidden = false; // If at least one row is shown, mark as not hidden
                } else {
                    row.style.display = "none"; // Hide the row
                }
            });

            // Optional: Update button text based on visibility
            if (allHidden) {
                button.textContent = "Show Rows"; // All are hidden, so text prompts to show
            } else {
                button.textContent = "Hide Rows"; // Some are visible, so text prompts to hide
            }
        }
/*
        function toggleRows2() {
            // Select all rows with id="whide" or class="whide-row" and toggle their visibility
            var rows = document.querySelectorAll('.dhide-row');
            rows.forEach(function(row) {
                row.style.display = (row.style.display === "none") ? "table-row" : "none";
            });
        }
        */
        function toggleRows2() {
            // Select all rows with class="whide-row" and toggle their visibility
            var rows = document.querySelectorAll('.dhide-row');
            var button = document.getElementById('toggleButton2'); // Select the button to change its text
            var allHidden = true; // Flag to check if all rows are hidden

            rows.forEach(function(row) {
                if (row.style.display === "none" || row.style.display === "") {
                    row.style.display = "table-row"; // Show the row
                    allHidden = false; // If at least one row is shown, mark as not hidden
                } else {
                    row.style.display = "none"; // Hide the row
                }
            });

            // Optional: Update button text based on visibility
            if (allHidden) {
                button.textContent = "Show Rows"; // All are hidden, so text prompts to show
            } else {
                button.textContent = "Hide Rows"; // Some are visible, so text prompts to hide
            }
        }







    </script>
</x-app-layout>
