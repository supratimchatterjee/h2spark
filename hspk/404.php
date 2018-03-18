<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package HSPK
 */

get_header(); ?>

	<div class="content clearfix pb-50">

	<!-- Intro Title Section 2 -->
		
		<div class="section-block intro-title-2 intro-title-2-1" style="background-image: url('<?php echo get_template_directory_uri();?>/images/consulting-page-2.jpg');">
			<div class="media-overlay bkg-charcoal-light opacity-07"></div>
			<div class="row">
				<div class="column width-12">
					<div class="title-container">
						<div class="title-container-inner">
						<h1><?php esc_html_e( '404 Not Found', 'framlingham' ); ?></h1>
						<h5><b><?php esc_html_e( 'Oops! That page can&rsquo;t be found. It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'framlingham' ); ?></b><h5>
							<p><?php get_search_form();?></p>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php
get_footer();
