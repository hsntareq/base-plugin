<?php

namespace Base\Plugin;

/**
 * Admin
 */
class Admin {

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		new Admin\Menu();
	}
}
