<?php
session_start();
$v1 = isset($_GET['v1']) ? (int)$_GET['v1'] : 0;
$v2 = isset($_GET['v2']) ? (int)$_GET['v2'] : 1;

$_SESSION['fibonacci'] = [$v1, $v2];
?>