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

class scfwc_output {

  /**
	 * The Constructor.
	 * @since 1.0
	 */
	function __construct() {
		$this->scfwc_output_add_actions_filters();
	}

  /**
	 * The init for all the actions and filters.
	 * @since 1.0
	 */
	function scfwc_output_add_actions_filters() {
		add_action( 'ACTION REFERENCE HOOK', array( $this, 'scfwc_output' ) );
	}

  /**
   * WHAT MAGIC WILL HAPPEN
   * @since 1.0
   */
  function scfwc_output() {
		// let the magic happen here
	}

} // END class

/**
 * Instantiate the class.
 * @since 1.0
 */
$scfwc_output = new scfwc_output();
