<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
			
			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 
			get_template_part( 'loop', 'page' );*/
			?>
<div id="start-here-layer" style="display:none;">			
			<?php 
			$start_here_query = new WP_Query( 'pagename=start-here' );
			if ( $start_here_query->have_posts() ) while ( $start_here_query->have_posts() ) : 	$start_here_query->the_post(); ?>
			<div class="content_container">	
<div class="judul" id="start-here-layer-judul" style="position:absolute;left:-2000px;"><?php echo get_post_meta($post->ID, "page_tagline", true);?></div>
<?php
// get custom content width
$cw = get_post_meta($post->ID, "content_width", true);
if (strlen($cw)) {
    $width = intval($cw);
    $pad   = 430-$width;
    $cstyle = "width: ".$width."px; padding-right: ".$pad."px;";
}
?>
					<div id="start-here-layer-content" style="position:absolute;top:10px;left:-2000px;" class="content"<?=(isset($cstyle) ? ' style="'.$cstyle.'"' : '')?>>
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				<!-- #post-## -->
					</div>
				<?php /* comments_template( '', true ); */?>
<div class="sub_content" id="start-here-layer-sub_content" style="position:absolute;left:-2000px;top:25px;">
<?php
        	$attachments_latest = get_children(array(
                        'post_parent'       => 228,
                        'post_status'       => 'inherit',
                        'post_type'         => 'attachment',
                        'post_mime_type'    => 'image'
                   ));
            $counts =  count($attachments_latest);
            
            if ($counts == 1){
            foreach ($attachments_latest as $id=>$attachment) {
        		 $greeting_latest = wp_get_attachment_image_src($id, 'full');
       			 echo '<img src="'.$greeting_latest[0].'" alt="" />';
    		} 
			} elseif ($counts > 1) {?>
			<div id="slideshow" style="width:500px;height:500px;"></div>
<?php      
		echo "<script>
 			 $(function() {
    		 $('#slideshow').crossSlide({
      			sleep: 5,
      			fade: 1
    		 }, [";
    	foreach ($attachments_latest as $id=>$attachment) {
    			 $x += 1;
        		 $greeting_latest = wp_get_attachment_image_src($id, 'full');
        		 if ($x == $counts){
       			 echo '{ src: \''.$greeting_latest[0].'\' }';
       			 } else {
       			 echo '{ src: \''.$greeting_latest[0].'\' },';
       			 }
    		}  	 
    	echo "])
 		    });
		   </script>";
}		   
?>            

<div class="img_frame_latest_work" style="float;left;position:absolute;top:-8px;"><img src="<?=get_bloginfo('template_url')?>/images/frame_latest_work.png" alt=""/></div>

				<?php echo get_post_meta($post->ID, "tagline", true);?>
			
			</div>
<?php endwhile; // end of the loop. ?>
</div>

<div id="about-us-layer" style="display:none;">			
			<?php 
			$about_us_query = new WP_Query( 'pagename=about-us' );
			if ( $about_us_query->have_posts() ) while ( $about_us_query->have_posts() ) : 	$about_us_query->the_post(); ?>
			<div class="content_container">	
<div class="judul" id="about-us-layer-judul" style="position:absolute;left:-2000px;top:10px;"><?php echo get_post_meta($post->ID, "page_tagline", true);?></div>
<?php
// get custom content width
$cw = get_post_meta($post->ID, "content_width", true);
if (strlen($cw)) {
    $width = intval($cw);
    $pad   = 430-$width;
    $cstyle = "width: ".$width."px; padding-right: ".$pad."px;";
}
?>
					<div id="about-us-layer-content" style="position:absolute;top:10px;left:-2000px;" class="content"<?=(isset($cstyle) ? ' style="'.$cstyle.'"' : '')?>>
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				<!-- #post-## -->
					</div>
				<?php /* comments_template( '', true ); */?>
<div class="sub_content" id="about-us-layer-sub_content" style="position:absolute;left:-2000px;">
				<?php echo get_post_meta($post->ID, "tagline", true);?>
			
			</div>
<?php endwhile; // end of the loop. ?>
</div>

<div id="our-service-layer" style="display:none;">			
			<?php 
			$our_service_query = new WP_Query( 'pagename=our-service' );
			if ( $our_service_query->have_posts() ) while ( $our_service_query->have_posts() ) : 	$our_service_query->the_post(); ?>
			<div class="content_container">	
<div class="judul" id="our-service-layer-judul" style="position:absolute;left:-2000px;top:10px;"><?php echo get_post_meta($post->ID, "page_tagline", true);?></div>
<?php
// get custom content width
$cw = get_post_meta($post->ID, "content_width", true);
if (strlen($cw)) {
    $width = intval($cw);
    $pad   = 430-$width;
    $cstyle = "width: ".$width."px; padding-right: ".$pad."px;";
}
?>
					<div id="our-service-layer-content" style="position:absolute;left:-2000px;width:800px;top:10px;" class="content"<?=(isset($cstyle) ? ' style="'.$cstyle.'"' : '')?>>
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				<!-- #post-## -->
					</div>
				<?php /* comments_template( '', true ); */?>
<div class="sub_content" id="our-service-layer-sub_content" style="position:absolute;left:-2000px;">
				<?php echo get_post_meta($post->ID, "tagline", true);?>
			
			</div>
<?php endwhile; // end of the loop. ?>
</div>

<div id="contact-us-layer" style="display:none;">			
			<?php 
			$contact_us_query = new WP_Query( 'pagename=contact-us' );
			if ( $contact_us_query->have_posts() ) while ( $contact_us_query->have_posts() ) : 	$contact_us_query->the_post(); ?>
			<div class="content_container">	

					<div class="content2" >
			                <div class="container2" id="contact-us-layer-judul" style="position:absolute;left:-2000px;top:10px;">
<?php echo get_post_meta($post->ID, "page_tagline", true);?>
</div>
<div class="container2" id="contact-us-layer-content" style="position:absolute;left:-2000px;top:10px;">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div>
</div><!-- .entry-content -->
				<!-- #post-## -->
					</div>
				<?php /* comments_template( '', true ); */?>
<div class="sub_content" id="contact-us-layer-sub_content" style="position:absolute;left:-2000px;top:10px;">
				<?php echo get_post_meta($post->ID, "tagline", true);?>
			
			</div>
<?php endwhile; // end of the loop. ?>
</div>

<div id="our-work-layer" style="display:none;position:absolute;top:10px;">			
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
</div>
<a href="#" class="touchSurprise" style="display:block;left:800px;top:100px;position:absolute;width:100px;height:100px;"></a>

<?php /*get_sidebar(); */?>
<?php get_footer(); ?>