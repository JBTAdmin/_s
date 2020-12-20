<?php
/**
 * AAURORA About page class.
 *
 * @package     Aaurora
 * @author      Aaurora Team <hello@aaurorawp.com>
 * @since       1.0.0
 */
// todo need to revisit the whle admin page code
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
		 * @return Aaurora_Dashboard
		 * @since 1.0.0
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
            <div class="wrap-container">

                <div class="aaurora-section-title">
                    <h2 class="aaurora-section-title"><?php esc_html_e( 'Getting Started', 'aaurora' ); ?></h2>
                </div><!-- END .aaurora-section-title -->

                <div class="aaurora-section aaurora-columns">
                    <div class="aaurora-card">
                        <h4>
							<?php esc_html_e( 'Upload Your Logo', 'aaurora' ); ?>
                        </h4>
                        <p><?php esc_html_e( 'Kick off branding your new site by uploading your logo. Simply upload your logo and customize as you need.', 'aaurora' ); ?></p>

                        <div class="aaurora-buttons">
                            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[control]=custom_logo' ) ); ?>"
                               class="si-btn secondary" target="_blank"
                               rel="noopener noreferrer"><?php esc_html_e( 'Upload Logo', 'aaurora' ); ?></a>
                        </div><!-- END .aaurora-buttons -->
                    </div>

                    <div class="aaurora-card">
                        <h4>
							<?php esc_html_e( 'Change Menus', 'aaurora' ); ?>
                        </h4>
                        <p><?php esc_html_e( 'Customize menu links and choose what&rsquo;s displayed in available theme menu locations.Customize menu links and ', 'aaurora' ); ?></p>

                        <div class="aaurora-buttons">
                            <a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"
                               class="si-btn secondary" target="_blank"
                               rel="noopener noreferrer"><?php esc_html_e( 'Go to Menus', 'aaurora' ); ?></a>
                        </div><!-- END .aaurora-buttons -->
                    </div>

                    <div class="aaurora-card">
                        <h4>
							<?php esc_html_e( 'Change Colors', 'aaurora' ); ?>
                        </h4>
                        <p><?php esc_html_e( 'Replace the default theme colors and make your website color scheme match your brand design.', 'aaurora' ); ?></p>

                        <div class="aaurora-buttons">
                            <a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=aaurora_section_colors' ) ); ?>"
                               class="si-btn secondary" target="_blank"
                               rel="noopener noreferrer"><?php esc_html_e( 'Change Colors', 'aaurora' ); ?></a>
                        </div><!-- END .aaurora-buttons -->
                    </div>

                </div><!-- END .aaurora-section -->

                <div class="aaurora-section large-section">
                    <div class="aaurora-hero">
                        <!--						<img src="-->
						<?php // echo esc_url( AAURORA_THEME_URI . '/assets/images/si-customize.svg' ); ?><!--" alt="-->
						<?php // echo esc_html( 'Customize' ); ?><!--" />-->
                    </div>

                    <h2><?php esc_html_e( 'Let‘s customize your website', 'aaurora' ); ?></h2>
                    <p><?php esc_html_e( 'There are many changes you can make to customize your website. Explore Aaurora customization options and make it unique. ', 'aaurora' ); ?></p>

                    <div class="aaurora-buttons">
                        <a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>"
                           class="si-btn primary large-button"><?php esc_html_e( 'Start Customizing', 'aaurora' ); ?></a>
                    </div><!-- END .aaurora-buttons -->

                </div><!-- END .aaurora-section -->

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
            <div class="wrap-container">
                <div class="aaurora-section-title">
                    <h2 class="aaurora-section-title">
                        <span><?php esc_html_e( 'Changelog', 'aaurora' ); ?></span>
                        <span class="changelog-version"><?php echo esc_html( sprintf( 'v%1$s', '1.0.0' ) ); ?></span>
                    </h2>
                </div><!-- END .aaurora-section-title -->

                <div class="aaurora-section aaurora-columns">
                    <div class="aaurora-changelog">
                        <pre><?php echo esc_html( $changelog ); ?></pre>
                    </div>
                </div><!-- END .aaurora-columns -->
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

            </div><!-- END .wrap-container -->
			<?php
		}
		
		/**
		 * Return the current Aaurora Dashboard page.
		 *
		 * @return string $page Current dashboard page slug.
		 * @since 1.0.0
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
		 * @return array $items Array of navigation items.
		 * @since 1.0.0
		 */
		public function get_navigation_items() {
			
			$items = array(
				'dashboard' => array(
					'id'   => 'dashboard',
					'name' => esc_html__( 'About', 'aaurora' ),
					'icon' => '',
					'url'  => menu_page_url( 'aaurora-dashboard', false ),
				),
				'changelog' => array(
					'id'   => 'changelog',
					'name' => esc_html__( 'Changelog', 'aaurora' ),
					'icon' => '',
					'url'  => menu_page_url( 'aaurora-changelog', false ),
				),
			);
			
			return $items;
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
 * @return object
 * @since 1.0.0
 */
function aaurora_dashboard() {
	return Aaurora_Dashboard::instance();
}

aaurora_dashboard();
