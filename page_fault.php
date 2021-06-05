<?php

const BASE_URL = "http://127.0.0.1:8001";
const BASE_SAVE_DIR = __DIR__."/static";

function page_fault(string $path, string $saveTo, ?callable $callback = NULL)
{
	$url = BASE_URL."/".ltrim($path, "/");
	$ch = curl_init($url);
	curl_setopt_array($ch,
		[
			CURLOPT_RETURNTRANSFER => true
		]
	);
	$out = curl_exec($ch);
	$ern = curl_errno($ch);
	$err = curl_error($ch);
	curl_close($ch);

	if ($ern || $err) {
		printf("Curl error when scraping %s (would save to %s)\n", $url, $saveTo);
		printf("Curl error: (%d) %s\n", $ern, $err);
		exit(1);
	}

	$bytes = file_force_put_contents($saveTo = BASE_SAVE_DIR."/".$saveTo,
			($callback) ? $callback($out) : $out, LOCK_EX);
	printf("Success write to %s (%d bytes)\n", $saveTo, $bytes);
	return $out;
}

function file_force_put_contents(string $file, string $data, int $flag)
{
	$dirs = [];
	$dir = dirname($file);

	while (!is_dir($dir)) {
		$dirs[] = $dir;
		$dir = dirname($dir);
	}

	$c = count($dirs);
	while ($c--) {
		mkdir($dirs[$c]);
		printf("mkdir %s\n", $dirs[$c]);
	}

	return file_put_contents($file, $data, $flag);
}

$repPHP = function (string $str): string {
	$str = str_replace("index.php", "index.html", $str);
	$str = preg_replace("/\"category\.php\?category=(.+?)\"/", "\"kategori_\$1.html\"", $str);
	$str = preg_replace("/\"subcategory\.php\?category=(.+?)\\&amp\\;subcategory=(.+?)\"/", "\"subkategori_\$1_\$2.html\"", $str);
	$str = preg_replace("/\"item.php\?id=(\d+)\"/", "\"item_\$1.html\"", $str);
	return $str;
};

$out = page_fault("index.php", "index.html", $repPHP);

if (preg_match_all("/src=\"(.+?)\"/", $out, $m)) {
	unset($m[0]);
	foreach ($m[1] as $k => $v) {
		page_fault($v, $v);
	}
}

if (preg_match_all("/<link.+?href=\"(.+?)\"/", $out, $m)) {
	unset($m[0]);
	foreach ($m[1] as $k => $v) {
		page_fault($v, $v);
	}
}

if (preg_match_all("/<a.+?href=\"(.+?)\"/", $out, $m)) {
	unset($m[0]);
	foreach ($m[1] as $k => $v) {
		if ($v === "#")
			continue;

		$c = "none";
		$saveTo = NULL;

		if (preg_match("/category\.php\?category=(.+)/", $v, $m)) {
			$c = "category";
			$saveTo = "kategori_{$m[1]}.html";
		}

		if (preg_match("/item.php\?id=(\d+)/", $v, $m)) {
			$c = "item";
			$saveTo = "item_{$m[1]}.html";
		}

		if ($saveTo)
			do_save_sub_page($v, $c, $saveTo);
	}
}

function do_save_sub_page(string $v, string $c, string $saveTo)
{
	global $repPHP;

	$out = page_fault($v, $saveTo, $repPHP);
	switch ($c) {
	case "none":
		break;
	case "category":
		if (preg_match_all("/href=\"(subcategory\.php\?category=(.+?)\\&amp\\;subcategory=(.+?))\"/", $out, $m)) {
			unset($m[0]);
			foreach ($m[1] as $k => $v) {
				$v = html_entity_decode($v, ENT_QUOTES, "UTF-8");
				page_fault($v, "subkategori_{$m[2][$k]}_{$m[3][$k]}.html", $repPHP);
			}
		}
		break;
	}
}