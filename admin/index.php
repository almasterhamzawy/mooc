<?php
require('../globals.php');

require(CONTROLLERS.'/adminController.php');

$adminController = new adminController();
$adminController->index();