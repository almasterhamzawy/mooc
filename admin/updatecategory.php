<?php
require('../globals.php');
require(CONTROLLERS.'/adminCategoriesController.php');
require(MODELS.'/coursesCategoriesModel.php');

$coursesCatController = new adminCategoriesController();
$coursesCatController->updateCategory();



