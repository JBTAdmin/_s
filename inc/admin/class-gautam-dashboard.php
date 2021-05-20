<?php
/**
 * Gautam About page class.
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

if ( ! class_exists( 'Gautam_Dashboard' ) ) :
	/**
	 * Gautam Dashboard page class.
	 */
	final class Gautam_Dashboard {

		/**
		 * Singleton instance of the class.
		 *
		 * @since 1.0.0
		 * @var object
		 */
		private static $instance;

		/**
		 * Main Gautam Dashboard Instance.
		 *
		 * @return Gautam_Dashboard
		 * @since 1.0.0
		 */
		public static function instance() {

			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Gautam_Dashboard ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Primary class constructor.
		 *
		 * @since 1.0.0
		 */
		public function __construct() {

			/**
			 * Register admin menu item under Appearance menu item.
			 */
			add_action( 'admin_menu', array( $this, 'add_to_menu' ), 10 );
		}

		/**
		 * Register our custom admin menu item.
		 *
		 * @since 1.0.0
		 */
		public function add_to_menu() {

			/**
			 * Dashboard page.
			 */
			add_theme_page(
				esc_html__( 'About Gautam', 'gautam' ),
				'About Gautam',
				apply_filters( 'gautam_manage_cap', 'edit_theme_options' ),
				'gautam-dashboard',
				array( $this, 'render_dashboard' )
			);

			/**
			 * Changelog page.
			 */
			add_theme_page(
				esc_html__( 'Changelog', 'gautam' ),
				'Changelog',
				apply_filters( 'gautam_manage_cap', 'edit_theme_options' ),
				'gautam-changelog',
				array( $this, 'render_changelog' )
			);

			// Hide from admin navigation.
			remove_submenu_page( 'themes.php', 'gautam-changelog' );

			/**
			 * Useful Plugins.
			 */
			add_theme_page(
				esc_html__( 'Useful Plugins', 'gautam' ),
				'Useful Plugins',
				apply_filters( 'gautam_manage_cap', 'edit_theme_options' ),
				'gautam-plugins',
				array( $this, 'render_plugins' )
			);

			// Hide from admin navigation.
			remove_submenu_page( 'themes.php', 'gautam-plugins' );

			/**
			 * Support.
			 */
			add_theme_page(
				esc_html__( 'Support', 'gautam' ),
				'Support',
				apply_filters( 'gautam_manage_cap', 'edit_theme_options' ),
				'gautam-support',
				array( $this, 'render_support' )
			);

			// Hide from admin navigation.
			remove_submenu_page( 'themes.php', 'gautam-support' );
		}

		/**
		 * Render dashboard page.
		 *
		 * @since 1.0.0
		 */
		public function render_dashboard() {

			// Render dashboard navigation.
			$this->render_navigation();

			?>
			<div class="wrap-container">

				<div class="gautam-section-title">
					<h2 class="gautam-section-title"><?php esc_html_e( 'Getting Started', 'gautam' ); ?></h2>
				</div><!-- END .gautam-section-title -->

				<div class="gautam-section gautam-columns">
					<div class="gautam-card">
						<h4>
							<?php esc_html_e( 'Upload Your Logo', 'gautam' ); ?>
						</h4>
						<p><?php esc_html_e( 'Kick off branding your new site by uploading your logo. Simply upload your logo and customize as you need.', 'gautam' ); ?></p>

						<div class="gautam-buttons">
							<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=custom_logo' ) ); ?>"
								class="adm-btn secondary" target="_blank"
								rel="noopener noreferrer"><?php esc_html_e( 'Upload Logo', 'gautam' ); ?></a>
						</div><!-- END .gautam-buttons -->
					</div>

					<div class="gautam-card">
						<h4>
							<?php esc_html_e( 'Change Menus', 'gautam' ); ?>
						</h4>
						<p><?php esc_html_e( 'Customize menu links and choose what&rsquo;s displayed in available theme menu locations.Customize menu links and ', 'gautam' ); ?></p>

						<div class="gautam-buttons">
							<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"
								class="adm-btn secondary" target="_blank"
								rel="noopener noreferrer"><?php esc_html_e( 'Go to Menus', 'gautam' ); ?></a>
						</div><!-- END .gautam-buttons -->
					</div>

					<div class="gautam-card">
						<h4>
							<?php esc_html_e( 'Change Colors', 'gautam' ); ?>
						</h4>
						<p><?php esc_html_e( 'Replace the default theme colors and make your website color scheme match your brand design.', 'gautam' ); ?></p>

						<div class="gautam-buttons">
							<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=gautam_section_colors' ) ); ?>"
								class="adm-btn secondary" target="_blank"
								rel="noopener noreferrer"><?php esc_html_e( 'Change Colors', 'gautam' ); ?></a>
						</div><!-- END .gautam-buttons -->
					</div>

				</div><!-- END .gautam-section -->

				<div class="gautam-section large-section">
					<div class="gautam-hero">
						<!--						<img src="-->
						<?php // echo esc_url( GAUTAM_THEME_URI . '/assets/images/si-customize.svg' ); ?><!--" alt="-->
						<?php // echo esc_html( 'Customize' ); ?><!--" />-->
					</div>

					<h2><?php esc_html_e( 'Let‘s customize your website', 'gautam' ); ?></h2>
					<p><?php esc_html_e( 'There are many changes you can make to customize your website. Explore Gautam customization options and make it unique. ', 'gautam' ); ?></p>

					<div class="gautam-buttons">
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"
							class="adm-btn primary large-button"><?php esc_html_e( 'Start Customizing', 'gautam' ); ?></a>
					</div><!-- END .gautam-buttons -->

				</div><!-- END .gautam-section -->

			</div><!-- END .wrap-container -->

			<?php
		}


		/**
		 * Render the changelog page.
		 *
		 * @since 1.0.0
		 */
		public function render_changelog() {

			// Render dashboard navigation.
			$this->render_navigation();

			$changelog = get_parent_theme_file_path() . '/changelog.txt';

			if ( ! file_exists( $changelog ) ) {
				$changelog = esc_html__( 'Changelog file not found.', 'gautam' );
			} elseif ( ! is_readable( $changelog ) ) {
				$changelog = esc_html__( 'Changelog file not readable.', 'gautam' );
			} else {
				global $wp_filesystem;

				// Check if the the global filesystem isn't setup yet.
				if ( is_null( $wp_filesystem ) ) {
					WP_Filesystem();
				}

				$changelog = $wp_filesystem->get_contents( $changelog );
			}

			?>
			<div class="wrap-container">
				<div class="gautam-section-title">
					<h2 class="gautam-section-title">
						<span><?php esc_html_e( 'Changelog', 'gautam' ); ?></span>
						<span class="changelog-version"><?php esc_html_e( sprintf( 'v%1$s', '1.0.0' ), 'gautam' ); ?></span>
					</h2>
				</div><!-- END .gautam-section-title -->

				<div class="gautam-section gautam-columns">
					<div class="gautam-changelog">
						<pre><?php esc_html_e( $changelog , 'gautam'); ?></pre>
					</div>
				</div><!-- END .gautam-columns -->
			</div><!-- END .wrap-container -->
			<?php
		}

		/**
		 * Render the plugin page.
		 *
		 * @since 1.0.0
		 */
		public function render_plugins() {

			// Render dashboard navigation.
			$this->render_navigation();

			?>
			<div class="wrap-container">
				<div class="gautam-section-title">
					<h2 class="gautam-section-title">
						<span><?php esc_html_e( 'Plugins', 'gautam' ); ?></span>
					</h2>
				</div><!-- END .gautam-section-title -->

				<div class="gautam-section gautam-columns">
					<div class="gautam-changelog">

					</div>
				</div><!-- END .gautam-columns -->
			</div><!-- END .wrap-container -->
			<?php
		}

		/**
		 * Render the support page.
		 *
		 * @since 1.0.0
		 */
		public function render_support() {

			// Render dashboard navigation.
			$this->render_navigation();

			?>
			<div class="wrap-container">
				<div class="gautam-section-title">
					<h2 class="gautam-section-title">
						<span><?php esc_html_e( 'Support', 'gautam' ); ?></span>
					</h2>
				</div><!-- END .gautam-section-title -->

				<div class="gautam-section gautam-columns">
					<div class="gautam-changelog">

					</div>
				</div><!-- END .gautam-columns -->
			</div><!-- END .wrap-container -->
			<?php
		}

		/**
		 * Render admin page navigation tabs.
		 *
		 * @since 1.0.0
		 */
		public function render_navigation() {

			// Get navigation items.
			$menu_items = $this->get_navigation_items();

			?>
			<div class="wrap-container">

				<div class="gautam-tabs">
					<ul>
						<?php
						// Determine current tab.
						$base = $this->get_current_page();

						// Display menu items.
						foreach ( $menu_items as $item ) {

							// Check if we're on a current item.
							$current = false !== strpos( $base, $item['id'] ) ? 'current-item' : '';
							?>

							<li class="<?php esc_attr_e( $current, 'gautam' ); ?>">
								<a href="<?php echo esc_url( $item['url'] ); ?>">
									<?php esc_html_e( $item['name'], 'gautam' ); ?>

									<?php
									if ( isset( $item['icon'] ) && $item['icon'] ) {
										gautam_print_admin_icon( $item['icon'] );
									}
									?>
								</a>
							</li>

						<?php } ?>
					</ul>
				</div><!-- END .gautam-tabs -->

			</div><!-- END .wrap-container -->
			<?php
		}

		/**
		 * Return the current Gautam Dashboard page.
		 *
		 * @return string $page Current dashboard page slug.
		 * @since 1.0.0
		 */
		public function get_current_page() {

			$page = isset( $_GET['page'] ) ? sanitize_text_field( wp_unslash( $_GET['page'] ) ) : 'dashboard'; // phpcs:ignore
			$page = str_replace( 'gautam-', '', $page );
			$page = apply_filters( 'gautam_dashboard_current_page', $page );

			return esc_html( $page );
		}

		/**
		 * Print admin page navigation items.
		 *
		 * @return array $items Array of navigation items.
		 * @since 1.0.0
		 */
		public function get_navigation_items() {

			$items = array(
				'dashboard' => array(
					'id'   => 'dashboard',
					'name' => esc_html__( 'About', 'gautam' ),
					'icon' => '',
					'url'  => menu_page_url( 'gautam-dashboard', false ),
				),
				'changelog' => array(
					'id'   => 'changelog',
					'name' => esc_html__( 'Changelog', 'gautam' ),
					'icon' => '',
					'url'  => menu_page_url( 'gautam-changelog', false ),
				),
				'plugins'   => array(
					'id'   => 'plugins',
					'name' => esc_html__( 'Plugins', 'gautam' ),
					'icon' => '',
					'url'  => menu_page_url( 'gautam-plugins', false ),
				),
				'support'   => array(
					'id'   => 'support',
					'name' => esc_html__( 'Support', 'gautam' ),
					'icon' => '',
					'url'  => menu_page_url( 'gautam-support', false ),
				),
			);

			return $items;
		}

	}
endif;

/**
 * The function which returns the one Gautam_Dashboard instance.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * Example: <?php $gautam_dashboard = gautam_dashboard(); ?>
 *
 * @return object
 * @since 1.0.0
 */
function gautam_dashboard() {
	return Gautam_Dashboard::instance();
}

gautam_dashboard();