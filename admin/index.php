<?php
include_once "../config.php";
require_once "../library/library.php";
include_once 'header.php';

if(isset($_SESSION['is_login'])){
    ?>
    <div class="row  mw-100 h-100">
        <div class="col-lg-3  col-md-3  col-sm-3 col-12 col-xs-12" >
            <?php include_once 'menu.php' ?>
        </div>
        <div class='col-lg-9 col-md-9 col-sm-9   col-xs-12'>
            <?php
            if(isset($_GET['page'])){
                $page = $_GET['page'];
                $directory = 'pages_admin/' . $page . '.php';
                $result = file_exists($directory);
                if($result == true){
                    include_once $directory;
                }else{
                    include_once "../pages/404.php";
                }
            }
            ?>
        </div>
    </div>
    <?php

}else{
    header("Location: ../?page=login");
    exit();
}

include_once 'footer.php';
?>