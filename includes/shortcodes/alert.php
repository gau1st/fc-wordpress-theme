<?php
// alert.php
// shortcode handler for alert boxes

// attributes:
// - type
// - color
// - bgcolor
// - trim       default true

function _247themes_sc_alert($atts, $content='', $code='') {
    if (count($atts)) {         // throw away first attribute if has fn name
        if ($atts[0] == $code)
            $atts = array_slice($atts, 1);
    }
    // initialize
    $type_aliases = array(
                        'information'   => array('info', 'tip'),
                        'error'         => array('err', 'halt'),
                        'question'      => array('help'),
                        'warning'       => array('warn'),
                        'important'     => array('notice')
                    );
    if (! isset($atts['type']))
        $type = 'information';
    else {
        foreach ($type_aliases as $t=>$aliases) {
            if ($atts['type'] == $t) { $type = $atts['type']; break; }
            foreach ($aliases as $a) {
                if ($atts['type'] == $a) {
                    $type = $t;
                    break 2;
                }
            }
        }
        if (! isset($type))
            $type = 'information';
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
    
    $ans = '
        <div class="alert '.$type.'"'.$strBgcolor.'>
     
            <p'.$strColor.' style="background:url('.get_bloginfo('template_url').'/images/icons/'.$type.'.png) no-repeat top left">
                '.do_shortcode($content).'
            </p>
        </div>
    ';
    return $ans;
}

add_shortcode('alert', '_247themes_sc_alert');