<?php
$timezone = "Asia/Colombo";
date_default_timezone_set($timezone);

 if(isset($_POST["paynow"])){

    $tpolicy = trim($_POST["tpolicy"]);
    $PaymentAmount = trim($_POST["txtPaymentAmount"]);
    $Mobile = trim($_POST["txtMobile"]);

    $orderID = ("T".$tpolicy."".date("hisa"));

    include('../dbconn.php');
    include('../wellness_controller.php');

    $db = new DatabaseConnection;
    $inputData = [
    'op_order_id'   => mysqli_real_escape_string($db->getConnection(), $orderID),
    'op_pol_type'   => mysqli_real_escape_string($db->getConnection(), "THP"),
    'op_mobile_no'  => mysqli_real_escape_string($db->getConnection(), $Mobile),
    'op_pol_no'     => mysqli_real_escape_string($db->getConnection(), $tpolicy)
];
    
   // echo "<pre>";
    //print_r($inputData);

    $wplan = new wellness_controller;
    
    $result = $wplan->create_tgpolicy($inputData);  
    
    if($result){
        
       // echo   "Policy pending payment record saved...!"; 
        include 'CYBSPEB.php';
        $ipg =new CYBSPEB();
        echo $ipg->getDefaultForm($orderID,$PaymentAmount);
    }
    else{
        echo    "Not Inserted..! Please contact IT Support";  
        
    }

}
?>

<?php
// send SMS Handler
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $phoneNo = $_POST['txtMobile'];
//     $policyNo = $_POST['tpolicy'];
    
//     // Format phone number
//     $phoneNo = preg_replace('/[^0-9]/', '', $phoneNo);
    
//     // Add country code if not present
//     if (strlen($phoneNo) === 10 && substr($phoneNo, 0, 1) === '0') {
//         $phoneNo = '94' . substr($phoneNo, 1);
//     }
    
//     // Base URL for the SMS API
//     $baseUrl = "http://124.43.209.65:8082/dialog-sms/save";
    
//     // Prepare message
//     $message = "Thank you for renewing your insurance policy " . $policyNo . " with Co-operative Insurance Company PLC.";
    
//     // Prepare POST data
//     $postData = http_build_query([
//         'phoneNo' => $phoneNo,
//         'message' => $message,
//         'policyNo' => $policyNo,
//         'category' => 'OnlinePayment'
//     ]);
    
//     $ch = curl_init($baseUrl);
    
//     curl_setopt($ch, CURLOPT_POST, 1);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//     curl_setopt($ch, CURLOPT_HEADER, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//         'Content-Type: application/x-www-form-urlencoded',
//         'Content-Length: ' . strlen($postData)
//     ));
    
//     $response = curl_exec($ch);
//     $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
//     if(curl_errno($ch)) {
//         $error = "Error sending SMS: " . curl_error($ch);
//         error_log("SMS API Error: " . curl_error($ch));
//     } else {
//         if ($httpCode == 200 || $httpCode == 201) {
//             $success = true;
//             $successMessage = "SMS request sent successfully!";
//         } else {
//             $error = "API returned status code: $httpCode";
//         }
//     }
    
//     curl_close($ch);
// }

?>