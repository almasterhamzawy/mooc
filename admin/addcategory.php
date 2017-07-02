<?php
require('../globals.php');
require(CONTROLLERS.'/adminCategoriesController.php');
require(MODELS.'/coursesCategoriesModel.php');


$adminCatController = new adminCategoriesController();
$adminCatController->addCategory();