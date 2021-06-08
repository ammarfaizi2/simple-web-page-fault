<?php

if (!isset($_GET["id"])) {
	header("Location: index.php");
	exit;
}

require __DIR__."/func.php";

$id = $_GET["id"];


$bdir = __DIR__."/items/{$id}";
if (!is_dir($bdir)) {
	echo "Invalid ID {$id}";
	exit(1);
}

$title = file_get_contents($bdir."/title.txt");
$price = file_get_contents($bdir."/price.txt");
$desc  = file_get_contents($bdir."/desc.txt");

?>
<!DOCTYPE html>
<html>
<head>
	<title><?= e($title) ?></title>
	<script type="text/javascript" src="assets/js/jquery-3.4.1.slim.min.js"></script>
	<script type="text/javascript" src="assets/js/popper.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/item.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/base.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/ionicons.min.css"/>
</head>
<body>
	<?php require __DIR__."/navbar.php"; ?>
	<div class="prod-cont">
		<div class="container">
			<div class="row">
				<div class="col">
					<img class="img-itct" src="items/<?= e($id) ?>/image.jpg"/>
				</div>
				<div class="col">
					<div class="item-info">
						<h3><?= e($title) ?></h3>
						<p><?= str_replace("\n", "<br/>", e($desc)) ?></p>
						<div>
							<button class="btn btn-primary">Beli</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php require __DIR__."/footer.php"; ?>
</body>
</html>
