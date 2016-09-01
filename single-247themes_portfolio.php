<?php
// template for displaying single portfolio item

get_header(); ?>
<?php /*
	foreach((get_the_category()) as $cat){
			$categoryname = $cat -> cat_name;
		}		
 */ ?>

<h1 class="page-title single-title"><?php /* echo $categoryname; */ wp_title(' ')?></h1>
 <div class="breadcrumb_cont"> <?php  if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?></div>
			<div id="content" role="main">
		<div id="center-container">
        
			<?php
			/* Run the loop to output the post.
			 * If you want to overload this in a child theme then include a file
			 * called loop-single.php and that will be used instead.
			 */
			get_template_part( 'loop', 'single' );
			?>

			</div><!-- #content -->
		</div><!-- #container -->
        <div id="right">

<?php get_sidebar(); ?></div>
<?php get_footer(); ?>
