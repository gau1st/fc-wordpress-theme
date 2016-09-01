<?php
/**
 * Template Name: One column, no sidebar
 *
 * A custom page template without sidebar
 */

get_header(); ?>
<div class="headertitle-page">

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_front_page() ) { ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } else { ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php } ?>
</div>
	<div id="center-container-fp">
	<div id="content">
			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			get_template_part( 'loop', 'page' );
			?>
	</div>
	</div>
<?php get_footer(); ?>

