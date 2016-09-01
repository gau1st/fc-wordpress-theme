<?php
// site.php
// shortcode handler for site info stuff

// print out the sitemap
function _247themes_sc_sitemap($atts, $content='', $code=''){
    return "<ul>".wp_list_pages('title_li=&echo=0')."</ul>";
}
add_shortcode('sitemap', '_247themes_sc_sitemap');

// print out site menu
function _247themes_sc_sitemenu($atts, $content='', $code='') {
    if (count($atts)) {         // throw away first attribute if has fn name
        if ($atts[0] == $code)
            $atts = array_slice($atts, 1);
    }
    extract(shortcode_atts(array( 'name' => null, ), $atts));
    return wp_nav_menu( array( 'menu' => $name, 'echo' => false ) );
}
add_shortcode('menu', '_247themes_sc_sitemenu');
