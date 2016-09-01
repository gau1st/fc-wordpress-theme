<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage 247one
 * @since 247one 1.0
 */
 
global $shortname;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', '_247themes' ), max( $paged, $page ) );

	?></title>
	


<meta name="description" content="Fresh Creative is a creative consultancy and design agency based in Jakarta, Indonesia." />
<meta name="keywords" content="creative agency jakarta indonesia, design agency jakarta indonesia, graphic design jakarta, branding jakarta jakarta,  fresh design jakarta, creative design jakarta, desain logo, packaging design jakarta, logo design jakarta, design company profile, design website, Web design jakarta Indonesia, Web designer jakarta Indonesia, Web design agency jakarta Indonesia, Website design jakarta Indonesia, Website designer jakarta Indonesia, Website design agency jakarta Indonesia, Packaging design jakarta Indonesia, Packaging designer jakarta Indonesia, Packaging design agency jakarta Indonesia, Company profile design jakarta Indonesia, Company profile designer jakarta Indonesia, Company profile agency jakarta Indonesia,  Annual report design jakarta Indonesia, Annual report designer jakarta Indonesia, Annual report agency jakarta Indonesia, Logo design jakarta Indonesia, Logo designer jakarta Indonesia, Logo design agency jakarta Indonesia, Corporate identity design jakarta Indonesia, Corporate identity designer jakarta Indonesia, Corporate identity agency jakarta Indonesia, Branding agency jakarta Indonesia, Brand agency jakarta Indonesia, Brand designer jakarta Indonesia, Design agency jakarta Indonesia, Graphic design jakarta Indonesia, Graphic designer jakarta Indonesia, Graphic design agency jakarta Indonesia" />
<meta property="og:title" content="Fresh Creative : A Creative Consultancy And Design Agency" />
<meta property="og:site_name" content="Fresh Creative"/>
<meta property="og:image" content="http://freshandcreative.com/wp-content/uploads/2012/01/greeting.png"/> 
<link rel="image_src" href="http://freshandcreative.com/wp-content/uploads/2012/01/greeting.png" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" href="<?=get_bloginfo('template_url')?>/includes/css/contact-form.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?=get_bloginfo('template_url')?>/includes/css/ui.css" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="<?=get_bloginfo('template_url')?>/jquery.slides/css/global.css" media="all">
<?php 
    if (get_option('_247themes_frontpage_main_image_which', 'slider')=='slider')
    echo '<link rel="stylesheet" href="'.get_bloginfo('template_url').'/slider/nivo-slider.css" type="text/css" media="screen" />'.chr(10);
?>
<style>
body { 
    background-color: <?=get_option('_247themes_background_color', '#cc9966')?>; 
<?php
if (get_option('_247themes_background_image_which', 'none')=='url')
    echo 'background-image: url('.get_option('_247themes_background_image_url', '').');';
?>
    background-repeat: <?=get_option('_247themes_background_image_repeat', 'repeat')?>;
    background-attachment: <?=get_option('_247themes_background_image_attachment', 'scroll')?>;
}
.logo_container a { font-size: <?=get_option('_247themes_logo_font_size', '37px')?>; color: <?=get_option('_247themes_logo_font_color', '#999999')?>; }
</style>


<script type="text/javascript" src="<?=get_bloginfo('template_url')?>/js/date.format.js"></script>
<script type="text/javascript" src="<?=get_bloginfo('template_url')?>/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?=get_bloginfo('template_url')?>/jquery/jqueryui.min.js"></script>
<script type="text/javascript" src="<?=get_bloginfo('template_url')?>/jquery/jquery.flickrfeed.js"></script>
<script type="text/javascript" src="<?=get_bloginfo('template_url')?>/jquery/jquery.twitterfeed.js"></script>
<script type="text/javascript" src="<?=get_bloginfo('template_url')?>/jquery.slides/js/slides.min.jquery.js"></script>
<script type="text/javascript" src="<?=get_bloginfo('template_url')?>/jquery.slides/js/jquery.cross-slide.js"></script>
<script type="text/javascript" src="<?=get_bloginfo('template_url')?>/js/jquery.vibrate.min.js"></script>

<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>

<?php 
    if (get_option('_247themes_frontpage_main_image_which', 'slider')=='slider')
        echo '<script type="text/javascript" src="'.get_bloginfo('template_url').'/slider/js/jquery.nivo.slider.js"></script>'.chr(10);
?>
<script src="<?php bloginfo('template_url'); ?>/font/js/cufon-yui.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/font/font/aller.font.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/font/font/good_foot.font.js"></script>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" /> 
<?
if (get_option('_247themes_favicon_use_custom', 'false') == 'true')
    echo '<link rel="shortcut icon" href="'.get_option('_247themes_favicon_url', 'favicon.ico').'">
    ';
?>
 <script type="text/javascript">
        Cufon.replace('ul.mainmenu a, .twit_container, h2,.judul , .content_container, .copyright', { fontFamily: 'Aller', hover: 'true' });
		Cufon.replace('.our a, .sub_content', { fontFamily: 'Good Foot', hover: 'true' });
</script>

<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

<script type="text/javascript" src="<?=get_bloginfo('template_url')?>/js/queryLoader.js"></script>
<script type='text/javascript'>
    	$(document).ready(function () {
        $("body").queryLoader2();
        });
</script>

<script type="text/javascript" src="<?=get_bloginfo('template_url')?>/js/jQueryRotateCompressed.2.1.js"></script>
</head>

<body <?php body_class(); ?> >
<div class="wrapper">
    	<div class="main_container">
			<div class="big_img" style="position:absolute;left:0px;">
				<div class="layer4b"><img src="http://freshandcreative.com/wp-content/uploads/2011/09/0-ImageBgr-FullSize-Layer4B.png" id="Layer4b" alt="layer 4b"></div>
				<div class="layer4c"><img src="http://freshandcreative.com/wp-content/uploads/2011/09/0-ImageBgr-FullSize-Layer4C.png" id="Layer4c" alt="layer 4c"></div>
				<div class="layer4a"><img src="http://freshandcreative.com/wp-content/uploads/2011/09/0-ImageBgr-FullSize-Layer4A.png" id="Layer4a" alt="layer 4a"></div>
				<div class="layer3"><img src="http://freshandcreative.com/wp-content/uploads/2011/09/0-ImageBgr-FullSize-Layer3.png" id="Layer3" alt="layer 3"></div>
				<div class="layer2"><img src="http://freshandcreative.com/wp-content/uploads/2011/09/0-ImageBgr-FullSize-Layer2.png" id="Layer2" alt="layer 2"></div>
				<div class="layer1"><img src="http://freshandcreative.com/wp-content/uploads/2011/09/0-ImageBgr-FullSize-Layer1.png" id="Layer1" alt="layer 1"></div>
			</div>
			<div style="position:relative;float:left; width:1000px; z-index:1000;">
        	<?php
        	$attachments_greeting = get_children(array(
                        'post_parent'       => 225,
                        'post_status'       => 'inherit',
                        'post_type'         => 'attachment',
                        'post_mime_type'    => 'image'
                   ));
            foreach ($attachments_greeting as $id=>$attachment) {
        		 $greeting_img = wp_get_attachment_image_src($id, 'full');
       			 echo '<div class="greeting"><img src="'.$greeting_img[0].'" alt=""/></div>';
    		}       
        	
        	?>
					
			<div class="social_top">
				<div class="twit_container"><?=do_shortcode('[tw_feed numberposts="1"]')?></div>
				<div class="icon_social-cont">
					<ul>
						<li><a href="http://twitter.com/<?=get_option($shortname.'_social_twitter')?>" target="blank"><img src="<?=get_bloginfo('template_url')?>/images/icon_twit.png" alt="" border="0" /></a></li>
						<li><a href="http://www.facebook.com/<?=get_option($shortname.'_social_facebook')?>" target="blank"><img src="<?=get_bloginfo('template_url')?>/images/icon_fb.png" alt="" border="0" /></a></li>
						<li>
                                                <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.freshandcreative.com&amp;send=false&amp;layout=button_count&amp;width=80&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21&amp;appId=165098646909520" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80px; height:21px;" allowTransparency="true"></iframe>
						</li>
					</ul>
				</div>
			</div>
			
			<div class="header_container">
			
            	<div class="logo_container">
                	<a href="<?=bloginfo('url')?>"><?=get_option('_247themes_logo_which', 'text') == 'text' ? get_option('_247themes_logo_text', 'Site Logo') : '<img src="'.get_option('_247themes_logo_image_url', '').'" border="0">'?></a>
                    <?=get_option('_247themes_logo_which', 'text') == 'text' ? '<span>'.get_option('_247themes_logo_tagline', '').'</span>' : ''?>
                </div>
               <!-- <div class="menu_container">                        
                
                      <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
                        <div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', '_247themes' ); ?>"><?php _e( 'Skip to content', '_247themes' ); ?></a></div>
                        <?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
                        <?php wp_nav_menu( array( 'menu_class'=>'mainmenu','container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
						<div class="our"><?php wp_nav_menu( array( 'theme_location' => 'secondary', 'fallback_cb' => false ) ); ?></div>
                </div> -->
                <div class="menu_container">                        
                <div class="skip-link screen-reader-text">
                <a href="#content" title="Skip to content">Skip to content</a>
                </div>
                <div class="menu-header">
                	<ul id="menu-mainmenu" class="mainmenu">
                		<li id="start-here" style="display:none"><a href="javascript:void(0)">Start Here</a></li>
                   		<li id="start-here-current" class="current_page_item" style="display:none"><a href="javascript:void(0)">Start Here</a></li>
                   		
                   		
                   		<li id="about-us" style="display:none"><a href="javascript:void(0)">About Us</a></li>
						<li id="about-us-current" class="current_page_item" style="display:none"><a href="javascript:void(0)">About Us</a></li>
						
						
						<li id="our-service" style="display:none"><a href="javascript:void(0)">Our Services</a></li>
						<li id="our-service-current" class="current_page_item" style="display:none"><a href="javascript:void(0)">Our Services</a></li>
						
						
						<li id="contact-us" style="display:none"><a href="javascript:void(0)">Contact Us</a></li>
					    <li id="contact-us-current" class="current_page_item" style="display:none"><a href="javascript:void(0)">Contact Us</a></li>
					</ul>
				</div>
				<div class="our">
						<a href="javascript:void(0)" id="our-work" style="display:none">Our Works</a>
						<a href="javascript:void(0)" id="our-work-current" class="current" style="display:none">Our Works</a>
				</div>
                
                
            </div> <!-- end of header -->  
			
<?php /*
if(is_front_page() || (get_option('_247themes_frontpage_main_image_everywhere', 'false') == 'true')){
    $mainimg_which = get_option('_247themes_frontpage_main_image_which', 'slider');
    if ($mainimg_which == 'slider') {
        echo '
            <div class="slider_container" style="display:none">
                <div id="slider-wrapper" style=" float:left; clear:both;">
                   <div id="slider" class="nivoSlider">
        ';
                    // load slider images
                    $sl = get_posts(array(
                                'post_type' => '_247themes_slider',
                                'orderby'   => 'title',
                                'order'     => 'ASC',   
                          ));
                    foreach ($sl as $thispost) {
                        $link    = get_post_meta($thispost->ID, '_247themes_slider_url', true);
                        $caption = get_post_meta($thispost->ID, '_247themes_slider_caption', true);
                        $image   = wp_get_attachment_image_src(get_post_thumbnail_id($thispost->ID), 'full');
                        echo
                            (strlen($link) ? '<a href="'.$link.'">' : '').
                            '<img src="'.$image[0].'" alt=""'.(strlen($caption) ? ' title="'.$caption.'"' : '').'>'.
                            (strlen($link) ? '</a>' : '').
                            chr(10);
                    }
        echo '
            		</div>	
	        	</div>
			</div><!-- end of slider -->
        ';
        
        $vars = array('_247themes_slider_manualAdvance',
                      '_247themes_slider_captionOpacity',
                      '_247themes_slider_effect',
                      '_247themes_slider_animSpeed',
                      '_247themes_slider_pauseTime',
                      '_247themes_slider_pauseOnHover',
                      '_247themes_slider_directionNav',
                      '_247themes_slider_directionNavHide',
                      '_247themes_slider_prevText',
                      '_247themes_slider_nextText',
                      '_247themes_slider_controlNav',
                      '_247themes_slider_controlNavThumbs');
        $slider_options = array();
        foreach ($vars as $k) {
            $v = get_option($k, '');
            if ($k=='_247themes_slider_effect' || $k=='_247themes_slider_prevText' || $k=='_247themes_slider_nextText')
                $add_quotes = true;
            else
                $add_quotes = false;
            if ($v != '')   $slider_options[] = substr($k, 17).': '.($add_quotes? '\'' : '').$v.($add_quotes? '\'' : '');
        }
        echo '
            <script language="JavaScript">
            $(window).load(function() {$(\'#slider\').nivoSlider('.(count($slider_options) ? '{'.implode(','.chr(10), $slider_options).'}' : '').')});
            </script>
        ';
    }
    
    elseif ($mainimg_which == 'static') {
        echo '
            <img src="'.get_option('_247themes_frontpage_main_image_url', '').'">
        ';
    }
    
} */
?>
        
           <div class="featured-post">
              <?php if(is_front_page() && strlen(get_option('_247themes_frontpage_featured_category', ''))){
				$temp = $wp_query;
				$wp_query= null;
				$wp_query = new WP_Query();
				$wp_query->query('cat='.get_option('_247themes_frontpage_featured_category', '').'&showposts=3&paged='.$paged);
				?>
				<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
					<div class="content-blog">
						
                        <div class="title-featured_blog" style="float:left;">
                        <div class="img-title" style="float:left; width:52px; padding-right:5px;"><img class="pic-blog" src="<?php echo get_post_meta($thispost->ID, 'Icon', true);?>" width="52" align="left" hspace="10" /></div>
                        <div class="text-title" style="float:left; width:235px;">
						<a href="<?php the_permalink(); ?>" style="padding:0px; background:none;" >
                        <h3 style="color:#333;">
                        
						<?php the_title(); ?></h3></a></div>
                        </div>
						<?php the_excerpt(); ?>
									</div>
				<?php endwhile; ?>
				
				<?php $wp_query = null; $wp_query = $temp;?>
            
            
            <?php } ?>
             
            </div>	
			<div class="body_container">
