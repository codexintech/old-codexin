<?php
/**
 * Template Name: Page - Full Width 
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package codexin
 */

get_header(); ?>

	<div id="content" class="main-content-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">

					<div id="primary" class="site-main">
						<?php
						if ( have_posts() ) :
							
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content', 'page' );

							endwhile;
						endif; ?>

					</div><!-- #primary -->
				</div> <!-- end of col -->

			</div> <!-- end of row -->
		</div> <!-- end of container -->
	</div> <!-- end of #content -->

<?php get_footer(); ?>
