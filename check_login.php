<?php

session_start();

require_once 'init.php';

if (isLoggedIn()){
	echo  $_SESSION['login'];
}

?>