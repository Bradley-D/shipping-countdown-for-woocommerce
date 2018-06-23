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
		//add_action( 'ACTION REFERENCE HOOK', array( $this, 'scfwc_output_js' ), 999 );

		$scfwc_render_location = get_theme_mod( 'scfwc_render_location');
		switch ( $scfwc_render_location ) :
			case 'scfwc_after_heading' :
				add_action( 'woocommerce_single_product_summary', array( $this, 'scfwc_html_product' ), 6 );
				break;
			case 'scfwc_after_price' :
				add_action( 'woocommerce_single_product_summary', array( $this, 'scfwc_html_product' ), 11 );
				break;
			case 'pffwc_after_short_desc' :
				add_action( 'woocommerce_single_product_summary', array( $this, 'scfwc_html_product' ), 21 );
				break;
			case 'pffwc_after_add_cart' :
				add_action( 'woocommerce_single_product_summary', array( $this, 'scfwc_html_product' ), 31 );
				break;
		endswitch;
	}

  /**
   * Calculate the time in JS
   * @since 1.0
   */
  function scfwc_output_js() { ?>
		<script type="text/javascript"></script> <?php
	}

	/**
	 * Add html to prodcut page for binding the countdown
	 * @since 1.0
	 */
	function scfwc_html_product() { ?>
			<div id="shipping-countdown">
				<h1>Shipping Location</h1>
			  <div>
			    <span class="days"></span>
			    <div class="smalltext">Days</div>
			  </div>
			  <div>
			    <span class="hours"></span>
			    <div class="smalltext">Hours</div>
			  </div>
			  <div>
			    <span class="minutes"></span>
			    <div class="smalltext">Minutes</div>
			  </div>
			  <div>
			    <span class="seconds"></span>
			    <div class="smalltext">Seconds</div>
			  </div>
			</div> <?php
	}


} // END class

/**
 * Instantiate the class.
 * @since 1.0
 */
$scfwc_output = new scfwc_output();
