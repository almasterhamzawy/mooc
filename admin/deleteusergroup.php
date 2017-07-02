<?php
require('../globals.php');
require(CONTROLLERS.'/adminUsersGroupsController.php');
require(MODELS.'/usersGroupsModel.php');

$ugController = new adminUsersGroupsController();
$ugController->deleteUserGroup();