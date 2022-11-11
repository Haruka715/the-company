<?php
include "../classes/User.php";

//create on object based on the user class
$user = new User();

//Calling the method
$user->store($_POST);
?>