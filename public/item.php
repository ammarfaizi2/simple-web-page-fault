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

$desc_expl = explode("\n", $desc);
$desc_nlin = count($desc_expl);

$desc_show = array_slice($desc_expl, 0, 15);
$desc_rest = array_slice($desc_expl, 15);
$desc_rest = str_replace("\n", "<br/>", e(implode("\n", $desc_rest)));



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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
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
<?php if ($desc_nlin >= 15): ?>
						<p><?= str_replace("\n", "<br/>", e(implode("\n", $desc_show))) ?><span id="more_desc" style="display:none;"><?= $desc_rest ?></span></p>
						<p id="read_mode_p"><a href="javascript:read_more();">Read More</a></p>
<?php else: ?>
						<p><?= str_replace("\n", "<br/>", e($desc)) ?></p>
<?php endif; ?>
						<div>
							<button class="btn btn-primary">Beli</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div style="margin-top:-70px; margin-bottom:100px; margin-left:180px; margin-right:180px">
	<h4>Recommendation</h4>
	<div class="owl-carousel">
	<?php $listFile = __DIR__."/items/list.txt"; require __DIR__."/suggest.php"; ?>
	</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script type="text/javascript">
		function read_more() {
			$("#more_desc").show();
			$("#read_mode_p").hide();
		}

		$(document).ready(function(){
  $(".owl-carousel").owlCarousel();
});
	</script>
	<?php require __DIR__."/footer.php"; ?>
</body>
</html>
