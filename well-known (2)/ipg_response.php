<?php
session_start();
if($_SESSION["TID"] == $_REQUEST["transaction_id"]){
    
    
}else{
    $_SESSION["TID"] = $_REQUEST["transaction_id"];

include ('security.php');
include('dbconn.php');
include('wellness_controller.php');
include 'sendsms.php';

$db = new DatabaseConnection;

$selector = $_REQUEST["req_reference_number"];
$selector = substr($selector, 0, 1);

$wplan = new wellness_controller;


if($selector == "W"){

  $sms_text = "Thank you for joining WELLNESS PLUS.You will receive your policy document in due course.";

 $updData = [
     'wp_order_id'                           => mysqli_real_escape_string($db->getConnection(),$_REQUEST["req_reference_number"]),
     'transaction_id'                        => mysqli_real_escape_string($db->getConnection(),$_REQUEST["transaction_id"]),
     'payer_authentication_transaction_id'   => mysqli_real_escape_string($db->getConnection(),$_REQUEST["payer_authentication_transaction_id"]),
     'auth_code'                             => mysqli_real_escape_string($db->getConnection(),$_REQUEST["auth_code"]),
     'message'                               => mysqli_real_escape_string($db->getConnection(),$_REQUEST["message"]),
     'req_transaction_uuid'                  => mysqli_real_escape_string($db->getConnection(),$_REQUEST["req_transaction_uuid"]),
     'auth_reconciliation_reference_number'  => mysqli_real_escape_string($db->getConnection(),$_REQUEST["auth_reconciliation_reference_number"]),
     'wp_payment_status'                     => mysqli_real_escape_string($db->getConnection(),$_REQUEST["decision"]),
             ];
             
    //echo "<pre>";
   // print_r($updData);

  $result = $wplan->update_pay_status($updData);

    if($_REQUEST["decision"] == "ACCEPT"){
        $wmobile_no = $wplan->getWellnessMobile(trim($_REQUEST["req_reference_number"])); 
        $sms_order_id = $wplan->getNewSMSid($wmobile_no);
        $sms =new sendsms();
        $sms->send($wmobile_no,$sms_order_id,$sms_text);
   }     

}

if($selector == "T"){

    $sms_text = "Thank you for your payment for Policy Renewal. Co-operative Insurance PLC";

    $updData = [
        'op_order_id'                           => mysqli_real_escape_string($db->getConnection(),$_REQUEST["req_reference_number"]),
        'transaction_id'                        => mysqli_real_escape_string($db->getConnection(),$_REQUEST["transaction_id"]),
        'payer_authentication_transaction_id'   => mysqli_real_escape_string($db->getConnection(),$_REQUEST["payer_authentication_transaction_id"]),
        'auth_code'                             => mysqli_real_escape_string($db->getConnection(),$_REQUEST["auth_code"]),
        'message'                               => mysqli_real_escape_string($db->getConnection(),$_REQUEST["message"]),
        'req_transaction_uuid'                  => mysqli_real_escape_string($db->getConnection(),$_REQUEST["req_transaction_uuid"]),
        'auth_reconciliation_reference_number'  => mysqli_real_escape_string($db->getConnection(),$_REQUEST["auth_reconciliation_reference_number"]),
        'op_payment_status'                     => mysqli_real_escape_string($db->getConnection(),$_REQUEST["decision"]),  
        'auth_amount'                           => mysqli_real_escape_string($db->getConnection(),$_REQUEST["auth_amount"]),
                ];


  $result = $wplan->update_tgpolicy_status($updData);
    
     if($_REQUEST["decision"] == "ACCEPT"){
       $wmobile_no      = $wplan->getTGMobile(trim($_REQUEST["req_reference_number"]));
       $policy_no       = $wplan->getTGPolicyNo(trim($_REQUEST["req_reference_number"]));
       $seqNo           = $wplan->getTGSeqNo(trim($_REQUEST["req_reference_number"]));
       $sms_order_id    = $wplan->getNewSMSid($wmobile_no);
       $sms =new sendsms();
       $sms->send($wmobile_no,$sms_order_id,$sms_text);
       
       $auth_amount = $_REQUEST["auth_amount"];
       
        $url_log = "http://34.87.118.90:8082/online-general/pay?policyNo=".$policy_no."&amount=".$auth_amount."&orderId=".$seqNo."";
        $curl = curl_init($url_log);
        $response = curl_exec($curl);
        curl_close($curl);
      //  echo $response;
        
       // echo "Thank you for the payment...";
   }   


}

if($selector == "G"){

      $sms_text = "Thank you for your payment. Co-operative Insurance PLC";

      $updData = [
        'op_order_id'                           => mysqli_real_escape_string($db->getConnection(),$_REQUEST["req_reference_number"]),
        'transaction_id'                        => mysqli_real_escape_string($db->getConnection(),$_REQUEST["transaction_id"]),
        'payer_authentication_transaction_id'   => mysqli_real_escape_string($db->getConnection(),$_REQUEST["payer_authentication_transaction_id"]),
        'auth_code'                             => mysqli_real_escape_string($db->getConnection(),$_REQUEST["auth_code"]),
        'message'                               => mysqli_real_escape_string($db->getConnection(),$_REQUEST["message"]),
        'req_transaction_uuid'                  => mysqli_real_escape_string($db->getConnection(),$_REQUEST["req_transaction_uuid"]),
        'auth_reconciliation_reference_number'  => mysqli_real_escape_string($db->getConnection(),$_REQUEST["auth_reconciliation_reference_number"]),
        'op_payment_status'                     => mysqli_real_escape_string($db->getConnection(),$_REQUEST["decision"]),
        'auth_amount'                           => mysqli_real_escape_string($db->getConnection(),$_REQUEST["auth_amount"]),
                ];


  $result = $wplan->update_tgpolicy_status($updData);
    
     if($_REQUEST["decision"] == "ACCEPT"){
       $wmobile_no      = $wplan->getTGMobile(trim($_REQUEST["req_reference_number"]));
       $policy_no       = $wplan->getTGPolicyNo(trim($_REQUEST["req_reference_number"]));
       $seqNo           = $wplan->getTGSeqNo(trim($_REQUEST["req_reference_number"]));
       $sms_order_id    = $wplan->getNewSMSid($wmobile_no);
       $sms =new sendsms();
       $sms->send($wmobile_no,$sms_order_id,$sms_text);
       
       $auth_amount = $_REQUEST["auth_amount"];
       
        $url_log = "http://34.87.118.90:8082/online-general/pay?policyNo=".$policy_no."&amount=".$auth_amount."&orderId=".$seqNo."";
        $curl = curl_init($url_log);
        $response = curl_exec($curl);
        curl_close($curl);
       // echo $response;
       
       echo "Thank you for the payment...";
   } 


}

}// edn if

?>


            <?php
                //  foreach($_REQUEST as $name => $value) {
                //      $params[$name] = $value;
                //      echo "<span>" . $name . "</span><input type=\"text\" name=\"" . $name . "\" size=\"50\" value=\"" . $value . "\" readonly=\"true\"/><br/>";
                //  }
               //  echo "<pre>";
                //print_r($_REQUEST);

                //  echo "<span>Signature Verified:</span><input type=\"text\" name=\"verified\" size=\"50\" value=\"";
                //  if (strcmp($params["signature"], sign($params))==0) {
                //      echo "True";
                //  } else {
                //      echo "False";
                //  }
                //  echo "\" readonly=\"true\"/><br/>";
            ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Digital Portal |  Co-Operative Insurance Company PLC</title>

<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/pricing/">

<link href="general/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

    </style>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>



    
    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
    <link href="general/assets/dist/css/style.css" rel="stylesheet">
  </head>
  <body>
<div class="DivSai"></div>
    
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check" viewBox="0 0 16 16">
    <title>Check</title>
    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
  </symbol>
</svg>

<div class="container py-3">
          <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
              <a href="index.php" class="d-flex align-items-center text-dark text-decoration-none">
                <img src="general/assets/dist/img/logo.png" width="40"  class="me-2" viewBox="0 0 118 94" role="img">
                <!-- <span class="fs-4">WELLNESS PLUS – CRITICAL ILLNESS INSURANCE PROPOSAL FORM</span> -->
                
                <span class="fs-4"><strong>CO-OPERATIVE INSURANCE COMPANY PLC</strong></span>
              </a>
            </div>
          </header>

    <main class="py-5">
    <br>

 <?php if($_REQUEST["decision"] == "ACCEPT"){ ?> 

  <figure class="text-center">
  <blockquote class="blockquote">
    <p>THANK YOU </p>
  </blockquote>
  <figcaption class="blockquote-footer">
  For your payment <br>
  <h3>Payment was successful.</h3>
  <br>
  <a href="https://www.ci.lk" class="btn btn-primary" >Return to Home Page</a>
  </figcaption>
</figure>

<?php } else { ?>

<figure class="text-center">
  <blockquote class="blockquote">
    <p>FAILED </p>
  </blockquote>
  <figcaption class="blockquote-footer">
  <h3>Payment was not successful.</h3>
  </figcaption>
</figure>

<?php } ?>

<br><br><br><br>


  <main>
    <div class="row row-cols-1 row-cols-md-1 mb-3 mt-5 text-center">
      
      <div class="col">
        <!-- <div class="card mb-4 rounded-3 shadow-sm border-primary">
          <div class="card-header py-3 bg-primary-subtle text-black">
           <i>Renew your policy</i>
          </div>

          <div class="card-body">
            


          </div>
        </div> -->
      </div>
    </div>

   
  </main>

  <footer class="pt-4 my-md-5 pt-md-5 border-top">
  <div class="row">
    <div class="col-12 col-md">
      <img class="mb-2" src="general/assets/dist/img/logo.png" alt="" width="24">
      <strong>CO-OPERATIVE INSURANCE COMPANY PLC</strong>
      <small class="d-block mb-3 text-muted">“Co-operative Insurance House” No.74/5, Grandpass Road, Colombo 14. <br> Tel : <a href="tel:0112 557300-9" class="link-info">0112 557300-9 </a> |  <a href="tel:0112 2472796" class="link-info">0112 2472796</a> 	
        Email : <a href="mailto:info@coopinsu.com" class="link-info">info@coopinsu.com </a> | <a href="mailto:medical.unit@coopinsu.com" class="link-info">medical.unit@coopinsu.com</a>  <a href="www.ci.lk" class="link-primary">www.ci.lk</a> </small> 
    </div>
  </div>
</footer>
</div>


    
  </body>
</html>

