<?php
/**
 Template Name: Home
 */

get_header(); ?>
 <?php if ( have_posts() ) : ?>
 	<?php while ( have_posts() ) : the_post(); ?>

	<?php
	$sf_image = get_field('banner_image_h');
	$sf_image = wp_get_attachment_image_src($sf_image, array(1800,1200));
	$sf_image = $sf_image[0];
	?>
	<div class="home-image-wrap" style="background-image: url('<?php echo $sf_image ?>');">
		<img class="home-image" data-src="<?php echo $sf_image ?>" data-retina src="<?php echo $sf_image ?>" alt=""/>
        <a data-content="inline" data-aux-classes="tml-newsletter-modal rounded" data-toolbar="" data-modal-mode data-modal-width="600" data-lightbox-animation="fadeIn" href="#subscribe-modal" class="lightbox-link button pill border-theme bkg-hover-theme color-theme color-hover-white"><?php the_field('subscribe_button_text'); ?></a>
	</div>

    <!-- Subscribe Modal Simple -->

        <div id="subscribe-modal" class="pt-70 pb-50 hide">

            <div class="row">

                <div class="column width-12 center">

                <!-- Info -->
								<h3 class="mb-10"><?php the_field('modal_heading_challenges','option'); ?></h3>
								<p class="mb-30"><?php the_field('modal_text','option'); ?></p>

                <!-- Info End -->

                <!-- Signup -->

                    <div class="signup-form-container">

                        <?php echo do_shortcode ('[mc4wp_form id="588"]');?>

                        <div class="form-response show"></div>

                    </div>

                <!-- Signup End -->

                </div>

            </div>

        </div>

    <!-- Subscribe Modal Simple -->



	<div class="content clearfix">
				<!-- Fullscreen Slider Section -->
				<section class="section-block featured-media tm-slider-parallax-container">
					<div class="tm-slider-container full-width-slider" data-featured-slider data-parallax data-scale-under="960">
						<ul class="tms-slides">
							<li class="tms-slide" data-image data-force-fit>
								<!--<div class="tms-content">
									<div class="tms-content-inner center v-align-middle">
										<div class="row">
											<div class="column width-12">

												<div class="clear"></div>
												<h1 class="tms-caption mb-30 color-white font-alt-2 title-large weight-light"
													data-animate-in="preset:slideInUpShort;duration:900ms;delay:100ms;"
													data-no-scale
													>Helping healthcare<br/> teams achieve their highest potential</h1>
												<div class="clear"></div>
												<div class="tms-caption mb-10 color-white">
													<hr class="transparent-element mt-0 mb-30 mt-mobile-10">

												</div>
											</div>
										</div>
									</div>
								</div>-->
								<?php
								$sf_image = get_field('banner_image_h');
								$sf_image = wp_get_attachment_image_src($sf_image, array(1800,1200));
								$sf_image = $sf_image[0];
								?>
								<img data-src="<?php echo $sf_image ?>" data-retina src="<?php echo $sf_image ?>" alt=""/>
							</li>
						</ul>
					</div>
				</section>
				<!-- Fullscreen Slider Section End -->

				<!-- Category Grid -->
				<div id="shop-category" class="section-block grid-container fade-in-progressively full-width no-margins no-padding-top" data-layout-mode="masonry" data-grid-ratio="1.5" data-animate-filter-duration="700" data-set-dimensions data-animate-resize data-animate-resize-duration="700">
					<div class="row">
						<div class="column width-12">
							<div class="row grid content-grid-3">
							<?php if( have_rows('top_module_h') ): ?>
								<?php while( have_rows('top_module_h') ): the_row(); ?>

								<div class="grid-item grid-sizer">
										<div class="thumbnail overlay-fade-img-scale-in" data-hover-easing="easeInOut" data-hover-speed="700" data-hover-bkg-color="#000000" data-hover-bkg-opacity="0.1">
											<a class="overlay-link" href="<?php the_sub_field('module_link');?>">
												<img src="<?php the_sub_field('module_image');?>" alt=""/>
												<span class="overlay-info">
													<span>
														<span>
															<span class="project-title"><?php the_sub_field('module_title');?></span>

														</span>
													</span>
												</span>
											</a>
										</div>
									</div>
									<?php endwhile; ?>
								<?php endif; ?>


							</div>
						</div>
					</div>
				</div>
				<!-- Category Grid End -->
				<!-- Logo 4 Section -->
				<div class="section-block pb-0 logos-4 asseenon bkg-white pt-20">
				<div class="row">
						<div class="column width-10 offset-1 center">
							<h5 class="occupation weight-light color-red mb-0"><em><?php the_field('client_section_title');?></em></h5>
						</div>
					</div>
					<div class="row">
							<div class="width-10 offset-1">
							<img style="width:100%; margin-bottom:20px;" src="http://www.h2spark.com/wp-content/uploads/2017/06/home-logos-1-3-e1496418845130.png">
							</div>

					</div>
				</div>



				<!-- Hero 5 Section -->
				<div class="section-block hero-5 hero-5-about-4 clear-height show-media-column-on-mobile" id="about">
					<?php
					$sf_image = get_field('author_image_about');
					$sf_image = wp_get_attachment_image_src($sf_image, array(1000,1158));
					$sf_image = $sf_image[0];
					?>
					<div class="media-column width-6" style="background-image: url('<?php echo $sf_image; ?>');"></div>
					<div class="row">
						<div class="column width-5 push-7">
							<div class="hero-content split-hero-content">
								<div class="">
									<h5 class="occupation weight-light color-grey" style="margin-bottom:30px; color:red"><em><?php the_field('heading_author');?></em></h5>

									<h3 class="mb-10"><?php the_field('author_name_about');?></h3>
									<h5 class="occupation weight-light color-grey"><em><?php the_field('author_designation_about');?></em></h5>
									<?php the_field('author_description_about');?>
									<div class="thumbnail transparent-element">
										<img src="<?php the_field('author_signature');?>" alt=""/>
									</div>
									<?php if(get_field('button_link_about')):?>
									<a href="<?php the_field('button_link_about');?>" class="button pill border-theme bkg-hover-theme color-theme color-hover-white mb-mobile-40"><?php the_field('button_text_about');?></a>
								<?php endif;?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Hero 5 Section End -->
				<!-- Testimonial Slider -->
				<div class="section-block bkg-grey-ultralight tm-test-slider">
					<div class="row full-width collapse">
						<div class="column width-12 center">
							<h3 class="mb-50"><?php the_field('heading_testimonial');?></h3>
							<div class="tm-slider-container testimonial-slider" data-nav-dark>
								<?php if( have_rows('testimonial') ): ?>
								<ul class="tms-slides">
									<?php while( have_rows('testimonial') ): the_row(); ?>
									<li class="tms-slide" data-image>
										<div class="tms-content-scalable">
											<div class="row full-width no-margins">
												<div class="column width-6 offset-3">
													<div class="box xlarge bkg-white">
														<blockquote class="avatar medium center">
															<span>
																<img data-src="<?php the_sub_field('image_testmonial');?>" src="<?php the_sub_field('image_testmonial');?>" alt="" />
															</span>
															<p><?php the_sub_field('testimonial_content');?></p>
															<cite><?php the_sub_field('name_testimonial');?></cite>

														</blockquote>
													</div>
												</div>
											</div>
										</div>
									</li>

									<?php endwhile; ?>
								</ul>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				<!-- Testimonial Slider End -->








				<!-- Sign Up Section 1 -->
				<section class="section-block signup-1">
					<div class="row">
						<div class="column width-6 offset-3 center">
							<h3 class="mb-10 color-grey" style="font-weight:400;"><?php the_field('newsletter_heading_h');?></h3>
							<p class="opacity-07 font-alt-2"><?php the_field('newsletter_subheading_h');?></p>
						</div>
						<div class="column width-8 offset-2 center">
							<div class="signup-form-container">
								<?php echo do_shortcode ('[mc4wp_form id="588"]');?>
								<div class="form-response show"></div>
							</div>
						</div>
					</div>
				</section>
				<!-- Sign Up Section 1 End -->

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
