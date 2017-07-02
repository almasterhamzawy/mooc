<?php
require('../globals.php');
require(CONTROLLERS.'/adminUsersGroupsController.php');
require(MODELS.'/usersGroupsModel.php');

$userGroupsController = new adminUsersGroupsController();
$userGroupsController->addUserGroup();