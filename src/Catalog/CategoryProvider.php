<?php

namespace Up\Catalog;

class CategoryProvider
{
	public function getCategories():array
	{
		sleep(5);
		return [
			'TV',
			'Consoles',
			'Smartphones',
		];
	}
}