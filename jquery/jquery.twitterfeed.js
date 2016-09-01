// twitter feed reader v0.1
// copyright (c) 2011 247themes.com

(function( $ ){
  $.fn.twitterFeed = function( options ) {
    var settings = {
        'url'           : 'https://api.twitter.com/1/statuses/user_timeline.json?include_rts=true',
        'numberposts'   : 5,
        'dateformat'    : 'mmmm d yyyy HH:MM'
    };
    
    return this.each(function() {
        if ( options )  $.extend( settings, options );
        
        var $container = $(this);
        var myurl = settings['url'];
        if (settings['screenname'])
            myurl+= '&screen_name='+settings['screenname'];
        if (settings['numberposts'])
            myurl+= '&count='+parseInt(settings['numberposts']);
        myurl+= '&callback=?';
                        
        $.getJSON(myurl, function(data){
            $ul = $container.children('ul.twitter_feed_content');
            $.each(data, function(i, item) {
                $ul.append('<li class="twitter_update"><a href="http://twitter.com/'+settings['screenname']+'/status/'+item.id_str+'">'+item.text+'</a></li>');
            });
        });
    });
  };
})( jQuery );