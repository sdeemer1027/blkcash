<x-app-layout>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                    <div class="container">
                    <div class="d-flex justify-content-center align-items-center  flex-column">
                        {{--$adminbankaccount--}}
                        {{--$transactions--}}
                        @if(in_array(Auth::user()->id, [1, 2, 3]) && request()->is('admin*'))
                            <div class="shrink-0 flex items-center">Cash Available: <b><span style="color:#0da10d">${{$adminbankaccount->cash}}</span></b>
                            </div>
                            <div class="shrink-0 flex items-center">
                                <a href="{{route('admin.index')}}"> <i class="fa fa-university" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                <a href="{{route('admin.users')}}"> <i class="fa fa-user" aria-hidden="true"></i></a>
                            </div>
                            <div class="shrink-0 flex items-center">

                                <table  class="table" >
                                    <tr>
                                        <th>UserName</th>
                                        <th>Requested</th>
                                        <th>Fee</th>
                                        <th>Transfered</th>
                                        <th>Type</th>
                                        <th>Date</th>
                                    </tr>
                                    @foreach($transactions as $transaction)
                                        {{--$deposit--}}
                                        <tr class="table-success">
                                            <td>
                                                {{$transaction->user->name}}
                                            </td>
                                            <td>{{$transaction->fee + $transaction->amount}}</td>
                                            <td>{{$transaction->fee}} </td>
                                            <td> {{$transaction->amount}}</td>
                                            <td> {{$transaction->transaction_type}}</td>
                                            <td>{{$transaction->created_at->format('m/d/y')}}</td>
                                        </tr>


                                    @endforeach

                                </table>




                            </div>

                            {{$transactions->links()}}


                        @else

                        @endif


                    </div></div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

