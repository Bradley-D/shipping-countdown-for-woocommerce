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
	public function scfwc_customizer_add_actions_filters() {
		add_action( 'customize_register', array( $this, 'scfwc_customizer_add_options' ) );
	}

  /**
   * WHAT MAGIC WILL HAPPEN
   * @since 1.0
   */
  public function scfwc_customizer_add_options( $wp_customize ) {

    // Include extended class to give multi select option
    require_once( 'class_extends_customizer.php');

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

    // Choose a time
    $wp_customize->add_setting( 'scfwc_time',
      array(
        'default'           => 13,
        'sanitize_callback' => array( $this, 'scfwc_sanitize_time' ),
    ) );
    $wp_customize->add_control( 'scfwc_time',
      array(
        'type'        => 'time',
        'section'     => 'scfwc_options',
        'label'       => __( 'Closing Time For Next Shipment' ),
        'description' => __( 'For example, you ship at 3pm every Wednesday, but you need all purchases to be made before 1pm on Wednesday to be included, enter 1pm below.' ),
      ) );

    // Choose Shipping Countdown days of shipping
    $wp_customize->add_setting( 'scfwc_select_days',
      array(
        'default'           => 'scfwc_ship_fri',
        'sanitize_callback' => array( $this, 'scfwc_sanitize_day'),
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
        'default'           => 'scfwc_after_add_cart',
        'sanitize_callback' => array( $this, 'scfwc_sanitize_location'),
      )
    );
    $wp_customize->add_control( 'scfwc_render_location',
      array(
        'label'       => __( 'Add shipping countdown to:', 'scfwc' ),
        'description' => __( 'Choose the location that you would like the shipping countdown to display.', 'scfwc'),
        'settings'    => 'scfwc_render_location',
        'section'     => 'scfwc_options',
        'type'        => 'select',
        'choices'     => array(
          'scfwc_after_heading'    => __( 'After product heading', 'scfwc' ),
          'scfwc_after_price'      => __( 'After product price', 'scfwc' ),
          'scfwc_after_short_desc' => __( 'After short description', 'scfwc' ),
          'scfwc_after_add_cart'   => __( 'After add to cart', 'scfwc' ),
        ),
      )
    );
	}

	/**
	 * Check the time option is real
	 * @param  string $input
	 * @return string $input
	 * @since 1.0
	 */
	public function scfwc_sanitize_time( $input ) {
		$time = new DateTime( $input );
		return $time->format('H:i');
	}

  /**
   * Check the shipping day option is real
   * @param  string[] $input
   * @return string $input
   * @since 1.0
   */
  public function scfwc_sanitize_day( $input ) {
    $scfwc_valid_day = array(
      'scfwc_ship_mon',
      'scfwc_ship_tue',
      'scfwc_ship_wed',
      'scfwc_ship_thu',
      'scfwc_ship_fri',
      'scfwc_ship_sat',
      'scfwc_ship_sun',
    );
    foreach ( $input as $key => $val ) {
      if ( in_array( $val, $scfwc_valid_day  ) ) {
        $input[ $key ] = $val;
      }
    }
    return $input;
  }

  /**
   * Check the render locatoin option is real
	 * @param  string[] $input
   * @return string $input
   * @since 1.0
   */
  public function scfwc_sanitize_location( $input ) {
    $scfwc_valid_location = array(
      'scfwc_after_heading',
      'scfwc_after_price',
      'scfwc_after_short_desc',
      'scfwc_after_add_cart',
    );
    foreach ( $input as $key => $val ) {
      if ( in_array( $val, $scfwc_valid_location  ) ) {
        $input[ $key ] = $val;
      }
    }
    return $input;
  }

} // END class

/**
 * Instantiate the class.
 * @since 1.0
 */
$scfwc_customizer = new scfwc_customizer();
