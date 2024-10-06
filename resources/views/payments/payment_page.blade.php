<x-app-layout>

    <div class="py-3" style="background:#ffffff;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background:#ffffff;">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="background:#ffffff;">
                <div class="p-6 text-gray-900" style="background:#ffffff;">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                    <div class="flex justify-center">
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
                            <input type="hidden" required id="amount" name="amount" placeholder="0" readonly style="background:#ffffff; color: black; border: 0px solid #ccc; padding: 5px; width: 80%; font-size:48px;">

                            <br>
                            <style>
                                .calculator {
                                    display: inline-grid;
                                    grid-template-columns: repeat(3, 1fr);
                                    gap: 5px;
                                    max-width: 500px;
                                    margin: 0 auto;
                                    border: 0px solid black;
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

                            <br><br>

                            <label for="who" style="color: black;">Send Request/Payment:</label><br>
                            <a href="{{route('qrcode.reader.form')}}" class="btn btn-danger btn-sm">Click here to scan a QRCode</a><br><BR>
                            <input type="text" id="searchInput" placeholder="Start typing..." style="width: 100%; padding: 10px; box-sizing: border-box;" required>

                            <br><br>

                            <button type="submit" name="action" value="pay" class="btn btn-pill custom-btn btn-success">Pay</button>
                            <button type="submit" name="action" value="request" class="btn btn-pill custom-btn btn-primary">Request</button>
                        </form>
                    </div>

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
            </div>
        </div>
</x-app-layout>
