<?php
session_start();
/* check if the user input is equal to the email and the password in the database then choose some from the database */
include("connection.php");
/* check if the user did click on the submit button */
if(isset($_POST["submit_one"]))
{
$email = $_POST["email"];
$password = $_POST["password"];
$sqlselect = "select * from hrm_board_members where email_address = '$email' and board_member_password='$password'";
$query = mysqli_query($conn,$sqlselect);
while($show=mysqli_fetch_assoc($query))
{
  $User_email = $show["email_address"];
  $user_passsword = $show["board_member_password"];
 $hi= $show["board_member_first_name"];
}
$_SESSION["first_name"] = $hi;
/* check if user email and password exist  in the database */
if($User_email==$email && $user_passsword == $password)
{
header("location:dashboard.php?login=successful");
exit();
}
else{
    header("location:index.php?incorrect=incorrect login details");
    exit();
}
/*send the user back to the index page if he or she did not click on the submit button */
}
else{
    header("location:index.php?error=you did not click on the submit button");
    exit();
}