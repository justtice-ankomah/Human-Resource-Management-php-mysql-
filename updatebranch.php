<?php
include("connection.php");
$id = $_POST["id"];
$name = $_POST["name"];
$update = "update branches set branch_name='$name' where branch_id='$id'";
$query = mysqli_query($conn,$update);
if($query)
{
    echo("BRANCH NAME HAS BEEN EDITED");
   
}

else{
    echo("UNABLE TO EDIT BRANCH NAME");
   
};

