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
    //self::scfwc_includes();
		add_action( 'customize_register', __CLASS__ . '::scfwc_customizer_add_options' );
	}

  /**
   * Add the includes.
   * @since 1.0
   */
  public static function scfwc_includes() {
  //  require_once( 'class_extends_customizer.php');
  }

  /**
   * WHAT MAGIC WILL HAPPEN
   * @since 1.0
   */
  public static function scfwc_customizer_add_options( $wp_customize ) {

    require_once( 'class_extends_customizer.php');

		// let the magic happen here
    // NEED:

    // - select with days of week for shipping
    // - - need to have multi select
    // - add time to select shipping countdown

    // Add section to WooCommerce Panel
    $wp_customize->add_section( 'scfwc_options',
      array(
        'title'      => __( 'Shipping Countdown', 'scfwc' ),
        'panel'      => 'woocommerce',
        'type'       => 'option',
        'capability' => '',
        'priority'   => 500,
      )
    );

    // Choose Shipping Countdown days of shipping
    $wp_customize->add_setting( 'scfwc_select_days',
      array(
        'default' => 'scfwc_ship_fri',
        'sanitize_callback' => __CLASS__ . '::scfwc_sanitize_day',
      )
    );
    $wp_customize->add_control( new scfwc_dropdown_custom_control( $wp_customize, 'scfwc_select_days',
      array(
        'label'       => __( 'Select shipping days', 'scfwc' ),
        'description' => __( 'Choose the days that you ship products. You can select multiple days', 'scfwc'),
        'settings'    => 'scfwc_select_days',
        'section'     => 'scfwc_options',
        'type'        => 'multiple-select',
        'choices'     => array(
          'scfwc_ship_mon' => __( 'Monday', 'scfwc' ),
          'scfwc_ship_tue' => __( 'Tuesday', 'scfwc' ),
          'scfwc_ship_wed' => __( 'Wednesday', 'scfwc' ),
          'scfwc_ship_thu' => __( 'Thursday', 'scfwc' ),
          'scfwc_ship_fri' => __( 'Friday', 'scfwc' ),
          'scfwc_ship_sat' => __( 'Saturday', 'scfwc' ),
          'scfwc_ship_sun' => __( 'Sunday', 'scfwc' ),
        ),
      )
    ));


    // Choose Shipping Countdown output location
    $wp_customize->add_setting( 'scfwc_render_location',
      array(
        'default' => 'scfwc_after_add_cart',
        'sanitize_callback' => __CLASS__ . '::scfwc_sanitize_location',
      )
    );
    $wp_customize->add_control( 'scfwc_render_location',
      array(
        'label'    => __( 'Add shipping countdown to:', 'scfwc' ),
        'description' => __( 'Choose the location that you would like the shipping countdown to display.', 'scfwc'),
        'settings' => 'scfwc_render_location',
        'section'  => 'scfwc_options',
        'type'     => 'select',
        'choices'  => array(
          'scfwc_after_heading'      => __( 'After product heading', 'scfwc' ),
          'scfwc_after_price'        => __( 'After product price', 'scfwc' ),
          'scfwc_after_short_desc'   => __( 'After short description', 'scfwc' ),
          'scfwc_after_add_cart'     => __( 'After add to cart', 'scfwc' ),
        ),
      )
    );
	}

  /**
   * Check the shipping day option is real
   * @return string $input
   * @since 1.0
   */
  public static function scfwc_sanitize_day( $input ) {
    $scfwc_valid_day = array(
      'scfwc_ship_mon' => 'Monday',
      'scfwc_ship_tue' => 'Tuesday',
      'scfwc_ship_wed' => 'Wednesday',
      'scfwc_ship_thu' => 'Thursday',
      'scfwc_ship_fri' => 'Friday',
      'scfwc_ship_sat' => 'Saturday',
      'scfwc_ship_sun' => 'Sunday',
    );

    if ( array_key_exists( $input, $scfwc_valid_day ) ) :
      return $input;
    else :
      return '';
    endif;
  }

  /**
   * Check the render locatoin option is real
   * @return string $input
   * @since 1.0
   */
  public static function scfwc_sanitize_location( $input ) {
    $scfwc_valid_location = array(
      'scfwc_after_heading'      => 'After product heading',
      'scfwc_after_price'        => 'After product price',
      'scfwc_after_short_desc'   => 'After short description',
      'scfwc_after_add_cart'     => 'After add to cart',
    );

    if ( array_key_exists( $input, $scfwc_valid_location ) ) :
      return $input;
    else :
      return '';
    endif;
  }

} // END class

/**
 * Instantiate the class.
 * @since 1.0
 */
$scfwc_customizer = new scfwc_customizer();
