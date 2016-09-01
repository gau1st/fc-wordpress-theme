<?php
// latest.php
// latest shortcode handler
// show title and excerpt

// numberposts = -1 ==> show everything
// more = display "read more" link
function _247themes_sc_latest($attr) {
    global $shortname;
    extract(shortcode_atts(array(
        'category'      => '',
        'numberposts'   => 5,
        'orderby'       => 'post_date',
        'order'         => 'DESC',
        'more'          => 'yes',
        'thumbnails'    => 'yes'
    ), $attr));
    $search = array(
        'numberposts'     => $numberposts,
        'orderby'         => $orderby,
        'order'           => $order,
        'post_type'       => 'post',
        'post_status'     => 'publish' );
    if (strlen($category))
        $search['category'] = $category;
    $posts = get_posts($search); 
    
    $ans = '
        <ul class="'.$shortname.'_cycle">
    ';
    foreach ($posts as $p) {
        setup_postdata($p);
        $ans.= '
            <li>
                <div class="latestnews_title"><a href="'.get_permalink($p->ID).'">'.$p->post_title.'</a></div>'.
                ($thumbnails=='yes' ?  get_the_post_thumbnail($p->ID, 'thumbnail') : '').
                '<div>'.do_shortcode(_247themes_get_the_excerpt($p->ID)).'</div>
            </li>
        ';
    }
    $ans.= '
        </ul>
    ';
    if (strlen($category) && $more=='yes')
        $ans.= '<a href="'.get_category_link($category).'">Read more</a>';
    return $ans;
}

// numberposts: first number = item per page, second number = total posts to load
function _247themes_sc_cycle($attr) {
    global $shortname;

    extract(shortcode_atts(array(
        'category'      => '',
        'numberposts'   => "1, -1",
        'orderby'       => 'post_date',
        'order'         => 'DESC',
        'thumbnails'    => 'yes',
        'fx'            => 'fade',
        'delay'         => -4000
    ), $attr));
    if ($delay > 0) $delay = -1*intval($delay);     // cycle delay always negative

    // numberposts: 2 values
    if (strpos($numberposts, ',') !== false) {
        $tmp = explode(',', $numberposts);
        $posts_per_page = intval($numberposts[0]);
        $numberposts    = intval($numberposts[1]);
    }
    // single value
    else {
        $posts_per_page = 1;
        $numberposts    = intval($numberposts);
    }
    
    
    $search = array(
        'numberposts'     => $numberposts,
        'orderby'         => $orderby,
        'order'           => $order,
        'post_type'       => 'post',
        'post_status'     => 'publish' );
    if (strlen($category))
        $search['category'] = $category;
    $posts = get_posts($search); 
    
    $ans = '
        <ul class="'.$shortname.'_cycle">
    ';
    $i = 0;
    foreach ($posts as $p) {
        if ($i % $posts_per_page == 0)
            $ans.= '<li>';
        $ans.= '
            <div>
                <div class="cycle_title"><a href="'.get_permalink($p->ID).'">'.$p->post_title.'</a></div>'.
                ($thumbnails=='yes' ?  get_the_post_thumbnail($p->ID, 'thumbnail') : '').
                '<div>'.do_shortcode(_247themes_get_the_excerpt($p->ID)).'</div>
            </div>
        ';
        if ((($i % $posts_per_page) == ($posts_per_page -1)) || (($i+1)==count($posts)))
            $ans.= '</li>';
        $i++;
    }
    $ans.= '
        </ul>
    ';
    
    $ans.= '
<script language="JavaScript" src="'.get_bloginfo('template_url').'/jquery.cycle/jquery.cycle.all.min.js"></script>
<script language="JavaScript">
$(document).ready(function(){
    $(".'.$shortname.'_cycle").cycle({
        fx:      "'.$fx.'",
        delay:   '.$delay.',
		
    });
});
</script>
    ';
    return $ans; 
}

add_shortcode('latest', '_247themes_sc_latest');
add_shortcode('cycle', '_247themes_sc_cycle');
