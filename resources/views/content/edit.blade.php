
<x-app-layout>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                    <a href="{{route('home')}}">Home</a> -> <a href="{{route('content.show')}}">Content</a>


                    <form action="{{ route('content.update', $content->id) }}" method="POST">
    @csrf
    <label for="title">Title</label>
    <input type="text" name="title" value="{{ $content->title }}">

    <label for="content">Content</label>
    <textarea name="content" rows="10">{{ $content->content }}</textarea>

    <button type="submit">Update</button>
</form>





                </div>

            </div>
        </div>
    </div>
</x-app-layout>
