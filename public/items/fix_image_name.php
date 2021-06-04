<?php

$x = scandir(__DIR__);

foreach ($x as $v) {
	$q = (int)$v;
	if (!($q >= 0 && $q <= 100))
		continue;

	$dir = __DIR__."/{$v}";
	if (!is_dir($dir))
		continue;

	$scan = scandir($dir);
	foreach ($scan as $f) {
		if (!preg_match("/\.jpg$/", $f))
			continue;

		if ($f === "image.jpg")
			continue;

		rename($dir."/{$f}", $dir."/image.jpg");
	}
}
