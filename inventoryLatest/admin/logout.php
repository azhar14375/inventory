<?php
require_once("config/database.php");
session_start();
session_destroy('username');
header("Location: index.php");
?>