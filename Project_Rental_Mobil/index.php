<?php
require 'config.php';

if( isset($_SESSION['login']) ) {
    header('Location: admin/index.php');
} else {
    header('Location: login.php');
}