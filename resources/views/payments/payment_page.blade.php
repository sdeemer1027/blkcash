<x-app-layout>   
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<form action="{{ route('payments.process') }}" method="POST">
    @csrf
    <label for="amount">Amount:</label>
    <input type="text" id="amount" name="amount" placeholder="Enter amount" required><BR><BR>
<label for="who">Send Request To:</label>
    <input type="text" id="who" name="who" placeholder="Enter email to send" required><BR><BR>
    <button type="submit" name="action" value="pay" class="btn btn-success">Pay</button>
    <button type="submit" name="action" value="request" class="btn btn-danger">Request</button>
</form>

dr.steve@steven.news<BR>
williebabes1@gmail.com<br>
coery@gmail.com<BR>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
