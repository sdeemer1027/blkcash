
<x-app-layout>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                    <a href="{{route('home')}}">Home</a> -> <a href="{{route('content.show')}}">Content</a>
                    <!-- In your Blade template file -->



                    <script src="/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
                    <script>
                        tinymce.init({
                            selector: '#editor',
                            plugins: 'lists link image table code',
                            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | outdent indent',
                            menubar: false
                        });
                    </script>


                    <form action="{{ route('content.update', $content->id) }}" method="POST">
    @csrf
    <label for="title">Title</label>
    <input type="text" name="title" value="{{ $content->title }}"><BR>

    <label for="content">Content</label><BR>
    <textarea id="editor" name="content" rows="10">{{ $content->content }}</textarea>

    <button type="submit" class="btn btn-primary">Update</button>
</form>





                </div>

            </div>
        </div>
    </div>
</x-app-layout>
