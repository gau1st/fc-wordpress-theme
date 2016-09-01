<?php
// button.php
// shortcode handler for button

// attributes:
// - size       small, medium (default), large
// - bgcolor    
// - link       

function _247themes_sc_button($atts, $content='', $code='') {
    if (count($atts)) {         // throw away first attribute if has fn name
        if ($atts[0] == $code)
            $atts = array_slice($atts, 1);
    }
    
    extract(shortcode_atts(array(
        'size'          => 'medium',
        'bgcolor'       => null,
        'link'          => null
    ), $atts));
    
    // has link?
    if (!strlen($link))
        $link = 'javascript:return false';
    
    // size
    if (!in_array($size, array('small', 'medium', 'large')))
        $size = 'medium';
        
    $ans = '<div class="button_link button_link_'.$size.'"'.(strlen($bgcolor) ? ' style="background-color:'.$bgcolor.'"' : '').'><a href="'.$link.'" class="ui-corner-all">'.do_shortcode($content).'</a></div>';
    return $ans;
}

add_shortcode('button', '_247themes_sc_button');