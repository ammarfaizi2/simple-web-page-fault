<nav class="navbar navbar-expand-lg navbar-dark bg-dark navtop">
	<a class="navbar-brand logo" href="index.php">Kleren</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Kategori
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<?php foreach (getCategories() as $k => $cc) : ?>
						<a class="dropdown-item" href="category.php?category=<?= e($k) ?>"><?= e($cc) ?></a>
					<?php endforeach; ?>
				</div>
			</li>
			<?php if (defined("IN_CATEGORY") || defined("IN_SUBCATEGORY")) : ?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Sub Kategori
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<?php foreach (getSubCategories($category) as $k => $cc) : ?>
							<a class="dropdown-item" href="subcategory.php?category=<?= e($category) ?>&amp;subcategory=<?= e($k) ?>"><?= e($cc) ?></a>
						<?php endforeach; ?>
					</div>
				</li>
			<?php endif; ?>
		</ul>
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
		<div class="btn-group dropleft" style="padding-left: 15px; padding-right: 30px;">
		<a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i style="font-size: 30px; color: #fff;" class="fas fa-user-circle"></i>
		</a>
			<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
				<a class="dropdown-item" href="login.php">Login</a>
				<a class="dropdown-item" href="register.php">Register</a>
			</div>
		</div>
	</div>
</nav>