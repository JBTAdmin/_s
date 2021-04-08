<?php
/**
 * Admin class.
 *
 * This class ties together all admin classes.
 *
 * @package     Gautam
 * @author      Gautam Team <hello@gautamwp.com>
 * @since       1.0.0
 */

// todo need to revisit the whle admin page code.
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
		 *
		 * @since 1.0.0
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

			/**
			 * Admin page header.
			 */
			add_action( 'in_admin_header', array( $this, 'admin_header' ), 100 );

			/**
			 * Admin page footer.
			 */
			add_action( 'in_admin_footer', array( $this, 'admin_footer' ), 100 );

		}

		/**
		 * Includes files.
		 *
		 * @since 1.0.0
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
		 *
		 * @since 1.0.0
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
		 * Outputs the page admin header.
		 *
		 * @since 1.0.0
		 */
		public function admin_header() {

			if ( ! $this->is_admin_page() ) {
				return;
			}
			?>

			<div id="gautam-header">
				<div class="wrap-container">

					<a href="<?php echo esc_url( admin_url( 'admin.php?page=gautam-dashboard' ) ); ?>"
						class="gautam-logo">
						<img src="<?php echo esc_url( get_parent_theme_file_uri() . '/assets/images/gautam-logo.png' ); ?>"
							alt="Gautam"/>
					</a>

				</div>
			</div><!-- END #gautam-header -->
			<?php
		}

		/**
		 * Outputs the page admin footer.
		 *
		 * @since 1.0.0
		 */
		public function admin_footer() {

			if ( ! $this->is_admin_page() ) {
				return;
			}
			?>
			<div id="gautam-footer">
				<ul>
					<li><a href="<?php echo esc_url( 'https://gautamwp.com/docs/' ); ?>" target="_blank"
							rel="noopener noreferrer"><span><?php esc_html_e( 'Help Articles', 'gautam' ); ?></span></span>
						</a></li>
					<li>
						<a href="<?php echo esc_url( 'https://wordpress.org/support/theme/gautam/reviews/#new-post' ); ?>"
							target="_blank" rel="noopener noreferrer"><span>&#x1f494;<?php esc_html_e( 'Crafted without love', 'gautam' ); ?></span></a>
					</li>
				</ul>
			</div><!-- END #gautam-footer -->

			<?php
		}

		/**
		 * Check if we're on a Aarura admin page.
		 *
		 * @since 1.0.0
		 * @return boolean
		 */
		public function is_admin_page() {
			$base = get_current_screen()->base;
			return false != strpos( $base, 'gautam' );
		}

	}
endif;

new Gautam_Admin();
