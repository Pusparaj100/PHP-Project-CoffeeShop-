<?php
require'Config.php';
$_SESSION = [];
session_unset();
session_destroy();
header("Location: home.php");?>
