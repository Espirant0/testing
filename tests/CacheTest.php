<?php

namespace tests;

use PHPUnit\Framework\TestCase;

class CacheTest extends TestCase
{
	/**
	 * @dataProvider cacheObjectProvider
	 * @return void
	 */
	public function testBasicCaching(\Up\Cache\Cache $cache)
	{
		$value = uniqid();
		$cache->set('testBasicCaching', $value);
		$this->assertEquals($value, $cache->get('testBasicCaching'));
	}
	/**
	 * @dataProvider cacheObjectProvider
	 * @return void
	 */

	public function testTtl(\Up\Cache\Cache $cache){
		$value = uniqid();
		$cache->set('testTtl', $value, 0);
		$this->assertNull($cache->get('testTtl'));
	}
	public function cacheObjectProvider(): array
	{
		return[
			[new \Up\Cache\MemoryCache()],
			[new \Up\Cache\FileCache()],
			];
	}
}
