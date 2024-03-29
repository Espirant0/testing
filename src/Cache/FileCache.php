<?php

namespace Up\Cache;

class FileCache extends Cache
{
	private static array $cache = [];
	public function set(string $key, mixed $value, int $ttl = 60):void
	{
		$hash = sha1($key);
		$path = ROOT . '/var/cache/' . $hash.'.php';
		$data = [
			'data' => $value,
			'ttl' => time() + $ttl,
		];
		file_put_contents($path, serialize($data));
	}
	public function get(string $key)
	{
		$hash = sha1($key);
		$path = ROOT . '/var/cache/' . $hash.'.php';
		if(!file_exists($path))
		{
			return null;
		}
		$data = unserialize(file_get_contents($path), ['allowed_classes' => false]);
		$ttl = $data['ttl'];
		if (time()>=$ttl)
		{
			return null;
		}
		return $data['data'];
	}
}