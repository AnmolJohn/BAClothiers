<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BA_Clotheirs
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ba-clotheirs' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

			
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
			
			<!--  This 2 line code below is for the daily greeting change that can be done
			from the BAC theme options page  -->
			<?php   $dailyGreeting=get_option ('bac_options_settings'); ?>
			<p class= "dailyGreetings"><?php print $dailyGreeting['bac_text_field']  ?> </p>			
			
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( '≡ MENU', 'ba-clotheirs' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
     

     <!-- this code is an if and while loop that makes the custom post type called seasons on the dashboard. It only have featured images 
     because this post is specifically used by the flex slider-->  
       <?php
       $args = array(
            'post_type' => 'seasons',
            'post_per_page' => -1
       	);
       
       $seasons = new WP_Query( $args );

       if ( $seasons->have_posts() ): ?>
       
	       <div class="flexslider">
	 			 <ul class="slides">
	           <?php while( $seasons->have_posts() ): $seasons->the_post(); ?>
	     		<li>
	     		<?php the_post_thumbnail( 'seasons' ); ?>
	   			</li>
	   			<?php endwhile; ?>
	 			 </ul>
			</div>

      <?php endif; ?>


		
	</header><!-- #masthead -->

	<div id="content" class="site-content">
