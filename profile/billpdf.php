<html>
<title></title>
<head><meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="test.css" rel="stylesheet">
     <link href="aassets/css/style.css" rel="stylesheet">
     
   </head>
<?php
require_once __DIR__ . '/vendor/autoload.php';
include_once('db_connection.php');
$appointment_id=$_POST['appointment_id'];
$sql="SELECT * from bill WHERE appointment_id = '$appointment_id' ";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
 
  $user_email=$row['p_email'];
  $doc_name=$row['doc_name'];
  $pname=$row['pname'];
  $tmode=$row['tmode'];
  $age=$row['age'];
  $gender=$row['gender'];
  $contactno=$row['contactno'];
  $booking_time=$row['booking_time'];
  $address=$row['address'];
  $hname=$row['hname'];
  $charges=$row['charges'];
$sql="SELECT * FROM himages WHERE hname='$hname' ";
$resulti=mysqli_query($conn,$sql) or die(mysqli_error($conn));
while ($rowi=mysqli_fetch_array($resulti)) {
$images=$rowi['himage'];
} 
}
}
//create a new pdf instance
$mpdf=new \Mpdf\Mpdf();

//create our pdf
$data=" ";
$data.='<h1>&nbsp;&nbsp;&nbsp;<img src="images/'.$images.'>" style="width:90px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$hname.'</h1>';
$data.='<hr>';
       
                      $data.='<p>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Patient Name :'.$pname.'&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;  Doctor Name:'.$doc_name.'</p>';
                      $data.='<p>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Age :'.$age.'&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; Gender:'.$gender.'</p>';
                      $data.='<p>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Contact Number :'.$contactno.'&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;Appointment Day:'.$booking_time.'</p>';
                      $data.='<p>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Treatment Mode :'.$tmode.'&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;Address:'.$address.'</p>';
                     
                     $data.='<hr>';
                      $data.='<table>';
                         $data.='<thead>';
                                $data.='<tr>';
                                    $data.='<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;List</th>'; 
                                    $data.='<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Charges</th>'; 
                                    $data.='</tr>';
                                    $data.= '</thead>';
                                    $data.='<tbody>';
                                    $data.='<tr>';
                                    $data.='<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Consultancy Charges</td>';  
                                    $data.='<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$charges.'</td>';                                
                                  $data.='</tr>';
                                 $data.='</tbody>';
                                   
                           
                            $data.='</table>';
                                $data.='<br><br><br><br>';
                                $data.='<hr>';
                                $data.='<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total:-</b>'; 
                                $data.='<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs.'.$charges.'/-</b>';  


//write pdf
$mpdf->WriteHTML($data);

//output to browser
$mpdf->Output('myfile.pdf','D');

?>

 <script src="pt/assets/js/bootstrap.min.js"></script>
        <script src="asset/js/bootstrap-clockpicker.js"></script>
        <script src="pt/assets/js/bootstrap.min.js"></script>
<script src="asset/js/bootstrap-clockpicker.js"></script>
<script>
</script>
</html>