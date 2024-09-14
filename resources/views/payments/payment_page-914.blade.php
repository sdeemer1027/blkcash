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
    <div id="displayAmount" class="col-10" style="flex: 1; text-align: left;"></div>
</div>



        <label for="amount" style="color: black;"></label>
        <input type="hidden" id="amount" name="amount" placeholder="0" readonly 
               style="background:#ffffff; color: black; border: 0px solid #ccc; 
               padding: 5px; width: 80%;font-size:48px;">
   

    <br>
{{--}}
    <style>
        /* Basic styling for the calculator */
        .calculator {
            display: inline-grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 5px;
            max-width: 200px;
            margin: 0 auto;
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
--}}




<style>
    /* Basic styling for the calculator */
    .calculator {
        display: grid; /* Use grid for consistent layout */
        grid-template-columns: repeat(3, 1fr); /* Three equal columns */
        gap: 5px; /* Spacing between buttons */
        width: 90%; /* Set width to 90% of the parent container */
        max-width: 500px; /* Optional: Maximum width for large screens */
        margin: 0 auto; /* Center the calculator horizontally */
    }

    .calculator-button {
        padding: 15px; /* Adjust padding for better touch targets */
        font-size: 24px; /* Increase font size for readability */
        text-align: center; /* Center text in buttons */
        cursor: pointer; /* Pointer cursor on hover */
        border: 1px solid #ccc; /* Border around buttons */
        background-color: #f5f5f5; /* Light background color */
        transition: background-color 0.3s ease; /* Smooth background color transition */
    }

    .calculator-button:hover {
        background-color: #e0e0e0; /* Slightly darker background on hover */
    }
</style>

<style>
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
    </div>

    

    <!-- Input field with id 'search' -->
    <input type="hidden" id="searchthem" style="color: black; border: 0px solid #ccc; padding: 5px; width: 100%;"><br>

  

    <label for="who" style="color: black;">Send Request/Payment To:</label><br>
<!--
    <input type="text" id="searchInput" placeholder="start typing email here" style="background:#ffffff; color: black; border: 1px solid #ccc; padding: 5px; width: 100%;"><br><br>
  -->


<input type="text" id="searchInput" placeholder="Start typing..."  style="width: 100%; padding: 10px; box-sizing: border-box;">
<div id="dropdownContainer" style="display: none; position: absolute; z-index: 1000; width: 100%; background: white; border: 1px solid #ccc; max-height: 200px; overflow-y: auto;">
    <!-- Dropdown results will be appended here -->
</div>

<!--
    <select id="who" name="who" required style="background:#ffffff; color: black; border: 1px solid #ccc; padding: 5px; width: 100%;"></select>

<br><br><br><br>
  --> 
 <input type="hidden" 
 id="who" name="who" 
 required 
 style="background:#ffffff; color: black; border: 1px solid #ccc; padding: 5px; width: 100%;" 
 value="">
    <br><br>

    <button type="submit" name="action" value="pay" class="btn-sm btn-success">Pay</button>
    <button type="submit" name="action" value="request" class="btn-sm btn-primary">Request $$</button>
</form>

</div>


<hr>
<!-- End Drop this befor launch -->


                </div>
            </div>
        </div>


<script>
    function addToAmount(num) {
        const amountInput = document.getElementById('amount');
        const displayAmountDiv = document.getElementById('displayAmount');
        const currentValue = amountInput.value;

        // Update the amount input field
        amountInput.value = currentValue === '0' ? num : currentValue + num;

        // Update the display div
        displayAmountDiv.innerHTML = amountInput.value;
    }

    function clearAmount() {
        const amountInput = document.getElementById('amount');
        const displayAmountDiv = document.getElementById('displayAmount');

        // Clear the amount input field
        amountInput.value = '0';

        // Clear the display div
        displayAmountDiv.innerHTML = '0';
    }

    function backspaceAmount() {
        const amountInput = document.getElementById('amount');
        const displayAmountDiv = document.getElementById('displayAmount');

        // Backspace in the input field
        amountInput.value = amountInput.value.slice(0, -1);

        // If empty, set to '0'
        if (amountInput.value === '') {
            amountInput.value = '0';
        }

        // Update the display div
        displayAmountDiv.innerHTML = amountInput.value;
    }
</script>
{{-- 
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
--}}

    </div>

</x-app-layout>


<!-- Load jQuery from CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Script to handle AJAX call -->



<script type="text/javascript">
    
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


</script>




















{{-- }}
<script type="text/javascript">
    
jQuery(function($) {
    $('#searchInput').on('input', function() {
        var searchValue = $(this).val();
        $('#who').empty().hide(); // Clear and hide the dropdown

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
                    $('#who').empty().hide(); // Clear the dropdown before appending new options

                    if (response.length === 1) {
                        var singleUser = response[0];
                        $('#searchInput').val(singleUser.name); // Update searchInput
                        $('#who').hide(); // Hide the dropdown if only one result
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
        } else {
            $('#who').hide(); // Hide dropdown if less than 2 characters
        }
    });

    // Handle input box losing focus
    $('#searchInput').on('blur', function() {
        // Delay hiding the dropdown to allow option selection
        setTimeout(function() {
            $('#who').show();
        }, 200);
    });

    // Handle selection from dropdown
    $('#who').on('change', function() {
        var selectedEmail = $(this).val();
        var selectedUser = $(this).find('option:selected').text();
        $('#searchInput').val(selectedUser); // Update searchInput
        $('#who').show(); // Hide the dropdown after selection
    });

    // Handle clicking on the dropdown
    $('#who').on('click', 'option', function() {
        var selectedUser = $(this).text();
        $('#searchInput').val(selectedUser); // Update searchInput
        $('#who').show(); // Hide the dropdown after selection
    });
});


</script>
--}}



















{{--}}
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
--}}