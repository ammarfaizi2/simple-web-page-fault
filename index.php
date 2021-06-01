<?php require __DIR__."/func.php"; ?>
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
	<?php require __DIR__."/navbar_main.php"; ?>
	<div class="prod-cont">
		<h1 id="dafter-menu">Daftar Menu Semua Kategori</h1>
<?php foreach (loadItems(__DIR__."/items/list.txt") as $k => $it): ?>
		<a href="item.php?id=<?= e($k); ?>">
			<div class="pt">
				<img class="prod" src="<?= e($it["img"]) ?>"/>
				<div class="prod-sdesc"><?= e($it["title"]) ?></div>
				<div class="prod-price">
					<p>Rp.<?= e(number_format($it["price"], 0, ",", ".")) ?></p>
				</div>
			</div>
		</a>
<?php endforeach; ?>
	</div>
</body>
</html>