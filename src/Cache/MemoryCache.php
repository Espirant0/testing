<?php

namespace Up\Cache;

class MemoryCache extends Cache
{
	private static array $cache = [];
	public function set(string $key, mixed $value, int $ttl = 60):void
	{
		self::$cache[$key] = [
			'data' => $value,
			'ttl' => time() + $ttl,
		];
	}
	public function get(string $key)
	{
		if(!isset(self::$cache[$key]))
		{
			return null;
		}

		$data = self::$cache[$key];
		$ttl = $data['ttl'];
		if (time()>=$ttl)
		{
			return null;
		}
		return $data['data'];
	}
}