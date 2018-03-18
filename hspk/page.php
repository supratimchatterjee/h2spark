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
<?php if ( have_posts() ) : ?>
 	<?php while ( have_posts() ) : the_post(); ?>	
	<div class="content clearfix">
			<?php
			$sf_image = get_post_thumbnail_id();
			$sf_image = wp_get_attachment_image_src($sf_image, array(1800,1200));   
			$sf_image = $sf_image[0];
			?>

				<!-- Fullscreen Slider Section -->
			<div class="section-block intro-title-2 intro-title-2-1" style="background-image: url('<?php echo $sf_image;?>');">
				<div class="media-overlay bkg-charcoal-light opacity-07"></div>
				<div class="row">
					<div class="column width-12">
						<div class="title-container">
							<div class="title-container-inner">
								<h1 class="title-xlarge font-alt-2 weight-light mb-0"><?php the_title() ?> </h1>
							</div>
						</div>
					</div>
				</div>
			</div>
				<!-- Fullscreen Slider Section End -->

				<!-- Category Grid -->

				<div class="section-block pb-0 logos-4 asseenon bkg-white pt-20">
				
					<div class="row">
						<div class="row content-grid-12">
							<?php the_content(); ?>
						</div>
						
					</div>
				</div>
	</div>

	<?php endwhile;?>
<?php endif; ?>	
				 
<?php
get_footer();
