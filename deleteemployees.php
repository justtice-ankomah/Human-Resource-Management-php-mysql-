<?php
include("connection.php");
$hi = $_POST['delete_id'];
$sqldelete = "delete  from employee_details where employee_id='$hi'";
$query = mysqli_query($conn,$sqldelete);
if($query)
{
    echo "EMPLOYEE HAS BEEN  SUCCESSFULLY DELETED";
}
else{
    echo "UNABLE TO DELETE EMPLOYEE";
}