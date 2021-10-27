<?php
include("connection.php");
$leave = $_POST["addleave"];
if(empty($leave))
{
    echo("PLEASE ENTER A LEAVE CATEGORY NAME");
    exit();
}
$sele = "insert into leave_category(category_name)values('$leave')";
$query = mysqli_query($conn,$sele);
if($query)
{
    echo("LEAVE HAS BEEN ADDED SUCCESSFULLY");
}
else{
    echo("UNABLE TO ADD LEAVE TO");
}