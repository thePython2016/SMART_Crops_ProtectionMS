<?php
require_once __DIR__ . '/includes/auth_guard.php';
require('connection.php');
// error_reporting(0);
use SimpleExcel\SimpleExcel;
if(isset($_POST['importFarmers']))
{
    $uploadedTmp = $_FILES['farmers_file']['tmp_name'] ?? '';
    if ($uploadedTmp !== '' && is_uploaded_file($uploadedTmp)) {
    require_once('SimpleExcel/SimpleExcel.php'); 

    $excel = new SimpleExcel('csv');                    
    $excel->parser->loadFile($uploadedTmp);           
    

    $count=1;
    $foo = $excel->parser->getField();   
    while(count($foo)>$count){

  $phone=$foo[$count][0];
  $fname=$foo[$count][1];
  $mname=$foo[$count][2];
  $lname=$foo[$count][3];

  $gender=$foo[$count][4];
  $day=$foo[$count][5];
  $month=$foo[$count][6];
  $year=$foo[$count][7];
  $region=$foo[$count][8];





  $insertFarmers="insert into farmers(mobileNumber,fname,mname,lname,gender,birthDay,
  birthMonth,birthYear,region) values('$phone','$fname','$mname','$lname','$gender','$day'
  ,'$month','$year','$region')";
  
  $farmersQuery=db_query($conn,$insertFarmers);
        $count++;

    

        if($farmersQuery)
        {
            echo "
            <script>
            alert('Farmers Imported Successfully')
            window.location.href='farmers.php'
            </script>
            ";
        }

    }              


}

  

}
?>