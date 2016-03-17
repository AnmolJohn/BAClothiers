<?php
/**
 * The template for containing static front page that shows a certain number of posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BA_Clotheirs
 */

get_header(); ?>

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