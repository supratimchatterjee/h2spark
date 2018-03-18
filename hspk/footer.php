<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HSPK
 */

?>

	<footer class="footer">
				<div class="footer-top two-columns-on-tablet">
					<div class="row flex">
						<div class="column width-4">
							<div class="widget">
								<h4 class="widget-title weight-light center"><?php the_field('about_title','option');?></h4>
								<p><?php the_field('about_content','option');?></p>
							</div>
						</div>
						<div class="column width-4">
							<div class="widget">
								<h4 class="widget-title weight-light"><?php the_field('community_news_title','option');?></h4>
								<ul class="list-group large">
								<?php $the_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 3 ) ); ?>
								<?php if ( $the_query->have_posts() ) : ?>							
									<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

									<li>
										<span class="post-info"><span class="post-date">March 1, 2017</span></span>
										<a href="<?php echo get_the_permalink(); ?>"><?php the_title();?></a>
									</li>
									<?php endwhile;?>
								<?php endif;?>
								<?php wp_reset_query();  ?>
								</ul>
							</div>
						</div>
						
						<div class="column width-4">
							<div class="widget">
								<h4 class="widget-title"><?php the_field('newsletter','option');?></h4>
								<p class="mb-20"><?php the_field('newsletter_content','option');?></p>
								<div class="signup-form-container">
									<?php  $shortcode = get_field('newsletter_shortcode','option');?>
									<?php echo do_shortcode($shortcode); ?>
									<div class="form-response show">*No spamming here.</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-bottom">
					<div class="row">
						<div class="column width-12">
							<div class="footer-bottom-inner center">
								<p class="copyright pull-left clear-float-on-mobile">
									<?php the_field('copyright','option');?></a>
								</p>
								<ul class="social-list list-horizontal pull-right clear-float-on-mobile">
									<?php if(get_field('twitter_link','option')):?>
									<li><a href="<?php the_field('twitter_link','option');?>" target="_blank"><span class="icon-twitter-with-circle medium"></span></a></li>
									<?php endif;?>

									<?php if(get_field('facebook_link','option')):?>
									<li><a href="<?php the_field('facebook_link','option');?>" target="_blank"><span class="icon-facebook-with-circle medium"></span></a></li>
									<?php endif;?>

									<?php if(get_field('youtube_link','option')):?>
									<li><a href="<?php the_field('youtube_link','option');?>" target="_blank"><span class="icon-youtube-with-circle medium"></span></a></li>
									<?php endif;?>
									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!-- Footer End -->

		</div>
	</div>

<?php wp_footer(); ?>

</body>
</html>
