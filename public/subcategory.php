<?php

define("IN_SUBCATEGORY", true);
require __DIR__."/func.php";

if (!isset($_GET["category"])) {
	echo "Missing category parameter";
	exit;
}

if (!isset($_GET["subcategory"])) {
	echo "Missing subcategory parameter";
	exit;
}

$category = $_GET["category"];
$categoryName = file_get_contents(__DIR__."/categories/{$category}/name.txt");

$subcategory = $_GET["subcategory"];
$subcategoryName = file_get_contents(__DIR__."/categories/{$category}/{$subcategory}/name.txt");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Kategori <?= e($categoryName) ?> Sub Kategori <?= e($subcategoryName) ?></title>
	<script type="text/javascript" src="assets/js/jquery-3.4.1.slim.min.js"></script>
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/item.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/base.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/ionicons.min.css"/>
	<link href="http://fonts.cdnfonts.com/css/wildy-sans" rel="stylesheet">
</head>
<body>
	<?php require __DIR__."/navbar.php"; ?>
	<div class="prod-cont">
<?php require __DIR__."/prod_nav.php"; ?>
		<h1 id="menu-heading">Daftar Menu Kategori <?= e($categoryName) ?> Sub Kategori <?= e($subcategoryName) ?></h1>
		<div class="row justify-content-center prod-cont2">
<?php $listFile = __DIR__."/categories/{$category}/{$subcategory}/list.txt"; require __DIR__."/list_item.php"; ?>
		</div>
	</div>
	<?php require __DIR__."/footer.php"; ?>
</body>
</html>
