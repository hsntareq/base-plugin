<?php

namespace Base\Plugin;

/**
 * Admin
 */
class Frontend {

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		new Frontend\Shortcode();
	}
}
