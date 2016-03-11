<?php
/**
 * The template for containing static front page that shows a certain number of posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BA_Clotheirs
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			
			<?php
      $paged = ( get_query_var ('paged') ) ? get_query_var ('paged') : 1 ;
      $bac = array('showposts' => 2 , 'cat' => '192' , 'paged' => $paged );
                  $my_query = new WP_Query($bac);
              ?>

                  
            <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php if ( ! has_post_thumbnail() ) : ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail('medium'); ?>
    </a>
<?php endif; ?>

               </article><!-- #post-## -->
               
       <?php endwhile; endif; ?>
             
              

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>