<?php
include("connection.php");
$holidayid = $_POST["holidayid"];
$event = $_POST["event"];
$start =$_POST["start"];
$end = $_POST["end"];
$holidayupdate = "update holiday_list set event_name = '$event', start_date='$start', end_date='$end' where holiday_id = '$holidayid'";
$queholiday = mysqli_query($conn,$holidayupdate);
if($queholiday)
{
    echo("HOLIDAY SUCCESSFULLY UPDATED");
}
else {
 echo("UNABLE TO UPDATE HOLIDAY");
}