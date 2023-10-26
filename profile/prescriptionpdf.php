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
$images='';
$results=mysqli_query($conn,"SELECT * FROM prescription WHERE appointment_id='$appointment_id' ");
$resultst=mysqli_query($conn,"SELECT * FROM prescriptiont WHERE appointment_id='$appointment_id' ");
$resultsd=mysqli_query($conn,"SELECT * FROM description WHERE appointment_id='$appointment_id' ");

$appointment = "SELECT * FROM completeapp WHERE appointment_id = '$appointment_id' ";
$result=mysqli_query($conn,$appointment) or die(mysqli_error($conn));
$row=mysqli_fetch_array($result);
$doc_name=$row['doc_name'];
$doctor_id=$row['doctor_id'];
$pname=$row['pname'];
$tmode=$row['tmode'];
$age=$row['age'];
$gender=$row['gender'];
$contactno=$row['contactno'];
$aadharno=$row['aadharno'];
$booking_date=$row['booking_date'];
$booking_time=$row['booking_time'];
$address=$row['address'];
$hname=$row['hname'];
$sql="SELECT * FROM himages WHERE hname='$hname' ";
$resulti=mysqli_query($conn,$sql) or die(mysqli_error($conn));
while ($rowi=mysqli_fetch_array($resulti)) {
$images=$rowi['himage'];
}
;
//create a new pdf instance
$mpdf=new \Mpdf\Mpdf();
//create our pdf
$data=" ";

$data.='<h1>&nbsp;&nbsp;&nbsp;<img src="images/'.$images.'>" style="width:90px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$hname.'</h1>';
$data.='<hr>';
       
                      $data.='<p>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Patient Name :'.$pname.'&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;Doctor Name:'.$doc_name.'</p>';
                      $data.='<p>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Age :'.$age.'&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; Gender:'.$gender.'</p>';
                      $data.='<p>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Contact Number :'.$contactno.'&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;Appointment Day:'.$booking_time.'</p>';
                      $data.='<p>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Treatment Mode :'.$tmode.'&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;Address:'.$address.'</p>';
                     
                     $data.='<hr>';
                      $data.='<table>';
                         $data.='<thead>';
                                $data.='<tr>';
                                    $data.='<th> List Of Medicines</th>'; 
                                    $data.='<th>&nbsp;&nbsp;&nbsp;&nbsp;Morning</th>'; 
                                     $data.='<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Afternoon</th>'; 
                                      $data.='<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Night</th>'; 
                                       $data.='<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quantity</th>'; 
                                       
                                       
                                    $data.='</tr>';
                                    $data.= '</thead>';
                                    $data.='<tbody>';
                                    while ($row=mysqli_fetch_array($results)) {
                                   $data.='<tr>';
                                    $data.='<p><td>&nbsp;&nbsp;&nbsp;'.$row['m_name'].'</td></p>';
                                    $data.='<p><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['morning'].'</td></p>';
                                    $data.='<p><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['afternoon'].'</td></p>';
                                    $data.='<p><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['night'].'</td></p>';
                                    $data.='<p><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['quantity'].'</td></p>';
                                    $data.='</tr>';
                                    }
                                 $data.='</tbody>';
                            $data.='</table>';


                            $data.='<hr>';
                           

                                    $data.=' <b>List Of Tests:-</b><br>';   
                                    while ($rows=mysqli_fetch_array($resultst)) {
                                    $data.='<p>'.$rows['testname'].'</p>';
                                    }
                                

                            $data.='<hr>';

                                    $data.='<b>Description:-</b><br><br>';
                                   while ($rowd=mysqli_fetch_assoc($resultsd)) {
                                    $data.= $rowd['description'];
                                    }

                               

//write pdf
$mpdf->WriteHTML($data);

//output to browser
$mpdf->Output('myfile.pdf','D');

?>
 
</html>