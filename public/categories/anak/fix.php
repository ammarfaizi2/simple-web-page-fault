<?php

$list = [];
$x = scandir(__DIR__);
foreach ($x as $k => $v) {
	if ($v === "." || $v === "..")
		continue;

	if (!is_dir(__DIR__."/{$v}"))
		continue;

	$f = __DIR__."/{$v}/list.txt";
	$f = explode("\n", str_replace("\r", "", trim(file_get_contents($f))));
	$list = array_merge($list, $f);
}

$list = array_unique($list);
sort($list);

file_put_contents(__DIR__."/list.txt", implode("\n", $list));