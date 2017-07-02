<?php
require('../globals.php');
require(CONTROLLERS.'/adminCategoriesController.php');
require(MODELS.'/coursesCategoriesModel.php');

$catController = new adminCategoriesController();
$catController->deleteCategory();
