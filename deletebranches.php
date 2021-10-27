<?php
include("connection.php");
$dele = $_POST["branchid"];
$delete = "delete from branches where branch_id='$dele'";
$quedelete = mysqli_query($conn,$delete);
if($quedelete)
{
    echo("BRANCH IS SUCCESSFULLY DELETED");
}
else {
 die("UNABLE TO DELETE BRANCH");
}