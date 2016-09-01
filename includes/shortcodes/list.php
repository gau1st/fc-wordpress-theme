<?php
// list.php
// shortcode handler for lists

// attributes:
// - type       none, square, circle, disc(default), bullet,
//              number, decimal, alpha, upper-alpha, lower-alpha,
//              roman, upper-roman, lower-roman, 
//              dash, arrow-left, arrow-right, tag, folder, file, star, 
//              plus, minus, check
//              default disc
// - delimiter  default {lf}
//              separate into new list item if this string seq is detected
// - trim       default "yes"
//              trim <br /> from enclosed content and whitespace from list items

// example:
// [list]
// a
// b
// c
// d
// [/list]

// convert to list
function _247themes_sc_list($atts, $content=null, $code='') {
    if (count($atts)) {         // throw away first attribute if has fn name
        if ($atts[0] == $code)
            $atts = array_slice($atts, 1);
    }
    // initialize
    $available_ul_types = array('none', 'square', 'circle', 'disc');
    $available_ol_types = array(
                            'decimal', 'upper-alpha', 'lower-alpha',
                            'upper-roman', 'lower-roman'
                          );
    $available_custom_types = array(
                            'comment', 'arrow-left', 'arrow-right', 'tag',
                            'folder', 'file', 'star', 'plus', 'minus',
                            'check'
                          );
    $type_aliases = array(
                        'roman' => 'upper-roman',
                        'alpha' => 'lower-alpha',
                        'number'=> 'decimal',
                        'bullet'=> 'disc',
                        'arrow' => 'arrow-right'
                    );
    
    if (!isset($atts['type']))
        $type = 'disc';
    else
        $type = $atts['type'];
        
    // alias?
    if (in_array($type, array_keys($type_aliases)))
        $type = $type_aliases[$type];
        
    // undefined?
    if ((!in_array($type, $available_ul_types)) && 
        (!in_array($type, $available_ol_types)) &&
        (!in_array($type, $available_custom_types)))
            $type = 'disc';

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

    // detect list items
    $delim = (isset($atts['delimiter']) && strlen($atts['delimiter'])) ?
             $atts['delimiter'] : chr(10);
    $items = explode($delim, $content);
    if (count($items) <= 0)  return '';
    
    // trim all items, then prevent whitespace in first & last li
    if ($trim) {
        $items2 = array();
        foreach ($items as $li) {
            // supress <p>, </p> and <br /> at beginning or end of item
            if (substr($li, 0, 6) == '<br />')
                $li = substr($li, 6);
            if (substr($li, 0, 3) == '<p>')
                $li = substr($li, 3);
            if (substr($li, strlen($li)-6) == '<br />')
                $li = substr($li, 0, strlen($li)-6);
            if (substr($li, strlen($li)-4) == '</p>')
                $li = substr($li, 0, strlen($li)-4);
            $items2[] = trim($li);
        }
        $items = $items2;
    }
    if (!strlen(trim($items[0])))
        $items = array_slice($items, 1);
    if (count($items))
        if (!strlen(trim($items[count($items)-1])))
            $items = array_slice($items, 0, count($items)-1);
    if (!count($items))
        return '';
    
    // UL
    if (in_array($type, $available_ul_types)) {
        $ans = '<ul style="list-style-type: '.$type.';">'.chr(10);
        foreach ($items as $li)
            $ans.= '<li>'.do_shortcode($li).'</li>'.chr(10);
        $ans.= '</ul>';
    }
    
    // OL
    if (in_array($type, $available_ol_types)) {
        $ans = '<ol style="list-style-type: '.$type.';">'.chr(10);
        foreach ($items as $li)
            $ans.= '<li>'.do_shortcode($li).'</li>'.chr(10);
        $ans.= '</ol>';
    }
    
    // custom
    if (in_array($type, $available_custom_types)) {
        $ans = '<ul style="list-style-image: url('.get_bloginfo('template_url').'/images/list_bullets/'.$type.'.png);">'.chr(10);
        foreach ($items as $li)
            $ans.= '<li>'.do_shortcode($li).'</li>'.chr(10);
        $ans.= '</ul>';
    }
    
    return $ans;
}

add_shortcode('list', '_247themes_sc_list');