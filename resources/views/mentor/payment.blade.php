<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Flutterwave API</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src = "https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        .page-header{
            padding-bottom: 9px;margin: 40px 0 20px;border-bottom: 1px solid #eee;
        }
    </style>
</head>
<body>
    <form>
        <script src="https://checkout.flutterwave.com/v3.js"></script>
        <button type="button" onClick="makePayment()">Pay Now </button>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function makePayment() {
        FlutterwaveCheckout({
        public_key: "FLWPUBK_TEST-08d172126ff89e86aeaad37897e262cd-X",
        tx_ref: "pay-mentor-charge",
        amount: 15000,
        currency: "NGN",
        payment_options: "card",
        customer: {
            email: "user@gmail.com",
            phonenumber: "08102909304",
            name: "Yemi Desola",
        },
        subaccounts: [
            {
            id: "RS_53F66761D13B194E5307D1B518A77354",
            transaction_charge_type: "flat_subaccount",
            transaction_charge: "6000"
            },
                
            {
            id: "RS_75D413CDDD345D1CA33383CF0DF66D7D",
            transaction_charge_type: "flat_subaccount",
            transaction_charge: "3000"
            },
            
        ],
        callback: function (data) {
            console.log(data);
        },
        customizations: {
            title: "My store",
            description: "Payment for items in cart",
            logo: "https://assets.piedpiper.com/logo.png",
        },
        });
    }
</script>

</html>