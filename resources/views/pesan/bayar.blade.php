<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript"
    src="{{ env('MIDTRANS_ISPRODUCTION') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}"
    data-client-key="{{ env('MIDTRANS_ISPRODUCTION') ? env('MIDTRANS_CLIENT_KEY_PRODUCTION') : env('MIDTRANS_CLIENT_KEY_SANDBOX') }}"></script>
    <title>Nasywa Snack</title>
</head>
<body>


    <form action="" method="POST" id="submit_form">
        @csrf
        <input type="hidden" name="id" value="{{ Session::get('id') }}">
        <input type="hidden" name="json" id="json_callback">
    </form>
    
    <script type="text/javascript">
        window.snap.pay('{{ Session::get("token") }}', {
            onSuccess: function(result){
            /* You may add your own implementation here */
            // alert("payment success!"); console.log(result);
            send_response_to_form(result);
            },
            onPending: function(result){
            /* You may add your own implementation here */
            // alert("wating your payment!"); console.log(result);
            send_response_to_form(result);
            },
            onError: function(result){
            /* You may add your own implementation here */
            // alert("payment failed!"); console.log(result);
            send_response_to_form(result);
            },
            onClose: function(){
            /* You may add your own implementation here */
            // alert('you closed the popup without finishing the payment');
            send_response_to_form(result);
            }
        })
        function send_response_to_form(result) {
            document.getElementById('json_callback').value = JSON.stringify(result);
            document.querySelector('#submit_form').submit();
        }
    </script>
</body>
</html>