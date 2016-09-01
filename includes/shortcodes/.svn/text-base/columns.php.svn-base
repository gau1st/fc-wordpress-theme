<?php
// columns.php
// shortcode handler for making columns

// attributes:
// - colspan  => "1,2,3"
//               proportionally adjust the col widths
// - delimiter => default "end;"
//                separate into new column if this string seq is detected
// - trim      => default "yes"
//                trim <br /> from enclosed content and whitespace from columns

function _247themes_sc_columns($atts, $content=null, $code='') {
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

    // detect columns
    $delim = (isset($atts['delimiter']) && strlen($atts['delimiter'])) ?
             $atts['delimiter'] : 'end;';
    $cols = explode($delim, $content);
    if (count($cols) <= 0)  return '';
        
    // prevent whitespace in last col
    if (!strlen(trim($cols[count($cols)-1])))
        $cols = array_slice($cols, 0, count($cols)-1);
    
    // calculate widths
    $colspan = (isset($atts['colspan']) && strlen($atts['colspan'])) ?
               $atts['colspan'] : '1';
    $colspan = explode(',', $colspan);
    $colspan2 = array();
    $i = 0;
    foreach ($cols as $col) {
        $w = intval($colspan[min(count($colspan)-1, $i)]);
        if ($w <= 0) $w = 1;
        $colspan2[] = $w;
        $i++;
    }
    $colspan = array();
    foreach ($colspan2 as $s)
        $colspan[] = round(100 * $s / array_sum($colspan2));
    if (array_sum($colspan) < 100)
        $colspan[0] += 1;
    
    // output string
    $ans = '';
    $i = 0;
    foreach ($cols as $col) {
        if ($trim) {
            $col = trim($col);
            if (substr($col, 0, 6) == '<br />')
                $col = substr($col, 6);
            if (substr($col, strlen($col)-6) == '<br />')
                $col = substr($col, 0, strlen($col)-6);
        }
		$divClass = array();
		if ($i==0) 					$divClass[] = 'col-first';
		if (($i+1)==count($cols))    $divClass[] = 'col-last';
        $ans.= '<div class="colsdiv '.implode(' ', $divClass).'" style="float:left; clear:none; width:'.$colspan[$i].'%"><div>'.do_shortcode($col).'</div></div>'.chr(10);
        $i++;
    }
    $ans.= '<br style="clear:both;">';
    
    return $ans;
}

add_shortcode('cols', '_247themes_sc_columns');