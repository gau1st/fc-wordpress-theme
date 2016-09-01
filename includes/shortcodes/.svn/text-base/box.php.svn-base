<?php
// box.php
// shortcode handler for text boxes

// attributes:
// - title
// - bgcolor
// - trim       default true

function _247themes_sc_box($atts, $content='', $code='') {
    if (count($atts)) {         // throw away first attribute if has fn name
        if ($atts[0] == $code)
            $atts = array_slice($atts, 1);
    }
    // trim line breaks
    if (!isset($atts['trim']))
        $trim = true;
    elseif (($atts['trim']=='true') || ($atts['trim']=='yes'))
        $trim = true;
    else
        $trim = false;
    if ($trim) {
        $content = trim($content);
        if (substr($content, 0, 6) == '<br />')
            $content = substr($content, 6);
        if (substr($content, strlen($content)-6) == '<br />')
            $content = substr($content, 0, strlen($content)-6);
    }
    
    // has color?
    $strBgcolor = '';
    if (isset($atts['bgcolor']))
        $strBgcolor = ' style="background-color: '.$atts['bgcolor'].'"';
    $strColor = '';
    if (isset($atts['color']))
        $strColor = ' style="color: '.$atts['color'].'"';
    $ans = '<div class="box"'.$strBgcolor.'>';
    // has title?
    if (isset($atts['title']));
        $ans.= '<span class="box_title">'.$atts['title'].'</span>';
    $ans.= '<span class="box_content"'.$strColor.'>'.do_shortcode($content).'</span>';
    $ans.= '</div>';
    
    return $ans;
}

add_shortcode('box', '_247themes_sc_box');