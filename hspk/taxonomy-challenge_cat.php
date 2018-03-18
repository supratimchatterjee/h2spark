<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package HSPK
 */

get_header(); ?>
<?php $queried_object = get_queried_object();?>
  <?php $tax_ID = $queried_object->term_id; ?>

	<div class="content clearfix pb-50">

	<!-- Intro Title Section 2 -->
		<?php
		$sf_image = get_field('banner_image_cat','challenge_cat_'.$tax_ID);
		$sf_image = wp_get_attachment_image_src($sf_image, array(2500,800));
		$sf_image = $sf_image[0];
		?>
		<div class="section-block intro-title-2 intro-title-2-1" style="background-image: url('<?php echo $sf_image;?>');">
			<div class="media-overlay bkg-charcoal-light opacity-07"></div>
			<div class="row">
				<div class="column width-12">
					<div class="title-container">
						<div class="title-container-inner">
							<h1 class="title-xlarge font-alt-2 weight-light mb-0"><?php echo $queried_object->name; ?> </h1>


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



						</div>
					</div>
				</div>
			</div>
			<a data-content="inline" data-aux-classes="tml-newsletter-modal rounded" data-toolbar="" data-modal-mode data-modal-width="600" data-lightbox-animation="fadeIn" href="#subscribe-modal" class="lightbox-link button pill border-theme bkg-hover-theme color-theme color-hover-white"><?php the_field('button_label_cp', 'option');?></a>
		</div>
	<!-- Intro Title Section 2 End -->
	<!-- Intro -->
		<div class="section-block pb-0">
			<div class="row">
				<div class="column width-8 offset-2 center">
					<div class="post-media video-container no-margin-bottom">
						<div class="embed-container">
						<?php the_field('video_category','challenge_cat_'.$tax_ID ); ?>
						</div>
					</div>
					<p class="lead weight-regular mb-50 mt-20"><?php echo $queried_object->description; ?></p>
				</div>

			</div>
		</div>
	<!-- Intro End -->



		<div class="section-block clearfix pt-0 no-padding-bottom">
			<div class="row">

			<!-- Content Inner -->
				<div class="column width-12 content-inner blog-regular pt-50">
				<?php if ( have_posts() ) : ?>
 					<?php while ( have_posts() ) : the_post(); ?>
					<div class="post width-6 pull-left challenge">
						<div class="post-media">
							<div class="thumbnail overlay-fade-img-scale-in" data-hover-easing="easeInOut" data-hover-speed="700" data-hover-bkg-color="#000000" data-hover-bkg-opacity="0.01">

								<a class="overlay-link" href="<?php echo get_permalink(); ?>">

									<?php the_post_thumbnail(array(500,300)); ?>
								</a>
							</div>
						</div>
						<div class="post-content with-background">
							<h2 class="post-title center"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="post-info center">
							<span class="post-date"><?php the_time('F j, Y') ?></span>
							</div>
							<p><?php echo wp_trim_words( get_the_content(), 40, ' ' ); ?></p>
							<a href="<?php echo get_permalink(); ?>" class="read-more"><span class="icon-right-open-mini"></span> More</a>
						</div>
					</div>
					<?php endwhile; endif; ?>


				</div>
			<!-- Content Inner End -->

			</div>
		</div>
	</div>

<div class="content clearfix">




<!-- Form Modal -->
	<div class="section-block">
		<div class="row">
			<div class="column width-4">
				<h3 class="mb-50"><?php the_field('heading_challenge','option');?></h3>
			</div>
			<div class="column width-8">
				<p><?php the_field('stay_know_text','option');?></p>
				<a data-content="inline" data-aux-classes="tml-newsletter-modal rounded" data-toolbar="" data-modal-mode data-modal-width="600" data-lightbox-animation="fadeIn" href="#subscribe-modal" class="lightbox-link button pill border-theme bkg-hover-theme color-theme color-hover-white"><?php the_field('button_text_sik','option'); ?></a>
			</div>
		</div>
	</div>
<!-- Form Modal End  -->

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



</div>


<?php
get_footer();
