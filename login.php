<?php
require('globals.php');
require(MODELS.'/usersModel.php');
require(CONTROLLERS.'/usersController.php');

$usersController = new usersController(new usersModel());
$usersController->usersLogin();
