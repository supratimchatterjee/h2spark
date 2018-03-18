<?php
/**
 Template Name: Challenges
 */

get_header(); ?>
 <?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>


<div class="content clearfix pb-50">

<!-- Intro Title Section 2 -->
	<?php
	$sf_image = get_field('banner_image_challenge');
	$sf_image = wp_get_attachment_image_src($sf_image, array(2500,800));
	$sf_image = $sf_image[0];
	?>
	<div class="section-block intro-title-2 intro-title-2-1" style="background-image: url('<?php echo ($sf_image) ;?>');">
		<div class="media-overlay bkg-charcoal-light opacity-07"></div>
		<div class="row">
			<div class="column width-12">
				<div class="title-container">
					<div class="title-container-inner">
						<h1 class="title-xlarge font-alt-2 weight-light mb-0"><?php the_field('banner_text_challenge');?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- Intro Title Section 2 End -->
<!-- Intro -->
	<div class="section-block pb-0">
		<div class="row">
			<div class="column width-10 offset-1 center">
				<?php the_content();?>
			</div>

		</div>
	</div>
<!-- Intro End -->



	<div class="section-block clearfix pt-0 no-padding-bottom">
		<div class="row">

		<!-- Content Inner -->
			<div class="column width-12 content-inner blog-regular pt-50">
			<?php $challenges = get_terms('challenge_cat'); ?>

				<?php foreach($challenges as $challenge) : ?>
					<?php $term_id = $challenge->term_id; ?>
				<article class="post width-6 pull-left challenge">
					<div class="post-media video-container no-margin-bottom">
						<div class="embed-container">
						<?php the_field('video_category','challenge_cat_'.$term_id); ?>
						</div>

					</div>
					<div class="post-content with-background">
						<h2 class="post-title center"><a href="<?php echo get_term_link( $challenge ); ?>"><?php echo $challenge->name; ?></a></h2>
						<div class="post-info center">
						<?php  $active = get_field('check_to_active_challenge','challenge_cat_'.$term_id); ?>
							<span class="post-date"><?php the_field('challenge_time','challenge_cat_'.$term_id); ?></span>/<span class="post-autor" style="color:#bc2828;"><?php if($active): ?>Active Challenge <?php else:  ?></span style="color:#999;"><span>Completed Challenge <?php endif; ?></span>
						</div>
						<p><?php echo $challenge->description; ?></p>
						<a href="<?php echo get_term_link( $challenge ); ?>" class="read-more"><span class="icon-right-open-mini"></span> More</a>
					</div>
				</article>
				<?php endforeach; ?>
			</div>
		<!-- Content Inner End -->

		</div>
	</div>
</div>
<div class="content clearfix">


<!-- Boxed Feature Columns -->
	<div class="section-block pt-0 replicable-content bkg-grey-ultralight">
		<div class="row">
			<div class="column width-10 offset-1 center">
				<h3 class="mb-50 pt-50"><?php the_field('review_heading');?></h3>
			</div>
		</div>

		<div class="row flex boxes">

		<?php if(have_rows ('client_review_challenge')):?>
			<?php  $count = 1;?>
			<?php while(have_rows('client_review_challenge')): the_row();?>
				<?php $block_class = ($count % 2 == 0) ? 'v-align-middle' : 'offset-1'; ?>
				<div class="column width-5 <?php  echo $block_class; ?>">
					<div class="feature-column box rounded xlarge bkg-white center">
						<div class="feature-text">
							<blockquote class="avatar left">
								<?php the_sub_field('review_content_challenge');?>
							</blockquote>
						</div>
					</div>
				</div>
				<?php $count++; ?>
			<?php endwhile; ?>
		<?php endif; ?>

		</div>


	</div>
<!-- Boxed Feature Columns End -->

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
<?php endwhile;?>
<?php endif;?>


<?php
get_footer();