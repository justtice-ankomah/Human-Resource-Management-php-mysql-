<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="author" name="Justice & Eva">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UNIQUE GARMENTS INCORPERATION</title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!--custom css link-->
    <link rel="stylesheet" href="csss/index.css">
   <link rel="stylesheet" href="csss/animate.css">
    </head>
<body>
<center>
    <!--top navigation bar-->
<div id="wraper">
<div class="container">

	<div ID="LOGO"><img id="logo" class="animated" src="images/logo.jpg"></div>
    <div><a href="#" id="link" class="animated bounceIn">HOME</a></div>
    <div><a href="about.php" id="link"  class="animated bounceIn">ABOUT</a></div>
    <div><a href="contact.php" id="link"  class="animated bounceIn">CONTACT</a></div>
</div>
</div>

<!--login form-->
<div id="form_div">
<form action="indexprocess.php" method="post">
    <br/>
    <br/>
    <br/>
<center><img id="form_image" src="images/form.jpg"  class="animated bounceIn"></center>
<input type="email" placeholder="ENTER EMAIL ADDRESS" name="email" class="animated bounceIn" required>
<br>
<input type="password" placeholder="ENTER PASSSWORD" name="password"  class="animated bounceIn" required>
<br/>
<?php
if(@$_GET["incorrect"])
{
?>
<div style="color:red; font-size:20px; " class="alert"><?php echo $_GET["incorrect"]; ?></div>
<?php
}
?>
<input type="submit" id="submit" value="LOGIN" id="submit" name="submit_one" class="animated bounceIn">
<br/>
<br/>
<br/>
</form>
</div>

</center>
<div style="position:relative;height:100%;">
<img style="position:absolute;bottom:0;" src="images/unique.jpg">
</div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>
</html>