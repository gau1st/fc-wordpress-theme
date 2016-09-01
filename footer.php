<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?></div>

			<div class="widgetfooter_container" style="display:none;">
            <?php
				get_sidebar( 'footer' );
			?>
            </div>
		
        </div> 
        <div class="footer-text_container" style="display:none;">
        		<div class="footer-text">
                <?=get_option('_247themes_footer_text', '')?>
	            </div>
    	        <div class="footer-copyright">
            	<?=get_option('_247themes_copyright_text', '')?>
        	    </div>
        </div>
	</div>
</div>
	<div class="footer_container">
	<div class="wrapper" style="font-size:11px;">
		<div class="copyrights"><?=get_option('_247themes_copyright_text', '')?></div>
	</div>
	
        <div class="footer_old_website" style="margin-left:350px;margin-top:10px;width:140px;">
        <div class="wrapper">
		<a href="http://www.freshandcreative.com/ver1.html" style="font-size:11px;color:#64573e;">» See Our Old Website</a>
	</div>
        </div>
</div>

    
    
	<script type="text/javascript" src="http://freshandcreative.com/wp-content/themes/247one/js/site.js"></script>

    <script type="text/javascript">
<?php
/*
$vars = array('247themes_slider_manualAdvance',
              '247themes_slider_captionOpacity',
              '247themes_slider_effect',
              '247themes_slider_animSpeed',
              '247themes_slider_pauseTime',
              '247themes_slider_pauseOnHover',
              '247themes_slider_directionNav',
              '247themes_slider_directionNavHide',
              '247themes_slider_prevText',
              '247themes_slider_nextText',
              '247themes_slider_controlNav',
              '247themes_slider_controlNavThumbs');
$slider_options = array();
foreach ($vars as $k) {
    $v = get_option($k, '');
    if ($k=='247themes_slider_effect' || $k=='247themes_slider_prevText' || $k=='247themes_slider_nextText')
        $add_quotes = true;
    else
        $add_quotes = false;
    if ($v != '')   $slider_options[] = substr($k, 17).': '.($add_quotes? '\'' : '').$v.($add_quotes? '\'' : '');
}
echo '
    $(window).load(function() {$(\'#slider\').nivoSlider('.(count($slider_options) ? '{'.implode(','.chr(10), $slider_options).'}' : '').')});
';
*/
?>
    </script>
    
    

<?php
wp_footer();
$ga_id = get_option('247themes_google_analytics_id', '');
if (strlen($ga_id))
    echo '
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try{
var pageTracker = _gat._getTracker("'.$ga_id.'");
pageTracker._trackPageview();
} catch(err) {}</script>    
    ';
?>
</body>
</html>
