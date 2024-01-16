<?php

namespace Up\Cache;

abstract class Cache
{
	abstract public function set(string $key, mixed $value, int $ttl = 60):void;
	abstract public function get(string $key);
	public function remember(string $key, int $ttl, \Closure $fetcher)
	{
		$data = $this->get('categories');
		if($data === null)
		{
			$value = $fetcher();
			$this->set($key, $value, $ttl);
			return $value;
		}
		else
		{
			return $data;
		}
	}
}