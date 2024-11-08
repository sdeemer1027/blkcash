
<x-app-layout>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                    <a href="{{route('home')}}">Home</a> -> <a href="{{route('content.show')}}">Content</a>



                @foreach($content as $text)
                        <h3><a href="{{route('content.edit',$text->id)}}">{{ $text->title }}</a></h3>
                    {{--
    <p>{!! $text->content !!}</p>
              --}}
@endforeach








                </div>

            </div>
        </div>
    </div>
</x-app-layout>
