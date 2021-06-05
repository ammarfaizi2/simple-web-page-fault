<?php

define("IN_CATEGORY", true);
require __DIR__."/func.php";

if (!isset($_GET["category"])) {
	echo "Missing category parameter";
	exit;
}

$category = $_GET["category"];
$categoryName = file_get_contents(__DIR__."/categories/{$category}/name.txt");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Kategori <?= e($categoryName) ?></title>
	<script type="text/javascript" src="assets/js/jquery-3.4.1.slim.min.js"></script>
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/base.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/item.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/base.css"/>
</head>
<body>
	<?php require __DIR__."/navbar.php"; ?>
	<div class="prod-cont">
<?php require __DIR__."/prod_nav.php"; ?>
		<h1 id="menu-heading">Daftar Menu Kategori <?= e($categoryName) ?></h1>
		<div class="row prod-cont2">
<?php $listFile = __DIR__."/categories/{$category}/list.txt"; require __DIR__."/list_item.php"; ?>
		</div>
	</div>
</body>
</html>
