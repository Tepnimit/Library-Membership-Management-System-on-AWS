<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: main.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Login Form in PHP with Session</title>
<link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body id="background">
  <?php
    include 'headerbar.php';
  ?>
<div id="main">
<div id="login">
<h2>Login Form</h2>
<form action="" method="post">
<input id="name" name="username" placeholder="Username" type="text">
<input id="password" name="password" placeholder="Password" type="password">
<input name="submit" type="submit" value=" Login ">
<p>For Demo: username and password are demo</p>
<span><?php echo $error; ?></span>
</form>
</div>
</div>

</body>
    <?php //include 'footer.php'; ?>
</html>
