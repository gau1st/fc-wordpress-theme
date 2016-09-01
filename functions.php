<?php
// 247one

// initialize vars
$shortname = '_247themes';

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

add_action('after_setup_theme', 'init_setup');
add_action('admin_menu', 'init_admin_menu');
add_action('init', 'init_post_type_slider');
add_action('init', 'init_post_type_portfolio');
add_action('save_post', 'save_post_meta');
add_action('widgets_init', 'init_widgets');
add_action('wp_head', 'init_head');
add_filter('excerpt_length', 'filter_excerpt_length');

// filters //
function filter_excerpt_length($length) {
    global $shortname;
    return intval(get_option($shortname.'_excerpt_length', 55));
}

if (!function_exists('init_head')) {
    function init_head(){
        echo '
<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_url').'/pirobox/css/style.css">
<script language="JavaScript" src="'.get_bloginfo('template_url').'/pirobox/js/jquery-ui-1.8.13.custom.min.js"></script>
<script language="JavaScript" src="'.get_bloginfo('template_url').'/pirobox/js/pirobox_extended.js"></script>
<script language="JavaScript">
$(document).ready(function() {
	$.piroBox_ext();
});
</script>
        ';
    }
}

if (!function_exists('init_setup')) {
    function init_setup(){
        add_theme_support('post-thumbnails');
        register_nav_menus(
            array(
                'primary'=>__('Primary Navigation', $shortname),
                'secondary'=>__('Secondary Navigation', $shortname),
				'sidemenu'=>__('Sidemenu Navigation', $shortname)
        ));
    }
}

if (!function_exists('init_admin_menu')) {
    
    function init_admin_menu() {
        add_menu_page('247 Themes', '247 Themes', 'manage_options', '247themes_options', '_247themes_options_general', null, 61);
        add_submenu_page('247themes_options', 'General', 'General', 'manage_options', '247themes_options_general', '_247themes_options_general');
        add_submenu_page('247themes_options', 'Front Page', 'Front Page', 'manage_options', '247themes_options_frontpage', '_247themes_options_frontpage');
        add_submenu_page('247themes_options', 'Slider', 'Slider', 'manage_options', '247themes_options_slider', '_247themes_options_slider');
        add_submenu_page('247themes_options', 'Contact', 'Contact', 'manage_options', '247themes_options_contact', '_247themes_options_contact');
        add_submenu_page('247themes_options', 'Social Media', 'Social Media', 'manage_options', '247themes_options_social', '_247themes_options_social');
        remove_submenu_page('247themes_options', '247themes_options');
            
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        
        wp_enqueue_style('thickbox');
    }
    
}   // end if(!function_exists('init_admin_menu'))


// custom post type: slider //

if (!function_exists('init_post_type_slider')) {
    function init_post_type_slider() {
        global $shortname;
        register_post_type( $shortname.'_slider',
                            array(
                                'menu_position'     => 5,
                                'public'            => true,
                                'labels'            => array(
                                    'name'              => __('Sliders'), 
                                    'singular_name'     => __('Slider'),
                                    'add_new_item'      => __('Add New Slider'),
                                    'add_item'          => __('Add Slider'),
                                    'edit_item'         => __('Edit Slider'),
                                    'view_item'         => __('View Slider'),
                                    'search_items'      => __('Search Sliders'),
                                    'not_found'         => __('No sliders found'),
                                    'not_found_in_trash'=> __('No sliders found in Trash')
                                ),
                                'show_ui'           => true,
                                'show_in_nav_menus' => false,
                                'supports'          => array('title', 'thumbnail'),
                                'register_meta_box_cb' => 'add_slider_meta'
                            ));
        function add_slider_meta() {
            global $shortname;
            add_meta_box($shortname.'_slider_params', 'Additional Parameters (optional)', 'show_slider_meta', $shortname.'_slider');
        }
        function show_slider_meta() {
            global $shortname, $post;
            echo '
                <table class="form-table">
				<tr>
				<td valign="top">Caption</td>
				<td><textarea style="width:250px;" name="'.$shortname.'_slider_caption">'.get_post_meta($post->ID, $shortname.'_slider_caption', true).'</textarea></td>
				</tr><tr>
				<td>Link URL</td>
				<td><input type="text" style="width:250px;" name="'.$shortname.'_slider_url" value="'.get_post_meta($post->ID, $shortname.'_slider_url', true).'">
                <span style="color:#999">(full path e.g. "http://www.example.com/")</span><td>
				</tr>
				</table>
            ';
        }
    }
}   // end if (!function_exists('init_post_type_slider'))


// custom post type: portfolio //

if (!function_exists('init_post_type_portfolio')) {
    function init_post_type_portfolio() {
        global $shortname;
        register_post_type( $shortname.'_portfolio',
                            array(
                                'menu_position'     => 6,
                                'hierarchical'      => false,
                                'public'            => true,
                                'labels'            => array(
                                    'name'              => __('Portfolios'), 
                                    'singular_name'     => __('Portfolio'),
                                    'add_new_item'      => __('Add New Portfolio'),
                                    'add_item'          => __('Add Portfolio'),
                                    'edit_item'         => __('Edit Portfolio'),
                                    'view_item'         => __('View Portfolio'),
                                    'search_items'      => __('Search Portfolios'),
                                    'not_found'         => __('No portfolios found'),
                                    'not_found_in_trash'=> __('No portfolios found in Trash')
                                ),
                                'show_ui'           => true,
                                'show_in_nav_menus' => false,
                                'supports'          => array('title', 'editor', 'excerpt', 'thumbnail', 'comments'),
                                'register_meta_box_cb' => 'add_portfolio_meta'
                            ));
        register_taxonomy($shortname.'_portfolio_category', $shortname.'_portfolio', array(
            'hierarchical'  => true,
            'show_ui'       => true,
            'query_var'     => true,
            'rewrite'       => true
        ));
        function add_portfolio_meta() {
            global $shortname;
            add_meta_box($shortname.'_portfolio_params', 'Additional Parameters (optional)', 'show_portfolio_meta', $shortname.'_portfolio');
        }
        function show_portfolio_meta() {
            global $shortname, $post;
            echo '
                <table class="form-table">
				<tr>
				<td>Link URL</td>
				<td><input type="text" style="width:250px;" name="'.$shortname.'_portfolio_url" value="'.get_post_meta($post->ID, $shortname.'_portfolio_url', true).'">
                <span style="color:#999">(full path e.g. "http://www.example.com/")</span><td>
				</tr>
				</table>
            ';
        }
    }
}   // end if (!function_exists('init_post_type_portfolio'))


// Save post metadata for custom post types //

if (!function_exists('save_post_meta')) {
    function save_post_meta() {
        global $shortname, $post;
        // if user has no permission, quit
        if (!current_user_can('edit_post', $post->ID ))
            return $post->ID;
        
        switch (get_post_type($post)) {
            case $shortname.'_slider':
                update_post_meta($post->ID, $shortname.'_slider_caption', $_POST[$shortname.'_slider_caption']);
                update_post_meta($post->ID, $shortname.'_slider_url', $_POST[$shortname.'_slider_url']);
                break;
            case $shortname.'_portfolio':
                update_post_meta($post->ID, $shortname.'_portfolio_url', $_POST[$shortname.'_portfolio_url']);
                break;
        }
    }
}   // end if (!function_exists('save_post_meta'))


// widgets //

function init_widgets() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', $shortname ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', $shortname ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', $shortname ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area', $shortname ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', $shortname ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', $shortname ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', $shortname ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', $shortname ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', $shortname ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', $shortname ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', $shortname ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', $shortname ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// remove default styles
	add_filter( 'show_recent_comments_widget_style', '__return_false' );
}

// general options //

if (!function_exists('_247themes_options_general')) {
    function _247themes_options_general() {
        global $shortname;
        include('includes/admin/options_general.php');
    }
}   // end if (!function_exists('_247themes_options_general'))

// homepage: slider, template/layout/featured category //

if (!function_exists('_247themes_options_frontpage')) {
    function _247themes_options_frontpage() {
        global $shortname;
        include('includes/admin/options_frontpage.php');
    }
}   // end if (!function_exists('_247themes_options_homepage'))

if (!function_exists('_247themes_options_slider')) {
    function _247themes_options_slider() {
        global $shortname;
        include('includes/admin/options_slider.php');
    }
}   // end if (!function_exists('_247themes_options_slider'))

// contact email, thank you message //

if (!function_exists('_247themes_options_contact')) {
    function _247themes_options_contact() {
        global $shortname;
        include('includes/admin/options_contact.php');
    }
}   // end if (!function_exists('_247themes_options_contact'))

// social network profile //

if (!function_exists('_247themes_options_social')) {
    function _247themes_options_social() {
        global $shortname;
        include('includes/admin/options_social.php');
    }
}   // end if (!function_exists('_247themes_options_social'))


// shortcodes //
include('includes/shortcodes/alert.php');           // alert
include('includes/shortcodes/box.php');             // box
include('includes/shortcodes/button.php');          // button
include('includes/shortcodes/list.php');            // list
include('includes/shortcodes/typography.php');      // dropcap, h1 ... h6, blockquote
include('includes/shortcodes/tables.php');          // table, thead, tbody, tfoot, tr, th, td
include('includes/shortcodes/columns.php');         // cols
include('includes/shortcodes/tabs.php');            // tabs
include('includes/shortcodes/accordion.php');       // accordion
include('includes/shortcodes/contactform.php');     // contactform
include('includes/shortcodes/gallery.php');         // gallery
include('includes/shortcodes/latest.php');          // latest, cycle 
include('includes/shortcodes/site.php');            // menu, sitemap
include('includes/shortcodes/social.php');          // tw_button, tw_feed, tw_follow, fb_like, fb_comment, fb_follow, fl_feed, fl_follow, g_plusone
include('includes/shortcodes/portfolio.php');       // portfolio
 
// post meta //

if (!function_exists('_247themes_posted_by'))  {
    function _247themes_posted_by() {
        printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', '247themes' ),
            'meta-prep meta-prep-author',
            sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
                get_permalink(),
                esc_attr( get_the_time() ),
                get_the_date()
            ),
            sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
                get_author_posts_url( get_the_author_meta( 'ID' ) ),
                sprintf( esc_attr__( 'View all posts by %s', '247themes' ), get_the_author() ),
                get_the_author()
            )
        );
    }
} // end if (!function_exists('_247themes_posted_on'))

if (!function_exists('_247themes_posted_in')) {
    function _247themes_posted_in() {
        $tags = get_the_tag_list( '', ', ' );
        if ($tags) {
            $posted_in = __('Posted in: %1$s. Tags: %2$s. <a href="%3$s" title="Permalink to %4$s" rel="bookmark">Permalink</a>.', '247themes');
        } elseif (is_object_in_taxonomy(get_post_type(), 'category')) {
            $posted_in = __('Posted in %1$s. <a href="%3$s" title="Permalink to %4$s" rel="bookmark">Permalink</a>.', '247themes');
        } else {
            $posted_in = __('<a href="%3$s" title="Permalink to %4$s" rel="bookmark">Permalink</a>.', '247themes');
        }
        // Prints the string, replacing the placeholders.
        printf(
            $posted_in,
            get_the_category_list( ', ' ),
            $tag_list,
            get_permalink(),
            the_title_attribute( 'echo=0' )
        );
    }
} // end if (!function_exists('_247themes_posted_in'))

// post comment //

if (!function_exists('_247themes_comment')) {
    function _247themes_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
            case '' :
        ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
            <div id="comment-<?php comment_ID(); ?>">
            <div class="comment-author vcard">
                <?php echo get_avatar( $comment, 40 ); ?>
                <?php printf( __( '%s <span class="says"></span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
            </div><!-- .comment-author .vcard -->
            <?php if ( $comment->comment_approved == '0' ) : ?>
                <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
                <br />
            <?php endif; ?>
    
            <div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                <?php
                    /* translators: 1: date, 2: time */
                    printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' );
                ?>
            </div><!-- .comment-meta .commentmetadata -->
    
            <div class="comment-body"><?php comment_text(); ?></div>
    
            <div class="reply">
                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div><!-- .reply -->
        </div><!-- #comment-##  -->
    
        <?php
                break;
            case 'pingback'  :
            case 'trackback' :
        ?>
        <li class="post pingback">
            <p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' ); ?></p>
        <?php
                break;
        endswitch;
    }
}
add_filter('widget_text', 'do_shortcode');


// custom excerpt //
function _247themes_get_the_excerpt($post_id, $length = null) {
    global $shortname;
    $post = get_post($post_id);
    $excerpt = $post->post_excerpt;
    
    if (strlen($excerpt))   return $excerpt;
    
    if ($length === null)   $length = get_option($shortname.'_excerpt_length');
    else                    $length = intval ($length);
    $content = strip_tags(strip_shortcodes($post->post_content));
    $content = str_replace(array("\r\n", "\n\n", '  ' ), ' ', $content);
    $words = explode(' ', $content);
    if (count($words) > $length)
        return implode(' ', array_slice($words, 0, $length)).' [...]';
    else
        return $content;
}
add_filter('widget_text', 'do_shortcode');
 
 
function dimox_breadcrumbs() {
 
  $delimiter = '&raquo;';
  $home = 'Home'; // text for the 'Home' link
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
    echo '<div id="crumbs">';
 
    global $post;
    $homeLink = get_bloginfo('url');
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $before  . single_cat_title('', false) . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;

    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
}

function bm_displayArchives() {
	global $month, $wpdb, $wp_version;

	// a mysql query to get the list of distinct years and months that posts have been created
	$sql = 'SELECT
			DISTINCT YEAR(post_date) AS year,
			MONTH(post_date) AS month,
			count(ID) as posts
		FROM ' . $wpdb->posts . '
		WHERE post_status="publish"
			AND post_type="post"
			AND post_password=""
		GROUP BY YEAR(post_date),
			MONTH(post_date)
		ORDER BY post_date DESC';

	// use get_results to do a query directly on the database
	$archiveSummary = $wpdb->get_results($sql);

	// if there are any posts
	if ($archiveSummary) {
		// loop through the posts
		foreach ($archiveSummary as $date) {
			// reset the query variable
			unset ($bmWp);
			// create a new query variable for the current month and year combination
			$bmWp = new WP_Query('year=' . $date->year . '&monthnum=' . zeroise($date->month, 2) . '&posts_per_page=-1');

			// if there are any posts for that month display them
			if ($bmWp->have_posts()) {
				// display the archives heading
				$url = get_month_link($date->year, $date->month);
				$text = $month[zeroise($date->month, 2)] . ' ' . $date->year;

				echo get_archives_link($url, $text, '', '<h3>', '</h3>');
				echo '<ul class="postspermonth">';

				// display an unordered list of posts for the current month
				while ($bmWp->have_posts()) {
					$bmWp->the_post();
					echo '<li><a href="' . get_permalink($bmWp->post) . '" title="' . wp_specialchars($text, 1) . '">' . wptexturize($bmWp->post->post_title) . '</a></li>';
				}

				echo '</ul>';
			}
		}
	}
}

function list_menu($atts, $content = null) {
	extract(shortcode_atts(array(  
		'menu'            => '', 
		'container'       => 'div', 
		'container_class' => '', 
		'container_id'    => '', 
		'menu_class'      => 'menu', 
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'depth'           => 0,
		'walker'          => '',
		'theme_location'  => ''), 
		$atts));
 
 
	return wp_nav_menu( array( 
		'menu'            => $menu, 
		'container'       => $container, 
		'container_class' => $container_class, 
		'container_id'    => $container_id, 
		'menu_class'      => $menu_class, 
		'menu_id'         => $menu_id,
		'echo'            => false,
		'fallback_cb'     => $fallback_cb,
		'before'          => $before,
		'after'           => $after,
		'link_before'     => $link_before,
		'link_after'      => $link_after,
		'depth'           => $depth,
		'walker'          => $walker,
		'theme_location'  => $theme_location));
}
//Create the shortcode
add_shortcode("listmenu", "list_menu");
