
<x-app-layout>

 <div class="py-3" style="background:#ffffff;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background:#ffffff;">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="background:#ffffff;">
                <div class="p-6 text-gray-900" style="background:#ffffff;">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="flex justify-center" >
   <style>
      #searchInput::placeholder {
        color: #cfcfcf;
    }
   </style>

   <form action="{{ route('payments.process') }}" method="POST" style="background:#ffffff; padding: 20px; text-align: center;">
    @csrf
    <div class="row" style="font-size:48px; display: flex; align-items: center; justify-content: center;">
    <div class="col-2" style="flex: 0 0 auto;">$</div>
    <div id="displayAmount" class="col-10" style="flex: 1; text-align: left;">0</div>
    </div>



        <label for="amount" style="color: black;"></label>
        <input type="hidden" required id="amount" name="amount" placeholder="0" readonly
               style="background:#ffffff; color: black; border: 0px solid #ccc;
               padding: 5px; width: 80%;font-size:48px;">


    <br>
    <style>
        /* Basic styling for the calculator */
        .calculator {
            display: inline-grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 5px;
            max-width: 500px;
            margin: 0 auto;
            border:0px solid black;
        }

        .calculator-button {
            padding: 15px;
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

        #dropdownContainer {
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            max-height: 300px; /* Limit the height of the dropdown */
            overflow-y: auto; /* Enable scrolling if content exceeds max height */
        }

        .dropdown-item {
            padding: 10px;
            cursor: pointer;
        }

        .dropdown-item:hover {
            background-color: #f0f0f0;
        }

        .btn-pill {
            border-radius: 50px;        /* Pill shape */
            padding: 10px 20px;         /* Adjust padding */
            font-size: 14px;            /* Consistent font size */
            background-color: #f5f5f5;  /* Background color */
            border: 1px solid transparent;
            color: #000;
            width: 110px;               /* Set the same width for both buttons */
            text-align: center;         /* Center the text */
        }

        .btn-pill.btn-success {
            border-color: #28a745;      /* Optional green border for 'Pay' */
        }

        .btn-pill.btn-primary {
            border-color: #007bff;      /* Optional blue border for 'Request $$' */
        }

        .btn-pill:hover {
            opacity: 0.9;               /* Slight hover effect */
        }
    </style>

    <div class="calculator" style="width:300px;">
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
        <div class="calculator-button" onclick="addDecimal()">.</div>
        <div class="calculator-button" onclick="backspaceAmount()">⌫</div>

    </div>

    <!-- Input field with id 'search' -->
    <input type="hidden" id="searchthem" style="color: black; border: 0px solid #ccc; padding: 5px; width: 100%;">
    <br>
    <br>
    <label for="who" style="color: black;">Send Request/Payment:</label><br>
       <a href="{{route('qrcode.reader.form')}}" class="btn btn-danger btn-sm">Click here to scan a QRCode</a><br><BR>
    <input type="text" id="searchInput" placeholder="Start typing..."  style="width: 100%; padding: 10px; box-sizing: border-box;" required>
    <div id="dropdownContainer" style="display: none; position: absolute; z-index: 1000; width: 100%; background: white; border: 1px solid #ccc; max-height: 200px; overflow-y: auto;">
    <!-- Dropdown results will be appended here -->
    </div>

    <input type="hidden"  id="who" name="who"  required  style="background:#ffffff; color: black; border: 1px solid #ccc; padding: 5px; width: 100%;"  value="{{ request('id') }}">
    <br><br>
    <!--
    <button type="submit" name="action" value="pay" class="btn-sm btn-success">Pay</button>
    <button type="submit" name="action" value="request" class="btn-sm btn-primary">Request $$</button>
    -->
    <button type="submit" name="action" value="pay" class="btn btn-pill custom-btn btn-success">Pay</button>
    <button type="submit" name="action" value="request" class="btn btn-pill custom-btn btn-primary">Request</button>

   </form>

</div>


<hr>
<!-- End Drop this befor launch -->

                </div>
            </div>
        </div>

{{--

     <script>
         function formatCurrency(value) {
             return parseFloat(value).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
         }

         function addToAmount(num) {
             const amountInput = document.getElementById('amount');
             const displayAmountDiv = document.getElementById('displayAmount');
             let currentValue = amountInput.value;

             // Update the amount input field
             currentValue = currentValue === '0' ? num.toString() : currentValue + num;

             // Convert the current value to a float and format it
             amountInput.value = currentValue;
             displayAmountDiv.innerHTML = formatCurrency(currentValue);
         }

         function addDecimal() {
             const amountInput = document.getElementById('amount');
             const displayAmountDiv = document.getElementById('displayAmount');
             let currentValue = amountInput.value;

             // Prevent adding more than one decimal point
             if (!currentValue.includes('.')) {
                 currentValue += '.';
             }

             // Update the amount input field and display
             amountInput.value = currentValue === '' ? '0.' : currentValue;
             displayAmountDiv.innerHTML = formatCurrency(amountInput.value);
         }

         function clearAmount() {
             const amountInput = document.getElementById('amount');
             const displayAmountDiv = document.getElementById('displayAmount');

             // Clear the amount input field
             amountInput.value = '0';

             // Clear the display div
             displayAmountDiv.innerHTML = '0';  //'0.00';
         }

         function backspaceAmount() {
             const amountInput = document.getElementById('amount');
             const displayAmountDiv = document.getElementById('displayAmount');

             // Backspace in the input field
             amountInput.value = amountInput.value.slice(0, -1) || '0';

             // Update the display div with formatted value
             displayAmountDiv.innerHTML = formatCurrency(amountInput.value);
         }
     </script>


--}}



     <script>
         const maxAmount = 5000;

         function formatCurrency(value) {
             const amount = parseFloat(value) || 0;
             if (amount >= maxAmount) {
                 return maxAmount.toLocaleString('en-US');
             } else {
                 return amount.toLocaleString('en-US', {
                     minimumFractionDigits: 0,
                     maximumFractionDigits: value.includes('.') ? 2 : 0
                 });
             }
         }

         function addToAmount(num) {
             const amountInput = document.getElementById('amount');
             const displayAmountDiv = document.getElementById('displayAmount');
             let currentValue = amountInput.value.replace(/,/g, '');

             // Prevent exceeding the maxAmount
             const updatedValue = currentValue === '0' ? num.toString() : currentValue + num;
             if (parseFloat(updatedValue) > maxAmount) {
                 currentValue = maxAmount.toString();
             } else {
                 currentValue = updatedValue;
             }

             amountInput.value = currentValue;
             displayAmountDiv.innerHTML = formatCurrency(currentValue);
         }

         function addDecimal() {
             const amountInput = document.getElementById('amount');
             const displayAmountDiv = document.getElementById('displayAmount');
             let currentValue = amountInput.value;

             if (!currentValue.includes('.')) {
                 currentValue += '.';
             }

             amountInput.value = currentValue;
             displayAmountDiv.innerHTML = formatCurrency(amountInput.value);
         }

         function clearAmount() {
             const amountInput = document.getElementById('amount');
             const displayAmountDiv = document.getElementById('displayAmount');

             amountInput.value = '0';
             displayAmountDiv.innerHTML = '0';
         }

         function backspaceAmount() {
             const amountInput = document.getElementById('amount');
             const displayAmountDiv = document.getElementById('displayAmount');

             amountInput.value = amountInput.value.slice(0, -1) || '0';
             displayAmountDiv.innerHTML = formatCurrency(amountInput.value);
         }
     </script>



    </div>

</x-app-layout>

<!-- Load jQuery from CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Script to handle AJAX call -->
<script type="text/javascript">


    jQuery(function($) {
        // Function to get the 'id' parameter from the URL
        function getUrlParameter(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        }

        // Check if 'id' is present in the URL
        var userId = getUrlParameter('id');
        if (userId) {
            // Get the CSRF token from the meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Make AJAX call to prefetch the user data
            $.ajax({
                url: '/search-users', // Your Laravel route to handle the search
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the headers
                },
                data: {
                    search: userId
                },
                success: function(response) {
                    if (response.length > 0) {
                        var user = response[0]; // Assuming the first result is the user you want

                        // Prefill the input fields with the user's data
                        $('#searchInput').val(user.name);
                        $('#searchthem').val(user.name);
                        $('#who').val(user.email);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        // Existing search input event handler
        $('#searchInput').on('input', function() {
            var searchValue = $(this).val();
            var dropdownContainer = $('#dropdownContainer');

            // Clear existing dropdown items
            dropdownContainer.empty().hide();

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
                        // Populate the dropdown container
                        if (response.length > 0) {
                            $.each(response, function(index, user) {
                                var item = $('<div>', {
                                    class: 'dropdown-item',
                                    text: user.name,
                                    'data-email': user.email
                                });
                                dropdownContainer.append(item);
                            });

                            // Show the dropdown
                            dropdownContainer.show();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        });

        // Handle clicking on an item in the dropdown
        $(document).on('click', '.dropdown-item', function() {
            var selectedText = $(this).text();
            var selectedEmail = $(this).data('email');
            $('#searchInput').val(selectedText);
            $('#searchthem').val(selectedText);
            $('#who').val(selectedEmail);
            $('#dropdownContainer').hide(); // Hide the dropdown after selection
        });

        // Hide the dropdown when clicking outside
        $(document).on('click', function(event) {
            if (!$(event.target).closest('#searchInput, #dropdownContainer').length) {
                $('#dropdownContainer').hide();
            }
        });

        // Position the dropdown below the input
        $('#searchInput').on('focus', function() {
            var offset = $(this).offset();
            $('#dropdownContainer').css({
                top: offset.top + $(this).outerHeight(),
                left: offset.left,
                width: $(this).outerWidth()
            }).show();
        });
    });



























/*

    jQuery(function($) {
    $('#searchInput').on('input', function() {
        var searchValue = $(this).val();
        var dropdownContainer = $('#dropdownContainer');

        // Clear existing dropdown items
        dropdownContainer.empty().hide();

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
                    // Populate the dropdown container
                    if (response.length > 0) {
                        $.each(response, function(index, user) {
                            var item = $('<div>', {
                                class: 'dropdown-item',
                                text: user.name,
                                'data-email': user.email
                            });
                            dropdownContainer.append(item);
                        });

                        // Show the dropdown
                        dropdownContainer.show();
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });

    // Handle clicking on an item in the dropdown
    $(document).on('click', '.dropdown-item', function() {
        var selectedText = $(this).text();
        var selectedEmail = $(this).data('email');
        $('#searchInput').val(selectedText);
        $('#searchthem').val(selectedText);
         $('#who').val(selectedEmail);
        $('#dropdownContainer').hide(); // Hide the dropdown after selection
    });

    // Hide the dropdown when clicking outside
    $(document).on('click', function(event) {
        if (!$(event.target).closest('#searchInput, #dropdownContainer').length) {
            $('#dropdownContainer').hide();
        }
    });

    // Position the dropdown below the input
    $('#searchInput').on('focus', function() {
        var offset = $(this).offset();
        $('#dropdownContainer').css({
            top: offset.top + $(this).outerHeight(),
            left: offset.left,
            width: $(this).outerWidth()
        }).show();
    });
});
*/
</script>
