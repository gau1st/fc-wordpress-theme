<?php 
// accordion.php
// shortcode handler for making accordion

// attributes:
// - titles  => "Section 1, Section 2, Section 3"
//               titles for the accordion sections
// - delimiter => default "end;"
//                separate into new tab if this string seq is detected
// - trim      => default "yes"
//                trim <br /> from enclosed content and whitespace from accordion section panels

function _247themes_sc_accordion($atts, $content=null, $code='') {
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
    $sections = explode($delim, $content);
    if (count($sections) <= 0)  return '';
        
    // prevent whitespace in last section
    if (!strlen(trim($sections[count($sections)-1])))
        $sections = array_slice($sections, 0, count($sections)-1);

    // section titles
    $titles = (isset($atts['titles']) && strlen($atts['titles'])) ?
              $atts['titles'] : '';
    $titles = strlen(trim($titles)) ? explode(',', $titles) : array();
    $titles2 = array();     $i = 1;
    foreach ($sections as $section) {
        if (isset($titles[$i-1]))
            $titles2[] = trim($titles[$i-1]);
        else
            $titles2[] = 'Section '.$i;
        $i++;
    }
        
    // output string
    $accID = uniqid();
    $ans = '
        <div class="accordion" id="accordion_'.$accID.'">';
    $i = 0;
    foreach ($sections as $s) {
        if ($trim) {
            $s = trim($s);
            if (substr($s, 0, 6) == '<br />')
                $s = substr($s, 6);
            if (substr($s, strlen($s)-6) == '<br />')
                $s = substr($s, 0, strlen($s)-6);
        }
        $ans.= '
            <div><a href="#">'.$titles2[$i].'</a></div>
            <div>
            '.do_shortcode($trim ? trim($s) : $s).'
            </div>';
        $i++;
    }
    $ans.= '
        </div>
        <script language="JavaScript">
        $(document).ready(function(){
            $("#accordion_'.$accID.'").accordion();
        });
        </script>
    ';
        
    return $ans;
}

add_shortcode('accordion', '_247themes_sc_accordion');