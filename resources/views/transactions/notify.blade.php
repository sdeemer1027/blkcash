<x-app-layout>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<a href="{{route('settings.index')}}" >view/update notification image</a>
<hr>
{{-- View open Requested
<hr> --}}
<a href="{{route('transactions.index')}}">View all Transactions</a>
                    <hr>
                    <a href="{{route('privacy.show')}}">Privacy Policy</a>
                    <hr>
                    <a href="{{route('terms.show')}}">Terms and Agreement</a>
                    <hr>
                    <a href="{{route('faq.index')}}">View all FAQs</a>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
