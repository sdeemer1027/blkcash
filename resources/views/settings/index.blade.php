<x-app-layout>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
{{--
                    you are now using<BR>
                    to Send :{{$user->snd}}
                    @foreach($files as $img)
                  @if($img->id == $user->snd)
                    <img src="{{ asset($img->path . '/' . $img->name) }}" alt="{{ $img->name }}" width="100px">
                        @endif
                    @endforeach
                    <BR>
                    To Receive : {{$user->rcv}}
                    @foreach($files as $img)
                        @if($img->id == $user->rcv)
                            <img src="{{ asset($img->path . '/' . $img->name) }}" alt="{{ $img->name }}" width="100px">
                        @endif
                    @endforeach
                    <BR>

--}}

                    <table  class="table">
                        <tr>
                            <th>file</th>
                            <th>send $</th>
                            <th>Receive $</th>
                        </tr>
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
                                        <img src="{{ asset($img->path . '/' . $img->name) }}" alt="{{ $img->name }}" width="100px">

                                    @else


                                    <form action="{{ route('settings.update', ['id' => $user->id]) }}" method="POST">
                                    @csrf
                                                <input name="snd" type="hidden" value="{{ $img->id }}" {{ $img->id == $user->snd ? 'selected' : '' }} />
                                          <div>
                                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">send with</button>
                                        </div>
                                    </form>
                                        @endif

                                </td>
                                <td>

                                    @if($img->id == $user->rcv)
                                        <img src="{{ asset($img->path . '/' . $img->name) }}" alt="{{ $img->name }}" width="100px">

                                    @else

                                    <form action="{{ route('settings.update', ['id' => $user->id]) }}" method="POST">
                                        @csrf
                                        <input name="rcv" type="hidden" value="{{ $img->id }}" {{ $img->id == $user->snd ? 'selected' : '' }} />
                                        <div>
                                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">receive with</button>
                                        </div>
                                    </form>
@endif
                                </td>
                            </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
