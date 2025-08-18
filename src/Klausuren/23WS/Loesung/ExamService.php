<?php declare(strict_types=1);
session_start();

if(isset($_GET['star'])) {
    if(in_array($_GET['star'], $_SESSION['stars'])) {
        unset($_SESSION['stars'][$_GET['star']]);
    } else {
        $_SESSION['stars'][$_GET['star']] = $_GET['star'];
    }
    
}