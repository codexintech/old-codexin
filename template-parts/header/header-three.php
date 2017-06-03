<?php 

global $codexin;
$header_top = $codexin['codexin-header-top']; 

 ?>


 	<?php if($header_top == 1): ?>
		<div class="headertop">
			<div class="container">
				<div class="row">
					<div class="flex-wrapper">
						<div class="col-sm-6">
							<div class="email-phone">

								<?php if(!empty($codexin['codexin-phone-url'])):
										$phone_url = $codexin['codexin-phone-url'];
										endif; ?>
							
								<?php if (!empty($codexin['codexin-phone']) && !empty($phone_url)):?>
									<span><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:<?php echo $phone_url; ?>" ><?php echo $codexin['codexin-phone']  ?></a></span>
								<?php endif; ?>
								<?php if (!empty($codexin['codexin-email'])):?>
								<span><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:<?php echo $codexin['codexin-email']  ?>"><?php echo $codexin['codexin-email']  ?></a></span>

								<?php endif; ?>


							</div>
						</div>
						<div class="col-sm-6">
							<div class="social-icon">

								<?php if (!empty($codexin['codexin-twitter'])):?>
									<a href="<?php echo $codexin['codexin-twitter']  ?>"><i class="fa fa-twitter"></i></a>
								<?php endif; ?>

								<?php if (!empty($codexin['codexin-facebook'])):?>
									<a href="<?php echo $codexin['codexin-facebook']  ?>"><i class="fa fa-facebook"></i></a>
								<?php endif; ?>

								<?php if (!empty($codexin['codexin-instagram'])):?>
									<a href="<?php echo $codexin['codexin-instagram']  ?>"><i class="fa fa-instagram"></i></a>
								<?php endif; ?>

								<?php if (!empty($codexin['codexin-linkedin'])):?>
									<a href="<?php echo $codexin['codexin-linkedin']  ?>"><i class="fa fa-linkedin"></i></a>
								<?php endif; ?>

								<?php if (!empty($codexin['codexin-youtube'])):?>
									<a href="<?php echo $codexin['codexin-youtube']  ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a>
								<?php endif; ?>

								<?php if (!empty($codexin['codexin-vimeo'])):?>
									<a href="<?php echo $codexin['codexin-vimeo']  ?>"><i class="fa fa-vimeo" aria-hidden="true"></i></a>
								<?php endif; ?>

								<?php if (!empty($codexin['codexin-google-plus'])):?>
									<a href="<?php echo $codexin['codexin-google-plus']  ?>"><i class="fa fa-google-plus"></i></a>
								<?php endif; ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>	
		<div class="header-bottom <?php if(is_front_page()): echo ' home-page'; endif; ?>">
			<div class="cx-header-wrapper">
				<div class="container">
					<div class="row">
						<div class="header-wrapper">
							<div class="visible-xs">
								<div id="logo" class="">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>">

									<?php if (!empty($codexin['codexin-logo']['url'])):?>

										<img src="<?php echo $codexin['codexin-logo']['url']?>" alt="Logo">
									<?php else: echo "LOGO HERE"; ?>		
									<?php endif; ?>
									</a>
								</div>
							</div>
							<div id="o-wrapper" class="mobile-nav o-wrapper">
								  <div class="primary-nav">
								    <button id="c-button--slide-left" class="primary-nav-details">Menu <i class="fa fa-navicon"></i></button>
								  </div>
							</div>
							
							<div class="col-sm-2 hidden-xs">
								<div id="logo" class="">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>">

									<?php if (!empty($codexin['codexin-logo']['url'])):?>

										<img src="<?php echo $codexin['codexin-logo']['url']?>" alt="Logo">
									<?php else: echo "LOGO HERE"; ?>		
									<?php endif; ?>
									</a>
								</div>
							</div>
							<div class="col-sm-10 hidden-xs">
                <div class="menu-area alignright">
									<?php get_main_menu() ?>
								</div> <!-- end of menu-area -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>