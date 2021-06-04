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
	<link rel="stylesheet" type="text/css" href="assets/css/item.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/base.css"/>
</head>
<body>
	<?php require __DIR__."/navbar_main.php"; ?>
	<div class="prod-cont">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<a href="index.php"><li class="breadcrumb-item active" aria-current="page">Home</li></a>
			</ol>
		</nav>
		<h1 id="menu-heading">Daftar Menu Semua Kategori</h1>
		<div class="row prod-cont2">
<?php foreach (loadItems(__DIR__."/items/list.txt") as $k => $it): ?>
			<div class="col col-prod">
				<a href="item.php?id=<?= e($k); ?>">
					<div class="card prod-card" style="width: 18rem;">
						<img class="prod" src="<?= e($it["img"]) ?>" alt="<?= e($it["title"]) ?>"/>
						<div class="card-body prod-title">
							<p class="card-text"><?= e($it["title"]) ?></p>
						</div>
						<div class="card-body prod-title">
							<p class="card-text">Rp.<?= e(number_format($it["price"], 0, ",", ".")) ?></p>
						</div>
					</div>
				</a>
			</div>
<?php endforeach; ?>
		</div>
	</div>
</body>
</html>
