<?php
$host="localhost";
$user="root";
$password="";
$dbname="crms_db";

$conn=mysqli_connect($host,$user,$password);
mysqli_select_db($conn,$dbname);

if(!$conn)
{
    die("Could not Connect".mysql_connect_error());
}
?>