		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
<?php if (defined("IN_CATEGORY")): ?>
				<li class="breadcrumb-item"><a href="category.php?category=<?= e($category) ?>"><?= e($categoryName); ?></a></li>
<?php endif; ?>
			</ol>
		</nav>