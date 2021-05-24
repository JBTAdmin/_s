<?php
/**
 * Admin class.
 *
 * This class ties together all admin classes.
 *
 * @package     Gautam
 * @since       1.0.3
 */

/**
 * Do not allow direct script access.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Gautam_Admin' ) ) :

	/**
	 * Admin Class
	 */
	class Gautam_Admin {

		/**
		 * Primary class constructor.
		 */
		public function __construct() {

			/**
			 * Include admin files.
			 */
			$this->includes();

			/**
			 * Load admin assets.
			 */
			add_action( 'admin_enqueue_scripts', array( $this, 'load_assets' ) );
		}

		/**
		 * Includes files.
		 */
		private function includes() {

			/**
			 * Include Gautam welcome page.
			 */
			require_once dirname( __FILE__ ) . '/class-gautam-dashboard.php'; // phpcs:ignore
		}

		/**
		 * Load our required assets on admin pages.
		 *
		 * @param string $hook it holds the information about the current page.
		 */
		public function load_assets( $hook ) {

			/**
			 * Do not enqueue if we are not on one of our pages.
			 */
			if ( ! $this->is_admin_page() ) {
				return;
			}

			/**
			 * Enqueue admin pages stylesheet.
			 */
			wp_enqueue_style(
				'gautam-admin-styles',
				get_parent_theme_file_uri() . '/inc/admin/css/gautam-admin.css',
				false,
				'1.0.0'
			);
		}

		/**
		 * Check if we're on a Gautam admin page.
		 *
		 * @return boolean
		 */
		public function is_admin_page() {
			$base = get_current_screen()->base;
			return false !== strpos( $base, 'gautam' );
		}

	}
endif;

new Gautam_Admin();
