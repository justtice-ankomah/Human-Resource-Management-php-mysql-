<?php
include("connection.php");
$f = $_POST["fn"];
$l = $_POST["ln"];
$e = $_POST["ea"];
$b = $_POST["pp"];
$p = $_POST["bb"];
if(empty($f)||empty($l)||empty($e)||empty($b)||empty($b)||empty($p)){
    echo("ALL FIELDS ARE REQUIRED");
    exit();
}
else{
$sqlinsert="INSERT INTO employee_details(employee_first_name, employee_last_name, employee_email, employee_position, employee_branch)
values('$f', '$l', '$e', '$b','$p')";
$q = mysqli_query($conn,$sqlinsert);
if($q)
{
    echo("EMPLOYEE HAS BEEN ADDED SUCCESSFULLY"." "."CHECK EMPLOYEE LIST TO SEE DETAILS ADDED");
}
else {
    die("UNABLE TO ADD EMPLOYEE");
}
}