<x-app-layout>
    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                    <div class="flex justify-center" >
                    <div class="container">
                        <div class="d-flex justify-content-center align-items-center  flex-column">
                            {{$user}}
                            {{--$transactions--}}

                            @if(in_array(Auth::user()->id, [1, 2, 3]) && request()->is('admin*'))
                                <div class="shrink-0 flex items-center">Cash Available: <b><span style="color:#0da10d">${{$adminbankaccount->cash}}</span></b>
                                </div>
                                <div class="shrink-0 flex items-center">
                                    <a href="{{route('admin.index')}}"> <i class="fa fa-university" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                    <a href="{{route('admin.users')}}"> <i class="fa fa-user" aria-hidden="true"></i> ({{$users->count()}})</a>
                                </div>
                                <div class="shrink-0 flex items-center">

                                    <table  class="table" >
                                        <tr>
                                            <th>UserName</th>
                                            <th>Email</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>

                                            {{--$deposit--}}
                                            <tr class="table-success">
                                                <td>
                                                    {{$user->name}}
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td> </td>
                                                <td> </td>
                                                <td></td>
                                            </tr>


                                        @endforeach

                                    </table>




                                </div>




                            @else

                            @endif


                        </div>
                    </div></div>
                </div>
            </div>

        </div>
    </div>
    </div>
</x-app-layout>

