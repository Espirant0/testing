<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/../boot.php';


$cache = new Up\Cache\FileCache();

$categories = $cache->remember('categories', 10, function ()
{
	$provider = new \Up\Catalog\CategoryProvider();
	return $provider->getCategories();
});


echo 'top menu <br>';

var_dump($categories);

echo 'Main page <br>';

echo 'bottom menu <br>';
var_dump($categories);

