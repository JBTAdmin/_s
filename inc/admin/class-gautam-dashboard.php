<?php
/**
 * Gautam About page class.
 *
 * @package     Gautam
 * @since       1.1.0
 */

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
		 * @var object
		 */
		private static $instance;

		/**
		 * Main Gautam Dashboard Instance.
		 *
		 * @return Gautam_Dashboard
		 */
		public static function instance() {

			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Gautam_Dashboard ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Primary class constructor.
		 */
		public function __construct() {

			/**
			 * Register admin menu item under Appearance menu item.
			 */
			add_action( 'admin_menu', array( $this, 'add_to_menu' ), 10 );
		}

		/**
		 * Register our custom admin menu item.
		 */
		public function add_to_menu() {

			/**
			 * Dashboard page.
			 */
			add_theme_page(
				esc_html__( 'Gautam Dashboard', 'gautam' ),
				'Gautam Dashboard',
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
		 */
		public function render_dashboard() {

			// Render dashboard navigation.
			$this->render_navigation();

			?>
			<div class="wrap-container">

				<div class="gautam-section-title">
					<h2 class="gautam-section-title"><?php esc_html_e( 'Gautam Theme', 'gautam' ); ?></h2>
					<p><?php esc_html_e( 'Thank you for using Gautam Theme. Theme is now installed and ready to use. Below are the list of option that you might be interested in using before your site is fully ready to serve user.', 'gautam' ); ?></p>
				</div><!-- END .gautam-section-title -->

				<div class="gautam-section gautam-columns">
					<div class="gautam-card">
						<div class="card-inner-box">
							<h4>
								<?php esc_html_e( 'Change Site Title & Logo', 'gautam' ); ?>
							</h4>

							<div class="gautam-buttons">
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=custom_logo' ) ); ?>" class="adm-btn secondary" target="_blank"><?php esc_html_e( 'Customize Identity', 'gautam' ); ?></a>
							</div><!-- END .gautam-buttons -->
						</div>
					</div>

					<div class="gautam-card">
						<div class="card-inner-box">
							<h4>
								<?php esc_html_e( 'Change Menus', 'gautam' ); ?>
							</h4>

							<div class="gautam-buttons">
								<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>" class="adm-btn secondary" target="_blank"><?php esc_html_e( 'Customize Menu', 'gautam' ); ?></a>
							</div><!-- END .gautam-buttons -->
						</div>
					</div>

					<div class="gautam-card">
						<div class="card-inner-box">
							<h4>
								<?php esc_html_e( 'Change Header', 'gautam' ); ?>
							</h4>

							<div class="gautam-buttons">
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=header' ) ); ?>" class="adm-btn secondary" target="_blank"><?php esc_html_e( 'Customize Header', 'gautam' ); ?></a>
							</div><!-- END .gautam-buttons -->
						</div>
					</div>

					<div class="gautam-card">
						<div class="card-inner-box">
							<h4>
								<?php esc_html_e( 'Change Blog Layout', 'gautam' ); ?>
							</h4>

							<div class="gautam-buttons">
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=blog_settings' ) ); ?>" class="adm-btn secondary" target="_blank"><?php esc_html_e( 'Customize Layout', 'gautam' ); ?></a>
							</div><!-- END .gautam-buttons -->
						</div>
					</div>

					<div class="gautam-card">
						<div class="card-inner-box">
							<h4>
								<?php esc_html_e( 'Change Fonts', 'gautam' ); ?>
							</h4>

							<div class="gautam-buttons">
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=fonts' ) ); ?>" class="adm-btn secondary" target="_blank"><?php esc_html_e( 'Customize Fonts', 'gautam' ); ?></a>
							</div><!-- END .gautam-buttons -->
						</div>
					</div>

					<div class="gautam-card">
						<div class="card-inner-box">
							<h4>
								<?php esc_html_e( 'Change Colors', 'gautam' ); ?>
							</h4>

							<div class="gautam-buttons">
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=general_color' ) ); ?>" class="adm-btn secondary" target="_blank"><?php esc_html_e( 'Customize Colors', 'gautam' ); ?></a>
							</div><!-- END .gautam-buttons -->
						</div>
					</div>
				</div><!-- END .gautam-section -->
			</div><!-- END .wrap-container -->

			<?php
		}

		/**
		 * Render the changelog page.
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
						<span class="changelog-version">1.1.0</span>
					</h2>
				</div><!-- END .gautam-section-title -->

				<div class="gautam-section gautam-columns">
					<div class="gautam-changelog">
						<pre><?php echo esc_html( $changelog ); ?></pre>
					</div>
				</div><!-- END .gautam-columns -->
			</div><!-- END .wrap-container -->
			<?php
		}

		/**
		 * Render the plugin page.
		 */
		public function render_plugins() {

			// Render dashboard navigation.
			$this->render_navigation();

			?>
			<div class="wrap-container">
				<div class="gautam-section-title">
					<h2 class="gautam-section-title">
						<span><?php esc_html_e( 'Plugins Coming.', 'gautam' ); ?></span>
					</h2>
				</div><!-- END .gautam-section-title -->
			</div><!-- END .wrap-container -->
			<?php
		}

		/**
		 * Render the support page.
		 */
		public function render_support() {

			// Render dashboard navigation.
			$this->render_navigation();

			?>
			<div class="wrap-container">

				<div class="gautam-section gautam-columns">
					<div class="gautam-card">
						<div class="card-inner-box">
							<h4>
								<?php esc_html_e( 'Need Help?', 'gautam' ); ?>
							</h4>
							<p><?php esc_html_e( 'Have a question or found a bug? Get the help you need from us.', 'gautam' ); ?></p>

							<div class="gautam-buttons">
								<a href="<?php echo esc_url( 'https://wordpress.org/support/theme/gautam/' ); ?>" class="adm-btn secondary" target="_blank"><?php esc_html_e( 'Contact Us', 'gautam' ); ?></a>
							</div><!-- END .gautam-buttons -->
						</div>
					</div>

					<div class="gautam-card">
						<div class="card-inner-box">
							<h4>
								<?php esc_html_e( 'Theme Review', 'gautam' ); ?>
							</h4>
							<p><?php esc_html_e( 'If you like Gautam Theme Please leave us a review. We would love to hear from you.', 'gautam' ); ?></p>

							<div class="gautam-buttons">
								<a href="<?php echo esc_url( 'https://wordpress.org/support/theme/gautam/reviews/#new-post' ); ?>" class="adm-btn secondary" target="_blank"><?php esc_html_e( 'Write a Review', 'gautam' ); ?></a>
							</div><!-- END .gautam-buttons -->
						</div>
					</div>

					<div class="gautam-card">
						<div class="card-inner-box">
							<h4>
								<?php esc_html_e( 'Improvement Idea', 'gautam' ); ?>
							</h4>
							<p><?php esc_html_e( 'Have any feature suggestion or improvement for the theme?', 'gautam' ); ?></p>

							<div class="gautam-buttons">
								<a href="<?php echo esc_url( 'https://wordpress.org/support/theme/gautam/' ); ?>" class="adm-btn secondary" target="_blank"><?php esc_html_e( 'Suggest an Idea', 'gautam' ); ?></a>
							</div><!-- END .gautam-buttons -->
						</div>
					</div>
				</div>

			</div><!-- END .wrap-container -->
			<?php
		}

		/**
		 * Render admin page navigation tabs.
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

							<li class="<?php echo esc_attr( $current ); ?>">
								<a href="<?php echo esc_url( $item['url'] ); ?>">
									<?php echo esc_html( $item['name'] ); ?>
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
		 */
		public function get_current_page() {

            $page = isset($_GET['page']) ? sanitize_text_field(wp_unslash($_GET['page'])) : 'dashboard'; // phpcs:ignore
			$page = str_replace( 'gautam-', '', $page );
			$page = apply_filters( 'gautam_dashboard_current_page', $page );

			return esc_html( $page );
		}

		/**
		 * Print admin page navigation items.
		 *
		 * @return array $items Array of navigation items.
		 */
		public function get_navigation_items() {

			$items = array(
				'dashboard' => array(
					'id'   => 'dashboard',
					'name' => esc_html__( 'Welcome', 'gautam' ),
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
 */
function gautam_dashboard() {
	return Gautam_Dashboard::instance();
}

gautam_dashboard();
