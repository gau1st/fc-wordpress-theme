<?php
// tables.php
// shortcode handler for tables

function _247themes_sc_table($tag, $atts, $content='', $code='') {
    if (count($atts)) {         // throw away first attribute if has fn name
        if ($atts[0] == $code)
            $atts = array_slice($atts, 1);
    }
    $ans = '<'.$tag;
    if (is_array($atts))
        foreach ($atts as $k=>$v)
            $ans.= ' '.$k.'="'.$v.'"';
    $ans.= '>'.do_shortcode($content).'</'.$tag.'>';
    return $ans;
}

// the actual table functions
function _247themes_sc_table_table($atts, $content='', $code='') {
    return _247themes_sc_table('table', $atts, $content, $code);
}
function _247themes_sc_table_thead($atts, $content='', $code='') {
    return _247themes_sc_table('thead', $atts, $content, $code);
}
function _247themes_sc_table_tbody($atts, $content='', $code='') {
    return _247themes_sc_table('tbody', $atts, $content, $code);
}
function _247themes_sc_table_tfoot($atts, $content='', $code='') {
    return _247themes_sc_table('tfoot', $atts, $content, $code);
}
function _247themes_sc_table_tr($atts, $content='', $code='') {
    return _247themes_sc_table('tr', $atts, $content, $code);
}
function _247themes_sc_table_th($atts, $content='', $code='') {
    return _247themes_sc_table('th', $atts, $content, $code);
}
function _247themes_sc_table_td($atts, $content='', $code='') {
    return _247themes_sc_table('td', $atts, $content, $code);
}

add_shortcode('table', '_247themes_sc_table_table');
add_shortcode('thead', '_247themes_sc_table_thead');
add_shortcode('tbody', '_247themes_sc_table_tbody');
add_shortcode('tfoot', '_247themes_sc_table_tfoot');
add_shortcode('tr', '_247themes_sc_table_tr');
add_shortcode('th', '_247themes_sc_table_th');
add_shortcode('td', '_247themes_sc_table_td');