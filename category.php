<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

$layout = get_option($shortname.'_cat_page_layout', 'rightsidebar');

get_header(); ?>
<h1 class="page-title"><?php
					printf( __( '%s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?></h1>
               <div class="breadcrumb_cont"> <?php  if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?></div>
<?php if ($layout=='rightsidebar') { ?>
		<div id="center-container">
			<div id="content" role="main">

				
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>

			</div><!-- #content -->
		</div><!-- #container -->
<div id="right"><?php get_sidebar(); ?></div>
<?php } ?>

<?php if ($layout=='leftsidebar') { ?>
<div id="left">
<?php get_sidebar(); ?></div>
		<div id="center-container">
			<div id="content" role="main">

				
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php } ?>

<?php if ($layout=='leftnavmenu') { ?>
<div id="left">
    <?php wp_nav_menu( array( 'container_class' => 'left-side', 'theme_location' => 'sidemenu', 'fallback_cb' => false ) ); ?>
</div>
		<div id="center-container">
			<div id="content" role="main">

				
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php } ?>

<?php if ($layout=='rightnavmenu') { ?>
		<div id="center-container">
			<div id="content" role="main">

				
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>

			</div><!-- #content -->
		</div><!-- #container -->
<div id="right">
    <?php wp_nav_menu( array( 'container_class' => 'right-side', 'theme_location' => 'sidemenu', 'fallback_cb' => false ) ); ?>
</div>
<?php } ?>

<?php if ($layout=='threecolumn-leftsidebar') { ?>
<div id="left">
    <?php get_sidebar(); ?>
</div>
		<div id="center-container-threecolumn">
			<div id="content" role="main">

				
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>

			</div><!-- #content -->
		</div><!-- #container -->
<div id="right">
    <?php wp_nav_menu( array( 'container_class' => 'right-side', 'theme_location' => 'sidemenu', 'fallback_cb' => false ) ); ?>
</div>

<?php } ?>

<?php if ($layout=='threecolumn-rightsidebar') { ?>
<div id="left">
    <?php wp_nav_menu( array( 'container_class' => 'left-side', 'theme_location' => 'sidemenu', 'fallback_cb' => false ) ); ?>
</div>
		<div id="center-container-threecolumn">
			<div id="content" role="main">

				
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>

			</div><!-- #content -->
		</div><!-- #container -->
<div id="right">
    <?php get_sidebar(); ?>
</div>

<?php } ?>

<?php if ($layout=='nosidebar') { ?>

<div id="center-container-fp">
			<div id="content" role="main">

				
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>

			</div><!-- #content -->
		</div><!-- #container -->


<?php } ?>

<?php get_footer(); ?>
<?php /* test doang */ ?>