
<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Virginia Library</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet" type="text/css">
    <?php include 'headersession.php'; ?>
</head>
<body>
<div id="main">
<h1>Book Reservation:</h1>
<?php
  require 'list_data.php';
?>
</div>
</body>
</html>
