<?php
include("connection.php");
$event = $_POST["addevent"];
$start = $_POST["addstart"];
$end= $_POST["addend"];
$in = "insert into holiday_list(event_name,start_date,end_date) values('$event','$start','$end')";
$que = mysqli_query($conn,$in);
if($que)
{
    echo("HOLIDAY HAS BEEN ADDED SUCCESSFULLY");
}
else{
    echo("UNABLE TO ADD HOLIDAY");
}
