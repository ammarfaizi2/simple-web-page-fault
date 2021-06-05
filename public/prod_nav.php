		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
<?php if (defined("IN_CATEGORY") || defined("IN_SUBCATEGORY")): ?>
				<li class="breadcrumb-item"><a href="category.php?category=<?= e($category) ?>"><?= e($categoryName); ?></a></li>
<?php endif; ?>
<?php if (defined("IN_SUBCATEGORY")): ?>
				<li class="breadcrumb-item"><a href="category.php?category=<?= e($category) ?>&amp;subcategory=<?= e($subcategory) ?>"><?= e($subcategoryName); ?></a></li>
<?php endif; ?>
			</ol>
		</nav>
