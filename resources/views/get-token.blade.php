<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Token</title>
</head>
<body>
    <h1>Braintree Client Token</h1>
    <div id="token"></div>

    <script src="https://js.braintreegateway.com/web/dropin/1.33.0/js/dropin.min.js"></script>
    <script>
        fetch('{{ route("get-token") }}')
            .then(response => response.json())
            .then(data => {
                const tokenElement = document.getElementById('token');
                tokenElement.innerText = data.token;
            })
            .catch(error => console.error('Error fetching token:', error));
    </script>
</body>
</html>
