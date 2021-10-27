<?php
include("connection.php");
$id = $_POST["id"];
$monday =$_POST["monday"];
$tuesday = $_POST["tuesday"];
$wednessday = $_POST["wednessday"];
$thursday = $_POST["thursday"];
$friday = $_POST["friday"];
$saturday = $_POST["saturday"];
$sunday = $_POST["sunday"];
$update = "update working_days set monday='$monday', tuesday='$tuesday', wednessday='$wednessday', 
thursday='$thursday', friday='$friday', saturday='$saturday', sunday='$sunday' where days_id='$id'";
$query = mysqli_query($conn,$update);
if($query)
{
    echo("WORKING DAYS TIME HAS SUCCESSFULLY BEEN SET");
}
else {
 echo("UNABLE TO SET WORKING DAYS TIME");
}