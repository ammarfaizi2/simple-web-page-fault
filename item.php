<?php

if (!isset($_GET["id"])) {
	header("Location: index.php");
	exit;
}

require __DIR__."/func.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Kategori Wanita</title>
	<script type="text/javascript" src="assets/js/jquery-3.4.1.slim.min.js"></script>
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/base.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/category.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/base.css"/>
</head>
<body>
	<?php require __DIR__."/navbar.php"; ?>
</body>
</html>
