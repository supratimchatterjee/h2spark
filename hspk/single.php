<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package HSPK
 */

get_header(); ?>
 <?php if ( have_posts() ) : ?>
 	<?php while ( have_posts() ) : the_post(); ?>

	<div class="content clearfix">

				<!-- Intro Title Section 2 -->
				<?php
				$sf_image = get_post_thumbnail_id();
				$sf_image = wp_get_attachment_image_src($sf_image, array(2000,1286));   
				$sf_image = $sf_image[0];
				?>
				<div class="section-block intro-title-2 intro-title-2-2" style="background-image: url('http://www.h2spark.com/wp-content/uploads/2017/05/blog-bg-2000x1089.jpg');">
					<div class="media-overlay bkg-charcoal-light opacity-07"></div>
					<div class="row">
						<div class="column width-12">
							<div class="title-container">
								<div class="title-container-inner">
									<h1 class="title-xlarge font-alt-2 weight-light mb-0"><?php the_title();?></h1>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Intro Title Section 2 End -->

				<!-- Breadcrum -->
				<div class="section-block pt-50 pb-0">
					<div class="row">
						<div class="column width-12">
							<ul class="breadcrumb pull-right clear-float-on-mobile mb-50">
								<li>
									<a href="<?php echo home_url( '/' ); ?>">Home</a>
								</li>
								<li>
									<a href="<?php echo get_permalink(29); ?>">Community</a>
								</li>
								<li>
									<a href="<?php echo get_permalink(); ?>"><?php the_title();?></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- Breadcrum End -->

				<div class="section-block clearfix no-padding">
					<div class="row">

						<!-- Content Inner -->
						<div class="column width-8 push-2 content-inner blog-single-post">
							<div class="post">
								<div class="post-content">
								<?php $check = get_field('select_option');?>
									<?php if($check[0] == 'Video'):?>
									<div class="video-container">
										<div class="embed-container">
											 <?php the_field('blog_video'); ?>
										</div>
									</div>
								<?php endif;?>
								<?php if($check[0] == 'Image'):?>
									<div class="video-container">
										<a class="overlay-link" href="<?php echo get_permalink(); ?>">
											<img src="<?php the_field('blog_image');?>" alt=""/>
										</a>
									</div>
								<?php endif;?>
									
									<?php the_content();?>

								</div>
							</div>

							<!-- Post Author -->
						<?php/*	
							<div id="author" class="post-author">
								<div class="post-author-aside">
									<span class="author-title">Author</span>
									
								</div>
								<article class="author-bio">
									<div class="author-avatar">
										<img src="images/heather-hansen-blog.png" alt="Avatar"/>
									</div>
									<div class="author-content">
										<div class="row">
											<div class="column width-12 pt-10">
												<h5 class="name">Heather Hansen</h5>
												<h5 class="occupation weight-light color-grey"><em>Spearker, Healthcare Consultant, Host at LawNewz.com</em></h5>
											</div>
										</div>
									</div>
								</article>
							</div>
							*/?>
							<!-- Post Comments -->
							<?php
								/*if( current_user_can('editor') || current_user_can('administrator') ) :*/
								// If comments are open or we have at least one comment, load up the comment template
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;
								/*endif;*/
							?>
							
							
						</div>
						<!-- Content Inner End -->

						

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

	<?php endwhile;?>
<?php endif;?>

<?php
get_footer();
