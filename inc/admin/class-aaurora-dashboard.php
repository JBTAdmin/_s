<?php
/**
 * AAURORA About page class.
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
	exit;
}

if ( ! class_exists( 'Aaurora_Dashboard' ) ) :
	/**
	 * Aaurora Dashboard page class.
	 */
	final class Aaurora_Dashboard {

		/**
		 * Singleton instance of the class.
		 *
		 * @since 1.0.0
		 * @var object
		 */
		private static $instance;

		/**
		 * Main Aaurora Dashboard Instance.
		 *
		 * @since 1.0.0
		 * @return Aaurora_Dashboard
		 */
		public static function instance() {

			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Aaurora_Dashboard ) ) {
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
			add_filter( 'submenu_file', array( $this, 'highlight_submenu' ) );

			/**
			 * Ajax activate & deactivate plugins.
			 */
			add_action( 'wp_ajax_aaurora-plugin-activate', array( $this, 'activate_plugin' ) );
			add_action( 'wp_ajax_aaurora-plugin-deactivate', array( $this, 'deactivate_plugin' ) );
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
				esc_html__( 'Aaurora Theme', 'aaurora' ),
				'Aaurora Theme',
				apply_filters( 'aaurora_manage_cap', 'edit_theme_options' ),
				'aaurora-dashboard',
				array( $this, 'render_dashboard' )
			);

			/**
			 * Plugins page.
			 */
			add_theme_page(
				esc_html__( 'Plugins', 'aaurora' ),
				'Plugins',
				apply_filters( 'aaurora_manage_cap', 'edit_theme_options' ),
				'aaurora-plugins',
				array( $this, 'render_plugins' )
			);

			// Hide from admin navigation.
			remove_submenu_page( 'themes.php', 'aaurora-plugins' );

			/**
			 * Changelog page.
			 */
			add_theme_page(
				esc_html__( 'Changelog', 'aaurora' ),
				'Changelog',
				apply_filters( 'aaurora_manage_cap', 'edit_theme_options' ),
				'aaurora-changelog',
				array( $this, 'render_changelog' )
			);

			// Hide from admin navigation.
			remove_submenu_page( 'themes.php', 'aaurora-changelog' );
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
			<div class="si-container">

				<div class="aaurora-section-title">
					<h2 class="aaurora-section-title"><?php esc_html_e( 'Getting Started', 'aaurora' ); ?></h2>
				</div><!-- END .aaurora-section-title -->

				<div class="aaurora-section aaurora-columns">

					<div class="aaurora-column">
						<div class="aaurora-box">
							<h4><i class="dashicons dashicons-admin-plugins"></i><?php esc_html_e( 'Install Plugins', 'aaurora' ); ?></h4>
							<p><?php esc_html_e( 'Explore recommended plugins. These free plugins provide additional features and customization options.', 'aaurora' ); ?></p>

							<div class="aaurora-buttons">
								<a href="<?php echo esc_url( menu_page_url( 'aaurora-plugins', false ) ); ?>" class="si-btn secondary" role="button"><?php esc_html_e( 'Install Plugins', 'aaurora' ); ?></a>
							</div><!-- END .aaurora-buttons -->
						</div>
					</div>

					<div class="aaurora-column">
						<div class="aaurora-box">
							<h4><i class="dashicons dashicons-layout"></i><?php esc_html_e( 'Start with a Template', 'aaurora' ); ?></h4>
							<p><?php esc_html_e( 'Don&rsquo;t want to start from scratch? Import a pre-built demo website in 1-click and get a head start.', 'aaurora' ); ?></p>

							<div class="aaurora-buttons plugins">

								<?php
								if ( file_exists( WP_PLUGIN_DIR . '/aaurora-core/aaurora-core.php' ) && is_plugin_inactive( 'aaurora-core/aaurora-core.php' ) ) {
									$class       = 'si-btn secondary';
									$button_text = __( 'Activate Aaurora Core', 'aaurora' );
									$link        = '#';
									$data        = ' data-plugin="aaurora-core" data-action="activate" data-redirect="' . esc_url( admin_url( 'admin.php?page=aaurora-demo-library' ) ) . '"';
								} elseif ( ! file_exists( WP_PLUGIN_DIR . '/aaurora-core/aaurora-core.php' ) ) {
									$class       = 'si-btn secondary';
									$button_text = __( 'Install Aaurora Core', 'aaurora' );
									$link        = '#';
									$data        = ' data-plugin="aaurora-core" data-action="install" data-redirect="' . esc_url( admin_url( 'admin.php?page=aaurora-demo-library' ) ) . '"';
								} else {
									$class       = 'si-btn secondary active';
									$button_text = __( 'Browse Demos', 'aaurora' );
									$link        = admin_url( 'admin.php?page=aaurora-demo-library' );
									$data        = '';
								}

								printf(
									'<a class="%1$s" %2$s %3$s role="button"> %4$s </a>',
									esc_attr( $class ),
									isset( $link ) ? 'href="' . esc_url( $link ) . '"' : '',
									$data, // phpcs:ignore
									esc_html( $button_text )
								);
								?>

							</div><!-- END .aaurora-buttons -->
						</div>
					</div>

					<div class="aaurora-column">
						<div class="aaurora-box">
							<h4><i class="dashicons dashicons-palmtree"></i><?php esc_html_e( 'Upload Your Logo', 'aaurora' ); ?></h4>
							<p><?php esc_html_e( 'Kick off branding your new site by uploading your logo. Simply upload your logo and customize as you need.', 'aaurora' ); ?></p>

							<div class="aaurora-buttons">
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=custom_logo' ) ); ?>" class="si-btn secondary" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Upload Logo', 'aaurora' ); ?></a>
							</div><!-- END .aaurora-buttons -->
						</div>
					</div>

					<div class="aaurora-column">
						<div class="aaurora-box">
							<h4><i class="dashicons dashicons-welcome-widgets-menus"></i><?php esc_html_e( 'Change Menus', 'aaurora' ); ?></h4>
							<p><?php esc_html_e( 'Customize menu links and choose what&rsquo;s displayed in available theme menu locations.', 'aaurora' ); ?></p>

							<div class="aaurora-buttons">
								<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>" class="si-btn secondary" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Go to Menus', 'aaurora' ); ?></a>
							</div><!-- END .aaurora-buttons -->
						</div>
					</div>

					<div class="aaurora-column">
						<div class="aaurora-box">
							<h4><i class="dashicons dashicons-art"></i><?php esc_html_e( 'Change Colors', 'aaurora' ); ?></h4>
							<p><?php esc_html_e( 'Replace the default theme colors and make your website color scheme match your brand design.', 'aaurora' ); ?></p>

							<div class="aaurora-buttons">
								<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=aaurora_section_colors' ) ); ?>" class="si-btn secondary" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Change Colors', 'aaurora' ); ?></a>
							</div><!-- END .aaurora-buttons -->
						</div>
					</div>

					<div class="aaurora-column">
						<div class="aaurora-box">
							<h4><i class="dashicons dashicons-editor-help"></i><?php esc_html_e( 'Need Help?', 'aaurora' ); ?></h4>
							<p><?php esc_html_e( 'Head over to our site to learn more about the Aaurora theme, read help articles and get support.', 'aaurora' ); ?></p>

							<div class="aaurora-buttons">
								<a href="https://aaurorawp.com/docs/" target="_blank" rel="noopener noreferrer" class="si-btn secondary"><?php esc_html_e( 'Help Articles', 'aaurora' ); ?></a>
							</div><!-- END .aaurora-buttons -->
						</div>
					</div>
				</div><!-- END .aaurora-section -->

				<div class="aaurora-section large-section">
					<div class="aaurora-hero">
<!--						<img src="--><?php //echo esc_url( AAURORA_THEME_URI . '/assets/images/si-customize.svg' ); ?><!--" alt="--><?php //echo esc_html( 'Customize' ); ?><!--" />-->
					</div>

					<h2><?php esc_html_e( 'Let‘s customize your website', 'aaurora' ); ?></h2>
					<p><?php esc_html_e( 'There are many changes you can make to customize your website. Explore Aaurora customization options and make it unique.', 'aaurora' ); ?></p>

					<div class="aaurora-buttons">
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="si-btn primary large-button"><?php esc_html_e( 'Start Customizing', 'aaurora' ); ?></a>
					</div><!-- END .aaurora-buttons -->

				</div><!-- END .aaurora-section -->

				<?php do_action( 'aaurora_about_content_after' ); ?>

			</div><!-- END .si-container -->

			<?php
		}

		/**
		 * Render the recommended plugins page.
		 *
		 * @since 1.0.0
		 */
		public function render_plugins() {

			// Render dashboard navigation.
			$this->render_navigation();

			$plugins = aaurora_plugin_utilities()->get_recommended_plugins();
			?>
			<div class="si-container">

				<div class="aaurora-section-title">
					<h2 class="aaurora-section-title"><?php esc_html_e( 'Recommended Plugins', 'aaurora' ); ?></h2>
				</div><!-- END .aaurora-section-title -->

				<div class="aaurora-section aaurora-columns plugins">

					<?php if ( is_array( $plugins ) && ! empty( $plugins ) ) { ?>
						<?php foreach ( $plugins as $plugin ) { ?>

							<?php
							// Check plugin status.
							if ( aaurora_plugin_utilities()->is_activated( $plugin['slug'] ) ) {
								$btn_class = 'si-btn secondary';
								$btn_text  = esc_html__( 'Deactivate', 'aaurora' );
								$action    = 'deactivate';
								$notice    = '<span class="si-active-plugin"><span class="dashicons dashicons-yes"></span>' . esc_html__( 'Plugin activated', 'aaurora' ) . '</span>';
							} elseif ( aaurora_plugin_utilities()->is_installed( $plugin['slug'] ) ) {
								$btn_class = 'si-btn primary';
								$btn_text  = esc_html__( 'Activate', 'aaurora' );
								$action    = 'activate';
								$notice    = '';
							} else {
								$btn_class = 'si-btn primary';
								$btn_text  = esc_html__( 'Install & Activate', 'aaurora' );
								$action    = 'install';
								$notice    = '';
							}
							?>

							<div class="aaurora-column column-6">
								<div class="aaurora-box">

									<div class="plugin-image">
										<img src="<?php echo esc_url( $plugin['thumb'] ); ?>" alt="<?php echo esc_html( $plugin['name'] ); ?>"/>					
									</div>

									<div class="plugin-info">
										<h4><?php echo esc_html( $plugin['name'] ); ?></h4>
										<p><?php echo esc_html( $plugin['desc'] ); ?></p>
										<div class="aaurora-buttons">
											<?php echo ( wp_kses_post( $notice ) ); ?>
											<a href="#" class="<?php echo esc_attr( $btn_class ); ?>" data-plugin="<?php echo esc_attr( $plugin['slug'] ); ?>" data-action="<?php echo esc_attr( $action ); ?>"><?php echo esc_html( $btn_text ); ?></a>
										</div>
									</div>

								</div>
							</div>
						<?php } ?>
					<?php } ?>

				</div><!-- END .aaurora-section -->

				<?php do_action( 'aaurora_recommended_plugins_after' ); ?>

			</div><!-- END .si-container -->

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

			$changelog = AAURORA_THEME_PATH . '/changelog.txt';

			if ( ! file_exists( $changelog ) ) {
				$changelog = esc_html__( 'Changelog file not found.', 'aaurora' );
			} elseif ( ! is_readable( $changelog ) ) {
				$changelog = esc_html__( 'Changelog file not readable.', 'aaurora' );
			} else {
				global $wp_filesystem;

				// Check if the the global filesystem isn't setup yet.
				if ( is_null( $wp_filesystem ) ) {
					WP_Filesystem();
				}

				$changelog = $wp_filesystem->get_contents( $changelog );
			}

			?>
			<div class="si-container">

				<div class="aaurora-section-title">
					<h2 class="aaurora-section-title">
						<span><?php esc_html_e( 'Aaurora Theme Changelog', 'aaurora' ); ?></span>
						<span class="changelog-version"><?php echo esc_html( sprintf( 'v%1$s', AAURORA_THEME_VERSION ) ); ?></span>
					</h2>

				</div><!-- END .aaurora-section-title -->

				<div class="aaurora-section aaurora-columns">

					<div class="aaurora-column column-12">
						<div class="aaurora-box aaurora-changelog">
							<pre><?php echo esc_html( $changelog ); ?></pre>
						</div>
					</div>
				</div><!-- END .aaurora-columns -->

				<?php do_action( 'aaurora_after_changelog' ); ?>

			</div><!-- END .si-container -->
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
			<div class="si-container">

				<div class="aaurora-tabs">
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

									<?php
									if ( isset( $item['icon'] ) && $item['icon'] ) {
										aaurora_print_admin_icon( $item['icon'] );
									}
									?>
								</a>
							</li>

						<?php } ?>
					</ul>
				</div><!-- END .aaurora-tabs -->

			</div><!-- END .si-container -->
			<?php
		}

		/**
		 * Return the current Aaurora Dashboard page.
		 *
		 * @since 1.0.0
		 * @return string $page Current dashboard page slug.
		 */
		public function get_current_page() {

			$page = isset( $_GET['page'] ) ? sanitize_text_field( wp_unslash( $_GET['page'] ) ) : 'dashboard'; // phpcs:ignore
			$page = str_replace( 'aaurora-', '', $page );
			$page = apply_filters( 'aaurora_dashboard_current_page', $page );

			return esc_html( $page );
		}

		/**
		 * Print admin page navigation items.
		 *
		 * @since 1.0.0
		 * @return array $items Array of navigation items.
		 */
		public function get_navigation_items() {

			$items = array(
				'dashboard' => array(
					'id'   => 'dashboard',
					'name' => esc_html__( 'About', 'aaurora' ),
					'icon' => '',
					'url'  => menu_page_url( 'aaurora-dashboard', false ),
				),
				'plugins'   => array(
					'id'   => 'plugins',
					'name' => esc_html__( 'Recommended Plugins', 'aaurora' ),
					'icon' => '',
					'url'  => menu_page_url( 'aaurora-plugins', false ),
				),
				'changelog' => array(
					'id'   => 'changelog',
					'name' => esc_html__( 'Changelog', 'aaurora' ),
					'icon' => '',
					'url'  => menu_page_url( 'aaurora-changelog', false ),
				),
			);

			return apply_filters( 'aaurora_dashboard_navigation_items', $items );
		}

		/**
		 * Activate plugin.
		 *
		 * @since 1.0.0
		 */
		public function activate_plugin() {

			// Security check.
			check_ajax_referer( 'aaurora_nonce' );

			// Plugin data.
			$plugin = isset( $_POST['plugin'] ) ? sanitize_text_field( wp_unslash( $_POST['plugin'] ) ) : '';

			if ( empty( $plugin ) ) {
				wp_send_json_error( esc_html__( 'Missing plugin data', 'aaurora' ) );
			}

			if ( $plugin ) {

				$response = aaurora_plugin_utilities()->activate_plugin( $plugin );

				if ( is_wp_error( $response ) ) {
					wp_send_json_error( $response->get_error_message(), $response->get_error_code() );
				}

				wp_send_json_success();
			}

			wp_send_json_error( esc_html__( 'Failed to activate plugin. Missing plugin data.', 'aaurora' ) );
		}

		/**
		 * Deactivate plugin.
		 *
		 * @since 1.0.0
		 */
		public function deactivate_plugin() {

			// Security check.
			check_ajax_referer( 'aaurora_nonce' );

			// Plugin data.
			$plugin = isset( $_POST['plugin'] ) ? sanitize_text_field( wp_unslash( $_POST['plugin'] ) ) : '';

			if ( empty( $plugin ) ) {
				wp_send_json_error( esc_html__( 'Missing plugin data', 'aaurora' ) );
			}

			if ( $plugin ) {
				$response = aaurora_plugin_utilities()->deactivate_plugin( $plugin );

				if ( is_wp_error( $response ) ) {
					wp_send_json_error( $response->get_error_message(), $response->get_error_code() );
				}

				wp_send_json_success();
			}

			wp_send_json_error( esc_html__( 'Failed to deactivate plugin. Missing plugin data.', 'aaurora' ) );
		}

		/**
		 * Highlight dashboard page for plugins page.
		 *
		 * @since 1.0.0
		 * @param string $submenu_file The submenu file.
		 */
		public function highlight_submenu( $submenu_file ) {

			global $pagenow;

			// Check if we're on aaurora plugins or changelog page.
			if ( 'themes.php' === $pagenow ) {
				if ( isset( $_GET['page'] ) ) { // phpcs:ignore
					if ( 'aaurora-plugins' === $_GET['page'] || 'aaurora-changelog' === $_GET['page'] ) { // phpcs:ignore
						$submenu_file = 'aaurora-dashboard';
					}
				}
			}

			return $submenu_file;
		}
	}
endif;

/**
 * The function which returns the one Aaurora_Dashboard instance.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * Example: <?php $aaurora_dashboard = aaurora_dashboard(); ?>
 *
 * @since 1.0.0
 * @return object
 */
function aaurora_dashboard() {
	return Aaurora_Dashboard::instance();
}

aaurora_dashboard();
