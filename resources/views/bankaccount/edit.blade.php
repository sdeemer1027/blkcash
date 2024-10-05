<x-app-layout>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


                    <BR>

                    <div class="container">
                        <h2>Create Bank Account</h2>
                        <form action="{{ route('bankaccount.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Account Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$bankaccount->name}}" required>
                            </div>
                            <div class="form-group">
                                <label for="routing">Routing Number</label>
                                <input type="text" class="form-control" id="routing" name="routing" value="{{$bankaccount->routing}}" required>
                            </div>
                            <div class="form-group">
                                <label for="account">Account Number</label>
                                <input type="text" class="form-control" id="account" name="account" value="{{$bankaccount->account}}" required>
                            </div>
                            <div class="form-group">
                                <label for="cash">Cash</label>
                                <input type="number" step="0.01" class="form-control" id="cash" name="cash" value="{{$bankaccount->cash}}" required>
                            </div><BR>
                            <input type="hidden" class="form-control" id="id" name="id" value="{{$bankaccount->id}}">
                            <button type="submit" class="btn btn-primary">Update Account</button>
                        </form>
                    </div>

{{--$bankaccount--}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
