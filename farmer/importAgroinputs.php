<?php

session_start();
if(!isset($_SESSION['username']))
{
  echo "
  <script>
  window.location.href='../index.php';
  </script>
  ";
}

?>
<?php
require('connection.php');
// error_reporting(0);
use SimpleExcel\SimpleExcel;
if(isset($_POST['importInputs']))
{
    if(move_uploaded_file($_FILES['inputs-file']['tmp_name'],"imports/".$_FILES['inputs-file']['name']))
{
    require_once('SimpleExcel/SimpleExcel.php'); 

    $excel = new SimpleExcel('csv');                    
    $excel->parser->loadFile("imports/"  .$_FILES['inputs-file']['name']);           
    

    $count=1;
    $foo = $excel->parser->getField();   
    while(count($foo)>$count){

  $id=$foo[$count][0];
  $name=$foo[$count][1];
  $category=$foo[$count][2];
  $usage=$foo[$count][3];





  $insertInputs=mysqli_query($conn,"insert into agroinputs(inputsNumber,name,category,usage_)
  values('$id','$name','$category','$usage')");
  $count++;
 
 
 
 // $count=mysqli_num_rows($farmersQuery);
 
 if($insertInputs)
 {
     echo "
     <script>
     alert('Agro-Inputs  Imported Successfully')
     window.location.href='agroinputs.php'
     </script>
     ";
 }
 

  
    }
}
}
?>