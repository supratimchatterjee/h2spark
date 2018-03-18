<?php
/**
 Template Name: Speaking
 */

get_header(); ?>
 <?php if ( have_posts() ) : ?>
 	<?php while ( have_posts() ) : the_post(); ?>

	<div class="content clearfix">

				<!-- Intro Title Section 2 -->
				<?php
				$sf_image = get_field('banner_image_speaking');
				$sf_image = wp_get_attachment_image_src($sf_image, array(2500,800));   
				$sf_image = $sf_image[0];
				?>

				<div class="section-block intro-title-2-1" style="background-image: url('<?php echo $sf_image; ?>');">
					<a data-content="inline" data-aux-classes="tml-newsletter-modal rounded" data-toolbar="" data-modal-mode data-modal-width="600" data-lightbox-animation="fadeIn" href="#subscribe-modal" class="lightbox-link spkhi button pill border-theme bkg-hover-theme color-theme color-hover-white">Watch Heather</a>
				</div>
				<!-- Intro Title Section 2 End -->
				   <!-- Subscribe Modal Simple -->

        <div id="subscribe-modal" class="pt-70 pb-50 hide">

            <div class="row">

                <div class="column width-12 center">

     

                <!-- Signup -->

                    <div class="signup-form-container">

                        <iframe style="min-height:300px;" src="https://www.youtube.com/embed/kpYLugTU1Ug?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                    </div>

                <!-- Signup End -->

                </div>

            </div>

        </div>

    <!-- Subscribe Modal Simple -->


				<!-- Team -->
				<div class="section-block team-2">
					<div class="row">
						<div class="column offset-1">
								
						</div>
						<div class="column width-10 offset-1">
							<h3 class="weight-light center headlines"><?php the_field('reason_heading');?></h3>
							<?php if( have_rows('reason_module') ): ?>
								<?php $number = 1;?> 
								<div class="row">
									<?php while( have_rows('reason_module') ): the_row(); ?>
									<?php $check = get_sub_field('option_speaking');?>
										<div class="<?php if (!$check):?> column width-6<?php else:?> column width-12 <?php endif;?>">
											<span class="number"><?php echo $number ;?></span><h3><?php the_sub_field('module_heading_speaking');?></h3>
											<?php the_sub_field('module_content_speaking');?>
										</div>
									<?php $number++ ;?>
									<?php endwhile;?>	
									</div>
							<?php endif;?>
						</div>
						
						</div>
					</div>
				<!-- Team End -->


				<!-- Logo 4 Section -->
				<div class="section-block pb-0 logos-4 asseenon bkg-white pt-20">
				<div class="row">
						<div class="column width-10 offset-1 center">
							<h5 class="occupation weight-light color-red mb-0"><em><?php the_field('gallery_heading');?></em></h5>
						</div>
					</div>
					<div class="row">
						<div class="column width-12">
							
								<img style="width:100%; margin-bottom:20px; margin-top:20px;" src="http://hspk.staging-server.site/wp-content/uploads/2017/05/speaker-logos.png">
								
							
						</div>
					</div>
				</div>
				<!-- Logo 4 Section End -->

				<!-- Form Modal -->
	<div class="section-block">
		<div class="row">
			<div class="column width-4">
				<h3 class="mb-50">Speaking Topics include:</h3>
			</div>
			<div class="column width-8">
				<p class="speakinglead">"The Power of Potential: We Could Be Well” and “What Makes You Human? Maintaining Humanity in the Presence of Technology”</p>
				
			</div>
		</div>
	</div>
<!-- Form Modal End  -->


								<!-- Contact Form -->
				<section class="section-block replicable-content contact-2">
					<div class="row">
						<div class="column width-4">
							<h2 class="mb-30"><?php the_field('booking_heading');?></h2>
							<div class="row">
								<div class="column width-10">
									<p><?php the_field('booking_text');?></p>
									
								</div>
							</div>
						</div>
						<div class="column width-8 left">
							<div class="contact-form-container pu-10">
								<?php $code = get_field('contact_form_shortcode');?>
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