<!DOCTYPE html>
<html>
   <head>
      <title>Payment Response</title>
   </head>
   <body style="backdrop-filter: blur(5px);text-align:center">
      <h3 style="color:green;text-align:center">Payment Response</h3>
      <?php
        error_reporting(E_ERROR | E_PARSE);
         // capture payment response
         $responseData = $_REQUEST;
         //print_r($responseData);
            //Handling failed response
           // Checking for payment id
         if($responseData['razorpay_signature'] ==   null){
          $data = json_decode($responseData['error']['metadata']);
          echo "<table border='1' style = 'margin-left: 343px;'>
         <tr>
         <th>Code</th>
         <th>Description</th>
         <th>source</th>
         <th>Step</th>
         <th>reason</th>
         <th>Payment ID</th>
         <th>Order ID</th>
         </tr>";
           echo "<tr>";
           echo "<td>" . $responseData['error']['code'] . "</td>";
           echo "<td>" . $responseData['error']['description'] . "</td>";
           echo "<td>" . $responseData['error']['source'] . "</td>";
           echo "<td>" . $responseData['error']['reason'] . "</td>";
           echo "<td>" . $responseData['error']['step'] . "</td>";
           echo "<td>" . $data->payment_id . "</td>";
           echo "<td>" . $data->order_id . "</td>";
           echo "</tr>";
           echo "</table>";

           // If you want to redirect on failed page, then you can use failed page related url
         }else{
          // In case of payment success
          $razorpay_signature = $responseData['razorpay_signature'];
          $order_id  = $responseData['razorpay_order_id'];
          $razorpay_payment_id = $responseData['razorpay_payment_id'];
          // merchant secret key
          $secret = "djTVxJ9hxMpspmmE1D9xUeL5";
          // generating signature
          $generated_signature = hash_hmac("sha256",$order_id."|".$razorpay_payment_id, $secret);

          

                     if ($generated_signature == $razorpay_signature) {

                        $api_key = "rzp_test_mDSwnekBBSpC7F";
                        $password = "djTVxJ9hxMpspmmE1D9xUeL5";
                        $paymentID =  $responseData['razorpay_payment_id'];
                        $ch = curl_init(); 
                        curl_setopt($ch, CURLOPT_URL, "https://api.razorpay.com/v1/payments/".$paymentID);
                        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20); curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                        curl_setopt($ch, CURLOPT_GET, true);
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
                        
                        // database connection
                        $servername = "localhost";
                        $username = "root";
                        $password = "root";
                        $dbname = "corephp";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                        }

                        //Dynamic value capture from Razorpay server
                         
                         $id = $resp['id'];
                         $entity = $resp['entity'];
                         $amount = $resp['amount'];
                         $currency = $resp['currency'];
                         $status = $resp['status'];
                         $order_id = $resp['order_id'];
                         $invoice_id = $resp['invoice_id'];
                         $international = $resp['international'];
                         $method = $resp['method'];
                         $amount_refunded = $resp['amount_refunded'];
                         $refund_status = $resp['refund_status'];
                         $captured = $resp['captured'];
                         $description = $resp['description'];
                         $card_id = $resp['card_id'];
                         $bank = $resp['bank'];
                         $wallet = $resp['wallet'];
                         $vpa = $resp['vpa'];
                         $email = $resp['email'];
                         $contact = $resp['contact'];
                         $notes = $resp['address'];
                         $address = $resp['notes']['address'];
                         $fee = $resp['fee'];
                         $tax = $resp['tax'];
                         $error_code = $resp['error_code'];
                         $error_description = $resp['error_description'];
                         $error_source = $resp['error_source'];
                         $error_step = $resp['error_step'];
                         $error_reason = $resp['error_reason'];
                         $transaction_id = $resp['transaction_id'];
                         $created_at = $resp['created_at'];

                        $sql = "INSERT INTO paymentinfo (id,entity,amount,currency,statuss,order_id,invoice_id,international,method,amount_refunded,refund_status,captured,description,card_id,bank,wallet,vpa,email,contact,notes,address,fee,tax,error_code,error_description,error_source,error_step,error_reason,transaction_id,created_at)
                        VALUES ('$id','$entity','$amount','$currency','$status','$order_id','$invoice_id','$international','$method','$amount_refunded','$refund_status','$captured','$description','$card_id','$bank','$wallet','$vpa','$email','$contact','$notes','$address','$fee','$tax','$error_code','$error_description','$error_source','$error_step','$error_reason','$transaction_id','$created_at')";
                        if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully";
                        } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                        }

                        $conn->close();
                         echo "Your Payment is successful";
                         echo "<table border='1' style = 'margin-left: 343px;'>
                               <tr>
                               <th>Paymen ID</th>
                               <th>Order Id</th>
                               <th>Signature</th>
                               </tr>";
                                 echo "<tr>";
                                 echo "<td>" . $responseData['razorpay_payment_id']. "</td>";
                                 echo "<td>" . $responseData['razorpay_order_id'] . "</td>";
                                 echo "<td>" . $responseData['razorpay_signature']. "</td>";
                                 echo "</tr>";
                                 // You can implement fetch payment info api
                                 // If you want to redirect on success page, then you can use success page related url
                     }else{
                      echo "Signature varification failed";
                     }
         } ?>
   </body>
</html>
