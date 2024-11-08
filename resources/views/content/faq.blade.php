
<x-app-layout>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">





                    <h1>Frequently Asked Questions</h1>
@foreach($faqs as $faq)
    <h3>{{ $faq->title }}</h3>
    <p>{!! $faq->content !!}</p>
@endforeach













                <!-- Bootstrap CSS -->
                    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

                    <!-- Bootstrap JavaScript Bundle (includes Popper.js) -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
