<?php

$scan = scandir(__DIR__);

$list = [];
foreach ($scan as $k => $v) {
	if ($v === "." || $v === "..")
		continue;

	if (is_dir($v))
		$list[] = $v;
}

sort($list);

file_put_contents(__DIR__."/list.txt", implode("\n", $list));