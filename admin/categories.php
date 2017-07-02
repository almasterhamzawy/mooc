<?php
require('../globals.php');
require(CONTROLLERS.'/adminCategoriesController.php');
require(MODELS.'/coursesCategoriesModel.php');

$admincatcontroller = new adminCategoriesController();
$admincatcontroller->getCategories();

