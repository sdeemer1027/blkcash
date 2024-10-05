<x-app-layout>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">




{{-- --}}
Balance in your Bank: ${{$bankaccount->cash}}

                    <br>
Balance in your Wallet: ${{ auth()->user()->wallet }}<BR>
                    Current Bank: {{$bankaccount->name}}   {{-- [<a href="{{route('bankaccount.createnew')}}">Add New</a>] --}}

                    <BR>

<br>


                    {{--$bankaccount--}}




                                       <table class="table">
                                           <thead>
                                           <tr>
                                               <th>Name</th>
                                               <th>routing</th>
                                               <th>account</th>
                                                <th>action</th>
                                           </tr>
                                           </thead>
                                           <tbody>
                                               <tr>
                                                   <td>
                                                    {{$bankaccount->name}}
                                </td>
                                <td>
                                 {{$bankaccount->routing}}
                                </td>
                                <td>
                                 {{$bankaccount->account}}
                                </td>
                                                   <td><a href="{{route('bankaccount.edit')}}"><i class="fa fa-edit" aria-hidden="true"></i>edit</a></td>
                            </tr>
                        </tbody>
                    </table>





 <h3>Transfer Funds to your Bank</h3>
    <p>Your Wallet Balance: ${{ auth()->user()->wallet }}</p>

    <form action="{{ route('bankaccount.transfer') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="amount">Transfer Amount</label>
            <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
        </div>
        <button type="submit" class="btn btn-primary">Transfer to Bank Account</button>
    </form>
<BR>

<HR>
<h3>Add Funds to Wallet</h3>
<p>Bank Account Balance: ${{ $bankaccount->cash }}</p>

<form action="{{ route('bankaccount.transferToWallet') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="amountToWallet">Transfer Amount</label>
        <input type="number" step="0.01" class="form-control" id="amountToWallet" name="amountToWallet" required>
    </div>
    <button type="submit" class="btn btn-secondary">Add to Wallet</button>
</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
