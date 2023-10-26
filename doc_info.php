<?php
include_once('db_connection.php');  

if(!$conn){
  echo 'Connection error:'  . mysqli_connect_error();
}

$sql= 'SELECT * FROM doctors  ';
$result = mysqli_query($conn,$sql);

$doctors=mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);



?>
<!DOCTYPE html>
<head>
  <title>Doc_Info</title>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">

 
  <!--link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"-->


  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Krub:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/animate.css">

 
 
  <style type="text/css">


  @import url("https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700,800");
.card {
  left: 250px;
  top: 150px;
  grid-template-columns: 100px;
  width: 900px;
  height: 326px;
  grid-template-areas: "image" "text" "stats";
  border-radius: 18px;
  background: white;
  box-shadow: 5px 5px 15px rgba(0,0,0,0.9);
  font-family: roboto;
  text-align: center;
}
  .card-image {
  grid-area: image;
}

.card-stats {
  grid-area: stats; 
}
.card-image {
  grid-area: image;
  border-top-left-radius: 15px;
  border-top-right-radius: 15px;
}
.card-text {
  position: relative;
      left: 280px;
    width: 500px;
    bottom: 150px;
    height: 400px ;
  

}
.card-text .date {
  position: absolute;
 left :-1px;
  color:  #3b4ef8;
  font-size:20px;
}
#p1{
  position: absolute;
font-family: roboto;
 top: 70px;
  color: black;
  font-size:15px;
  font-weight: 300;
}
#p2{
  position: absolute;
  font-family: roboto;
 top: 105px;
  color: black;
  font-size:15px;
  font-weight: 300;
}
#p3{
  position: absolute;
  font-family: roboto;
 top: 140px;
  color: black;
  font-size:15px;
  font-weight: 300;
}
.card-text h2 {
  position: absolute;
 top: 30px;
  font-size:28px;
}
.card-stats {
 position: relative;
    width: 905px;
    left: -3px;
    bottom: 35px;
    grid-area: stats;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: 1fr;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    background:#3b4ef8;
}
.card-stats .stat {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;

  color: white;
  padding:10px;
}
.card:hover {
  transform: scale(1.15);
  box-shadow: 5px 5px 15px rgba(0,0,0,0.6);
}
img, svg {
  position: relative;
  right:290px;
  top: 50px;
  width: 200px;
  height:200px; 
}
.card {

...
  transition: 0.4s ease;
  cursor: pointer;
  margin:70px;
}
#b1{
  position: relative;
  bottom: -100px;
  left: 240px;
  border: white;
  padding: 15px 20px;
  font-size: 10px;
  text-transform: uppercase;
  font-weight: 600;
  letter-spacing: 1px;
  cursor: pointer;
  outline: none;
  border: 1px solid #3b4ef8;
  color:  #3b4ef8;
  background: white;
}

#b2{
  position: relative;
  bottom: -100px;
  left: 260px;
  padding: 15px 20px;
  font-size: 10px;
  text-transform: uppercase;
  color: #fff0e6;
  font-weight: 600;
  letter-spacing: 1px;
  cursor: pointer;
  outline: none;
  border: 1px solid #3b4ef8;
  background: #3b4ef8;
}

#a{
  position: relative;
  left: 6px;
  width: 210px;
}
#b{
  position: relative;
  left: 12px;
  width: 210px;
}

.main {
    width: 50%;
    margin: 50px auto;
}

/* Bootstrap 4 text input with search icon */

.has-search .form-control {
    padding-left: 2.375rem;
}

.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
}

.cards {
    border: none;
    background: #eee
}

.search {
    width: 100%;
    margin-bottom: auto;
    margin-top: 20px;
    height: 50px;
    background-color: #fff;
    padding: 10px;
    border-radius: 5px
}
.search-input {
    color: white;
    border: 0;
    outline: 0;
    background: none;
    width: 0;
    margin-top: 5px;
    caret-color: transparent;
    line-height: 20px;
    transition: width 0.4s linear
}

.search .search-input {
    padding: 0 10px;
    width: 100%;
    caret-color: #536bf6;
    font-size: 19px;
    font-weight: 300;
    color: black;
    transition: width 0.4s linear
}

.search-icon {
    height: 34px;
    width: 34px;
    float: right;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    background-color: #536bf6;
    font-size: 10px;
    bottom: 30px;
    position: relative;
    border-radius: 5px
}
.search-icon:hover {
    color: #fff !important
}

a:link {
    text-decoration: none
}
.cards-inner {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, .125);
    border-radius: .25rem;
    border: none;
    cursor: pointer;
    transition: all 2s
}



.mg-text span {
    font-size: 12px
}

.mg-text {
    line-height: 14px
}
</style>
<style type="text/css">
  .search-result-box .tab-content {
    padding: 30px 30px 10px 30px;
    -webkit-box-shadow: none;
    box-shadow: none;
    -moz-box-shadow: none
}

.search-result-box .search-item {
    padding-bottom: 20px;
    border-bottom: 1px solid #e3eaef;
    margin-bottom: 20px
}
.text-success {
    color: #0acf97!important;
}
a {
    color: #007bff;
    text-decoration: none;
    background-color: transparent;
}
.btn-custom {
    background-color: #02c0ce;
    border-color: #02c0ce;
}
</style>
  </head>
  <body>
    <?php
include_once('navuserhome.php');
?>

  <div class="main">
  
  
</div>
<form method="post"  style="    position: relative; top: 120px;">

<div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="pt-3 pb-4">
                                <div class="input-group">
                                    <input type="text" id="" name="search" class="form-control" placeholder="Search By   Doctors Name, Degree, Speciality, Hospital Name">
                                    <div class="input-group-append">
                                        <button type="submit" name="Search" class="btn waves-effect waves-light btn-custom"><i class="fa fa-search mr-1"></i> Search</button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

</form>

<?php 
$search=$sch="";
if (isset($_POST['Search'])) {
  

if(empty($_POST['search']))
{
  echo "<script type='text/javascript'> alert('Invalid Input'); 
      document.location = 'doc_info.php'; </script>";
    }else {
      $search = $_POST['search'];
    }

$SEARCH= "SELECT * FROM doctors WHERE username ='$search' OR speciality ='$search' OR hname ='$search' OR degree='$search'";
$r = mysqli_query($conn,$SEARCH);

$sch=mysqli_fetch_all($r,MYSQLI_ASSOC);
$rowcount=mysqli_num_rows($r);

if($rowcount== 0){
echo "<script type='text/javascript'> alert('No Data Found'); 
      document.location = 'doc_info.php'; </script>";
}

?>

 <div class="footer-three-grid wow fadeIn animated" data-wow-delay="0.66s" style="position: relative; top: 56px;">
     <?php
       foreach ($sch as $sch){ 
         $doc_id=$sch['id'];
                      $average = "SELECT AVG(rate) AS average FROM rating WHERE doc_id='$doc_id'";
                      $result = mysqli_query($conn,$average);
                      $row=mysqli_fetch_assoc($result);
                      $a=$row['average'];
                      $aa=number_format($a);
                      if (isset($a)) {
                        $avgg = "UPDATE doctors SET average_rating = '$a' WHERE id='$doc_id'";
                    mysqli_query($conn, $avgg);
                      }

                      $done="SELECT COUNT(doctor_id) AS ad FROM completeapp WHERE doctor_id='$doc_id'";
                      $sql = mysqli_query($conn,$done);
                      $r=mysqli_fetch_assoc($sql);
                      $ad=$r['ad'];
                     
                     $count = "SELECT COUNT(review) AS count FROM rating WHERE doc_id='$doc_id'";
                      $results = mysqli_query($conn,$count);
                      $rows=mysqli_fetch_assoc($results);
                      $b= $rows['count'];
                      

                     ?>                
                    <div class="card">
                      <div class="card-image">
                     <img class="img-1" src="images/<?php echo htmlspecialchars($sch['image'] );?>">
                      </div>
                      <div class="card-text">
                      <span class="date"><?php echo htmlspecialchars($sch['speciality'] );?></span>
                      <h2>Dr.<?php echo htmlspecialchars($sch['username'] );?></h2>
                      <p id="p1">Degree:-<?php echo htmlspecialchars($sch['degree'] );?> </p>
                      <p id="p2">Experience:-<?php echo htmlspecialchars($sch['experience'] );?> over years.</p>
                      <p id="p3">Hospital:-<?php echo htmlspecialchars($sch['hname'] );?></p>
                     
                      <form action="profile.php" method="post" style="position: relative; right: 113px;bottom: -46px;">
                        <input type="hidden" value="<?php echo htmlspecialchars($sch['id'] );?>" name="id">
                        <button id="b1">View Profile</button>
                      </form>
                      <form action="appointment.php" method="post" >
                        <input type="hidden" value="<?php echo htmlspecialchars($sch['id'] );?>" name="id">
                        <input type="hidden" value="<?php echo htmlspecialchars($sch['hname'] );?>" name="hname">
                        <input type="hidden" value="<?php echo htmlspecialchars($sch['username'] );?>" name="username" id="doc_name">
                    <button id="b2" class="getstarted scrollto">Appointment</button>
                  </form>
                    </div>
                    <div class="card-stats">
                      <div class="stat">
                        <div class="value"><?php echo $ad?></div>
                        <div class="type">Appointments Done</div>
                      </div>
                      <div class="stat" style="border-left: 1px solid; border-right: 1px solid">
                        <div class="value"><?php echo $aa;?></div>
                        <div class="type">Reviews</div>
                      </div>
                      <div class="stat">
                        <div class="value"><?php echo $b;?></div>
                        <div class="type">Comments</div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
</div>
<?php } ?>

<?php 
$SEARCH= "SELECT * FROM doctors WHERE username ='$search' OR speciality ='$search' OR hname ='$search'";
$r = mysqli_query($conn,$SEARCH);

$sch=mysqli_fetch_all($r,MYSQLI_ASSOC);
$rowcount=mysqli_num_rows($r);
if($rowcount == 0){

  ?> 

 <div class="footer-three-grid wow fadeIn animated" data-wow-delay="0.66s" style="position: relative; top: 13px;">
     <?php
       foreach ($doctors as $doctors){ 
         $doc_id=$doctors['id'];
                      $average = "SELECT AVG(rate) AS average FROM rating WHERE doc_id='$doc_id'";
                      $result = mysqli_query($conn,$average);
                      $row=mysqli_fetch_assoc($result);
                      $a=$row['average'];
                      $aa=number_format($a,1);
                      if (isset($a)) {
                        $avgg = "UPDATE doctors SET average_rating = '$a' WHERE id='$doc_id'";
                    mysqli_query($conn, $avgg);
                      }

                      $done="SELECT COUNT(doctor_id) AS ad FROM completeapp WHERE doctor_id='$doc_id'";
                      $sql = mysqli_query($conn,$done);
                      $r=mysqli_fetch_assoc($sql);
                      $ad=$r['ad'];
                     
                     $count = "SELECT COUNT(review) AS count FROM rating WHERE doc_id='$doc_id'";
                      $results = mysqli_query($conn,$count);
                      $rows=mysqli_fetch_assoc($results);
                      $b= $rows['count'];
                      

                     ?>                
                    <div class="card">
                      <div class="card-image">
                     <img class="img-1" src="images/<?php echo htmlspecialchars($doctors['image'] );?>">
                      </div>
                      <div class="card-text">
                      <span class="date"><?php echo htmlspecialchars($doctors['speciality'] );?></span>
                      <h2>Dr.<?php echo htmlspecialchars($doctors['username'] );?></h2>
                      <p id="p1">Degree:-<?php echo htmlspecialchars($doctors['degree'] );?> </p>
                      <p id="p2">Experience:-<?php echo htmlspecialchars($doctors['experience'] );?> over years.</p>
                      <p id="p3">Hospital:-<?php echo htmlspecialchars($doctors['hname'] );?></p>
                     
                      <form action="profile.php" method="post" style="position: relative; right: 113px;bottom: -46px;">
                        <input type="hidden" value="<?php echo htmlspecialchars($doctors['id'] );?>" name="id">
                        <button id="b1">View Profile</button>
                      </form>
                      <form action="appointment.php" method="post" >
                        <input type="hidden" value="<?php echo htmlspecialchars($doctors['id'] );?>" name="id">
                        <input type="hidden" value="<?php echo htmlspecialchars($doctors['hname'] );?>" name="hname">
                        <input type="hidden" value="<?php echo htmlspecialchars($doctors['username'] );?>" name="username" id="doc_name">
                    <button id="b2" class="getstarted scrollto">Appointment</button>
                  </form>
                    </div>
                    <div class="card-stats">
                      <div class="stat">
                        <div class="value"><?php echo $ad?></div>
                        <div class="type">Appointments Done</div>
                      </div>
                      <div class="stat" style="border-left: 1px solid; border-right: 1px solid">
                        <div class="value"><?php echo $aa;?></div>
                        <div class="type">Reviews</div>
                      </div>
                      <div class="stat">
                        <div class="value"><?php echo $b;?></div>
                        <div class="type">Comments</div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
</div>
<?php } ?>


     


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


</body>
</html>
<script>
const searchButton = document.getElementById('search-button');
const searchInput = document.getElementById('search-input');
searchButton.addEventListener('click', () => {
  const inputValue = searchInput.value;
  alert(inputValue);
});
</script>
<script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>


  <script src="assets/js/main.js"></script>















                 
                  