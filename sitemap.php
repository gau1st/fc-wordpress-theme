<?php
/**
 * Template Name: sitemap
 *
 * A custom page template for sitemap
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
			
             
             <h3>Pages</h3>
<ul><?php wp_list_pages("title_li=" ); ?></ul>
<h3>Feeds</h3>
<ul>
<li><a title="Full content" href="feed:<?php bloginfo('rss2_url'); ?>">Main RSS</a></li>
<li><a title="Comment Feed" href="feed:<?php bloginfo('comments_rss2_url'); ?>">Comment Feed</a></li>
</ul>
<h3>Categories</h3>
<ul><?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0&feed=RSS'); ?></ul>
<h3>All Blog Posts:</h3>
<ul><?php $archive_query = new WP_Query('showposts=1000&cat=-8');
while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
<li>
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
(<?php comments_number('0', '1', '%'); ?>)
</li>
<?php endwhile; ?>
</ul>
<h3>Archives</h3>
<?php 
			bm_displayArchives();
			 ?>
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

