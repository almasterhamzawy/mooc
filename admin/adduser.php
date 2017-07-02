<?php
require('../globals.php');
require(CONTROLLERS.'/adminUsersController.php');
require(MODELS.'/usersModel.php');
require(MODELS.'/usersGroupsModel.php');

$usersController = new adminUsersController();
$usersController->addUser();