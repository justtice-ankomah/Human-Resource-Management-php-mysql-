<?php
include("connection.php");
$id= $_POST["id"];
$leave = $_POST["leave"];
$update = "update leave_category set category_name='$leave' where leave_id='$id'";
$que = mysqli_query($conn,$update);
if($que)
{
    echo("LEAVE HAVE BEEN UPDATED SUCCESSFULLY");
}
else{
    echo("UNABLE TO UPDATE LEAVE");
}