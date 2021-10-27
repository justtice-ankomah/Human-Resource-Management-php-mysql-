<?php
include("connection.php");
$b =$_POST["bname"];
if(empty($b))
{
    echo("BRANCH NAME REQUIRED");
    exit();
}
else{
$insert = "insert into branches(branch_name) values('$b')";
$que = mysqli_query($conn,$insert);
if($que)
{
    echo("BRANCH HAS BEEN SUCCESSULLY ADDED");
}
else{
    die("UNABLE TO ADD BRANCH");
}
}