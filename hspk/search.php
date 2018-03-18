<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package HSPK
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>
	

	<div class="content clearfix">

				<!-- Intro Title Section 2 -->
					<?php
					$sf_image = get_field('banner_image_commuinity',$post->ID);
					$sf_image = wp_get_attachment_image_src($sf_image, array(2000,1089));   
					$sf_image = $sf_image[0];
					?>
				<div class="section-block intro-title-2 intro-title-2-1" style="background-image: url('<?php echo get_template_directory_uri();?>/images/consulting-page-2.jpg');">
					<div class="media-overlay bkg-charcoal-light opacity-07"></div>
					<div class="row">
						<div class="column width-12">
							<div class="title-container">
								<div class="title-container-inner center color-white">
									<h1 class="title-xlarge font-alt-2 weight-light mb-0"><?php _e('Search Results for','pccs');?> <strong>"<?php the_search_query(); ?>"</strong> <?php $total_results = $wp_query->found_posts; echo ": " .$total_results. " "; ?></h1>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Intro Title Section 2 End -->

<div class="section-block pt-50 pb-0"></div>


				<div class="section-block clearfix pt-0 no-padding-bottom">
					<div class="row">

						<!-- Content Inner -->
						<div class="column width-9 push-3 content-inner blog-regular">
							
													
								 <?php while ( have_posts() ) : the_post(); ?>
									<article class="post">
									<?php $check = get_field('select_option');?>
									<?php if($check[0] == 'Video'):?>
										<div class="post-media video-container no-margin-bottom">
											<div class="embed-container">
											 	<?php the_field('blog_video'); ?>
											</div>
										</div>
									<?php endif;?>
								
									<?php if($check[0] == 'Image'):?>
										<div class="post-media">
											<div class="thumbnail overlay-fade-img-scale-in" data-hover-easing="easeInOut" data-hover-speed="700" data-hover-bkg-color="#000000" data-hover-bkg-opacity="0.01">
												<a class="overlay-link" href="blog-single.html">
													<img src="<?php the_field('blog_image');?>" alt=""/>
												</a>
											</div>
										</div>
									<?php endif;?>
										<div class="post-content with-background">
											<h2 class="post-title center"><a href="<?php echo get_the_permalink(); ?>"><?php the_title();?></a></h2>
											<div class="post-info center">
												<span class="post-date"><?php the_time('F j, Y') ?></span>
											</div>
											<p><?php echo wp_trim_words( get_the_content(), 40, '' );?></p>
											<a href="<?php echo get_the_permalink(); ?>" class="read-more"><span class="icon-right-open-mini"></span> More</a>
										</div>
									</article>
								<?php endwhile;?>
							
							
							
						</div>
						<!-- Content Inner End -->

						<!-- Sidebar -->
						<aside class="column width-3 pull-9 sidebar left">
							<div class="sidebar-inner">
								
								<?php dynamic_sidebar('sidebar-1'); ?>

								
								<!-- <div class="widget">
									<h3 class="widget-title">Tweets</h3>
									<!-- twitter 
									<a class="twitter-timeline" href="https://twitter.com/thememountainco" data-chrome="noheader nofooter noborders transparent"  data-tweet-limit="2" data-link-color="#0cbacf" data-widget-id="572782546753429504">Tweets by @thememountainco</a> 
									<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
								</div>-->
							</div>
						</aside>
						<!-- Sidebar End -->

					</div>
				</div>
				
				
				
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


<?php endif;?>
<?php

get_footer();
