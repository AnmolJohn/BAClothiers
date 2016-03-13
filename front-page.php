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
      $bacpage = ( get_query_var ( 'paged' ) ) ? get_query_var ( 'paged' ) : 1;
      $bac = array('showposts'=>2, 'cat'=>'192','paged'=>$bacpage);
                  $bac_query = new WP_Query($bac);
              ?>

                  
            <?php if ($bac_query->have_posts()) : while ($bac_query->have_posts()) : $bac_query->the_post(); ?>
              <article id="post-<?php the_ID();?>" <?php post_class(); ?>>

                    <?php if ( has_post_thumbnail() ) : ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail('large'); ?>
    </a>
<?php endif; ?>

               </article><!-- #post-## -->
               
       <?php endwhile; endif; ?>
             
              

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>