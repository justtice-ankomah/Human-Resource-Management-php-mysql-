<?php
include("connection.php");
$emid = $_POST["id"];
$emfirst_name = $_POST["firstname"];
$emlast_name = $_POST["lname"];
$ememail = $_POST["email"];
$emposition = $_POST["position"];
$embranch = $_POST["branch"];
$sqlupdate = "update employee_details 
set employee_first_name = '$emfirst_name', employee_last_name = '$emlast_name', employee_email = '$ememail', 
employee_position ='$emposition', employee_branch='$embranch' where employee_id='$emid'";
$query = mysqli_query($conn,$sqlupdate);
if($query)
{
    echo "EMPLOYEE DETAILS SUCCESSFULLY UPDATED";
}
else{
    echo "UNABLE TO UPDATE EMPLOYEE DETAILS";
};

