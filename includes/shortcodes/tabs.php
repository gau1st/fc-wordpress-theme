<?php
// tabs.php
// shortcode handler for making tabs

// attributes:
// - titles  => "Tab 1, Tab 2, Tab 3"
//               titles for the tabs
// - delimiter => default "end;"
//                separate into new tab if this string seq is detected
// - trim      => default "yes"
//                trim <br /> from enclosed content and whitespace from tab panels

function _247themes_sc_tabs($atts, $content=null, $code='') {
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

    // detect tabs
    $delim = (isset($atts['delimiter']) && strlen($atts['delimiter'])) ?
             $atts['delimiter'] : 'end;';
    $tabs = explode($delim, $content);
    if (count($tabs) <= 0)  return '';
        
    // prevent whitespace in last tab
    if (!strlen(trim($tabs[count($tabs)-1])))
        $tabs = array_slice($tabs, 0, count($tabs)-1);

    // tab titles
    if (isset($atts['title']) && (! isset($atts['titles'])))
        $atts['titles'] = $atts['title'];
    $titles = (isset($atts['titles']) && strlen($atts['titles'])) ?
              $atts['titles'] : '';
    $titles = strlen(trim($titles)) ? explode(',', $titles) : array();
    $titles2 = array();     $i = 1;
    foreach ($tabs as $tab) {
        if (isset($titles[$i-1]))
            $titles2[] = trim($titles[$i-1]);
        else
            $titles2[] = 'Tab '.$i;
        $i++;
    }
        
    // output string
    $tabID = uniqid();
    $ans = '
        <div class="tabs" id="tabs_'.$tabID.'">
            <ul>';
    $i = 1;
    foreach ($titles2 as $t) {
        $ans.= '
                <li><a href="#tabs_'.$tabID.'-'.$i.'">'.$t.'</a></li>';
        $i++;
    }
    $ans.= '
            </ul>
    ';
    $i = 1;
    foreach ($tabs as $t) {
        if ($trim) {
            $t = trim($t);
            if (substr($t, 0, 6) == '<br />')
                $t = substr($t, 6);
            if (substr($t, strlen($t)-6) == '<br />')
                $t = substr($t, 0, strlen($t)-6);
        }
        $ans.= '
            <div id="tabs_'.$tabID.'-'.$i.'">
            '.do_shortcode($trim ? trim($t) : $t).'
            </div>';
        $i++;
    }
    $ans.= '
        </div>
        <script language="JavaScript">
        $(document).ready(function(){
            $("#tabs_'.$tabID.'").tabs();
        });
        </script>
    ';
        
    return $ans;
}

add_shortcode('tabs', '_247themes_sc_tabs');
