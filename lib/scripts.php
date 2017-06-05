<?php


add_action( 'wp_enqueue_scripts', 'codexin_google_fonts' );
function codexin_google_fonts () {
	
	$fonts = array(
		'Roboto+Condensed:400,700',
		'Nunito:400,700'
	);
	
	$gfonts = '';
	$count = 1;
	foreach ( $fonts as $font ) :
		$gfonts .= $font;
		if ( $count != count( $fonts ) )
			$gfonts .= '|';
		$count++;
	endforeach;
	
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=' . $gfonts );

}
	
function codexin_scripts () {

	//import icon fonts for fontawesome
	wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css');
	
	//Load the stylesheets
	wp_enqueue_style( 'bootstrap-stylesheet', get_template_directory_uri() . '/css/bootstrap.min.css',false,'3.3.7','all');
	wp_enqueue_style( 'superfish-stylesheet', get_template_directory_uri() . '/css/superfish.css',false,'1.1','all');
	wp_enqueue_style( 'animate-stylesheet', get_template_directory_uri() . '/css/animate.min.css',false,'1.1','all');
	wp_enqueue_style( 'magnific-stylesheet', get_template_directory_uri() . '/css/magnific-popup.css',false,'1.1','all');
	wp_enqueue_style( 'slick-stylesheet', get_template_directory_uri() . '/css/slick.css',false,'1.1','all');
	wp_enqueue_style( 'slick-theme-stylesheet', get_template_directory_uri() . '/css/slick-theme.css',false,'1.1','all');
	
	/*--Load codex-recent-post-small..--*/
	wp_enqueue_style( 'codex-recent-post-small', get_template_directory_uri() . '/css/codex-recent-post-small.css',false,'1.1','all');

	wp_enqueue_style( 'main-stylesheet', get_stylesheet_uri() );
	wp_enqueue_style( 'responsive-stylesheet', get_template_directory_uri() . '/css/responsive.css' );
	wp_enqueue_style( 'scss-stylesheet', get_template_directory_uri() . '/scss/style.css' );
	

	// Load scripts
	wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/js/slick.min.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'mobile-menu-script', get_template_directory_uri() . '/js/menu.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'magnific-script', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'imagesloaded-script', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'waypoint-script', get_template_directory_uri() . '/js/waypoints.min.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'counterup-script', get_template_directory_uri() . '/js/jquery.counterup.min.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'isotope-script', get_template_directory_uri() . '/js/jquery.isotope.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'parallax-script', get_template_directory_uri() . '/js/parallax.min.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'typed-scripts', get_template_directory_uri() . '/js/typed.js', array ( 'jquery' ), 1.1, true);
	wp_enqueue_script( 'codexin-scripts', get_template_directory_uri() . '/js/codexin.js', array ( 'jquery' ), 1.1, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	//wp_enqueue_script( 'custom-typed-scripts', get_template_directory_uri() . '/js/codexin-typed.js', array ( 'typed-scripts' ), 1.1, true);

	if(is_page_template('page-templates/page-contact.php')):
		$gmap_api_key = codexin_option('codexin-google-map-api-key');
		if(!empty($gmap_api_key)): 
			wp_enqueue_script( 'google-js', 'https://maps.googleapis.com/maps/api/js?key='.$gmap_api_key, array('jquery'), 1.1, true);
		else: 
			wp_enqueue_script( 'google-js', 'https://maps.googleapis.com/maps/api/js', array('jquery'), 1.1, true);
		endif;
		wp_enqueue_script( 'gmap-js', get_template_directory_uri() . '/js/gmap.js', array ( 'google-js' ), 1.1, true);
		wp_enqueue_script( 'codexin-gmap-js', get_template_directory_uri() . '/js/codexin-map.js', array ( 'gmap-js' ), 1.1, true);

	endif;


} // smn_styles ()

add_action( 'wp_enqueue_scripts', 'codexin_scripts');

?>