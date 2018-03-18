<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HSPK
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-86124350-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body  <?php body_class(); ?>>

	<!-- Side Navigation Menu -->
	<aside class="side-navigation-wrapper enter-right" data-no-scrollbar data-animation="push-in">
		<div class="side-navigation-scroll-pane">
			<div class="side-navigation-inner">
				<div class="side-navigation-header">
					<div class="navigation-hide side-nav-hide">
						<a href="#">
							<span class="icon-cancel medium"></span>
						</a>
					</div>
				</div>
				<nav class="side-navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'container' => false ) ); ?>

				</nav>
				
				<div class="side-navigation-footer">
					<p class="copyright no-margin-bottom">&copy; 2017 H2SPARK.</p>
				</div>
			</div>
		</div>
	</aside>
	<!-- Side Navigation Menu End -->

	<div class="wrapper">
		<div class="wrapper-inner">

			<!-- Header -->
			<header class="header header-fixed header-fixed-on-mobile header-transparent" data-bkg-threshold="100" data-compact-threshold="100">
				<div class="header-inner">
					<div class="row nav-bar">
						<div class="column width-12 nav-bar-inner">
							<div class="logo">
								<div class="logo-inner">
									<a href="<?php echo home_url( '/' ); ?>"><img src="<?php the_field('logo','option');?>" alt="Warhol Logo" /></a>
									<a href="<?php echo home_url( '/' ); ?>"><img src="<?php the_field('logo','option');?>" alt="Warhol Logo" /></a>
								</div>
							</div>
							<nav class="navigation nav-block secondary-navigation nav-right">
								<ul>
									<li class="aux-navigation hide">
										<!-- Aux Navigation -->
										<a href="#" class="navigation-show side-nav-show nav-icon">
											<span class="icon-menu"></span>
										</a>
									</li>
								</ul>
							</nav>
							<nav class="navigation nav-block primary-navigation nav-right">
								<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'container' => false ) ); ?>
							</nav>

							
						</div>
					</div>
				</div>
			</header>