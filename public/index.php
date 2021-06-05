<?php require __DIR__."/func.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Kleren</title>
	<script type="text/javascript" src="assets/js/jquery-3.4.1.slim.min.js"></script>
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/item.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/base.css"/>
</head>
<body>
	<?php require __DIR__."/navbar.php"; ?>
	<div class="prod-cont">
<?php require __DIR__."/prod_nav.php"; ?>
		<h1 id="menu-heading">Daftar Menu Semua Kategori</h1>
		<div class="row prod-cont2">
<?php $listFile = __DIR__."/items/list.txt"; require __DIR__."/list_item.php"; ?>
		</div>
	</div>
</body>
</html>
