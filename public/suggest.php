<?php foreach (array_slice(loadItems($listFile),0,5) as $k => $it): ?>
	<div class="card prod-card" style="width: 250px; height:350px; text-align:center;">
	<a href="item.php?id=<?= e($k); ?>">
<img class="card" style="width:150px; margin:auto;" src="<?= e($it["img"]) ?>" alt="<?= e($it["title"]) ?>"/>

</a>
<p class="card-text"><?= e($it["title"]) ?></p>
</div>
<?php endforeach; return; ?>

