<?php
include("header.php");

$page = (isset($_GET['page'])) ? $_GET['page'] : 'home';
switch($page) {
        case 'products':
                include 'products.php';
        break;
        case 'about_us':
                include 'aboutUs.php';
        break;
        case 'contact_us':
                include 'contactUs.php';
        break;
        default:
                include 'home.php';
        break;
}

include("footer.php");
?>
