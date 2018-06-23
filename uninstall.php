<?php
/**
 * Delete Shipping Calculator if plugin is uninstalled.
 *
 * @since 1.0
 */
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) :
	exit;
endif;

class scfwc_uninstall {

}
/**
 * Instantiate
 * @since 1.0
 */
$scfwc_uninstall = new scfwc_uninstall();
