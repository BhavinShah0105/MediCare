<?php
session_start();
error_reporting(E_ALL & ~ E_NOTICE);
require ('textlocal.class.php');

class Controller
{
    function __construct() {
        $this->processMobileVerification();
    }
    function processMobileVerification()
    {
     switch ($_POST["action"]) {
        case "get_otp":
                
        $mobile_number = $_POST['mobile_number'];

        $apiKey = urlencode('Mzc3NDc4NmI3NjRmNTU3MjYyNGMzNTMzMzA2Yzc4Mzg=');
        $Textlocal = new Textlocal(false, false, $apiKey);
        $numbers = array($mobile_number);
        $sender = '600010';
        $otp = rand(100000, 999999);
        $_SESSION['session_otp'] = $otp;
        $message = "Hi there, thank you for sending your first test message from Textlocal. Get 20% off today with our code: {$otp}.";
//        $message = "Hi there, thank you for sending your first test message from Textlocal. See how you can send effective SMS campaigns here: https://tx.gl/r/2nGVj/";
//        $message = "Your One Time Password is {$otp}";

        try{
            /*$apiKey = urlencode('YmFjMmVjYTU5MGQwODliMWZlNGQ4YjEwOGEwYWNhOGE=');

            // Prepare data for POST request
            $data = array('apikey' => $apiKey);

            // Send the POST request with cURL
            $ch = curl_init('https://api.textlocal.in/get_templates/');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            // Process your response here
            echo $response; exit;*/
          $response = $Textlocal->sendSms($numbers, $message, $sender);
          require_once("otp-verification-form.php");
          exit();
        }catch(Exception $e){
         die('Error: '.$e->getMessage());
        }
        break;
                
    case "verify_otp":
        $otp = $_POST['otp'];
        if ($otp == $_SESSION['session_otp']) 
        {
            unset($_SESSION['session_otp']);
            echo json_encode(array("type"=>"success", "message"=>"Mobile number  verified."));
      }else{
                 echo json_encode(array("type"=>"error", "message"=>"Mobile number verification failed"));
            }
            break;
        }
    }
}
$server = new Controller();
?>