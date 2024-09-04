<x-app-layout>
    <div class="py-3" style="background:#398540;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background:#398540;">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="background:#398540;">
                <div class="p-6 text-gray-900" style="background:#398540;">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="flex justify-center">

{{-- Auth::user()->email --}}





























<style>
    
      #searchInput::placeholder {
        color: #cfcfcf;
    }
</style>


<form action="{{ route('payments.process') }}" method="POST" style="background:#398540; padding: 20px;">
    @csrf

    <label for="who" style="color: black;">Send Request/Payment To:</label><br>
  
     
    <input type="text" id="searchInput" placeholder="start typing email here" style="background:#398540; color: black; border: 1px solid #ccc; padding: 5px; width: 100%;"><br><br>

    <select id="who" name="who" required style="background:#398540; color: black; border: 1px solid #ccc; padding: 5px; width: 100%;">
    </select><br><br>

    <label for="amount" style="color: black;">Amount:</label><br>
    <input type="text" id="amount" name="amount" placeholder="0" readonly style="background:#398540; color: black; border: 1px solid #ccc; padding: 5px; width: 100%;"><br><br>

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

    <div class="calculator">
        <div class="calculator-button" onclick="addToAmount(1)">1</div>
        <div class="calculator-button" onclick="addToAmount(2)">2</div>
        <div class="calculator-button" onclick="addToAmount(3)">3</div>
        <div class="calculator-button" onclick="addToAmount(4)">4</div>
        <div class="calculator-button" onclick="addToAmount(5)">5</div>
        <div class="calculator-button" onclick="addToAmount(6)">6</div>
        <div class="calculator-button" onclick="addToAmount(7)">7</div>
        <div class="calculator-button" onclick="addToAmount(8)">8</div>
        <div class="calculator-button" onclick="addToAmount(9)">9</div>
        <div class="calculator-button" onclick="clearAmount()">C</div>
        <div class="calculator-button" onclick="addToAmount(0)">0</div>
        <div class="calculator-button" onclick="backspaceAmount()">⌫</div>
    </div><br><br>
<!-- Input field with id 'search' -->
    <input type="text" id="searchthem" style="background:#398540; color: black; border: 0px solid #ccc; padding: 5px; width: 100%;"><br>
   


    <button type="submit" name="action" value="pay" class="btn-sm btn-success">Pay</button>
    <button type="submit" name="action" value="request" class="btn-sm btn-primary">Request $$</button>
</form>
























{{-- 

<form action="{{ route('payments.process') }}" method="POST" style="background:#398540;">
    @csrf

<label for="who">Send Request/Payment To:</label><br>
  
<!-- Input field with id 'search' -->
    <input type=type=text id="searchthem" style="background:#398540;"><br>
<input type="text" id="searchInput" placeholder="start typing email" style="background:#398540;">

<BR>

<select  id="who" name="who" required style="background:#398540;">

</select>
<BR>
<BR>

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
   
    <div class="calculator-button" onclick="addToAmount(4)">4</div>
    <div class="calculator-button" onclick="addToAmount(5)">5</div>
    <div class="calculator-button" onclick="addToAmount(6)">6</div>
    
    <div class="calculator-button" onclick="addToAmount(7)">7</div>
    <div class="calculator-button" onclick="addToAmount(8)">8</div>
    <div class="calculator-button" onclick="addToAmount(9)">9</div>
    <div class="calculator-button" onclick="clearAmount()">C</div>
    <div class="calculator-button" onclick="addToAmount(0)">0</div>
     <div class="calculator-button" onclick="backspaceAmount()">⌫</div>

</div>

<BR><BR>


    <button type="submit" name="action" value="pay" class="btn-sm btn-success">Pay</button>
    <button type="submit" name="action" value="request" class="btn-sm btn-primary">Request $$</button>
</form>
--}}

</div>


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
           /* $('#who').empty().hide();  */

            // Check if the input length is at least 2 characters
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
               //         $('#who').empty().hide();

                        if (response.length === 1) {
                            var singleUser = response[0];
                            $('#searchthem').val(singleUser.name);
                        } else if (response.length > 1) {
                            // Append each result to the dropdown
                            $.each(response, function(index, user) {
                                $('#who').append($('<option>', {
                                    value: user.email,
                                    text: user.name
                                }));
                            });

                            // Show the dropdown
                            $('#who').show();
                        }

                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        });

        // Handle input box losing focus
        $('#searchInput').on('blur', function() {

     //       setTimeout(function() {
     //           $('#who').hide();
     //       }, 200);

        });

        // Handle selection from dropdown
        $('#who').on('change', function() {
            var selectedUser = $(this).find('option:selected').text();
            $('#searchthem').val(selectedUser);
        });

        // Handle clicking on the dropdown
        $('#who').on('click', 'option', function() {
            var selectedUser = $(this).text();
            $('#searchthem').val(selectedUser);
          /*  $('#who').hide();  */
        });
    });
</script>
