<?php
/**
 * codexin functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package codexin
 */


if( ! class_exists( 'Codexin' ) ) :

class Codexin {

	/**
	 * Call all loading functions for the theme. They will be started right after theme setup.
	 * 
	 * @since v1.0.0
	 */
	public function __construct() {

		// Loading the theme specific framework files
		$this -> codexin_includes();

		// Run after installation setup.
		$this -> codexin_setup();

		// Register actions using add_actions() custom function.
		$this -> codexin_add_actions();

	}

	/**
	 * Loading the theme specific framework files. Register custom elements
	 * and functionality in the theme.
	 * 
	 * @uses get_template_directory_uri()
	 * @since v1.0.0
	 */
	public function codexin_includes() {

		//Include Navigation Menus
		require get_template_directory() . '/lib/menus.php';

		//Enqueue styles and javascripts
		require get_template_directory() . '/lib/scripts.php';

		//Register widgets
		require get_template_directory() . '/lib/widgets.php';

		//Register custom widgets
		require get_template_directory() . '/lib/widgets/widget-init.php';

		//Adding metaboxes
		require get_template_directory() . '/lib/metaboxes.php';

		//Include required plugins
		require get_template_directory() . '/lib/plugins/required-plugins.php';

		//Register custom posts
		require get_template_directory() . '/lib/custompost.php';

		//Adding breadcrumbs
		require get_template_directory() . '/lib/breadcrumbs.php';

		//Adding Custom Comments
		require get_template_directory() . '/lib/customcomment.php';
		
	}

	/**
	* Initial Theme Setup
	* @uses add_action()
	* @since v1.0.0
	*/

	public function codexin_setup() {

		/**
		* Add after_setup_theme() for specific functions.
		* The action call is here, because it fits more just for the theme
		* setup, instead for all other actions during using of Subtle.
		*/
		add_action( 'after_setup_theme', array( $this, 'codexin_setup_core' ) );

    	// Set content width for custom media information
		if ( ! isset( $content_width ) ) {
			$content_width = 800;
			}

	}

	/**
	 * The core functionality that has to be registred after the theme is setted up
	 * 
	 * @since v1.0.0
	 */
	public function codexin_setup_core() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on codexin, use a find and replace
		 * to change 'codexin' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'codexin', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Add support for post formats.
		add_theme_support( 'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'status',
				'audio',
				'chat',
			)
		);

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		//Adding custom image sizes
		add_image_size('blog-single-thumbnail', 750, 332, true);
		add_image_size('portfolio-single-thumbnail', 1170, 400, true);
		add_image_size('team-single', 380, 470, true);

	}

	/**
	 * Add actions and filters in wordpress theme. All the actions will be here.
	 * 
	 * @uses add_action()
	 * @uses add_filter()
	 * @since v1.0.0
	 */

	public function codexin_add_actions() {

		// Providing Shortcode Support on text widget
		add_filter( 'widget_text', 'do_shortcode' );

		// include Redux framework theme options
		if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' ) ) {
		    require_once( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' );
		}
		if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/admin-config.php' ) ) {
		    require_once( dirname( __FILE__ ) . '/ReduxFramework/admin-config.php' );
		}

		// Removing 'Redux Framework' sub menu under Tools 
		add_action( 'admin_menu', 'remove_redux_menu',12 );
		function remove_redux_menu() {
		    remove_submenu_page('tools.php','redux-about');
		}

		// Removing srcset from featured image
		add_filter( 'max_srcset_image_width', create_function( '', 'return 1;' ) );

		// Removing width & height from featured image
		add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );
		function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
		    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		    return $html;
		}

	}

}


// Removing this line is like not having a functions.php file
$codexin_function = new Codexin;

endif;