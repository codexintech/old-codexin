<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package codexin
 */

?>



	
		<?php 
			$codexin_footer = codexin_option('codexin-footer-version');
			$codexin_cpr = codexin_option('codexin-footer_copyright');
		 ?>
 	




	<footer id="footer" class="footer">
		<div id="footer_top">
			<div class="container">
				<?php 
				if($codexin_footer == 1): get_template_part('template-parts/footer/footer', 'one');
				elseif($codexin_footer == 2): get_template_part('template-parts/footer/footer', 'two');
				elseif($codexin_footer == 3): get_template_part('template-parts/footer/footer', 'three');
				elseif($codexin_footer == 4): get_template_part('template-parts/footer/footer', 'four');
				elseif($codexin_footer == 5): get_template_part('template-parts/footer/footer', 'five');
				elseif($codexin_footer == 6): get_template_part('template-parts/footer/footer', 'six');
				endif; 
				?>
			</div>
		</div>
		<?php if($codexin_cpr == 1): ?>
		<div id="footer_bottom">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">

						<div id="toTop" style="display: block;">
						    <i class="fa fa-chevron-up"></i>
						</div>
						<p class="copyright-legal">
							 <?php global  $codexin; ?>
							 <?php  if (!empty(codexin_option('codexin-copyright'))): ?>
							 	<?php echo codexin_option('codexin-copyright'); ?>
							 <?php endif;?>
						</p>

					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>

	</footer>

</div> <!-- end of #whole -->



<?php wp_footer(); ?>

</body>
</html>
