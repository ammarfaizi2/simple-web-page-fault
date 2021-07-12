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
	<link rel="stylesheet" type="text/css" href="assets/css/ionicons.min.css"/>
	<link href="http://fonts.cdnfonts.com/css/wildy-sans" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer"/>                
</head>
<body>
	<?php require __DIR__."/navbar.php"; ?>
	<div class="prod-cont">
<?php require __DIR__."/carousel.php"; ?>
		<h1 id="menu-heading">Daftar Menu Semua Kategori</h1>
		<div class="row justify-content-center prod-cont2">
<?php $listFile = __DIR__."/items/list.txt"; require __DIR__."/list_item.php"; ?>
		</div>
	</div>
	<?php require __DIR__."/footer.php"; ?>
</body>
</html>
