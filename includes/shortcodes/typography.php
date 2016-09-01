<?php
// typography.php
// shortcode handler for making typography stuff

// attributes:
// - bgstyle  => "1, 2, 3"
//               titles for the accordion sections
// - bgcolor  => requires bgstyle
// - color    => text color
function _247themes_sc_dropcap($atts, $content=null, $code='') {
    // background styles
    $bgstyles_available = array('1', '2', '3');
    
    if (count($atts)) {         // throw away first attribute if has fn name
        if ($atts[0] == $code)
            $atts = array_slice($atts, 1);
    }
    extract(shortcode_atts(array(
        'bgstyle'   => null,
        'bgcolor'   => null,
        'color'     => null
    ), $atts));
    
    if (!in_array($bgstyle, $bgstyles_available))
        $bgstyle = null;
    $strStyle = '';
    if (strlen($bgstyle)) {
        $strStyle.= 'background-image:url('.get_bloginfo('template_url').'/images/dropcap/bg'.$bgstyle.'.png); background-repeat: no-repeat; ';
        if (strlen($bgcolor))
            $strStyle.= 'background-color: '.$bgcolor.'; ';
    }
    if (strlen($color))
        $strStyle.= 'color: '.$color.'; ';
	$ans = '<span class="dropcap"'.(strlen($strStyle) ? ' style="'.$strStyle.'"' : '').'>'.$content.'</span>';
    return $ans;
}

add_shortcode('dropcap', '_247themes_sc_dropcap');

// headings
function _247themes_sc_headings($number, $atts, $content=null, $code='') {
    if (count($atts)) {         // throw away first attribute if has fn name
        if ($atts[0] == $code)
            $atts = array_slice($atts, 1);
    }
    $ans = '<h'.$number;

    if (is_array($atts))
        foreach ($atts as $k=>$v)
            $ans.= ' '.$k.'="'.$v.'"';
    $ans.= '>'.do_shortcode($content).'</h'.$number.'>';
    return $ans;
}
// attributes:
// whatever attributes is echoed to the actual tag
function _247themes_sc_h1($atts, $content=null, $code='') {
    return _247themes_sc_headings(1, $atts, $content, $code);
}
function _247themes_sc_h2($atts, $content=null, $code='') {
    return _247themes_sc_headings(2, $atts, $content, $code);
}
function _247themes_sc_h3($atts, $content=null, $code='') {
    return _247themes_sc_headings(3, $atts, $content, $code);
}
function _247themes_sc_h4($atts, $content=null, $code='') {
    return _247themes_sc_headings(4, $atts, $content, $code);
}
function _247themes_sc_h5($atts, $content=null, $code='') {
    return _247themes_sc_headings(5, $atts, $content, $code);
}
function _247themes_sc_h6($atts, $content=null, $code='') {
    return _247themes_sc_headings(6, $atts, $content, $code);
}

add_shortcode('h1', '_247themes_sc_h1');
add_shortcode('h2', '_247themes_sc_h2');
add_shortcode('h3', '_247themes_sc_h3');
add_shortcode('h4', '_247themes_sc_h4');
add_shortcode('h5', '_247themes_sc_h5');
add_shortcode('h6', '_247themes_sc_h6');

// blockquote
function _247themes_sc_blockquote($atts, $content=null, $code='') {
    if (count($atts)) {         // throw away first attribute if has fn name
        if ($atts[0] == $code)
            $atts = array_slice($atts, 1);
    }
    $ans = '<blockquote';
    foreach ($atts as $k=>$v)
        $ans.= ' '.$k.'="'.$v.'"';
    $ans.= '>'.do_shortcode($content).'</blockquote>';
    return $ans;
}

add_shortcode('blockquote', '_247themes_sc_blockquote');