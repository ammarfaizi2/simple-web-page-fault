<?php

function loadItems($list): array
{
	$ret = [];
	$items = file($list);
	foreach ($items as $item) {
		$item = trim($item);
		$ret[$item] = [
			"desc" => trim(file_get_contents(__DIR__."/items/{$item}/desc.txt")),
			"img" => "items/{$item}/image.jpg",
			"title" => trim(file_get_contents(__DIR__."/items/{$item}/title.txt")),
			"price" => (int)trim(file_get_contents(__DIR__."/items/{$item}/price.txt")),
		];
	}

	return $ret;
}

function e(string $e): string
{
	return htmlspecialchars($e, ENT_QUOTES, "UTF-8");
}


function getCategories(): array
{
	$ret = [];
	$scan = scandir(__DIR__."/categories");
	foreach ($scan as $v) {
		if ($v === "." || $v === "..")
			continue;

		$ret[$v] = trim(file_get_contents(__DIR__."/categories/{$v}/name.txt"));
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

		$ret[$v] = trim(file_get_contents(__DIR__."/categories/{$id}/{$v}/name.txt"));
	}
	return $ret;
}
