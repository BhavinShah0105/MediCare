<?php
 include_once('db_connection.php');

if(isset($_SESSION['login_id'])){
    header('Location: home.php');
    exit;
}

require 'google-api/vendor/autoload.php';

// Creating new google client instance
$client = new Google_Client();

// Enter your Client ID
$client->setClientId('1041646982476-6stameg7eh59150q34u5cejkfa0uqaiq.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('9T0tLM9aysqXnqZCNeO3uGYf');
// Enter the Redirect URL
$client->setRedirectUri('http://localhost/medicare/gregister.php');

// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");


if(isset($_GET['code'])):

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if(!isset($token["error"])){

        $client->setAccessToken($token['access_token']);

        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
    
        // Storing data into database
        $id = mysqli_real_escape_string($conn, $google_account_info->id);
        $username = mysqli_real_escape_string($conn, trim($google_account_info->name));
        $email = mysqli_real_escape_string($conn, $google_account_info->email);
        $profile_pic = mysqli_real_escape_string($conn, $google_account_info->picture);

        // checking user already exists or not
        $get_user = mysqli_query($conn, "SELECT `google_id` FROM `users` WHERE `google_id`='$id'");
        if(mysqli_num_rows($get_user) > 0){
            $_SESSION['email'] = $email; 
            $_SESSION['login_id'] = $id; 
            header('Location: home.php');
            exit;

        }
        else{

            // if user not exists we will insert the user
            $insert = mysqli_query($conn, "INSERT INTO `users`(`google_id`,`username`,`email`,`password`) VALUES('$id','$username','$email','')");

            if($insert){
                $_SESSION['login_id'] = $id;
                $_SESSION['username']=$username;
                $_SESSION['email']=$email; 
                header('Location: home.php');
                exit;
            }
            else{
                echo "Sign up failed!(Something went wrong).";
            }

        }

    }
    else{
        header('Location: gregister.php');
        exit;
    }
    
else: 
    // Google Login Url = $client->createAuthUrl(); 
?>

       <a href="<?php echo $client->createAuthUrl(); ?>" class="google">
                  <span class="icon-google mr-3"></span> 
                </a>
              <?php endif; ?>