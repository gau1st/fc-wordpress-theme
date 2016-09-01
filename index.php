<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

 <?php if(is_front_page()){
	
				$temp = $wp_query;
				$wp_query= null;
				$wp_query = new WP_Query();
				$wp_query->query('showposts=3'.'&paged='.$paged);
				?>
    			<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
    			<?php $imgsrc = get_post_meta($post->ID, 'Thumb', true); ?>
					<div class="content-blog">
                        <div class="tempat-img" style="position:relative<?=(strlen($imgsrc) ? '' : '; display:none;')?>"><img style="position:absolute;" class="pic-blog" src="<?php echo get_post_meta($post->ID, 'Thumb', true);?>" width="400px;" /></div>
                        <a href="<?php the_permalink(); ?>" style="padding:0px; background:none;" ><h3 style="color:#333; font-weight:bold;">
                        <?php the_title(); ?></h3></a>
                        <?php the_excerpt(); ?>
					</div>
				<?php endwhile; ?>
				
				
				<?php $wp_query = null; $wp_query = $temp;?>
            
            
            <?php } else {?>
           <div class="headertitle-page">
                <h2 class="entry-title">
				<?php wp_title(); ?>
				<? /*=get_the_title($post->ID) */?></h2>
            </div>
		<div id="center-container">
        <div id="content">

			<?php
			/* Run the loop to output the posts.
			 * If you want to overload this in a child theme then include a file
			 * called loop-index.php and that will be used instead.*/ 
			 			 get_template_part( 'loop', 'index' );?>
			
			
			<?php /* while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
    			<?php $imgsrc = get_post_meta($post->ID, 'Thumb', true); ?>
					
                    <div class="blog-main">
                    	<a href="<?php the_permalink(); ?>" style="padding:0px; background:none;" ><h2 class="blog-title">
                        <?php the_title(); ?></h2></a>
                     <div class="blog-utility">
						<?php _247themes_posted_in(); ?> / <?php _247themes_posted_by(); ?> / 
						<?php edit_post_link( __( 'Edit', '247themes' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-utility --><br />
                    <div class="tempat-img" style="position:relative<?=(strlen($imgsrc) ? '' : '; display:none;')?>">
                    <img style="position:absolute;" class="pic-blog" src="<?php echo get_post_meta($post->ID, 'Thumb', true);?>" width="800px;" />
                    </div>
                        
                        <?php the_excerpt(); ?>
                        
					</div>
				<?php endwhile; */ ?>
              
        </div>
		</div>
        <div id="right">
			<?php get_sidebar(); ?>
		</div>

        <?php }?>

<?php get_footer(); ?>
