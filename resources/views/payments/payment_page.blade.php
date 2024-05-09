<x-app-layout>   
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="flex justify-center">

{{-- Auth::user()->email --}}



<form action="{{ route('payments.process') }}" method="POST">
    @csrf
    
<label for="who">Send Request To:</label><br>
  {{--  <input type="text" id="who" name="who" placeholder="Enter email to send" required><BR><BR>
--}}

<!-- Input field with id 'search' -->
<input type="text" id="searchInput" placeholder="start typing email">

<BR>

<select  id="who" name="who" required>	
	
</select>




<BR>

<BR>

{{-- 
<label for="amount">Amount:</label><BR>
    <input type="text" id="amount" name="amount" placeholder="Enter amount" required><BR><BR>

--}}
<style>
    /* Basic styling for the calculator */
    .calculator {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 5px;
        max-width: 200px;
    }

    .calculator-button {
        padding: 10px;
        font-size: 18px;
        text-align: center;
        cursor: pointer;
        border: 1px solid #ccc;
        background-color: #f5f5f5;
        transition: background-color 0.3s ease;
    }

    .calculator-button:hover {
        background-color: #e0e0e0;
    }
</style>

<label for="amount">Amount:</label><br>
<input type="text" id="amount" name="amount" placeholder="0" readonly><br>

<div class="calculator">
    <div class="calculator-button" onclick="addToAmount(1)">1</div>
    <div class="calculator-button" onclick="addToAmount(2)">2</div>
    <div class="calculator-button" onclick="addToAmount(3)">3</div>
    {{-- 
    <div class="calculator-button" onclick="backspaceAmount()">⌫</div>
    --}} 
    <div class="calculator-button" onclick="addToAmount(4)">4</div>
    <div class="calculator-button" onclick="addToAmount(5)">5</div>
    <div class="calculator-button" onclick="addToAmount(6)">6</div>
    {{--
    <div class="calculator-button" onclick="clearAmount()">C</div>
    --}}
    <div class="calculator-button" onclick="addToAmount(7)">7</div>
    <div class="calculator-button" onclick="addToAmount(8)">8</div>
    <div class="calculator-button" onclick="addToAmount(9)">9</div>
    <div class="calculator-button" onclick="clearAmount()">C</div>
    <div class="calculator-button" onclick="addToAmount(0)">0</div>
     <div class="calculator-button" onclick="backspaceAmount()">⌫</div>
{{--
    <div class="calculator-button" onclick="sendOrRequest()">Send/Request</div>
--}}
</div>

<BR><BR>


    <button type="submit" name="action" value="pay" class="btn-sm btn-success">Pay</button>
    <button type="submit" name="action" value="request" class="btn-sm btn-primary">Request $$</button>
</form>
</div>








{{-- 





<!-- Drop this befor launch -->
<BR>
<BR>
<hr>
This is a List of email account you can use
<br>in the drop down above you can select any user in the system "this entore thing will be replaced with Ajax call after the 3rd letter is typed in a text box"<HR width="50%">
@foreach($users as $user)
{{$user->email}}<BR>
@endforeach





<BR><BR><BR>





<div id="searchResults">gggg</div>









<BR><BR><BR>

--}}



<hr>
<!-- End Drop this befor launch -->


                </div>
            </div>
        </div>



<script>
    function addToAmount(num) {
        const amountInput = document.getElementById('amount');
        const currentValue = amountInput.value;
        amountInput.value = currentValue === '0' ? num : currentValue + num;
    }

    function clearAmount() {
        document.getElementById('amount').value = '0';
    }

    function backspaceAmount() {
        const amountInput = document.getElementById('amount');
        amountInput.value = amountInput.value.slice(0, -1);
        if (amountInput.value === '') {
            amountInput.value = '0';
        }
    }

//    function sendOrRequest() {
        // Your code to send or request the amount
//        alert('Sending or requesting amount: ' + document.getElementById('amount').value);
//    }
</script>


    </div>

</x-app-layout>


<!-- Load jQuery from CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Script to handle AJAX call -->
<script>
    jQuery(function($) {
        $('#searchInput').on('input', function() {
            var searchValue = $(this).val();
        $('#who').empty();

            // Check if the input length is at least 3 characters
            if (searchValue.length >= 2) {
                // Get the CSRF token from the meta tag
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Make AJAX call to fetch users
                $.ajax({
                    url: '/search-users', // Your Laravel route to handle the search
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the headers
                    },
                    data: {
                        search: searchValue
                    },
                    success: function(response) {
                        // Handle the response and display users
                      // Clear previous results
                       
                          $('#who').empty();

                        // Append each result to the div
                        $.each(response, function(index, user) {
                           
                            $('#who').append($('<option>', {
                                 value: user.email, // Assuming user object has an 'id' property
                                 text: user.name  //+' ['+user.email+']' // Assuming user object has a 'name' property
                            }));
                        });




                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        });
    });
</script>