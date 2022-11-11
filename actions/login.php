<?php
include "../classes/User.php";

//create an object based on the User class
$user = new User();

//Calling the method
$user->login($_POST);
?>