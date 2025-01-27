<?php

class wellness_controller
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->getConnection();  // Changed from $db->conn to $db->getConnection()
    }

    public function create($inputData)
    {
        $wp_order_id= $inputData['wp_order_id'];
        $wp_title= $inputData['wp_title'];
        $wp_full_name= $inputData['wp_full_name'];
        $wp_address= $inputData['wp_address'];
        $wp_nic_pass= $inputData['wp_nic_pass'];
        $wp_dob= $inputData['wp_dob'];
        $wp_mobile_no= $inputData['wp_mobile_no'];
        $wp_land_no= $inputData['wp_land_no'];
        $wp_gender= $inputData['wp_gender'];
        $wp_occup= $inputData['wp_occup'];
        $wp_emp_name_address= $inputData['wp_emp_name_address'];
        $wp_email_address= $inputData['wp_email_address'];
        $wp_marital_status= $inputData['wp_marital_status'];
        $wp_cover= $inputData['wp_cover'];
        $wpq_1a= $inputData['wpq_1a'];
        $wpq_1a_comment= $inputData['wpq_1a_comment'];
        $wpq_1b= $inputData['wpq_1b'];
        $wpq_1b_comment= $inputData['wpq_1b_comment'];
        $wpq_1c= $inputData['wpq_1c'];
        $wpq_1c_comment= $inputData['wpq_1c_comment'];
        $wpq_1d= $inputData['wpq_1d'];
        $wpq_1d_comment= $inputData['wpq_1d_comment'];
        $wpq_1e= $inputData['wpq_1e'];
        $wpq_1e_comment= $inputData['wpq_1e_comment'];
        $wpq_1f= $inputData['wpq_1f'];
        $wpq_1f_comment= $inputData['wpq_1f_comment'];
        $wpq_1g= $inputData['wpq_1g'];
        $wpq_1g_comment= $inputData['wpq_1g_comment'];
        $wpq_1h= $inputData['wpq_1h'];
        $wpq_1h_comment= $inputData['wpq_1h_comment'];
        $wpq_2ab= $inputData['wpq_2ab'];
        $wpq_2ab_comment= $inputData['wpq_2ab_comment'];
        $wpq_3abcd= $inputData['wpq_3abcd'];
        $wpq_3abcd_comment= $inputData['wpq_3abcd_comment'];
        $wpq_3e= $inputData['wpq_3e'];
        $wpq_3e_comment= $inputData['wpq_3e_comment'];
        $wp_agree= $inputData['wp_agree'];


        $wQuery = "INSERT INTO `tbl_wellness_plan` 
        (
         `wp_order_id`,
         `wp_title`,
         `wp_full_name`,
         `wp_address`,
         `wp_nic_pass`,
         `wp_dob`,
         `wp_mobile_no`,
         `wp_land_no`,
         `wp_gender`,
         `wp_occup`,
         `wp_emp_name_address`,
         `wp_email_address`,
         `wp_marital_status`,
         `wp_cover`,
         `wpq_1a`,
         `wpq_1a_comment`,
         `wpq_1b`,
         `wpq_1b_comment`,
         `wpq_1c`,
         `wpq_1c_comment`,
         `wpq_1d`,
         `wpq_1d_comment`,
         `wpq_1e`,
         `wpq_1e_comment`,
         `wpq_1f`,
         `wpq_1f_comment`,
         `wpq_1g`,
         `wpq_1g_comment`,
         `wpq_1h`,
         `wpq_1h_comment`,
         `wpq_2ab`,
         `wpq_2ab_comment`,
         `wpq_3abcd`,
         `wpq_3abcd_comment`,
         `wpq_3e`,
         `wpq_3e_comment`,
         `wp_agree`) 
         VALUES 
         (
        '$wp_order_id',
        '$wp_title',
        '$wp_full_name',
        '$wp_address',
        '$wp_nic_pass',
        '$wp_dob',
        '$wp_mobile_no',
        '$wp_land_no',
        '$wp_gender',
        '$wp_occup',
        '$wp_emp_name_address',
        '$wp_email_address',
        '$wp_marital_status',
        '$wp_cover',
        '$wpq_1a',
        '$wpq_1a_comment',
        '$wpq_1b',
        '$wpq_1b_comment',
        '$wpq_1c',
        '$wpq_1c_comment',
        '$wpq_1d',
        '$wpq_1d_comment',
        '$wpq_1e',
        '$wpq_1e_comment',
        '$wpq_1f',
        '$wpq_1f_comment',
        '$wpq_1g',
        '$wpq_1g_comment',
        '$wpq_1h',
        '$wpq_1h_comment',
        '$wpq_2ab',
        '$wpq_2ab_comment',
        '$wpq_3abcd',
        '$wpq_3abcd_comment',
        '$wpq_3e',
        '$wpq_3e_comment',
        '$wp_agree')";

        $result = $this->conn->query($wQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function create_tgpolicy($inputData)
{
    $op_order_id = $inputData['op_order_id'];
    $op_pol_type = $inputData['op_pol_type'];
    $op_mobile_no = $inputData['op_mobile_no'];
    $op_pol_no = $inputData['op_pol_no'];
    
    // Set default values for optional fields
    $payer_authentication_transaction_id = $inputData['payer_authentication_transaction_id'] ?? '';
    $auth_code = $inputData['auth_code'] ?? '';
    $message = $inputData['message'] ?? '';
    $req_transaction_uuid = $inputData['req_transaction_uuid'] ?? '';
    $auth_reconciliation_reference_number = $inputData['auth_reconciliation_reference_number'] ?? '';
    $op_payment_status = $inputData['op_payment_status'] ?? 'PENDING';

    $tgquery = "INSERT INTO `tbl_online_payment` (
                                    `op_order_id`,
                                    `op_pol_type`,
                                    `op_pol_no`,
                                    `payer_authentication_transaction_id`,
                                    `auth_code`,
                                    `message`,
                                    `req_transaction_uuid`,
                                    `auth_reconciliation_reference_number`,
                                    `op_payment_status`,
                                    `op_mobile_no`
                                    ) 
                        VALUES (
                                '$op_order_id',
                                '$op_pol_type',
                                '$op_pol_no',
                                '$payer_authentication_transaction_id',
                                '$auth_code',
                                '$message',
                                '$req_transaction_uuid',
                                '$auth_reconciliation_reference_number',
                                '$op_payment_status',
                                '$op_mobile_no'
                                )";

    $result = $this->conn->query($tgquery);
    return $result ? true : false;
}
    

    public function update_pay_status($updData)
    {
        $wp_order_id= $updData['wp_order_id'];
        $transaction_id= $updData['transaction_id'];
        $payer_authentication_transaction_id= $updData['payer_authentication_transaction_id'];
        $auth_code= $updData['auth_code'];
        $message= $updData['message'];
        $req_transaction_uuid= $updData['req_transaction_uuid'];
        $auth_reconciliation_reference_number= $updData['auth_reconciliation_reference_number'];
        $wp_payment_status = $updData['wp_payment_status'];

       $uquery = "UPDATE `tbl_wellness_plan`
                    SET `transaction_id` = '$transaction_id',
                        `payer_authentication_transaction_id` = '$payer_authentication_transaction_id',
                        `auth_code` = '$auth_code',
                        `message` = '$message',
                        `req_transaction_uuid` = '$req_transaction_uuid',
                        `auth_reconciliation_reference_number` = '$auth_reconciliation_reference_number',
                        `wp_payment_status` = '$wp_payment_status'
                WHERE `wp_order_id` = '$wp_order_id'";
        $uresult = $this->conn->query($uquery);

        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function update_tgpolicy_status($inputData)
    {
        $op_order_id                            = $inputData['op_order_id'];
        $payer_authentication_transaction_id    = $inputData['payer_authentication_transaction_id'];
        $auth_code                              = $inputData['auth_code'];
        $message                                = $inputData['message'];
        $req_transaction_uuid                   = $inputData['req_transaction_uuid'];
        $auth_reconciliation_reference_number   = $inputData['auth_reconciliation_reference_number'];
        $op_payment_status                      = $inputData['op_payment_status'];
        $auth_amount                            = $inputData['auth_amount'];

       $uquery = "UPDATE `tbl_online_payment` 
                    SET 
                            `payer_authentication_transaction_id` = '$payer_authentication_transaction_id',
                            `auth_code` = '$auth_code',
                            `message` = '$message',
                            `req_transaction_uuid` = '$req_transaction_uuid',
                            `auth_reconciliation_reference_number` = '$auth_reconciliation_reference_number',
                            `op_payment_status` = '$op_payment_status',
                            `auth_amount` = '$auth_amount'
                    WHERE `op_order_id` = '$op_order_id'";

        $uresult = $this->conn->query($uquery);

        if($uresult==1){
            return "Record Updated...!";
        }else{
            return false;
        }


    }

    public function getSMSid(){

        $wQuery = "SELECT max(wp_id) smsid FROM `tbl_wellness_plan` ORDER BY `wp_id` ASC";

        $result = $this->conn->query($wQuery);

        if($result->num_rows == 1){
            $data = $result->fetch_assoc();
            return $data["smsid"];
        }else{
            return false;
        }
    }
    
    public function getNewSMSid($mobile){

        $wQuery = "SELECT max(sms_id) smsid FROM tbl_sms ORDER BY sms_id ASC";

        $result = $this->conn->query($wQuery);

        if($result->num_rows == 1){
            $data = $result->fetch_assoc();
            $this->smsCount($mobile);
            return $data["smsid"];
        }else{
            return false;
        }
    }
    
    public function smsCount($mobile){

        $sql = "INSERT INTO `tbl_sms` (`sms_desc`) VALUES ( '$mobile')";
        $this->conn->query($sql);
    }

    public function getMobile($orderID){

        $wQuery = "SELECT `op_mobile_no` FROM `tbl_online_payment` where `op_order_id` = '$orderID'";

        $result = $this->conn->query($wQuery);

        if($result->num_rows == 1){
            $data = $result->fetch_assoc();
            return $data["op_mobile_no"];
        }else{
            return false;
        }
    }

    public function getWellnessMobile($orderID){

        $wQuery = "SELECT `wp_mobile_no` FROM `tbl_wellness_plan` WHERE `wp_order_id` = '$orderID'";

        $result = $this->conn->query($wQuery);

        if($result->num_rows == 1){
            $data = $result->fetch_assoc();
            return $data["wp_mobile_no"];
        }else{
            return false;
        }
    }
    
    public function getTGMobile($orderID){

        $wQuery = "SELECT `op_mobile_no` FROM `tbl_online_payment` WHERE `op_order_id` = '$orderID'";
        $result = $this->conn->query($wQuery);

        if($result->num_rows == 1){
            $data = $result->fetch_assoc();
            return $data["op_mobile_no"];
        }else{
            return false;
        }
    }
    
    public function getTGPolicyNo($orderID){

        $wQuery = "SELECT `op_pol_no` FROM `tbl_online_payment` WHERE `op_order_id` = '$orderID'";
        $result = $this->conn->query($wQuery);

        if($result->num_rows == 1){
            $data = $result->fetch_assoc();
            return $data["op_pol_no"];
        }else{
            return false;
        }
    }
    
        public function getTGSeqNo($orderID){

        $wQuery = "SELECT `op_id` FROM `tbl_online_payment` WHERE `op_order_id` = '$orderID'";
        $result = $this->conn->query($wQuery);

        if($result->num_rows == 1){
            $data = $result->fetch_assoc();
            return $data["op_id"];
        }else{
            return false;
        }
    }


}
?>