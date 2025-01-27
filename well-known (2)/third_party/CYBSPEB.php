<?php
class CYBSPEB{
	
	
	
	public function getDefaultForm($OrderID,$PurchaseAmt){
		$SECRET_KEY='81359d36cb7548818908716e5fd3e84173d42db41dcf4efcac1aae122e2a8f254ecdda9cd1404471933bc5e274e8be72f6d09b952a9d419692e365a43190b5f1dec043e1958a4959aaaa0c46e01f472e4ee977072a614bfdb77ad0e409d94595bbf2cfbf7ee0405caa1aca0435bb06aa681377ccf2db4075b8db45246273689b';	
		$access_key='278fdccfdba8334a900d9a9822e6fef8';
		$profile_id='48A40F54-CDDF-47B6-9ABD-3A1EA5B23A27';
		// $url='https://secureacceptance.cybersource.com/pay';
		$url='https://testsecureacceptance.cybersource.com/pay';				
		$params=array();
		$params["transaction_uuid"]=uniqid() ;
		$params["access_key"]=$access_key;
		$params["profile_id"]=$profile_id;
		$params["signed_field_names"]="access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency";
		$params["unsigned_field_names"]="auth_trans_ref_no,bill_to_forename,bill_to_surname,bill_to_address_line1,bill_to_address_city,bill_to_address_country,bill_to_email";
		$params["signed_date_time"]=gmdate("Y-m-d\TH:i:s\Z");
		$params["locale"]="en";
		$params["transaction_type"]="sale";
		$params["reference_number"]=$OrderID;
		$params["auth_trans_ref_no"]=$OrderID;
		$params["amount"]=$PurchaseAmt;
		$params["currency"]="USD";
		$params["bill_to_email"]="tsystCybs@peb.org";
		$params["bill_to_forename"]="tsys to cybs";
		$params["bill_to_surname"]="Converter";
		$params["bill_to_address_line1"]="PEB";
		$params["bill_to_address_city"]="Borella";
		$params["bill_to_address_country"]="LK";
		$params["signature"]=$this->sign($params,$SECRET_KEY);
		
		$formtext='<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
		$formtext.='<script>$("#payment_confirmation").ready(function(){$("#payment_confirmation").submit();});</script>';
		$formtext.='<form type="hidden" id="payment_confirmation" action="'.$url.'" method="post"/>';
        foreach($params as $name => $value) {
            $formtext.="<input  type='hidden' id='". $name . "' name='" . $name . "' value='" . $value . "'/><br/>";
        }
		$formtext.='</form>';
		
		
		return $formtext;
			
	}
	
	
	private function sign ($params,$SECRET_KEY) {
		return $this->signData($this->buildDataToSign($params),$SECRET_KEY);
	}

	private function signData($data, $secretKey) {
		return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
	}

	private function buildDataToSign($params) {
		$signedFieldNames = explode(",",$params["signed_field_names"]);
		foreach ($signedFieldNames as $field) {
		   $dataToSign[] = $field . "=" . $params[$field];
		}
		return $this->commaSeparate($dataToSign);
	}

	private function commaSeparate ($dataToSign) {
		return implode(",",$dataToSign);
	}
	
	
}


?>