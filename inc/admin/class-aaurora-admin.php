<?php
/**
 * Admin class.
 *
 * This class ties together all admin classes.
 *
 * @package     Aaurora
 * @author      Aaurora Team <hello@aaurorawp.com>
 * @since       1.0.0
 */
//todo need to revisit the whle admin page code
/**
 * Do not allow direct script access.
 */
if ( ! defined( 'ABSPATH' ) ) {
    var_dump('Exiting here Only');
    var_dump($wp_actions);
	exit;
}

if ( ! class_exists( 'Aaurora_Admin' ) ) :

	/**
	 * Admin Class
	 */
	class Aaurora_Admin {

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
			 * Add filters for WordPress header and footer text.
			 */
			add_filter( 'update_footer', array( $this, 'filter_update_footer' ), 50 );
			add_filter( 'admin_footer_text', array( $this, 'filter_admin_footer_text' ), 50 );

			/**
			 * Admin page header.
			 */
			add_action( 'in_admin_header', array( $this, 'admin_header' ), 100 );

			/**
			 * Admin page footer.
			 */
			add_action( 'in_admin_footer', array( $this, 'admin_footer' ), 100 );

			/**
			 * Add notices.
			 */
//			add_action( 'admin_notices', array( $this, 'admin_notices' ) );

			/**
			 * After admin loaded
			 */
			do_action( 'aaurora_admin_loaded' );
			
		}

		/**
		 * Includes files.
		 *
		 * @since 1.0.0
		 */
		private function includes() {


			/**
			 * Include Aaurora welcome page.
			 */
			require_once dirname( __FILE__ ) . '/class-aaurora-dashboard.php'; // phpcs:ignore

			/**
			 * Include Aaurora meta boxes.
			 */
//			require_once dirname( __FILE__ ) . '/metabox/class-aaurora-meta-boxes.php'; // phpcs:ignore
		}

		/**
		 * Load our required assets on admin pages.
		 *
		 * @since 1.0.0
		 * @param string $hook it holds the information about the current page.
		 */
		public function load_assets( $hook ) {

			/**
			 * Do not enqueue if we are not on one of our pages.
			 */
//			if ( ! aaurora_is_admin_page( $hook ) ) {
//				return;
//			}

			// Script debug.
			$prefix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'dev/' : '';
			$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

			/**
			 * Enqueue admin pages stylesheet.
			 */
			wp_enqueue_style(
				'aaurora-admin-styles',
				get_parent_theme_file_uri() . '/inc/admin/css/aaurora-admin' . '.css',
				false,
				'1.0.0'
			);

			/**
			 * Enqueue admin pages script.
			 */
			wp_enqueue_script(
				'aaurora-admin-script',
				get_parent_theme_file_uri() . '/inc/admin/assets/js/' . $prefix . 'aaurora-admin' . $suffix . '.js',
				array( 'jquery', 'wp-util', 'updates' ),
				'1.0.0',
				true
			);

			/**
			 * Localize admin strings.
			 */
			$texts = array(
				'install'               => esc_html__( 'Install', 'aaurora' ),
				'install-inprogress'    => esc_html__( 'Installing...', 'aaurora' ),
				'activate-inprogress'   => esc_html__( 'Activating...', 'aaurora' ),
				'deactivate-inprogress' => esc_html__( 'Deactivating...', 'aaurora' ),
				'active'                => esc_html__( 'Active', 'aaurora' ),
				'retry'                 => esc_html__( 'Retry', 'aaurora' ),
				'please_wait'           => esc_html__( 'Please Wait...', 'aaurora' ),
				'importing'             => esc_html__( 'Importing... Please Wait...', 'aaurora' ),
				'currently_processing'  => esc_html__( 'Currently processing: ', 'aaurora' ),
				'import'                => esc_html__( 'Import', 'aaurora' ),
				'import_demo'           => esc_html__( 'Import Demo', 'aaurora' ),
				'importing_notice'      => esc_html__( 'The demo importer is still working. Closing this window may result in failed import.', 'aaurora' ),
				'import_complete'       => esc_html__( 'Import Complete!', 'aaurora' ),
				'import_complete_desc'  => esc_html__( 'The demo has been imported.', 'aaurora' ) . ' <a href="' . esc_url( get_home_url() ) . '">' . esc_html__( 'Visit site.', 'aaurora' ) . '</a>',
			);

			$strings = array(
				'ajaxurl'       => admin_url( 'admin-ajax.php' ),
				'wpnonce'       => wp_create_nonce( 'aaurora_nonce' ),
				'texts'         => $texts,
				'color_pallete' => array( '#3857f1', '#06cca6', '#2c2e3a', '#e4e7ec', '#f0b849', '#ffffff', '#000000' ),
			);

			$strings = apply_filters( 'aaurora_admin_strings', $strings );

			wp_localize_script( 'aaurora-admin-script', 'aaurora_strings', $strings );
		}

		/**
		 * Filters WordPress footer right text to hide all text.
		 *
		 * @since 1.0.0
		 * @param string $text Text that we're going to replace.
		 */
		public function filter_update_footer( $text ) {

			$base = get_current_screen()->base;

			/**
			 * Only do this if we are on one of our plugin pages.
			 */
//			if ( aaurora_is_admin_page( $base ) ) {
//				return apply_filters( 'aaurora_footer_version', esc_html__( 'Aaurora Theme', 'aaurora' ) . ' ' . '1.0.0' . '<br/><a href="' . esc_url( 'https://twitter.com/aaurorawp' ) . '" target="_blank" rel="noopener noreferrer"><span class="dashicons dashicons-twitter"></span></a><a href="' . esc_url( 'https://facebook.com/aaurorawp' ) . '" target="_blank" rel="noopener noreferrer"><span class="dashicons dashicons-facebook"></span></a>' );
//			} else {
				return $text;
//			}
		}

		/**
		 * Filter WordPress footer left text to display our text.
		 *
		 * @since 1.0.0
		 * @param string $text Text that we're going to replace.
		 */
		public function filter_admin_footer_text( $text ) {

//			if ( aaurora_is_admin_page() ) {
//				return;
//			}

			return $text;
		}

		/**
		 * Outputs the page admin header.
		 *
		 * @since 1.0.0
		 */
		public function admin_header() {

			$base = get_current_screen()->base;
//
//			if ( ! aaurora_is_admin_page( $base ) ) {
//				return;
//			}
			?>

			<div id="aaurora-header">
				<div class="si-container">

					<a href="<?php echo esc_url( admin_url( 'admin.php?page=aaurora-dashboard' ) ); ?>" class="aaurora-logo">
						<img src="<?php echo esc_url( get_parent_theme_file_uri() . '/assets/images/aaurora-logo.svg' ); ?>" alt="<?php echo esc_html( 'Aaurora' ); ?>" />
					</a>

					<span class="aaurora-header-action">
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"><?php esc_html_e( 'Customize', 'aaurora' ); ?></a>
						<a href="<?php echo esc_url( 'https://aaurorawp.com/docs/' ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Help Articles', 'aaurora' ); ?></a>
					</span>

				</div>
			</div><!-- END #aaurora-header -->
			<?php
		}

		/**
		 * Outputs the page admin footer.
		 *
		 * @since 1.0.0
		 */
		public function admin_footer() {

			$base = get_current_screen()->base;

//			if ( ! aaurora_is_admin_page( $base ) || aaurora_is_admin_page( $base, 'aaurora_wizard' ) ) {
//				return;
//			}
			?>
			<div id="aaurora-footer">
			<ul>
				<li><a href="<?php echo esc_url( 'https://aaurorawp.com/docs/' ); ?>" target="_blank" rel="noopener noreferrer"><span><?php esc_html_e( 'Help Articles', 'aaurora' ); ?></span></span></a></li>
				<li><a href="<?php echo esc_url( 'https://www.facebook.com/groups/aaurorawp/' ); ?>" target="_blank" rel="noopener noreferrer"><span><?php esc_html_e( 'Join Facebook Group', 'aaurora' ); ?></span></span></a></li>
				<li><a href="<?php echo esc_url( 'https://wordpress.org/support/theme/aaurora/reviews/#new-post' ); ?>" target="_blank" rel="noopener noreferrer"><span class="dashicons dashicons-heart" aria-hidden="true"></span><span><?php esc_html_e( 'Leave a Review', 'aaurora' ); ?></span></a></li>
			</ul>
			</div><!-- END #aaurora-footer -->

			<?php
		}
		
	}
endif;

new Aaurora_Admin();