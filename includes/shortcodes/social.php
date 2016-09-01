<?php
// social.php
// shortcode handler for social networking

// attributes:
// - screenname    required, screen name of twitter feed.  Default is id in social options
// - numberposts   show this many last posts, default 5
// - dateformat    javascript date format mask, default mmmm d yyyy HH:MM
// - title         Title of the tweet box.  Default is the channel description
// - link          Link to twitter updates page.  Default is channel link.  Set to null for no link
// - id            id of the div containing the tweets.  default null
function _247themes_sc_tw_feed($atts, $content='', $code='') {
    if (count($atts)) {         // throw away first attribute if has fn name
        if ($atts[0] == $code)
            $atts = array_slice($atts, 1);
    }
    extract(shortcode_atts(array(
        'numberposts'   => 5,
        'screenname'    => '',
        'dateformat'    => 'mmmm d yyyy HH:MM',
        'id'            => null,
        'title'         => null
    ), $atts));
    
    // if no screen name given, try option from db
    if (!strlen($screenname)) {
        global $shortname;
        $screenname = get_option($shortname.'_social_twitter', '');
        if (!strlen($screenname))   return '';      // give up
    }
    $numberposts = intval($numberposts);
    if ($numberposts <= 0)
        $numberposts = 5;

    global $shortname;
    if ($id===null)
        $id = $shortname.'_twitter_feed_'.uniqid();
    
    $options = array();
    if (isset($atts['link']))
        $options[] = 'link: "'.$atts['link'].'"';
    if (strlen($title))
        $options[] = 'title: "'.$atts['title'].'"';
    $options[] = 'screenname: "'.$screenname.'"';
    $options[] = 'dateformat: "'.$dateformat.'"';
    $options[] = 'numberposts: "'.$numberposts.'"';
    
    $ans = '
        <div class="twitter_feed" id="'.$id.'">
            <ul class="twitter_feed_content"></ul>
        </div>
        <script language="javascript">
            $(document).ready(function(){
                $("#'.$id.'").twitterFeed({'.implode(', ', $options).'});
            });
        </script>
    ';
        
    return $ans;
}

add_shortcode('tw_feed', '_247themes_sc_tw_feed');

// twitter 'tweet' button
// attributes
// - datacount      horizontal (default), vertical, none
// - datavia        user to be @ mentioned in the suggested Tweet, default is screnname in db
// - datarelated    related user account
// see https://twitter.com/about/resources/tweetbutton
function _247themes_sc_tw_button($atts, $content='', $code='') {
    if (count($atts)) {         // throw away first attribute if has fn name
        if ($atts[0] == $code)
            $atts = array_slice($atts, 1);
    }
    extract(shortcode_atts(array(
        'datacount'     => 'horizontal',
        'datavia'       => null,
        'datarelated'   => null
    ), $atts));
    
    $allowed_datacount = array('horizontal', 'vertical', 'none');
    if (!in_array($datacount, $allowed_datacount))
        $datacount = 'horizontal';
    
    $ans = '
        <a href="http://twitter.com/share" class="twitter-share-button" data-count="'.$datacount.'"'.(strlen($datavia) ? ' data-via="'.$datavia.'"' : '').(strlen($datarelated) ? ' data-related="'.$datarelated.'"' : '').'>Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>    
    ';
    return $ans;
}

add_shortcode('tw_button', '_247themes_sc_tw_button');


// twitter "follow" button
// attributes
// - screenname     twitter screen name, defaults to screen name in options table
function _247themes_sc_tw_follow($atts, $content='', $code='') {
    if (count($atts)) {         // throw away first attribute if has fn name
        if ($atts[0] == $code)
            $atts = array_slice($atts, 1);
    }
    extract(shortcode_atts(array(
        'screenname'     => get_option('247themes_social_twitter', '')
    ), $atts));
    
    if (!strlen($screenname))
        return '';
    
    return '<a class="twitter_follow" href="http://twitter.com/'.$screenname.'">follow us on twitter</a>';
}

add_shortcode('tw_follow', '_247themes_sc_tw_follow');


// facebook "like" button
// attributes
// - url        default: this page URL
// - layout     standard, button_count, box_count
// - send       show "send" button, default no
// - width      pixels, default 450, 90, 55 depending on layout
// - showfaces  display profile pic below buttons, default no
// see http://developers.facebook.com/docs/reference/plugins/like/
function _247themes_sc_fb_like($atts, $content='', $code='') {
    if (count($atts)) {         // throw away first attribute if has fn name
        if ($atts[0] == $code)
            $atts = array_slice($atts, 1);
    }
    extract(shortcode_atts(array(
        'url'           => 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],
        'layout'        => 'standard',
        'send'          => 'no',
        'width'         => null,
        'showfaces'     => 'no'
    ), $atts));
    
    $allowed_layouts = array('standard'=>450, 'button_count'=>90, 'box_count'=>55);
    if (!in_array($layout, array_keys($allowed_layouts)))
        $layout = 'standard';
    if ($width===null)
        $width = $allowed_layouts[$layout];
    if (!strlen($url)) return '';
    if (($send=='yes')||($send=='true'))
        $send = 'true';
    else
        $send = 'false';
    if (($showfaces=='yes')||($showfaces=='true'))
        $showfaces = 'true';
    else
        $showfaces = 'false';
    
    $ans = '<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="'.$url.'" layout="'.$layout.'" send="'.$send.'" width="'.$width.'" show_faces="'.$showfaces.'" font=""></fb:like>';
    return $ans;
}

add_shortcode('fb_like', '_247themes_sc_fb_like');

// facebook comment
// attributes
// - url            default: this page URL
// - numberposts    how many comments to show.  Default=5
// - width          pixels, default 500
// - scheme         light/dark, default light
function _247themes_sc_fb_comment($atts, $content='', $code='') {
    if (count($atts)) {         // throw away first attribute if has fn name
        if ($atts[0] == $code)
            $atts = array_slice($atts, 1);
    }
    extract(shortcode_atts(array(
        'url'           => 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],
        'numberposts'   => 5,
        'width'         => 500,
        'scheme'        => 'light'
    ), $atts));
    if (!strlen($url)) return '';
    $ans = '<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:comments href="'.$url.'" num_posts="'.intval($numberposts).'" width="'.intval($width).'"></fb:comments>';
    return $ans;
}

add_shortcode('fb_comment', '_247themes_sc_fb_comment');


// facebook "follow" button
// attributes
// - pageid         facebook page id, defaults to id in options table
function _247themes_sc_fb_follow($atts, $content='', $code='') {
    if (count($atts)) {         // throw away first attribute if has fn name
        if ($atts[0] == $code)
            $atts = array_slice($atts, 1);
    }
    extract(shortcode_atts(array(
        'pageid'     => get_option('247themes_social_facebook', '')
    ), $atts));
    
    if (!strlen($pageid))
        return '';
    
    return '<a class="facebook_follow" href="http://facebook.com/'.$pageid.'">follow us on facebook</a>';
}

add_shortcode('fb_follow', '_247themes_sc_fb_follow');


// flickr latest
// attributes
// - title          title to show on the box. Default is the feed title
// - userid         user ID(s) to access. optional.  Default is "all users"
// - numberposts    how many pics to show, default 15
// - size           75, 100, 240, 500, 640, s (default), t, m, z
// - tags           optional, comma delimited
// - tagmode        set whether photos need 'all' or 'any' tags, default 'all'
// - id             container div id
// - link           Link to photostream.  Default is channel link.  Set to null for no link
// see http://www.flickr.com/services/feeds/docs/photos_public/ for more information
function _247themes_sc_fl_feed($atts, $content='', $code='') {
    if (count($atts)) {         // throw away first attribute if has fn name
        if ($atts[0] == $code)
            $atts = array_slice($atts, 1);
    }
    extract(shortcode_atts(array(
        'title'         => null,
        'userid'        => null,
        'size'          => 's',
        'tags'          => null,
        'tagmode'       => 'all',
        'numberposts'   => 15,
        'id'            => null
    ), $atts));
    
    $size_aliases = array(
        '75'  => '_s',
        '100' => '_t',
        '240' => '_m',
        '500' => '',
        '640' => '_z',
        's'   => '_s',
        't'   => '_t',
        'm'   => '_m',
        'z'   => '_z'
    );
    if (in_array($size, array_keys($size_aliases)))
        $size = $size_aliases[$size];
    else
        $size = '_s';
    if ($tagmode != 'any')
        $tagmode = 'all';
    global $shortname;
    if ($id===null)
        $id = $shortname.'_flickr_feed_'.uniqid();
    
    $options = array();
    if (isset($atts['link']))
        $options[] = 'link: "'.$atts['link'].'"';
    if (strlen($title))
        $options[] = 'title: "'.$title.'"';
    if (strlen($userid))
        $options[] = 'userid: "'.$userid.'"';
    if (strlen($tags))
        $options[] = 'tags: "'.$tags.'"';
    $options[] = 'tagmode: "'.$tagmode.'"';
    $options[] = 'numberposts: "'.intval($numberposts).'"';
    $options[] = 'size: "'.$size.'"';

    $ans = '
        <div class="flickr_feed" id="'.$id.'">
            <span class="flickr_feed_title"></span>
            <ul class="flickr_feed_content"></ul>
        </div>
        <script language="javascript">
            $(document).ready(function(){
                $("#'.$id.'").flickrFeed({'.implode(', ', $options).'});
            });
        </script>
    ';
    
    return $ans;
}

add_shortcode('fl_feed', '_247themes_sc_fl_feed');


// flickr "follow" button
// attributes
// - userid         flickr userid, defaults to user id in options table
function _247themes_sc_fl_follow($atts, $content='', $code='') {
    if (count($atts)) {         // throw away first attribute if has fn name
        if ($atts[0] == $code)
            $atts = array_slice($atts, 1);
    }
    extract(shortcode_atts(array(
        'userid'     => get_option('247themes_social_flickr', '')
    ), $atts));
    
    if (!strlen($userid))
        return '';
    
    return '<a class="flickr_follow" href="http://www.flickr.com/photos/'.$userid.'">follow us on flickr</a>';
}

add_shortcode('fl_follow', '_247themes_sc_fl_follow');

// google +1 button
// attributes
// - size       small, standard (default), medium, tall
function _247themes_sc_g_plusone($atts, $content='', $code='') { 
    if (count($atts)) {         // throw away first attribute if has fn name
        if ($atts[0] == $code)
            $atts = array_slice($atts, 1);
    }
    extract(shortcode_atts(array(
        'size'          => 'standard'
    ), $atts));

    $allowed_sizes = array('small', 'standard', '', 'medium', 'tall');
    if (!in_array($size, $allowed_sizes))
        $size = '';
    if ($size=='standard')
        $size = '';
    
    $ans = '<g:plusone'.(strlen($size) ? ' size="'.$size.'"' : '').'></g:plusone>';
    return $ans;
}

add_shortcode('g_plusone', '_247themes_sc_g_plusone');