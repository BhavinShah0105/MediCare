<?php
$id='';
include_once('db_connection.php');
  if(!isset($_SESSION['email']))
  {
    header("location:login.php");
    exit;
  }
$uemail = $_SESSION['email'];
$id = $_POST['id'];
$hname=$_POST['hname']; 
$username=$_POST['username'];

$pname=$tmode=$age=$gender=$description=$doc_name=$address=$aadharno=$booking_date=$contactno=$id=$hname=$dayOfWeek=$uemail='';

$scheduleday=$hslots=$wslots=$wslots='';
if(isset($_POST['submit']))
{
    
                      $id=$_POST['id'];
                      $hname=$_POST['hname']; 
                      $username=$_POST['doc_name'];
                         

                      
}
?>
                     
                          
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Book Appointment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
   
    <link rel="stylesheet" href="css/style.css">
   
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <!--link href="assets/img/favicon.png" rel="icon"-->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Krub:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">


    <title></title>
    <style>

  .caption:hover{
  color: #0096FF;
  }
  #id:hover{
  color: #0096FF;
  }
  .form-group mb{

  }
</style>
  </head>
  <body>
 <?php
include_once('navuserhome.php');
?>
  
<div class="content">
    <div class="container">
      <div class="row justify-content-center" >
        <div class="col-md-6 in-order-2 sm-6-content wow animated fadeInRight" data-wow-delay="0.22s" style="position: relative;top: ;">
          <img src="images/1.jpg" alt="Image" class="img-fluid">
        </div>
        
        <div class="col-md-9 contents "style="position: relative; top:85px ;">
          <div class="row justify-content-center">
            <div class="col-md-10">
              <div class="mb-4" style="top: -40px; position: relative;">
                 <h3>Make An Appointment</h3> 
              </div>


            <form action="otp-verification-form.php" method="post" id="booking-details" >
            
               <div class="form-row justify-content-right">
                    <div class="form-group mb "style="top: 16px;position: absolute;left: -15px;">
                      <label for="">Patient Name</label>
                      <input type="text" class="form-control" name="pname" id="pname" required="">
                      <input type="hidden" class="form-control" name="id" id="doc_id" value="<?php echo $_POST['id']? $_POST['id']:''; ?>">
                      <input type="hidden" class="form-control" name="username" id="username" value="<?php echo 
                      $username;?>">
                      <input type="hidden" class="form-control" name="hname" value="<?php echo $_POST['hname']? 
                      $_POST['hname']:''; ?>">
                     

                    </div>

                    <div class="form-group mb" style="width: 245px;position: absolute;left: 242px; top: 16px;">
                        <label for="select">Treatment Mode</label>
                         <select class="form-control" name="tmode" id="tmode" required="">
                          <option></option>
                          <option value="Walkin">Walkin</option>
                          <option value="Online">Online</option>
                          <option value="Home Visit">Home Visit</option>
                        </select>
                    </div>
                  </div>
                <div class="form-row justify-content-right">
                    <div class="form-group mb "style="position: absolute;left: -15px;top: 91px;">
                    <label for="">Age</label>
                    <input type="text" class="form-control" name="age" id="age" required="">
                  </div>
              </div>

                <div class="form-group mb" style="top: 91px;position: absolute;width: 244px;left: 243px">
                    <label for="select">Gender</label>
                       <select class="form-control" name="gender" id="gender" required="">
                        <option> </option>
                        <option value='Male'>Male</option>
                        <option value='Female'>Female</option>
                        <option value='Others'>Others</option>
                      </select>
                </div>
                 
                <div class="form-row justify-content-right">
                    <div class="form-group mb "style="position: absolute;left: 225px;top: 166px;width: 263px;">
                        <label for="">Aadhar Number</label>
                        <input type="text" class="form-control" name="aadharno" id="aadharno" required="">
                    </div>

                    <div class="form-group mb" style="position: absolute;width: 240px;left: -15px;top: 166px;">
                        <label for="">Contact Number</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" required="" >
                    </div>
                </div>
                
                <div class="form-row justify-content-right">
                    <div class="form-group mb "style="position: absolute;width: 503px;left: -15px;top: 241px">
                        <label for=""></label>
                        <input type="date" name="booking_date" id="booking_date" value="" class="form-control" required="">
                        <input type="hidden" name="dayOfWeek" id="dayOfWeek" value="<?php echo $dayOfWeek;?>" class="form-control" >
                    </div>
                </div>

                    
                <div class="form-row justify-content-right">
                    <div class="form-group mb "style="position: absolute;width: 503px;left: -15px;top: 316px;">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" id="address" required="">
                    </div>
                </div>
                
                <div class="form-row justify-content-right">
                    <div class="form-group mb "style="position: absolute;width: 503px;left: -15px;top: 391px;">
                      <label for="">Description</label>
                      <input type="text" class="form-control" name="description" id="description" required="">
                      <input type="hidden" class="form-control" name="valid-data" id="valid-data" value="0">
                    </div>
                </div>
              <br><br>
                  <div class="d-flex mb-4 align-items-center">
                    <input type="submit" value="Submit" onclick="done()" name="submit" id="submit" label="Sign Up" class="btn btn-block btn-primary" style="background-color: #0096FF;width: 502px;top: 489px;position: absolute;left: -15px;">
                    </div>    
            </form>
            
       </div>
     </div>
 </div>
</div>
        
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
      var dt = new Date(); 
      var CurrentDate = new Date();
      var Lastdate = new Date();

      var diff = dt.getDate() - dt.getDay() + (dt.getDay() === 0 ? -6 : 1);
      startdate = new Date(dt.setDate(diff));
      Lastdate.setDate(startdate.getDate()+6);

      LastDateMonth = '';
      if(Lastdate.getMonth() < 10)
        LastDateMonth = '0'+ (Lastdate.getMonth()+1);
      else
        LastDateMonth = (Lastdate.getMonth()+1);

      CurrentDateMonth = '';
      if(CurrentDate.getMonth() < 10)
        CurrentDateMonth = '0'+ (CurrentDate.getMonth()+1);
      else
        CurrentDateMonth = (CurrentDate.getMonth()+1);
      
      Lastdate = Lastdate.getFullYear()+"-"+LastDateMonth+"-"+Lastdate.getDate();
      CurrentShowDate = CurrentDate.getFullYear()+"-"+CurrentDateMonth+"-"+CurrentDate.getDate();
      CurrentDate = CurrentDate.getFullYear()+"-"+CurrentDateMonth+"-"+CurrentDate.getDate();
       document.getElementById("booking_date").min = CurrentDate;
       document.getElementById("booking_date").max = Lastdate;

       
       document.getElementById("booking_date").value = CurrentShowDate;
    </script>

   <script>
      $(function done() {

         var error_pname = false;
         var error_age = false;
         var error_mobile = false;
         var error_aadharno = false;
         
         $("pname").focusout(function(){
            check_pname();
         });
         $("age").focusout(function(){
            check_age();
          });
         $("mobile").focusout(function(){
            check_mobile();
          });
         $("aadharno").focusout(function(){
            check_aadharno();
          });

         function check_pname() {
            var pattern = /^[a-zA-Z ]*$/;
            var pname = $("#pname").val();
            if (pattern.test(pname) && pname !== '') {
               error_pname = false;
            } else {
             alert("Patient name should contain only characters");
               error_pname = true;
            }
         }

          function check_age() {
            var pattern = /^[0-9]*$/;
            var age = $("#age").val();
            if((pattern.test(age) && age !== ''))
            {
               error_age = false;
            }else if(age.length > 2){
              alert("Please Enter Correct Age");
              error_age = true;
            }
           else {
             alert("Please Enter Correct Age");
               error_age = true;
            }
         }

          function check_mobile() {
            var pattern = /^[0-9]*$/;
            var mobile = $("#mobile").val();
            if((pattern.test(mobile) && mobile !== ''))
            {
               error_mobile = false;
            }else {
             alert("Please Enter Correct Contact No");
               error_mobile = true;
            }
            if(mobile.length != 10){
              alert("Please Enter Correct Contact No");
              error_mobile = true;
            }
         }
          
          function check_aadharno() {
            var pattern = /^[0-9]*$/;
            var aadharno = $("#aadharno").val();
            if((pattern.test(aadharno) && aadharno !== ''))
            {
               error_aadharno = false;
            }else {
             alert("Please Enter Correct Aadhar No");
               error_aadharno = true;
            }
            if(aadharno.length != 12){
              alert("Please Enter Correct Aadhar No");
              error_aadharno = true;
            }
         }


         $("#booking-details").submit(function() {
            error_pname = false;
            error_age = false;
            error_mobile = false;
            error_aadharno = false;

            check_pname();
            check_age();
            check_mobile();
            check_aadharno();

            if (error_pname === false && error_age === false && error_mobile === false && error_aadharno===false) {
               
                var booking_date = $("#booking_date").val();
                var doc_id = $("#doc_id").val();
                var tmode = $("#tmode").val();
                var aadharno = $("#aadharno").val();


            var booking_data = {
                                  "booking_date" : booking_date,
                                  "tmode" : tmode,
                                  "doc_id":doc_id,
                                  "aadharno":aadharno
                        };
                        console.log(booking_data);
               $.ajax(
                    {
                        url : 'validate.php',
                        type : 'POST',
                        dataType : "json",
                        data : booking_data,
                        async : false,
                          success : function(response) 
                          {
                            console.log("response");
                            console.log(response);
                            if (response.type == 'success') {
                              
                            $("#valid-data").val(1);
                            }else{
                              
                             alert(response.message);
                            }
                          }   
                      });
               
               var ValidData = $("#valid-data").val();
               
               if(ValidData == 1) {
                var number = $("#mobile").val();
                if (number.length == 10 && number != null) 
                {
                      var user_input = {
                      "mobile_number" : number,
                      "action" : "get_otp"
                        };

                    $.ajax(
                    {
                        url : 'server.php',
                        type : 'POST',
                        data : user_input,
                          success : function(response) 
                          {
                            $(".container").html(response);
                          },
                          complete: function()
                            {         
                            $('#loading-image').hide();
                            }
                      });
                      return true;
                } 
                else {
                    alert('Please enter a valid number!');
                      }
              }        
              else {
                return false;
              }
            } else {
               alert("Please Fill the form Correctly");
               return false;
            }


         });

      });

   </script>
 