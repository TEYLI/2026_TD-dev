<?php
session_start();
if (isset($_SESSION['sess_counter'])) {
    if(isset($_GET['id'])){
        $_SESSION['sess_counter'] += $_GET['id'];
    } else {
        $_SESSION['sess_counter'] += 1;
    }
} else {
    if(isset($_GET['id'])){
        $_SESSION['sess_counter'] = $_GET['id'];
    } else {
        $_SESSION['sess_counter'] = 1;
    }
}   
echo $_SESSION['sess_counter'];
?>