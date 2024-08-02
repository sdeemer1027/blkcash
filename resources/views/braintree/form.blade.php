<x-app-layout>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <form id="payment-form" action="{{ route('braintree.addBankAccount') }}" method="POST">
        @csrf
        <label for="account_number">Account Number:</label>
        <input type="text" name="account_number" id="account_number" required>
<BR>        <label for="routing_number">Routing Number:</label>
        <input type="text" name="routing_number" id="routing_number" required>
        <input type="hidden" name="payment_method_nonce" id="payment_method_nonce">
<BR>        <label for="nonce-display">nonce-display</label>
        <input type="text" id="nonce-display" readonly> <!-- Temporary field to display nonce -->
 <BR>      <button type="submit">Add Bank Account</button>
    </form>

    <script src="https://js.braintreegateway.com/web/3.76.3/js/client.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.76.3/js/us-bank-account.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetch('{{ route('braintree.clientToken') }}')
                .then(response => response.json())
                .then(data => {
                    console.log('Client Token:', data.clientToken); // Log client token
                    braintree.client.create({
                        authorization: data.clientToken
                    }, function (err, clientInstance) {
                        if (err) {
                            console.error('Error creating client:', err);
                            return;
                        }
                        console.log('Client Instance Created');

                        braintree.usBankAccount.create({
                            client: clientInstance,
                            fields: {
                                accountNumber: {
                                    selector: '#account_number'
                                },
                                routingNumber: {
                                    selector: '#routing_number'
                                }
                            }
                        }, function (err, usBankAccountInstance) {
                            if (err) {
                                console.error('Error creating US Bank Account instance:', err);
                                return;
                            }
                            console.log('US Bank Account Instance Created');

                            const form = document.getElementById('payment-form');
                            form.addEventListener('submit', function (event) {
                                event.preventDefault();

                                usBankAccountInstance.tokenize({
                                    mandateText: 'I authorize Braintree to debit my bank account on behalf of [Merchant’s legal name].',
                                }, function (err, tokenizedPayload) {
                                    if (err) {
                                        console.error('Error tokenizing:', err);
                                        return;
                                    }
                                    console.log('Tokenized Payload:', tokenizedPayload); // Log tokenized payload

                                    document.getElementById('payment_method_nonce').value = tokenizedPayload.nonce;
                                    document.getElementById('nonce-display').value = tokenizedPayload.nonce; // Display nonce in the form
                                    form.submit();
                                });
                            });
                        });
                    });
                })
                .catch(error => {
                    console.error('Error fetching client token:', error);
                });
        });
    </script>




    Bank routing numbers Bank routing numbers must pass a checksum, much like credit card numbers. The following routing numbers are valid, and can be passed to the sandbox:
        <BR>
        071101307
        <BR>
        071000013







</x-app-layout>
