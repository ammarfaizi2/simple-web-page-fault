<?php foreach (loadItems($listFile) as $k => $it): ?>
			<div style="margin-left: 10px; margin-right: 10px">
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
<?php endforeach; return; ?>

<script type="text/javascript">
let x = <?= json_encode(loadItems($listFile), 128); ?>;

</script>

