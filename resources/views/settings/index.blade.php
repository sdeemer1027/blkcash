<x-app-layout>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



                    <table class="table">
                        <thead>
                        <tr>
                            <th>File</th>
                            <th>Send</th>
                            <th>Receive</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($files as $img)
                            <tr>
                                <td>
                                    @if($img->id == $user->snd || $img->id == $user->rcv)
                                        USED
                                    @else
                                        <img src="{{ asset($img->path . '/' . $img->name) }}" alt="{{ $img->name }}" width="100px">
                                    @endif
                                </td>
                                <td>
                                    @if($img->id == $user->snd)
                                        @if($user->snd)
                                            <img src="{{ asset($img->path . '/' . $img->name) }}" alt="{{ $img->name }}" width="100px">

                                            <form action="{{ route('settings.update', ['id' => $user->id]) }}" method="POST">
                                                @csrf
                                                <input name="snd" type="hidden" value="6" />
                                                <button type="submit" class="btn btn-warning">
                                                    <i class="fas fa-trash"></i>
                                                    Remove</button>
                                            </form>





                                        @endif



                                    @else
                                        <form action="{{ route('settings.update', ['id' => $user->id]) }}" method="POST">
                                            @csrf
                                            <input name="snd" type="hidden" value="{{ $img->id }}" />
                                            <button type="submit" class="btn btn-primary">Set as Send Image</button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    @if($img->id == $user->rcv)

                                        @if($user->rcv)
                                            <img src="{{ asset($img->path . '/' . $img->name) }}" alt="{{ $img->name }}" width="100px">
                                            <form action="{{ route('settings.update', ['id' => $user->id]) }}" method="POST">
                                                @csrf
                                                <input name="rcv" type="hidden" value="6" />
                                                <button type="submit" class="btn btn-warning">
                                                    <i class="fas fa-trash"></i>
                                                        Remove</button>
                                            </form>
                                        @endif


                                    @else
                                        <form action="{{ route('settings.update', ['id' => $user->id]) }}" method="POST">
                                            @csrf
                                            <input name="rcv" type="hidden" value="{{ $img->id }}" />
                                            <button type="submit" class="btn btn-primary">Set as Receive Image</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
