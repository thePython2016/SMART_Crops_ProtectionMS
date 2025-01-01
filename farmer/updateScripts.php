<?php
require 'connection.php';
if(isset($_POST['update']))
{
    $phone=$_POST['phone'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $gender=$_POST['gend'];
    $day=$_POST['day'];
    $month=$_POST['month'];
    $year=$_POST['year'];
    $region=$_POST['region'];
    $update =mysqli_query($conn,"update farmers 
    set 
    fname='$fname',
    lname='$mname',
    mname='$lname',
    gender='$gender',
    birthDay='$day',
    birthMonth='$month',
    birthYear='$year',
    region='$region'
where mobileNumber='$phone'
    ");
    
    if($update)
    {

        echo  "
        <script>
        window.location.href='farmers-list.php';
        </script>
        ";
    }

    else{
        echo "
        <script>
        alert('Error Occured');
        window.location.href='farmers-list.php';
        </script>
        ";
    }
}
// Update Officers
if(isset($_POST['updateOfficers']))
{
    $phone=$_POST['phone'];
    $occupation=$_POST['occupation'];
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $gender=$_POST['gend'];
    $day=$_POST['day'];
    $month=$_POST['month'];
    $year=$_POST['year'];
    $address=$_POST['address'];
    $update =mysqli_query($conn,"update agroofficers 
    set 
    occupation='$occupation',
    fname='$fname',
    lname='$mname',
    mname='$lname',
    gender='$gender',
    birthDay='$day',
    birthMonth='$month',
    birthYear='$year',
    address='$address'
where mobileNumber='$phone'
    ");
    
    if($update)
    {

        echo  "
        <script>
        window.location.href='officers-list.php';
        </script>
        ";
    }

    else{
        echo "
        <script>
        alert('Error Occured');
        window.location.href='officers-list.php';
        </script>
        ";
    }
}
// Update inputs
if(isset($_POST['updateInputs']))
{
    $number=$_POST['number'];
    $name=$_POST['name'];
    $category=$_POST['category'];
    $usage=$_POST['usage'];
   ;
    $updateInputs =mysqli_query($conn,"update agroinputs 
    set 
 
    name='$name',
    category='$category',
    usage_='$usage'
   
where inputsNumber='$number'
    ");
    
    if($updateInputs)
    {

        echo  "
        <script>
        window.location.href='agroinputs-list.php';
        </script>
        ";
    }

    else{
        echo "
        <script>
        alert('Error Occured');
        window.location.href='agroinputs-list.php';
        </script>
        ";
    }
}