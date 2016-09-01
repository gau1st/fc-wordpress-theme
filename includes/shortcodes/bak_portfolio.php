<?php
// portfolio.php
// portfolio shortcode handler

function _247themes_portfolio($attr) {
    global $shortname;
    extract(shortcode_atts(array(
        'category'  => '',
        'columns'   => 3,
        'orderby'   => 'post_date',
        'spacing'   => 0.4,             // width of whitespace as fraction of pic width
        'order'     => 'DESC',
        'more'      => 'yes',           // show "read more" link
        'link'      => 'yes'            // show "view" url link
    ), $attr));
    
    $search = get_posts(array(
                    'post_type' => $shortname.'_portfolio',
                    'category'  => $category,
                    'orderby'   => $orderby,
                    'order'     => $order
              ));
    
    // calculate width
    $itemwidth      = 100 / ((($columns-1) * $spacing) + $columns);
    $paddingwidth   = $itemwidth * $spacing;
    $itemwidth      = floor($itemwidth) . '%';
    $paddingwidth   = floor($paddingwidth) . '%';
    
    // return value
    $ans = '
        <div class="portfolio_viewer">
    ';
    $i = 0;
    foreach ($search as $thisp) {
        $thislink   = get_post_meta($thisp->ID, $shortname.'_portfolio_url', true);
        $image      = wp_get_attachment_image_src(get_post_thumbnail_id($thisp->ID), 'full');
        $i++;
        $ans.= '
            <div class="portfolio_item" style="float:left; width:'.$itemwidth.';'.($i < $columns ? ' padding-right:'.$paddingwidth.';' : '').'">
                <span class="portfolio_title">'.$thisp->post_title.'</span>
                <div class="portfolio_image"><img src="'.$image[0].'"></div>
        ';
        if ($more)
            $ans.= '<a class="portfolio_more" href="'.get_permalink($thisp->ID).'">Read more</a> ';
        if ($link && strlen($thislink))
            $ans.= '<a class="portfolio_link" href="'.$thislink.'">View</a>';
        $ans.= '
            </div>
        ';
        if ($i >= $columns)
            $i = 0;
    }
    $ans.= '
        <div class="portfolio_viewer">
    ';
    return $ans;
}

add_shortcode('portfolio', '_247themes_portfolio');

function _247themes_sc_portfolio_catlist($attr) {
    global $shortname;
    extract(shortcode_atts(array(
        'heading_prefix'    => 'List of clients by ',
        'orderby'           => 'name',
        'order'             => 'ASC',
        'hide_empty'        => 0,
        'categories'        => ''               // list categories by slug, comma sep
    ), $attr));
    
    $ans = '
    <script type="text/javascript">
    $(document).ready(function(){
        $(".portfolio_parent").click(function(){
            var term_id = $(this).attr("category");
            load_cat_panel(term_id);
            $(".content3 a.current").removeClass("current");
            $(this).addClass("current");
            return false;
        });

        $("#start-here").click(function(){
            var term_id = $(".content3 #parents_3").attr("category");
            load_cat_panel(term_id);
            $(".content3 a.current").removeClass("current");
            $(".content3 #parents_3").addClass("current");
            return false;
        });

        $("#about-us").click(function(){
            var term_id = $(".content3 #parents_3").attr("category");
            load_cat_panel(term_id);
            $(".content3 a.current").removeClass("current");
            $(".content3 #parents_3").addClass("current");
            return false;
        });

        $("#our-service").click(function(){
            var term_id = $(".content3 #parents_3").attr("category");
            load_cat_panel(term_id);
            $(".content3 a.current").removeClass("current");
            $(".content3 #parents_3").addClass("current");
            return false;
        });

        $("#contact-us").click(function(){
            var term_id = $(".content3 #parents_3").attr("category");
            load_cat_panel(term_id);
            $(".content3 a.current").removeClass("current");
            $(".content3 #parents_3").addClass("current");
            return false;
        });

        $(".portfolio_category ul li a").click(function(){
            var cat_id = $(this).attr("category");
            load_portfolios(cat_id);
            var $el_old = $(".portfolio_category ul li a.current");
            $el_old.removeClass("current");
            $(this).addClass("current");
            Cufon.replace($el_old, {fontFamily:"Aller", hover:"true"});
            return false;
        });

$(".img_frame_latest_work").click(function(){

   var cat_id = 30; 
   load_portfolios_latest(cat_id);
   load_portfolios_latest(cat_id);
   
   return false;
});

        function load_cat_panel(term_id) {
            $(".portfolios, .portfolio_desc, .portfolio_images").html("");
            var $el_old = $(".portfolio_category ul li a.current");
            $el_old.removeClass("current");
            Cufon.replace($el_old, {fontFamily:"Aller", hover:"true"});
            $(".portfolio_category:not([category="+term_id+"])").slideUp("fast", function(){
                $(".portfolio_category[category="+term_id+"]:hidden").slideDown();            
            });
        }
        
        function load_portfolios(cat_id) {
            $(".portfolio_desc, .portfolio_images").html("");
            var data = {category:cat_id, action:"load_portfolios"};
            $(".portfolios").html("");
            $.post("'.admin_url('admin-ajax.php').'", data,
                function(data) {
                    $(".portfolios").html(data);
                    Cufon.replace(".portfolios", { fontFamily: "Aller", hover: "true"});
                    $(".portfolios li a").click(function(){
                        var post_id    = $(this).attr("post_id");
                        var post_title = $(this).text();
                        $(".portfolio_desc").html("<h2>"+post_title+"</h2>"+$(this).attr("post_desc"));
                        Cufon.replace(".portfolio_desc", { fontFamily: "Aller", hover: "true"});
                        load_portfolio_images(post_id);
                        var $el_old = $(".portfolios li a.current2");
                        $el_old.removeClass("current2");
                        $(this).addClass("current2");
                        Cufon.replace($el_old, {fontFamily:"Aller", hover:"true"});
                        return false;
                    });
                });
        }

        function load_portfolios_latest(cat_id) {
            $(".portfolio_desc, .portfolio_images").html("");
            var data = {category:cat_id, action:"load_portfolios"};
            $(".portfolios").html("");
            $.post("'.admin_url('admin-ajax.php').'", data,
                function(data) {
                    $(".portfolios").html(data);
                        var $el_old = $(".portfolio_category ul li a.current");
                        $el_old.removeClass("current");   
                        $(".portfolio_category ul li #child_30").addClass("current");

                        var post_id    = $(".portfolios ul li #portfolio_113").attr("post_id");
                        var post_title = $(".portfolios ul li #portfolio_113").text();
                        $(".portfolio_desc").html("<h2>"+post_title+"</h2>"+$(".portfolios ul li #portfolio_113").attr("post_desc"));
                        Cufon.replace(".portfolio_desc", { fontFamily: "Aller", hover: "true"});
                        load_portfolio_images(post_id);

                        $("#portfolio_113").addClass("current2");
                        
                        Cufon.replace($el_old, {fontFamily:"Aller", hover:"true"});
                        Cufon.replace(".portfolios", { fontFamily: "Aller", hover: "true"});

                        
                     $(".portfolios li a").click(function(){
                        var post_id    = $(this).attr("post_id");
                        var post_title = $(this).text();
                        $(".portfolio_desc").html("<h2>"+post_title+"</h2>"+$(this).attr("post_desc"));
                        Cufon.replace(".portfolio_desc", { fontFamily: "Aller", hover: "true"});
                        load_portfolio_images(post_id);
                        var $el_old = $(".portfolios li a.current2");
                        $el_old.removeClass("current2");
                        $(this).addClass("current2");
                        Cufon.replace($el_old, {fontFamily:"Aller", hover:"true"});
                        return false;
                    });
                });
        }
        
        function load_portfolio_images(id) {
            var data = {post_id:id, action:"load_portfolio_images"};
            $(".portfolio_images").html("");
            $.post("'.admin_url('admin-ajax.php').'", data,
                function(data) {
                    $(".portfolio_images").html(data);
                });
        }
        
        // load the first parent category
        var $fp = $(".portfolio_parent:first");
        load_cat_panel($fp.attr("category"));
        $fp.addClass("current");
        
    });
    </script>
    ';
    
    $parents    = array();
    $panels     = array();
    $ans.= '<h3>'.$heading_prefix;
    $i = 0;
    foreach (explode(",", $categories) as $c) {
        $c = trim($c);
        $cat = get_term_by('slug', $c, $shortname.'_portfolio_category');
        $cats = get_categories(array(
            'taxonomy'  => $shortname.'_portfolio_category',
            'orderby'   => $orderby,
            'order'     => $order,
            'hide_empty'=> $hide_empty,
            'parent'    => $cat->term_id
        ));
        $cid = uniqid();
        $parents[] = '<a href="" class="portfolio_parent type" category="'.$cat->term_id.'" id="parents_'.$cat->term_id.'">'.$cat->name.'</a>';
        
        $thispanel = '
            <div class="portfolio_category container3" category="'.$cat->term_id.'" style="display:none;"><ul>';
        foreach ($cats as $child) {
            $thispanel.= '
                <li><a href="" category="'.$child->term_id.'" id="child_'.$child->term_id.'">'.$child->name.'</a></li>
            ';
        }
        $thispanel.= '
            </ul></div>';
        $panels[] = $thispanel;
        $i++;
    }
    
    $ans.= implode(' | ', $parents).'</h3><div class="work-cont">';
    $ans.= implode(chr(10), $panels);
    $ans.= '<div class="portfolios container3" style="height:320px;overflow-y:auto;"></div><div class="portfolio_desc container3" style="width:190px;"></div></div>';
    $ans.= '<div class="portfolio_images"></div>';    
    return $ans;
}

add_shortcode('portfoliocats', '_247themes_sc_portfolio_catlist');

// ajax load portfolios in a category
function _247themes_ajax_portfolios() {
    global $shortname;
    $cat_id = isset($_POST['category']) ? $_POST['category'] : '';
    $cat = get_term_by('id', $cat_id, $shortname.'_portfolio_category');
    $tmp = get_posts(array(
        'post_type'                         => $shortname.'_portfolio',
        $shortname.'_portfolio_category'    => $cat->slug,
        'numberposts'                       => -1,
        'orderby'                           => 'title',
        'order'                             => 'ASC'
    ));
    echo '<ul>';
    foreach ($tmp as $p) {
        echo '<li><a href="" post_id="'.$p->ID.'" post_desc="'.$p->post_content.'" id="portfolio_'.$p->ID.'">'.$p->post_title.'</a></li>';
    }
    echo '</ul>';
    die();
}

add_action('wp_ajax_load_portfolios', '_247themes_ajax_portfolios');
add_action('wp_ajax_nopriv_load_portfolios', '_247themes_ajax_portfolios');

// ajax load portfolio details for given id
function _247themes_ajax_portfolio_images() {
    global $shortname;
    $post_id = isset($_POST['post_id']) ? $_POST['post_id'] : '';
    // load images
    $attachments = get_children(array(
                        'post_parent'       => $post_id,
                        'post_status'       => 'inherit',
                        'post_type'         => 'attachment',
                        'post_mime_type'    => 'image'
                   ));
    if (!count(attachments)) die();
    echo '
    <script type="text/javascript">
    $(document).ready(function(){
        $(".slides").slides({
            preload: true,
            preloadImage: "'.get_bloginfo('template_url').'/jquery.slides/img/loading.gif",
            play: 4000,
            pause: 2500,
            hoverPause: true
		});
    });
    </script>
    <div class="slides" style="position:absolute; left:600px; top:-84px; width:452px; overflow:hidden;">
        <div style="width: 450px; height:320px; border: 1px solid #cccc99;">
        <div class="slides_container" style="width:450px; height:320px; overflow:hidden;">
    ';
    foreach ($attachments as $id=>$attachment) {
        $img = wp_get_attachment_image_src($id, 'large');    // image to show
        echo '<div style="width:450px; height:320px; overflow:hidden;"><img src="'.$img[0].'" width="auto" height="100%"></div>
        ';
    }
    echo '
        </div>
        </div>
    </div>
    ';
    die();
}

add_action('wp_ajax_load_portfolio_images', '_247themes_ajax_portfolio_images');
add_action('wp_ajax_nopriv_load_portfolio_images', '_247themes_ajax_portfolio_images');