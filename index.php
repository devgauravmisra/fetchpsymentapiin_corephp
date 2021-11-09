<h2 align="center;">Razorpay with CorePHP Implementation</h2>
<?php
$data = array( "amount"=> 100, "currency"=> "INR", "receipt"=> "testo", "payment_capture"=> 1 ); // data u want to post
$data_string = json_encode($data);
$api_key = "rzp_test_mDSwnekBBSpC7F";
$password = "djTVxJ9hxMpspmmE1D9xUeL5";
$ch = curl_init(); curl_setopt($ch, CURLOPT_URL, "https://api.razorpay.com/v1/orders");
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20); curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, $api_key.':'.$password); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Accept: application/json', 'Content-Type: application/json')
);
$result = curl_exec($ch); 
$returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
$resp = json_decode($result, true);
        $data = $resp['id']; // order id
        //echo $data;
        ?>
<button id="rzp-button1">Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "rzp_test_mDSwnekBBSpC7F", // Enter the Key ID generated from the Dashboard
    "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Acme Corp",
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    "order_id": "<?php echo $data ;?>", //This is a sample Order ID. Need to pass dynamic order id
    "callback_url": "http://localhost:8888/corephp/charge.php",
    "prefill": {
        "name": "Gaurav Kumar",
        "email": "gaurav.kumar@example.com",
        "contact": "9999999999"
    },
    "retry":"false",
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>