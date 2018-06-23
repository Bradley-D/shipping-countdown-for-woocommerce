<?php
/*
 * PLUGIN_NAME class
 *
 * Describe what this class does
 *
 * @author
 * @package
 * @since 1.0
 */
if ( ! defined( 'ABSPATH' ) ) :
	exit;
endif;

class scfwc_customizer {

  /**
	 * The Constructor.
	 * @since 1.0
	 */
	public function __construct() {
		$this->scfwc_customizer_add_actions_filters();
	}

  /**
	 * The init for all the actions and filters.
	 * @since 1.0
	 */
	public static function scfwc_customizer_add_actions_filters() {
		add_action( 'ACTION REFERENCE HOOK', __CLASS__ . '::scfwc_customizer_add_options' );
	}

  /**
   * WHAT MAGIC WILL HAPPEN
   * @since 1.0
   */
  public static function scfwc_customizer_add_options() {
		// let the magic happen here
    // NEED:
    // - add to WooCommerce pannel - title Shipping Countdown
    // - select with days of week for shipping
    // - - need to have multi select
    // - add time to select shipping countdown
	}

} // END class

/**
 * Instantiate the class.
 * @since 1.0
 */
$scfwc_customizer = new scfwc_customizer();
