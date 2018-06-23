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

class PLUGIN_CLASS_file {

  /**
	 * The Constructor.
	 * @since 1.0
	 */
	function __construct() {
		$this->CLASS_add_actions_filters();
	}

  /**
	 * The init for all the actions and filters.
	 * @since 1.0
	 */
	function CLASS_add_actions_filters() {
		add_action( 'ACTION REFERENCE HOOK', array( $this, 'PLUGIN_NAME_function_name' ) );
	}

  /**
   * WHAT MAGIC WILL HAPPEN
   * @since 1.0
   */
  function PLUGIN_CLASS_function_name() {
		// let the magic happen here
	}

} // END class

/**
 * Instantiate the class.
 * @since 1.0
 */
$PLUGIN_CLASS_file = new PLUGIN_CLASS_file();
