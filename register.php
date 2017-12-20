<?php
    $errors = array();
    if(isset($_GET['register'])) {
        $username = preg_replace(['/[^A-Za-z]/'], '', $_GET['username']);
        $name = $_GET['name'];
        $email = $_GET['email'];
        $password = $_GET['password'];
        $c_password = $_GET['c_password'];
        if(file_exists('users/'.$username.'.xml')) {
            $errors[] = 'Username already exists';
        }
        if($password != $c_password) {
            $errors[] = 'Passwords do not match';
        }
		if(is_null($username)) {
			$errors[] = 'Username is blank';
		}
		if(is_null($password)) {
			$errors[] = 'Password is blank';
		}
        if(count($errors) == 0) {
            $xml = new SimpleXMLElement('<user></user>');
            $xml->addChild('name', $name);
            $xml->addChild('email', $email);
            $xml->addChild('password', md5($password));
            $xml->asXML('users/'.$username.'.xml');
            header('location: login.php');
            die;
        }
    }
?>