<?php
include("connection.php");
$position =$_POST["position"];
$salary = $_POST["salary"];
$tax = $_POST["tax"];
$update ="update employee_details,salary set salary.salary_amount='$salary',salary.tax_amount='$tax' where
employee_details.salary_id = salary.salary_id and 
employee_details.employee_position='$position'";
$query = mysqli_query($conn,$update);
if($query)
{
    echo($position." "."SALARY HAS BEEN UPDATED SUCCESSFULLY");
}
else {
 echo($position." "."SALARY UPDATION FAIL");
}
