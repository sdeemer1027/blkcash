<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <img src="logo.png" width="75px">
        </h2>
    </x-slot>
--}}
{{-- 
<div  style="display: flex; justify-content: center;  margin-top: -50px;">
<img src="logo.png" width="75px" >
</div>
--}}
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  
                    <p>This is your dashboard</p>
                    <p>I will be replacing this by redirecting you to the home page</p>
                    <p>&nbsp;</p><p>
                        Click the home button icon on the bottom to get there now or you can 
                        <BR><a href="{{route('home')}}" class="btn btn-small btn-primary">Click here</a>

                    </p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                    <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p> {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
