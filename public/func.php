<?php

function e(string $e): string
{
	return htmlspecialchars($e, ENT_QUOTES, "UTF-8");
}

$cl_up_vector = array_merge(range("\0", chr(31)), range(chr(128), "\xff"));
unset($cl_up_vector[9]);
$cl_up_vector = array_values($cl_up_vector);

function cl_up(string $str)
{
	global $cl_up_vector;
	return str_replace($cl_up_vector, "", $str);
}

function loadItems($list): array
{
	$ret = [];
	$items = file($list);
	shuffle($items);
	foreach ($items as $item) {
		$item = trim($item);

		$title = trim(cl_up(file_get_contents(__DIR__."/items/{$item}/title.txt")));
		if (strlen($title) >= 40)
			$title = substr($title, 0, 40)."...";

		$ret[$item] = [
			"desc" => trim(cl_up(file_get_contents(__DIR__."/items/{$item}/desc.txt"))),
			"img" => "items/{$item}/image.jpg",
			"title" => $title,
			"price" => (int)trim(cl_up(file_get_contents(__DIR__."/items/{$item}/price.txt"))),
		];
	}

	return $ret;
}

function getCategories(): array
{
	$ret = [];
	$scan = scandir(__DIR__."/categories");
	foreach ($scan as $v) {
		if ($v === "." || $v === "..")
			continue;

		$ret[$v] = trim(cl_up(file_get_contents(__DIR__."/categories/{$v}/name.txt")));
	}
	return $ret;
}

function getSubCategories(string $id): array
{
	$ret = [];
	$scan = scandir(__DIR__."/categories/{$id}");
	foreach ($scan as $v) {
		if ($v === "." || $v === ".." || preg_match("/\\.txt\$/", $v))
			continue;

		$dir = __DIR__."/categories/{$id}/{$v}";
		if (!is_dir($dir))
			continue;
		$ret[$v] = trim(cl_up(file_get_contents($dir."/name.txt")));
	}
	return $ret;
}
