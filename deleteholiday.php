<?php
include("connection.php");
$dele = $_POST["holiday_id"];
$delete ="delete from holiday_list where holiday_id ='$dele'";
$que = mysqli_query($conn,$delete);
if($que)
{
    echo("HOLIDAY HAS BEEN DELETED");
}
else{
    echo("UNABLE TO DELETE HOLIDAY");
}