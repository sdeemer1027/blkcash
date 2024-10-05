<x-app-layout>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                    Balance Wallet: {{$user->wallet}}  <BR>
                    {{--
                    <a href="{{route('braintree.form')}}">GOTO Bank</a>
                    --}}
                    <BR>
                    <a href="{{route('bankaccount.index')}}">GOTO Bank Details</a>
<BR><BR>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
