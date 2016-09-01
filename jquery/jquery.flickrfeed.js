// flickr feed reader v0.1
// copyright (c) 2011 247themes.com

(function( $ ){
  $.fn.flickrFeed = function( options ) {  

    var settings = {
        'url'           : 'http://api.flickr.com/services/feeds/photos_public.gne?format=json',
        'tagmode'       : 'all',
        'numberposts'   : '15',
        'dateformat'    : 'mmmm d yyyy HH:MM'
    };

    return this.each(function() {
        if ( options )  $.extend( settings, options );
        
        var $container = $(this);
        var myurl = settings['url'];
        if (settings['tagmode'])
            myurl+= '&tagmode='+settings['tagmode'];
        if (settings['userid'])
            myurl+= '&id='+settings['userid'];
        if (settings['tags'])
            myurl+= '&tags='+settings['tags'];
        myurl+= '&jsoncallback=?';
        
        if (settings['link'])
            if (settings['link'] != 'null')
                var link = settings['link'];
        
        if (settings['title'])
            $container.children('.flickr_feed_title').html((link ? '<a href="'+link+'" target="_blank">' : '')+settings['title']+(link ? '</a>' : ''));

        $.getJSON(myurl, function(data){
            if (!settings['title'])
                $container.children('.flickr_feed_title').html(data.title);
            if (!settings['link']) {
                var curtitle = $container.children('.flickr_feed_title').html();
                $container.children('.flickr_feed_title').html('<a href="'+data.link+'" target="_blank">' + curtitle + '</a>');
            }
            $ul = $container.children('ul.flickr_feed_content');
            $.each(data.items, function(i,item){
                if (settings['numberposts'])
                    if (i >= parseInt(settings['numberposts'])) return;
                var imgurl = item.media.m;
                if (settings['size'])
                    imgurl = imgurl.replace('_m.jpg', settings['size']+'.jpg');
                $("<img/>").attr("src", imgurl).appendTo($ul)
                  .wrap('<li class="flickr_feed_item"><a href="'+item.link+'"></a></li>');
            });
        });
        
    });

  };
})( jQuery );