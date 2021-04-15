<?php
include_once __DIR__ . "/../config.php";

session_start();
unset($_SESSION['id']);
session_destroy();
header('Location: ../index.php');