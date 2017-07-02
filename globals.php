<?php
session_start();

define('ROOT',dirname(__FILE__));
define('INCLUDES',ROOT.'/includes');
define('PLUGINS',INCLUDES.'/plugins');
define('CONTROLLERS',INCLUDES.'/controllers');
define('MODELS',INCLUDES.'/models');
define('VIEWS',ROOT.'/templates');
define('ASSEtS',ROOT.'/assets');


require(INCLUDES.'/config.php');
require(INCLUDES.'/general.functions.php');
require(INCLUDES.'/Redirect.php');
require(CONTROLLERS.'/controller.php');
require(MODELS.'/model.php');
require(INCLUDES.'/System.php');
require(INCLUDES.'/mysql.php');

System::Set('db',new mysqlDB());