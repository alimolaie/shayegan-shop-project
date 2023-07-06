<?php
namespace App\Http\Controllers;
use App\AdminLogs;
use App\Admin;
use App\Settings;
use App\WebPush;
use App\WebPushMessage;
use App\Transaction;
use App\SmsNotify;
use Curl;
//paypal
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction as PayPayalTransaction;

class Common extends Controller
{
    
	public static function getLangString($title_en,$title_ar){
	if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}
	if($strLang=="en" && !empty($title_en)){
	return $title_en;
	}else if($strLang=="ar" && !empty($title_ar)){
	return $title_ar;
	}else{
	return '--';
	}
	}
	
	public static function getLangStringExtra($title_en,$title_ar){
	if(!empty(app()->getLocale())){ $strLang = app()->getLocale();}else{$strLang="en";}
	if($strLang=="en" && !empty($title_en)){
	return '<br><b>'.$title_en.'</b>';
	}else if($strLang=="ar" && !empty($title_ar)){
	return '<br><b>'.$title_ar.'</b>';
	}else{
	return '';
	}
	}
	///currency converter//////////////////
	public  static  function currencyconverter($amount,$from,$to){
	    if(!empty($amount) && !empty($from) && !empty($to)){
		$url = "https://www.google.com/search?q=".$amount."+".strtoupper($from).'+'.strtoupper($to);
		$request = curl_init();
		$timeOut = 0;
		curl_setopt($request, CURLOPT_URL, $url);
		curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($request, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/68.0.3440.106 Safari/537.36");
		curl_setopt($request, CURLOPT_CONNECTTIMEOUT, $timeOut);
		$response = curl_exec($request);
		curl_close($request);
		$first_step  = explode( '<div class="nRbRnb" id="knowledge-currency__updatable-data-column">' , $response );
		$second_step = explode("</div>" , $first_step[1] );
		$third_step  = explode('data-value="',$second_step[1]);
		$fourth_step = explode('"',$third_step[1]);
		if(!empty($fourth_step[0])){
		return $fourth_step[0];	
		}else{
		return 0;
		}
		}else{
		return 0;
		}
	}
	///end currency converter//////////////
	
	//get dezsms total points via api
	public static function DezsmsPoints(){
	$settingInfo = Settings::where("keyname","setting")->first();
	if(!empty($settingInfo->is_sms_active) && !empty($settingInfo->sms_userid) && !empty($settingInfo->sms_sender_name) && !empty($settingInfo->sms_api_key)){
	$apiUrl = "https://www.dezsms.com/json_dezsmsnewapi_totalpoints.php";
	$response = Curl::to($apiUrl)
					->withData([
					'key'=>$settingInfo->sms_api_key,
					'usermobile'=>$settingInfo->sms_userid
					])->post();
	 $jsdecode = json_decode($response, true);
	 }else{
	 $jsdecode =["status"=>"error","message"=>"Credentials are missing"];
	 }	
	 return $jsdecode;
	}
	//send sms to dezsms
	public static function SendSms($to,$sms_msg,$notsend=""){
	if(empty($notsend)){
	if(!empty($to) && !empty($sms_msg)){
	$sms = new SmsNotify;
	$sms->send_to  = $to;
	$sms->send_msg = $sms_msg;
	$sms->save();
	}
	$jsdecode =["status"=>"200","message"=>"SMS is scheduled successfully"];
	}else{	
	$settingInfo = Settings::where("keyname","setting")->first();
	if(
	   !empty($to) && 
	   !empty($sms_msg) && 
	   !empty($settingInfo->is_sms_active) && 
	   !empty($settingInfo->sms_userid) && 
	   !empty($settingInfo->sms_sender_name) && 
	   !empty($settingInfo->sms_api_key)
	 ){
	$apiUrl = "https://www.dezsms.com/json_dezsmsnewapi.php";
	
	$response = Curl::to($apiUrl)
					->withData([
					'key'=>$settingInfo->sms_api_key,
					'dezsmsid'=>$settingInfo->sms_userid,
					'senderid'=>$settingInfo->sms_sender_name,
					'msg'=>$sms_msg,
					'number'=>$to
					])->post();
	 $jsdecode = json_decode($response, true);
	 $status = $jsdecode[0]['status'];
	 $message = self::DezsmsErrorMsg($status);
	 $jsdecode =["status"=>$status,"message"=>$message];
	 }else{
	 $jsdecode =["status"=>"404","message"=>"Credentials are missing"];
	 }	
	 }
	 return $jsdecode;
	}
	
	//get Dezsms error text message via code
	public static function DezsmsErrorMsg($Error){
	if($Error==100){
		$txt =  "SMS has been sent successfully";
	}else if($Error==101){
		$txt =  "This is Invalid user";
	}else if($Error==102){
		$txt =  "Invalid authentication key!";
	}else if($Error==103){
		$txt =  "Mobile number OR Message is required!";
	}else if($Error==104){
		$txt =  "You can send upto 200 maximum mobile numbers at once.";
	}else if($Error==105){
		$txt =  "SMS Sending failed.Please contact with your SMS provider.";
	}else if($Error==106){
		$txt =  "Arabic text should not be greater than 258";
	}else if($Error==107){
		$txt =  "English text should not be greater than 526";
	}else if($Error==108){
		$txt =  "Your account is not activeted";
	}else if($Error==109){
		$txt =  "Your account has been expired.";
	}else if($Error==110){
		$txt =  "SMS point is not enough to send sms";
	}else if($Error==111){
		$txt =  "Invalid Mobile number";
	}
     return $txt;
	}
	
	
	//recaptcha verification
	public static function VerifyCaptcha($response)
    {
	
	    $google_url = "https://www.google.com/recaptcha/api/siteverify";
        $secret     = '6LeMueQUAAAAACXA8eAOD1JMWjvjZnGMwiRpX06p';
        $url        = $google_url."?secret=".$secret."&response=".$response;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_TIMEOUT, 15);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, TRUE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2); 
        $curlData = curl_exec($curl);
 
        curl_close($curl);
 
        $res = json_decode($curlData, TRUE);
        if($res['success'] == 'true') 
            return TRUE;
        else
            return FALSE;
    }
	
	//validate kuwait mobile number
	public static function checkMobile($mobile){
	$flag = 0;
		if(!empty($mobile) && preg_match('/[0-9 ]+/i',$mobile)==true){
		  $mobileval = substr($mobile, 0, -7); 
		   if($mobileval==5 || $mobileval==6 || $mobileval==9){
			$flag=1;
		   }
		}
	return $flag;
	}
	
	//register device ios/android
	public static function registerDevice($device_token,$device_type,$user_id=''){
	
	$devices = WebPush::where('device_token',$device_token)->where('device_type',$device_type)->first();
	if(empty($devices->id)){
	$devices = new WebPush;
	$devices->device_token = $device_token;
	$devices->device_type  = $device_type;
	$devices->user_id      = $user_id;
	$devices->save();
	}	
	}
	
	//save admin logs
    public static function saveLogs($key_name,$key_id,$message,$created_by=NULL){
	 $logs = new AdminLogs;
	 $logs->key_name   = $key_name;
	 $logs->key_id     = $key_id;
	 $logs->message    = $message;
	 $logs->created_by = $created_by;
	 $logs->save();
	}
	//show created by Name\
	public static function createdByName($id){
	 $admin = Admin::find($id);
	 if(!empty($admin->name)){
	 $name = $admin->name;
	 }else{
	 $name = "ID =".$id;
	 }
	 return $name;
	}
	
	/////////////////////////////send push notification///////////////////////////////
	public static function sendMobilePush($token,$title,$message,$type='regular'){
	$settingInfo = Settings::where("keyname","setting")->first();
	
	$data = array
		(
			'subtitle'	 => $title,
			'tickerText'   => $title,
			'message'      => $message,
			'vibrate'	  => 1,
			'sound'		=> 1,
			'largeIcon'	=> 'large_icon',
			'smallIcon'	=> 'small_icon',
			'type'         => $type
		
		);
		// Optional push notification options (such as iOS notification fields)
		
		$options = array(
			'notification' => array(
				'badge' => 1,
				'sound' => "ping.aiff",
				'title' => $title,
				'body'  => $message
				
			)
		);
		
		

        // Insert your Secret API Key here
        $apiKey = $settingInfo->pushy_api_token;

        // Default post data to provided options or empty array
        $post = $options ?: array();

        // Set notification payload and recipients
        $post['to']   = $token;
        $post['data'] = $data;
		$post['content_available']=TRUE;

        // Set Content-Type header since we're sending JSON
        $headers = array(
            'Content-Type: application/json'
        );

        // Initialize curl handle
        $ch = curl_init();

        // Set URL to Pushy endpoint
        curl_setopt($ch, CURLOPT_URL, 'https://api.pushy.me/push?api_key=' . $apiKey);

        // Set request method to POST
        curl_setopt($ch, CURLOPT_POST, true);

        // Set our custom headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Get the response back as string instead of printing it
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Set post data as JSON
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post, JSON_UNESCAPED_UNICODE));

        // Actually send the push
        $result = curl_exec($ch);

        // Display errors
        if (curl_errno($ch)) {
            echo curl_error($ch);
        }

        // Close curl handle
        curl_close($ch);
		//return json_encode($result);
		
	}
	
	///////////////////////////////////////////////KNET INTEGRATION HELPER , DON'T EDIT//////////////////////////
  public static function knet_payment_processing($orderid,$totalprice,$uid=0,$strLang="en",$paytype=0){
   $settingInfo = Settings::where("keyname","setting")->first();
   	
   $ResponseUrl = url('knet_response_accept');
   $ErrorUrl    = url('knet_failed');
   //check pay status type
   if(empty($paytype)){
   $TRANSPORTAL_ID      = config('services.knet_test.TRANSPORTAL_ID');
   $TRANSPORTAL_PASS    = config('services.knet_test.TRANSPORTAL_PASS');
   $CURRENCY_CODE       = config('services.knet_test.CURRENCY_CODE');
   $LANGID              = config('services.knet_test.LANGID');
   $ACTION              = config('services.knet_test.ACTION');
   $TERM_RESOURCE_KEY   = config('services.knet_test.TERM_RESOURCE_KEY');
   $PAYMENT_REQUEST_URL = config('services.knet_test.PAYMENT_REQUEST_URL');
   }else{
   $TRANSPORTAL_ID      = config('services.knet_live.TRANSPORTAL_ID');
   $TRANSPORTAL_PASS    = config('services.knet_live.TRANSPORTAL_PASS');
   $CURRENCY_CODE       = config('services.knet_live.CURRENCY_CODE');
   $LANGID              = config('services.knet_live.LANGID');
   $ACTION              = config('services.knet_live.ACTION');
   $TERM_RESOURCE_KEY   = config('services.knet_live.TERM_RESOURCE_KEY');
   $PAYMENT_REQUEST_URL = config('services.knet_live.PAYMENT_REQUEST_URL');
   }
   
   //check resource key exist or not
   if(empty($TERM_RESOURCE_KEY)){
   return ["status"=>0,"message"=>"TERM RESOURCE KEY is missing","payurl"=>""];
   }
   if(empty($TRANSPORTAL_ID)){
   return ["status"=>0,"message"=>"TRANSPORTAL ID is missing","payurl"=>""];
   }
   if(empty($TRANSPORTAL_PASS)){
   return ["status"=>0,"message"=>"TRANSPORTAL PASS is missing","payurl"=>""];
   }
   
   try{
   
   $ReqTranportalId       = "id=".$TRANSPORTAL_ID;
   $ReqTranportalPassword = "password=".$TRANSPORTAL_PASS;
   $ReqCurrency           = "currencycode=".$CURRENCY_CODE;
   $ReqLangid             = "langid=".$LANGID;
   $ReqAction             = "action=".$ACTION;
   $ReqAmount             = "amt=".$totalprice;
   $ReqTrackId            = "trackid=".$orderid;
   $ReqResponseUrl        = "responseURL=".$ResponseUrl; // knet_response_directpay
   $ReqErrorUrl           = "errorURL=".$ErrorUrl;
   $ReqUdf1               = "udf1=".$orderid;
   $ReqUdf2               = "udf2=";
   $ReqUdf3               = "udf3=".$strLang;
   $ReqUdf4               = "udf4=".$uid;
   $ReqUdf5               = "udf5=";
   
   /* Now merchant sets all the inputs in one string for encrypt and then passing to the Payment Gateway URL */		
   $param=$ReqTranportalId."&".$ReqTranportalPassword."&".$ReqAction."&".$ReqLangid."&".$ReqCurrency."&".$ReqAmount."&".$ReqResponseUrl."&".$ReqErrorUrl."&".$ReqTrackId."&".$ReqUdf1."&".$ReqUdf2."&".$ReqUdf3."&".$ReqUdf4."&".$ReqUdf5;
   //echo $param; echo "<hr>";
   $param=self::encryptAES($param,$TERM_RESOURCE_KEY)."&tranportalId=".$TRANSPORTAL_ID."&responseURL=".$ResponseUrl."&errorURL=".$ErrorUrl;
   
   ///trackinfo
	$transaction = new Transaction;
	$transaction->presult  = 'INITIALIZED';
	$transaction->postdate = date("md");
	$transaction->udf1     = $orderid;
	$transaction->udf2     = $totalprice;
	$transaction->udf3     = $strLang;
	$transaction->udf4     = $uid;
	$transaction->udf5     = $settingInfo->name_en;
	$transaction->trackid  = $orderid;
	$transaction->save();
	
	$payredirectUrl = $PAYMENT_REQUEST_URL.$param;
	
	return ["status"=>1,"message"=>"Initialized successfully","payurl"=>$payredirectUrl];
	  
	}catch (\Exception $e) {
    return ["status"=>0,"message"=>$e->getMessage(),"payurl"=>""];
     }
	}
	
	public static function encryptAES($str,$key) {
	$str         = self::pkcs5_pad($str); 
	$encrypted   = openssl_encrypt($str, 'AES-128-CBC', $key, OPENSSL_ZERO_PADDING, $key);
	$encrypted   = base64_decode($encrypted);
	$encrypted   = unpack('C*', ($encrypted));
	$encrypted   = self::byteArray2Hex($encrypted);
	$encrypted   = urlencode($encrypted);
	return $encrypted;
	}
	
	public static function pkcs5_pad($text) {
	$blocksize = 16;
	$pad       = $blocksize - (strlen($text) % $blocksize);
	return $text . str_repeat(chr($pad), $pad);
	}
	
	public static function byteArray2Hex($byteArray) {
	$chars = array_map("chr", $byteArray);
	$bin   = join($chars);
	return bin2hex($bin);
	}
	
	//AES Encryption Method Ends
	//Decryption Method for AES Algorithm Starts
	
	public static function decrypt($code,$key) { 
	$code      = self::hex2ByteArray(trim($code));
	$code      = self::byteArray2String($code);
	$iv        = $key; 
	$code      = base64_encode($code);
	$decrypted = openssl_decrypt($code, 'AES-128-CBC', $key, OPENSSL_ZERO_PADDING, $iv);
	return self::pkcs5_unpad($decrypted);
	}
		
	public static function hex2ByteArray($hexString) {
	$string = hex2bin($hexString);
	return unpack('C*', $string);
	}
	
	public static function byteArray2String($byteArray) {
	$chars = array_map("chr", $byteArray);
	return join($chars);
	}

    public static function pkcs5_unpad($text) {
	$pad = ord($text[strlen($text)-1]);
	if($pad > strlen($text)){
	      return false;	
	 }
	if (strspn($text, chr($pad), strlen($text) - $pad) != $pad) {
	      return false;
	  }
	 return substr($text, 0, -1 * $pad);
    }
	//Decryption Method for AES Algorithm Ends
	
	public static function splitData($trandata) {
		$splitData=[];
		$data = explode ( "&", $trandata );
		foreach ( $data as $value ) {
			$temp = explode ( "=", $value );
			if ( !isset($temp[1])) {
				$temp[1] = "";
			}
			$splitData [$temp [0]] = $temp [1];
		}
		return $splitData;
	}
	///////////////////////////////////////////////END KNET INTEGRATION HELPER , DON'T EDIT//////////////////////////
	
	//////////////////////////////////////////////START TAHSEEL PAYMENT//////////////////////////////////////////////
   public static function tahseel_payment_confirm($hash,$inv_id,$paytype=0,$request){
   
   if(empty($paytype)){
   $TAH_UID       = config('services.tahseel_test.TAH_UID');
   $TAH_PWD       = config('services.tahseel_test.TAH_PWD');
   $TAH_SECRET    = config('services.tahseel_test.TAH_SECRET');
   $TAH_INFO_URL  = config('services.tahseel_test.TAH_INFO_URL');
   }else{
   $TAH_UID       = config('services.tahseel_live.TAH_UID');
   $TAH_PWD       = config('services.tahseel_live.TAH_PWD');
   $TAH_SECRET    = config('services.tahseel_live.TAH_SECRET');
   $TAH_INFO_URL  = config('services.tahseel_live.TAH_INFO_URL');
   }
   
   //check resource key exist or not
   if(empty($TAH_UID)){
   return ["status"=>0,"message"=>"Tahseel UID is missing.","is_paid"=>0];
   }
   if(empty($TAH_PWD)){
   return ["status"=>0,"message"=>"Tahseel PWD is missing.","is_paid"=>0];
   }
   if(empty($TAH_SECRET)){
   return ["status"=>0,"message"=>"Tahseel SECRET is missing.","is_paid"=>0];
   }
   if(empty($hash) || empty($inv_id)){
   return ["status"=>0,"message"=>"Tahseel HASH or INV ID is missing.","is_paid"=>0];
   }
   
   if(empty($TAH_INFO_URL)){
   return ["status"=>0,"message"=>"Tahseel INFO URL is missing.","is_paid"=>0];
   }
    
  try{
   
     $response = Curl::to($TAH_INFO_URL)
					->withData([
					'uid'    =>$TAH_UID,
					'pwd'    =>$TAH_PWD,
					'secret' =>$TAH_SECRET,
					'id'     =>$inv_id,
					'hash'   =>$hash
					])->post();
	 $jsdecode = json_decode($response, true);
	 
	 if(!empty($jsdecode['TxInfo']['tx_id'])){
	 //save trans
	 $transaction = Transaction::where('tahseel_hash',$hash)->first();
	 $transaction->tahseel_tx_id = $jsdecode['TxInfo']['tx_id'];
	 $transaction->amt           = $jsdecode['TxInfo']['amt'];
	 $transaction->PayType       = $jsdecode['TxInfo']['type'];
	 $transaction->payment_id    = $jsdecode['TxInfo']['PaymentID'];
	 $transaction->presult       = $jsdecode['TxInfo']['Result'];
	 $transaction->tranid        = $jsdecode['TxInfo']['TranID'];
	 $transaction->auth          = $jsdecode['TxInfo']['Auth'];
	 $transaction->ref           = $jsdecode['TxInfo']['Ref']; 
	 $transaction->save();
	 $is_paid  = $jsdecode['TxInfo']['Result']=="CAPTURED"?1:0;
	 return ["status"=>1,"message"=>$transaction->trackid,"is_paid"=>$is_paid];
	 }else{
	 $transaction = Transaction::where('tahseel_hash',$hash)->first();
	 if(!empty($transaction->id)){
	 
	 if(!empty($request->tx_id)){
	 $transaction->tahseel_tx_id = $request->tx_id;
	 }
	 if(!empty($request->tx_amt)){
	 $transaction->amt           = $request->tx_amt;
	 }

	 if(!empty($request->PaymentID)){
	 $transaction->payment_id    = $request->PaymentID;
	 }
	 
	 $transaction->presult       = "NOT CAPTURED";
	 
	 if(!empty($request->TranID)){
	 $transaction->tranid        = $request->TranID;
	 }
	 if(!empty($request->Auth)){
	 $transaction->auth          = $request->Auth;
	 }
	 if(!empty($request->Ref)){
	 $transaction->ref          = $request->Ref;
	 }
	 if(!empty($request->tx_mode)){
	 $transaction->PayType      = $request->tx_mode;
	 }
	 $transaction->save();
	 }
	 return ["status"=>1,"message"=>$transaction->trackid,"is_paid"=>0];
	 }	 

	 return ["status"=>0,"message"=>"Invalid request(2)","is_paid"=>0];
	 
   }catch (\Exception $e) {
    return ["status"=>0,"message"=>$e->getMessage(),"is_paid"=>0];
   }
   
   }
   	
   public static function tahseel_payment_initialize($CUST_NAME,$CUST_EMAIL,$AMOUNT,$ORDERID,$TOTAL_ITEMS,$uid=0,$strLang="en",$DELIVERY_CHARGES=0,$paytype=0){
   
   $settingInfo   = Settings::where("keyname","setting")->first();
 
   //check pay status type
   if(empty($paytype)){
   $TAH_UID       = config('services.tahseel_test.TAH_UID');
   $TAH_PWD       = config('services.tahseel_test.TAH_PWD');
   $TAH_SECRET    = config('services.tahseel_test.TAH_SECRET');
   $TAH_ORDER_URL = config('services.tahseel_test.TAH_ORDER_URL');
   $TAH_INFO_URL  = config('services.tahseel_test.TAH_INFO_URL');
   $RETURN_URL    = config('services.tahseel_test.TAH_RETURN_URL').'/tahseel_response_accept';
   }else{
   $TAH_UID       = config('services.tahseel_live.TAH_UID');
   $TAH_PWD       = config('services.tahseel_live.TAH_PWD');
   $TAH_SECRET    = config('services.tahseel_live.TAH_SECRET');
   $TAH_ORDER_URL = config('services.tahseel_live.TAH_ORDER_URL');
   $TAH_INFO_URL  = config('services.tahseel_live.TAH_INFO_URL');
   $RETURN_URL    = config('services.tahseel_live.TAH_RETURN_URL').'/tahseel_response_accept';
   }
   
   
   //check resource key exist or not
   if(empty($TAH_UID)){
   return ["status"=>0,"message"=>"Tahseel UID is missing.","payurl"=>""];
   }
   if(empty($TAH_PWD)){
   return ["status"=>0,"message"=>"Tahseel PWD is missing.","payurl"=>""];
   }
   if(empty($TAH_SECRET)){
   return ["status"=>0,"message"=>"Tahseel SECRET is missing.","payurl"=>""];
   }
   if(empty($TAH_ORDER_URL)){
   return ["status"=>0,"message"=>"Tahseel ORDER URL is missing.","payurl"=>""];
   }
   
   try{
   
   $response = Curl::to($TAH_ORDER_URL)
					->withData([
					'uid'             =>$TAH_UID,
					'pwd'             =>$TAH_PWD,
					'secret'          =>$TAH_SECRET,
					'cust_name'       =>$CUST_NAME,
					'cust_email'      =>$CUST_EMAIL,
					'order_amt'       =>$AMOUNT,
					'delivery_charges'=>$DELIVERY_CHARGES,
					'order_no'        =>$ORDERID,
					'total_items'     =>$TOTAL_ITEMS,
					'callback_url'    =>$RETURN_URL,
					'knet_allowed'    =>1,
					'cc_allowed'      =>1
					])->post();
	 $jsdecode = json_decode($response, true);
	 //dd($jsdecode);
	 $status   = $jsdecode['error'];
	 if(empty($status) || $status==false){
	 $link     = explode("?",$jsdecode['link']);
	 $data     = self::splitData($link[1]);
	 //save trans
	 $transaction = new Transaction;
	 $transaction->tahseel_hash=$data['hash'];
	 $transaction->tahseel_inv_id=$data['id'];
	 $transaction->presult  = 'INITIALIZED';
	 $transaction->postdate = date("md");
	 $transaction->udf1     = $ORDERID;
	 $transaction->udf2     = $AMOUNT;
	 $transaction->udf3     = $strLang;
	 $transaction->udf4     = $uid;
	 $transaction->udf5     = 'TAHSEEL';
	 $transaction->trackid  = $ORDERID;
	 $transaction->save();
	 return ["status"=>1,"message"=>"Initialized successfully","payurl"=>$jsdecode['link']];
	 }else{
	 return ["status"=>0,"message"=>$jsdecode['msg'],"payurl"=>""];
	 }	 
	 //dd($jsdecode);
	return ["status"=>0,"message"=>"Invalid request","payurl"=>""];
	 
   }catch (\Exception $e) {
    return ["status"=>0,"message"=>$e->getMessage(),"payurl"=>""];
   }
	
   }
  /////////////////////////////////////////////END TAHSEEL PAYMENT/////////////////////////////////////////////////
  /////////////////////////////////////////////My Fatoorah ////////////////////////////////////////////////////////
	
  //generate token
  public static function getToken()
    {
        $settingInfo   = Settings::where("keyname","setting")->first();
		if(empty($settingInfo->is_mf_live)){
		   $MF_CURRENCY     = config('services.myfatoorah_test.MF_CURRENCY');
		   $MF_CURRENCY_ID  = config('services.myfatoorah_test.MF_CURRENCY_ID');
		   $MF_TOKEN_API_URL= config('services.myfatoorah_test.MF_TOKEN_API_URL');
		   $MF_CALLBACK     = config('services.myfatoorah_test.MF_CALLBACK');
		   $MF_INVOICE_URL  = config('services.myfatoorah_test.MF_INVOICE_URL');
		   $MF_USERNAME     = config('services.myfatoorah_test.MF_USERNAME');
		   $MF_PASSWORD     = config('services.myfatoorah_test.MF_PASSWORD');
		}else{
		   $MF_CURRENCY     = config('services.myfatoorah_live.MF_CURRENCY');
		   $MF_CURRENCY_ID  = config('services.myfatoorah_live.MF_CURRENCY_ID');
		   $MF_TOKEN_API_URL= config('services.myfatoorah_live.MF_TOKEN_API_URL');
		   $MF_CALLBACK     = config('services.myfatoorah_live.MF_CALLBACK');
		   $MF_INVOICE_URL  = config('services.myfatoorah_live.MF_INVOICE_URL');
		   $MF_USERNAME     = config('services.myfatoorah_live.MF_USERNAME');
		   $MF_PASSWORD     = config('services.myfatoorah_live.MF_PASSWORD');
		}
		try{
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL,$MF_TOKEN_API_URL);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array('grant_type'=>'password','username'=>$MF_USERNAME,'password'=>$MF_PASSWORD)));
            $result = curl_exec($curl);
            $info = curl_getinfo($curl);
            curl_close($curl);
            $json = json_decode($result, true);
            if(isset($json['access_token']) && !empty($json['access_token'])){
                $access_token= $json['access_token'];
            }else{
                $access_token=null;
            }
            if(isset($json['token_type']) && !empty($json['token_type'])){
                $token_type= $json['token_type'];
            }else{
                $token_type=null;
            }
            return [$access_token,$token_type];
        }catch (\Exception $e){
            return false;
        }
    }
	
 //payment initialize
 public static function initPayment($custName,$custBlock,$custStreet,$custHouse,$custCivilID,$custAddress,$custMobile,$custEmail,$accessToken,$price,$orderid,$uid="0",$strLang="en")
    {
       
	   $callBackUrl = url('/myfatoorah_response_accept');
       $errorUrl    = url('/myfatoorah_response_accept');
	
	    $settingInfo   = Settings::where("keyname","setting")->first();
		if(empty($settingInfo->is_mf_live)){
		   $MF_CURRENCY     = config('services.myfatoorah_test.MF_CURRENCY');
		   $MF_CURRENCY_ID  = config('services.myfatoorah_test.MF_CURRENCY_ID');
		   $MF_TOKEN_API_URL= config('services.myfatoorah_test.MF_TOKEN_API_URL');
		   $MF_CALLBACK     = config('services.myfatoorah_test.MF_CALLBACK');
		   $MF_INVOICE_URL  = config('services.myfatoorah_test.MF_INVOICE_URL');
		   $MF_USERNAME     = config('services.myfatoorah_test.MF_USERNAME');
		   $MF_PASSWORD     = config('services.myfatoorah_test.MF_PASSWORD');
		}else{
		   $MF_CURRENCY     = config('services.myfatoorah_live.MF_CURRENCY');
		   $MF_CURRENCY_ID  = config('services.myfatoorah_live.MF_CURRENCY_ID');
		   $MF_TOKEN_API_URL= config('services.myfatoorah_live.MF_TOKEN_API_URL');
		   $MF_CALLBACK     = config('services.myfatoorah_live.MF_CALLBACK');
		   $MF_INVOICE_URL  = config('services.myfatoorah_live.MF_INVOICE_URL');
		   $MF_USERNAME     = config('services.myfatoorah_live.MF_USERNAME');
		   $MF_PASSWORD     = config('services.myfatoorah_live.MF_PASSWORD');
		}
        
		try{
            $custName    = !empty($name)?$name:'NA';
			$custBlock   = !empty($block)?$block:'NA';
			$custStreet  = !empty($street)?$street:'NA';
			$custHouse   = !empty($house)?$house:'NA';
			$custCivilID = !empty($civilid)?$civilid:'';
			$custAddress = !empty($address)?$address:'NA';
			$custMobile  = !empty($mobile)?$mobile:$settingInfo->mobile;
			$custEmail   = !empty($email)?$email:$settingInfo->email;
			$itemtitle   = "Purchasing from ".$settingInfo->name_en;
			
            $post_string = '{
            "InvoiceValue":"'.$price.'",
            "CustomerName":"'.$custName.'",
            "CustomerBlock":"'.$custBlock.'",
            "CustomerStreet":"'.$custStreet.'",
            "CustomerHouseBuildingNo":"'.$custHouse.'",
            "CustomerCivilId":"'.$custCivilID.'",
            "CustomerAddress":"'.$custAddress.'",
            "CustomerReference":"'.$orderid.'",
            "DisplayCurrencyIsoAlpha":"'.$MF_CURRENCY.'",
            "CountryCodeId":"+965",
            "CustomerMobile":"'.$custMobile.'",
            "CustomerEmail":"'.$custEmail.'",
            "DisplayCurrencyId": 3,
            "SendInvoiceOption": 1,
            "InvoiceItemsCreate": [
              {
                "ProductId":null,
                "ProductName": "'.$itemtitle.'",
                "Quantity":1,
                "UnitPrice": "'.$price.'"
              
              }
            ],
                "CallBackUrl":  "'.$callBackUrl.'",
                 "Language": "2",
                 "ExpireDate": "2062-12-31T13:30:17.812Z",
                 "ApiCustomFileds": "",
                 "ErrorUrl": "'.$errorUrl.'"
          }';
            $soap_do     = curl_init();
            curl_setopt($soap_do, CURLOPT_URL,$MF_INVOICE_URL);
            curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($soap_do, CURLOPT_TIMEOUT, 10);
            curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($soap_do, CURLOPT_POST, true);
            curl_setopt($soap_do, CURLOPT_POSTFIELDS, $post_string);
            curl_setopt($soap_do, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8','Content-Length: ' . strlen($post_string),  'Accept: application/json','Authorization: Bearer '.$accessToken));
            $result1 = curl_exec($soap_do);
			//dd($result1);
            // echo "<pre>";print_r($result1);die;
            $err    = curl_error($soap_do);
            $json1= json_decode($result1,true);
            if(isset($json1['IsSuccess']) && $json1['IsSuccess']==true){
                $RedirectUrl= $json1['RedirectUrl'];
                if(is_array($json1['PaymentMethods'])){
                    $ref_Ex=$json1['PaymentMethods'][0];
                    if(array_key_exists('PaymentMethodUrl',$ref_Ex)){
                        $t=explode("?",$ref_Ex["PaymentMethodUrl"]);
                        if(is_array($t)){
                            $res=str_replace("invoiceKey=","",explode("&",$t[1]));
                            $referenceId =  $res[0];
                            curl_close($soap_do);
                   
							 $transaction = new Transaction;
							 $transaction->myfatoorah_txt_id=$referenceId;
							 $transaction->presult  = 'INITIALIZED';
							 $transaction->postdate = date("md");
							 $transaction->udf1     = $orderid;
							 $transaction->udf2     = $price;
							 $transaction->udf3     = $strLang;
							 $transaction->udf4     = $uid;
							 $transaction->udf5     = 'MYFATOORAH';
							 $transaction->trackid  = $orderid;
							 $transaction->save();
							return ["status"=>1,"message"=>"Payment Initialized","payurl"=>$RedirectUrl];
                        }
                    }
                }

            }else{
                return ["status"=>0,"message"=>$json1['Message'],"payurl"=>""];
            }

        }catch (\Exception $e){
            return ["status"=>0,"message"=>$e->getMessage(),"payurl"=>""];
        }
    }
	

public static function callBackPayment($paymentId)
    {
        
		
		$settingInfo   = Settings::where("keyname","setting")->first();
		if(empty($settingInfo->is_mf_live)){
		   $MF_CURRENCY     = config('services.myfatoorah_test.MF_CURRENCY');
		   $MF_CURRENCY_ID  = config('services.myfatoorah_test.MF_CURRENCY_ID');
		   $MF_TOKEN_API_URL= config('services.myfatoorah_test.MF_TOKEN_API_URL');
		   $MF_CALLBACK     = config('services.myfatoorah_test.MF_CALLBACK');
		   $MF_INVOICE_URL  = config('services.myfatoorah_test.MF_INVOICE_URL');
		   $MF_USERNAME     = config('services.myfatoorah_test.MF_USERNAME');
		   $MF_PASSWORD     = config('services.myfatoorah_test.MF_PASSWORD');
		}else{
		   $MF_CURRENCY     = config('services.myfatoorah_live.MF_CURRENCY');
		   $MF_CURRENCY_ID  = config('services.myfatoorah_live.MF_CURRENCY_ID');
		   $MF_TOKEN_API_URL= config('services.myfatoorah_live.MF_TOKEN_API_URL');
		   $MF_CALLBACK     = config('services.myfatoorah_live.MF_CALLBACK');
		   $MF_INVOICE_URL  = config('services.myfatoorah_live.MF_INVOICE_URL');
		   $MF_USERNAME     = config('services.myfatoorah_live.MF_USERNAME');
		   $MF_PASSWORD     = config('services.myfatoorah_live.MF_PASSWORD');
		}
		
		try{
		
            if(!empty($paymentId)){
			  
				$token        = self::getToken();
				$access_token = $token[0];
                $token_type   = $token[0];
                
                $url = $MF_CALLBACK.$paymentId;
                $soap_do1 = curl_init();
                curl_setopt($soap_do1, CURLOPT_URL,$url );
                curl_setopt($soap_do1, CURLOPT_CONNECTTIMEOUT, 10);
                curl_setopt($soap_do1, CURLOPT_TIMEOUT, 10);
                curl_setopt($soap_do1, CURLOPT_RETURNTRANSFER, true );
                curl_setopt($soap_do1, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($soap_do1, CURLOPT_SSL_VERIFYHOST, false);
                curl_setopt($soap_do1, CURLOPT_POST, false );
                curl_setopt($soap_do1, CURLOPT_POST, 0);
                curl_setopt($soap_do1, CURLOPT_HTTPGET, 1);
                curl_setopt($soap_do1, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8', 'Accept: application/json','Authorization: Bearer '.$access_token));
                $result_in = curl_exec($soap_do1);
                $err_in = curl_error($soap_do1);
                $file_contents = htmlspecialchars(curl_exec($soap_do1));
                curl_close($soap_do1);
                $getRecorById = json_decode($result_in, true);
				///dd($getRecorById);
                $ref    = !empty($getRecorById['ReferenceId'])?$getRecorById['ReferenceId']:'';
                $ErrMessage   = !empty($getRecorById['Message'])?$getRecorById['Message']:'';
                $refID  = !empty($getRecorById['InvoiceId'])?$getRecorById['InvoiceId']:'';
                $error  = !empty($getRecorById['Error'])?$getRecorById['Error']:'';
                $status = !empty($getRecorById['TransactionStatus'])?$getRecorById['TransactionStatus']:'';
                if(!empty($refID)){
                $payment=Transaction::where('myfatoorah_txt_id',$refID)->first();
                if(!empty($payment->id)){
					        							
							if(!empty($getRecorById['InvoiceReference'])){
							$payment->InvoiceReference = $getRecorById['InvoiceReference'];
							}
							
							if(!empty($getRecorById['InvoiceValue'])){
							$payment->amt  = $getRecorById['InvoiceValue'];
							$payment->udf2 = $getRecorById['InvoiceValue'];
							}
							
							if(!empty($getRecorById['PaymentGateway'])){
							$payment->PayType = $getRecorById['PaymentGateway'];
							}
							
							if(!empty($getRecorById['ReferenceId'])){
							$payment->ref     = $getRecorById['ReferenceId'];
							}
							
							if(!empty($getRecorById['TrackId'])){
							$payment->MfTrackId = $getRecorById['TrackId'];
							}
							
							if(!empty($getRecorById['TransactionId'])){
							$payment->tranid     = $getRecorById['TransactionId'];
							}
							
							if(!empty($getRecorById['PaymentId'])){
							$payment->payment_id = $getRecorById['PaymentId'];
							}
							
							if(!empty($getRecorById['AuthorizationId'])){
							$payment->auth     = $getRecorById['AuthorizationId'];
							}
							
							if(!empty($getRecorById['TransactionStatus']) && $getRecorById['TransactionStatus']==2){
							$payment->presult  = 'CAPTURED';
							$is_paid = 1;
							}else{
							$payment->presult  = 'NOT CAPTURED';
							$is_paid = 0;
							}
							$payment->save();
						    
							return ["status"=>1,"message"=>$payment->trackid,"is_paid"=>$is_paid];
							
                        
                }else{
                    return ["status"=>0,"message"=>trans('webMessage.paymentrecordnotfound'),"is_paid"=>0];
                }
				
				}else{
				    $message = !empty($ErrMessage)?$ErrMessage:trans('webMessage.paymentrecordnotfound');
                    return ["status"=>0,"message"=>$message,"is_paid"=>0];
                }
            }
        }catch (\Exception $e){
             return ["status"=>0,"message"=>$e->getMessage(),"is_paid"=>0];
            //return error page
        }
		
	}
	
	///////////////////////////////////////////PayPal Start////////////////////
	public static function api_context()
    {
            
        $paypal_configuration = \Config::get('paypal');
        $api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $api_context->setConfig($paypal_configuration['settings']);
		return $api_context;
    }
	
	public static function postPaymentWithpaypal($PayOrderId,$PayAmountUSD,$PayAmountKD,$PayDetails,$PayName,$ReturnUrl,$strLang='en')
    {
        $api_context = self::api_context();

		$payer = new Payer();
        $payer->setPaymentMethod('paypal');

    	$item_1 = new Item();

        $item_1->setName($PayName)
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($PayAmountUSD);

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($PayAmountUSD);

        $transaction = new PayPayalTransaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription($PayDetails);

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl($ReturnUrl)
            ->setCancelUrl($ReturnUrl);

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));            
        try {
            $payment->create($api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')){
                return ['status'=>400,'message'=>'Connection timeout'];                
            } else {
                return ['status'=>400,'message'=>'Some error occur, sorry for inconvenient'];            
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        
        if(isset($redirect_url)) {   
		    //save trans details
			$TransPayment = new Transaction;
			$TransPayment->paypal_payment_id = $payment->getId();
			$TransPayment->payment_id        = $payment->getId();
			$TransPayment->trackid           = $PayOrderId;
			$TransPayment->presult           = 'INITIALIZED';
			$TransPayment->postdate          = date('md');
			$TransPayment->udf1              = $PayOrderId;
			$TransPayment->udf2              = $PayAmountKD;
			$TransPayment->udf3              = $strLang;
			$TransPayment->PayType           = 'PAYPAL';
			$TransPayment->amt               = $PayAmountKD;
			$TransPayment->amt_dollar        = $PayAmountUSD;
			$TransPayment->save();
			         
			return ['status'=>1,'message'=>'payment processed','payurl'=>$redirect_url,'paypal_payment_id'=>$payment->getId()];  
        }

    	return ['status'=>0,'message'=>'Unknown error occurred'];  
    }

    public static function getPaymentStatus($payment_id,$PayerID,$token)
    {        
	    $api_context = self::api_context();
		
        if(empty($PayerID) || empty($token) || empty($payment_id)){
            return ['status'=>0,'message'=>'Payment is failed'];  
        }
		
        $payment = Payment::get($payment_id, $api_context);        
        $execution = new PaymentExecution();
        $execution->setPayerId($PayerID);        
        $result = $payment->execute($execution, $api_context);
        //dd($result);
		$payment_id = $result->getId();
		
        if($result->getState() == 'approved'){  
		     $TransPayment = Transaction::where('payment_id',$payment_id)->first(); 
			 $TransPayment->presult = 'CAPTURED';
			 $TransPayment->paypal_result = $result;
			 $TransPayment->paypal_state  = $result->getState();
			 $TransPayment->paypal_cart   = $result->getCart();
			 $TransPayment->save();
			 
             return ['status'=>1,'message'=>$TransPayment->trackid,'is_paid'=>1]; 
        }else if($result->getState() <> 'approved'){
		
		     $TransPayment = Transaction::where('payment_id',$payment_id)->first(); 
			 $TransPayment->presult = 'NOT CAPTURED';
			 $TransPayment->paypal_result = $result;
			 $TransPayment->paypal_state  = $result->getState();
			 $TransPayment->paypal_cart   = $result->getCart();
			 $TransPayment->save();
			 
			 return ['status'=>1,'message'=>$TransPayment->track_id,'is_paid'=>0]; 
		}

             return ['status'=>0,'message'=>'Payment Approved','is_paid'=>0]; 
    }
}
