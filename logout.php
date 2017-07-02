<?php
require('globals.php');
session_destroy();
Redirect::To('login.php');
