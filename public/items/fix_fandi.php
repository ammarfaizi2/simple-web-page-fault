<?php

for ($i = 61; $i <= 80; $i++) {
	$file = __DIR__."/0{$i}/price.txt";
	$content = file_get_contents($file);
	$content = preg_replace("/\\D/", "", $content);
	file_put_contents($file, $content);
}