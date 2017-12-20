<?php
    session_start();
    if(!file_exists('users/'.$_SESSION['username'].'.xml')) {
        header('location: signup.html');
        die;
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
    <head>User Page</head>
    <body>
        <h1>User Page</h1>
        <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
	<p><a href="ProductPage.html">Products</a></p>
        <hr>
        <a href="logout.php">Logout</a>
    </body>