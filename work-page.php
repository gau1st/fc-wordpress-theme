<?php
/**
 * Template Name: work page, no sidebar
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
			<?php 
			$the_query_work = new WP_Query( 'pagename=work' );
			if ( $the_query_work->have_posts() ) while ( $the_query_work->have_posts() ) : $the_query_work->the_post(); ?>
			<div class="content_container">	
<div class="judul"><?php echo get_post_meta($post->ID, "page_tagline", true);?></div>

					<div class="content3">
			
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				<!-- #post-## -->
					</div>
				<?php /* comments_template( '', true );
<div class="sub_content">
				<?php echo get_post_meta($post->ID, "tagline", true);?>
			
			</div> */?>
<?php endwhile; // end of the loop. ?>

<?php 
			$the_query = new WP_Query( 'page_id=10' );

			if ( $the_query->have_posts() ) while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="content_container">	
			<div class="judul">
			<?php echo get_post_meta($post->ID, "page_tagline", true);?></div>

					<div class="content3">
			
						<?php the_content(); ?>
					</div><!-- .entry-content -->
					<!-- #post-## -->
				</div>
				<?php /* comments_template( '', true );
<div class="sub_content">
				<?php echo get_post_meta($post->ID, "tagline", true);?>
			
			</div> */?>
<?php endwhile; // end of the loop. ?>


<?php /*get_sidebar(); */?>
<?php get_footer(); ?>

