<?php
    $error = false;
    if(isset($_POST['login'])) {
        $username = preg_replace('/[^A-Za-z]/', '', $_POST['username']);
        $password = md5($_POST['password']);
        if(file_exists('users/'.$username.'.xml')) {
            $xml = new SimpleXMLElement('users/'.$username.'.xml', 0, true);
            if($password == $xml->password){
                session_start();
                $_SESSION['username'] = $username;
                header('location: index.php');
                die;
            }
        }
        $error = true;
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
    <head>Login</head>
    <body>
        <h1>Login</h1>
        <form method="post" action="">
            <p>Username: <input type="text" name="username" /></p>
            <p>Password: <input type="password" name="password" /></p>
            <?php
                if($error) {
                    echo '<p>Login Invalid</p>';
                }
            ?>
            <p><input type="submit" value="Login" name="login" /></p>
        </form>
        <a href="signup.html">Register</a>
    </body>
</html>