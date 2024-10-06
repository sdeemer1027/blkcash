<x-app-layout>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

                    <h3>Your Credit Cards</h3>
{{$user->braintree}}<br>
                    {{$user}}

                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name on Card</th>
                            <th>account</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>

                            </td>

                            <td>

                            </td>
                            <td>
                                <a href="#"><i class="fa fa-edit" aria-hidden="true"></i>edit</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>

{{$customer}}


                </div>

            </div>
        </div>
    </div>
</x-app-layout>

