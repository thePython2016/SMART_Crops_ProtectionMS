<?php
require('connection.php');
// error_reporting(0);
use SimpleExcel\SimpleExcel;
if(isset($_POST['importOfficers']))
{
    if(move_uploaded_file($_FILES['officers-file']['tmp_name'],"imports/".$_FILES['officers-file']['name']))
{
    require_once('SimpleExcel/SimpleExcel.php'); 

    $excel = new SimpleExcel('csv');                    
    $excel->parser->loadFile("imports/"  .$_FILES['officers-file']['name']);           
    $count=1;
    $foo = $excel->parser->getField();   
    while(count($foo)>$count){
  $phone=$foo[$count][0];
  $occupation=$foo[$count][1];
  $fname=$foo[$count][2];
  $mname=$foo[$count][3];
  $lname=$foo[$count][4];
  $gender=$foo[$count][5];
  $day=$foo[$count][6];
  $month=$foo[$count][7];
  $year=$foo[$count][8];
  $address=$foo[$count][9];
 

  $insertOfficers="insert into agroofficers(mobileNumber,occupation,fname,mname,lname,gender,birthDay,
  birthMonth,birthYear,address) values('$phone','$occupation','$fname','$mname','$lname','$gender','$day'
  ,'$month','$year','$address')";
  
  $officersQuery=mysqli_query($conn,$insertOfficers);
        $count++;

    

        if($officersQuery)
        {
            echo "
            <script>
            alert('Farmers Imported Successfully')
            window.location.href='officers.php'
            </script>
            ";
        }

    }              


}

  

}
?>