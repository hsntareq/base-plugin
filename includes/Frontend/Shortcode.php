<?php
namespace Base\Plugin\Frontend;

class Shortcode {

	public function __construct() {
		add_shortcode( 'base-plugin', array( $this, 'render_shortcode' ) );
	}

	public function render_shortcode( $attr, $content = '' ) {
		return 'Hello Shortcode';
	}


}
