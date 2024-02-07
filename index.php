<?php
	include_once "config.php";
	require_once "./library/library.php";
	include_once "header.php";
?>	
<?php 
	if(isset($_GET['page'])){
		$page = $_GET['page'];
		$directory = 'pages/' . $page . '.php';
		$result = file_exists($directory);
		if($result == true){
			include_once $directory;
		}else{
			include_once "pages/404.php";
		}
	}
?>
<?php
	include_once "footer.php";
?>

