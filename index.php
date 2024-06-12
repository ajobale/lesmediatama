<?php
session_start();
require_once("config/conn.php");
?>

<?php 
    include_once("pages/partials/head.php");
    include_once("pages/partials/header.php");
?>

<?php 
if(isset($_GET['page'])){
    $page = $_GET['page'];
    $dest = "pages/".$page.".php";
    if(file_exists($dest)){
        include_once($dest);
    } else {
        include_once("pages/not-found.php");
    }
}

?>

<?php 
    include_once("pages/partials/footer.php");
    include_once("pages/partials/foot.php"); 
?>