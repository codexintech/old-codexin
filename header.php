<?php

/**
* The header for our theme
*
* This is the template that displays all of the <head> section and everything up until <div id="content">
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package codexin
*/



?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=9">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php bloginfo('name'); ?></title>

    <!--[if lt IE 9]>

      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->



    <!--[if IE 9]>

      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie9.css">

    <![endif]-->

    <?php 

    if(!empty(codexin_option('codexin-google-map-latitude'))):
        $latitude = codexin_option('codexin-google-map-latitude');
    endif;

    if(!empty(codexin_option('codexin-google-map-longitude'))):
        $longtitude = codexin_option('codexin-google-map-longitude');
    endif;

    if(!empty(codexin_option('codexin-google-map-zoom'))):
        $c_zoom = codexin_option('codexin-google-map-zoom');
    endif;

    if(!empty(codexin_option('codexin-google-map-marker'))):
        $gmap_marker = codexin_option('codexin-google-map-marker');
    endif;

    ?>



    <script type="text/javascript">
        var codexin_lat = "<?= $latitude ?>"; 
        var codexin_long = "<?= $longtitude ?>"; 
        var codexin_marker = "<?= $gmap_marker['url'] ?>"; 
        var codexin_m_zoom = Number ("<?= $c_zoom ?>"); 
        
    </script>


<?php wp_head(); ?>

</head>



<body <?php body_class(); ?>>

<!--  Site Loader -->
<div id="loader">
	<div class="cssload-container">
		<div class="cssload-speeding-wheel"></div>
	</div>
</div>
<!--  Site Loader finished -->

<div id="c-menu--slide-left" class="c-menu c-menu--slide-left">
    <button class="c-menu__close">&larr; Back</button><?php get_mobile_menu() ?>
</div>
<div id="c-mask" class="c-mask"></div>

<div id="whole" class="whole-site-wrapper">

	<header id="header" class="header">
		<?php 
		
		$header_version = codexin_option('codexin-header-version');

		if($header_version == 1): 
		get_template_part('template-parts/header/header', 'one');

		elseif($header_version == 2): 
		get_template_part('template-parts/header/header', 'two');

		elseif($header_version == 3): 
		get_template_part('template-parts/header/header', 'three');

		elseif($header_version == 4): 
		get_template_part('template-parts/header/header', 'four');


		endif; ?>



			<?php if(is_front_page()): ?>

			<?php if ( shortcode_exists( '[rev_slider alias="kenburnsslider"]' ) ): ?>
			<div class="cx-slider-wrapper">
				<?php echo do_shortcode('[rev_slider alias="kenburnsslider"]'); ?>
			</div>
			<?php endif; ?>

			<?php else: ?>
			<?php $header_bg = rwmb_meta('codexin_page_background', 'type=image_advanced'); ?>
			<?php 
				foreach ($header_bg as $single_bg) {
					$single_bg = $single_bg['full_url'];
				}	
			 ?>

		<section id="page_title" class="page-title" <?php if (!empty($single_bg)): ?> style="background-image: url('<?php echo $single_bg; ?>')" <?php endif; ?>>
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="page-title-wrapper">
							<h1><?php if(is_home()):

										echo "Blog";

									  elseif(is_404()):

									  	echo "Nothing Found!";

									  elseif(is_archive()):

									  	the_archive_title();

									  elseif(is_search()):

									  	printf( esc_html__( 'Search Results for: %s', 'codexin' ), '<span>' . get_search_query() . '</span>' );

									  else:

									  	single_post_title();

									  endif;

							 ?></h1>
							 <div class="breadcrumbs-wrapper">
							 	<p>
							 	<?php $codexin_bc = codexin_option('codexin-bcrumbs'); ?>
							 	<?php if( $codexin_bc == 1 ): ?>
							 	<?php 
									if (function_exists('codexin_custom_breadcrumbs')) {
									// passing options as array
									$args = array(
									'beginningText' => 'Currently Watching: ',
									'delimiter' 	=> ' > ',
									);
									    codexin_custom_breadcrumbs($args);
									}
							 	?>
								<?php endif; ?>
							 	</p>
							 </div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php endif; ?>	
	</header>
