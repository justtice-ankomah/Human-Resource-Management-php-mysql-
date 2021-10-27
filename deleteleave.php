<?php
include("connection.php");
$id = $_POST["leaveid"];
$delete = "delete from leave_category where leave_id = '$id'";
$qq = mysqli_query($conn,$delete);
if($qq)
{
    echo("LEAVE HAS BEEN DELETED SUCCESSFULLY");
}
else {
 echo("UNABLE TO DELETE LEAVE");
}