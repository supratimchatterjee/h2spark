<?php
/**
 Template Name: Consulting
 */

get_header(); ?>
 <?php if ( have_posts() ) : ?>
	 <?php while ( have_posts() ) : the_post(); ?>

	<div class="content clearfix">

				<!-- Intro Title Section 2 -->
				<?php
				$sf_image = get_field('banner_image_c');
				$sf_image = wp_get_attachment_image_src($sf_image, array(2500,800));   
				$sf_image = $sf_image[0];
				?>

				<div class="section-block intro-title-2-1" style="background-image: url('<?php echo ($sf_image)?>');">
					
					
				</div>
				<!-- Intro Title Section 2 End -->

				<!-- Team -->
				<div class="section-block team-2">
					<h3 class="weight-light center headlines"><?php the_field('consulting_heading');?></h3>
					<div class="row">
						<div class="column width-4">
							<?php
							$sf_image = get_field('consulting_image');
							$sf_image = wp_get_attachment_image_src($sf_image, array(500,573));   
							$sf_image = $sf_image[0];
							?>
							<img class="consulting-mobile" src="<?php echo ($sf_image);?>">	
						</div>
						<div class="column width-8">
							<div class="row">
								<?php the_field('consulting_content');?>
							</div>
						</div>
						</div>
					</div>
				<!-- Team End -->


				<!-- Logo 4 Section -->
				<div class="section-block logos-4 bkg-grey-ultralight logostuff">
				
					<div class="row">
						<div class="column width-12">
							<div class="row content-grid-4">
								<?php if(have_rows ('logo_icons')):?>
									<?php while(have_rows('logo_icons')): the_row();?>
									<div class="grid-item">
										<a href="<?php the_sub_field('logo_link');?>">
											<img src="<?php the_sub_field('logo_icon');?>" alt=""/>
										</a>
									</div>
									
									<?php endwhile;?>
								<?php endif;?>
							</div>
						</div>
					</div>
				</div>
				<!-- Logo 4 Section End -->

								<!-- Contact Form -->
				<section class="section-block replicable-content contact-2">
					<div class="row">
						<div class="column width-4">
							<h2 class="mb-30"><?php the_field('booking_heading_c');?></h2>
							<div class="row">
								<div class="column width-10">
									<p><?php the_field('booking_content_c');?></p>
									
								</div>
							</div>
						</div>
						<div class="column width-8 left">
							<div class="contact-form-container pu-10">
								<?php $code = get_field('booking_code_c');?>
								<?php echo do_shortcode($code); ?>
								<div class="form-response center"></div>
							</div>
						</div>
					</div>
				</section>
				<!--Contact Form End -->

				<!-- Search Modal End -->
				<div id="search-modal" class="hide">
					<div class="row">
						<div class="column width-12 center">
							<div class="search-form-container site-search">
								<form action="#" method="get" novalidate>
									<div class="row">
										<div class="column width-12">
											<div class="field-wrapper">
												<input type="text" name="search" class="form-search form-element" placeholder="type &amp; hit enter...">
												<span class="border"></span>
											</div>
										</div>
									</div>
								</form>
								<div class="form-response"></div>
							</div>
							<a href="#" class="tml-aux-exit">Close</a>
						</div>
					</div>
				</div>
				<!-- Search Modal End -->

			</div>

	<?php endwhile;?>
<?php endif;?>
<?php
get_footer();
