<?php
/**
 * The loop that displays a single post.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="nav-above" class="navigation" style="display:none;">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', '247themes' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', '247themes' ) . '</span>' ); ?></div>
				</div><!-- #nav-above -->

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php /*	<h1 class="entry-title"> the_title(); ?></h1> */ ?>

					

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', '247themes' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

<?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) ); ?>
						</div><!-- #author-avatar -->
						<div id="author-description">
							<h2><?php printf( esc_attr__( 'About %s', '247themes' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
							<div id="author-link">
								<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
									<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', '247themes' ), get_the_author() ); ?>
								</a>
							</div><!-- #author-link	-->
						</div><!-- #author-description -->
					</div><!-- #entry-author-info -->
<?php endif; ?>

					<div class="entry-utility">
						<?php _247themes_posted_in(); ?> / <?php _247themes_posted_by(); ?> / 
						<?php edit_post_link( __( 'Edit', '247themes' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-utility -->

<?php
global $shortname;
if (get_option($shortname.'_social_buttons_below_post', 'false')=='true') {
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    echo '
					<div class="social_sharing"> ';
	if (get_option($shortname.'_social_fb_share_show', 'true')=='true')
	    echo '
	                    <div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="'.$url.'" send="false" layout="button_count" width="90" show_faces="false" font=""></fb:like> ';
	if (get_option($shortname.'_social_tw_share_show', 'true')=='true')
	    echo '
	                    <a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script> ';
	if (get_option($shortname.'_social_g_plusone_show', 'true')=='true')
	    echo '
	                    <g:plusone size="medium"></g:plusone> ';
	if (get_option($shortname.'_social_li_share_show', 'true')=='true')
	    echo ' 
	                    <script type="text/javascript" src="http://platform.linkedin.com/in.js"></script><script type="in/share" data-counter="right"></script>';
	echo '
					</div> ';
}
?>
                   <?php /* <div class="entry-meta">
						
					</div><!-- .entry-meta --> */ ?>
				</div><!-- #post-## -->

				<div id="nav-below" class="navigation" style="display:none;">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', '247themes' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', '247themes' ) . '</span>' ); ?></div>
				</div><!-- #nav-below -->

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>