<?php
/**
 * Template Name: contact page, no sidebar
 *
 * A custom page template without sidebar
 */

get_header(); ?>



			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 
			get_template_part( 'loop', 'page' );*/
			?>
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<div class="content_container">	
<div class="judul"><?php echo get_post_meta($post->ID, "page_tagline", true);?></div>

					<div class="content2">
			
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				<!-- #post-## -->
					</div>
				<?php /* comments_template( '', true ); */?>
<div class="sub_content">
				<?php echo get_post_meta($post->ID, "tagline", true);?>
			
			</div>
<?php endwhile; // end of the loop. ?>


<?php /*get_sidebar(); */?>
<?php get_footer(); ?>

