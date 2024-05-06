<x-app-layout>   
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <!-- Button using Bootstrap's styles -->
                <a href="{{ route('profile.edit') }}" class="btn btn-primary" style="float: right;">Edit&nbsp;&nbsp;</a><br>
                <div class="p-6 text-gray-900">




          <span>Name</span><span style="float: right;">{{$user->name}}</span><hr>
           <span>First Name</span><span style="float: right;">{{$user->firstname}}</span><hr>
            <span>Last Name</span><span style="float: right;">{{$user->lastname}}</span><hr>
<span>Email</span><span style="float: right;">{{$user->email}}</span><hr>
<span>Phone</span><span style="float: right;">{{$user->phone}}</span><hr>
<span>Address</span><span style="float: right;">{{$user->address}}</span><hr>
<span>City</span><span style="float: right;">{{$user->city}}</span><hr>
<span>State</span><span style="float: right;">{{$user->state}}</span><hr>
<span>Zip</span><span style="float: right;">{{$user->zip}}</span><hr>

                    <p></p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                    <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                    <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>


                    <p><HR>Not Public Info Only System for testing<BR><BR>

Token : {{$user->braintree}} <BR>
                    </p>
                    <p></p> 

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
