<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>

    @include('home.include.head')

</head>

<body>

    @include('home.include.navbar')

    <h2>Checkout</h2>
    <button id="pay-button">Pay Now</button>
    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            window.snap.pay('{{ $snapToken }}');
        });
    </script>

    @include('home.include.footer')

</body>

</html>
