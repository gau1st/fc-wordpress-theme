<?php
// options_social.php
//
// social media options

if (!isset($shortname)) exit;

// initialize vars
$vars = array($shortname.'_social_twitter',
              $shortname.'_social_facebook',
              $shortname.'_social_flickr',
              $shortname.'_social_fb_share_show',
              $shortname.'_social_tw_share_show',
              $shortname.'_social_g_plusone_show',
              $shortname.'_social_li_share_show',
              $shortname.'_social_buttons_below_post');

// process form submission
if (isset ($_POST[$shortname.'_action'])) {
    if (!isset($_POST[$shortname.'_social_fb_share_show']))
        $_POST[$shortname.'_social_fb_share_show'] = 'false';
    if (!isset($_POST[$shortname.'_social_tw_share_show']))
        $_POST[$shortname.'_social_tw_share_show'] = 'false';
    if (!isset($_POST[$shortname.'_social_g_plusone_show']))
        $_POST[$shortname.'_social_g_plusone_show'] = 'false';
    if (!isset($_POST[$shortname.'_social_li_share_show']))
        $_POST[$shortname.'_social_li_share_show'] = 'false';
    if (!isset($_POST[$shortname.'_social_buttons_below_post']))
        $_POST[$shortname.'_social_buttons_below_post'] = 'false';
    foreach ($vars as $var) {
        if (isset($_POST[$var]))
            update_option($var, $_POST[$var]);
        else
            delete_option($var);
    }
    echo '<div id="message" class="updated fade"><p>Social media options saved</p></div>';
}
?>
<link rel="stylesheet" type="text/css" href="<?=bloginfo('template_directory')?>/includes/admin/<?=$shortname?>_admin.css">
<div class="admin-con247 wrap">
<h2>Social Media Options</h2>
<form method="POST">
<table class="form-table">
<tr><td colspan="2"><h3>Public Sites</h3></td></tr>
<tr>
<td width="200"> Facebook Page </td>
<td><span> http://facebook.com/ </span><br>
    <input class="input_text" type="text" name="<?=$shortname?>_social_facebook" value="<?=get_option($shortname.'_social_facebook', '')?>">
    </td>
</tr>
<tr>
<td> Twitter </td>
<td> <span> http://twitter.com/ </span><br />
   <input class="input_text" type="text" name="<?=$shortname?>_social_twitter" value="<?=get_option($shortname.'_social_twitter', '')?>">
</td>  
 </tr>
<tr>
    <td> Flickr ID </td>
    <td> 
        <span> http://www.flickr.com/ </span><br>
        <input class="input_text" type="text" name="<?=$shortname?>_social_flickr" value="<?=get_option($shortname.'_social_flickr', '')?>"><br>
        <span> e.g. "12345678@N00" </span>
</tr>
<tr><td colspan="2"><h3>Sharing</h3></td></tr>
<tr>
    <td> Activate sharing for </td>
    <td>
        <input type="checkbox" name="<?=$shortname?>_social_fb_share_show" value="true"<?=get_option($shortname.'_social_fb_share_show', 'true')=='true' ? ' checked' : ''?>>
        Facebook<br />
        <input type="checkbox" name="<?=$shortname?>_social_tw_share_show" value="true"<?=get_option($shortname.'_social_tw_share_show', 'true')=='true' ? ' checked' : ''?>>
        Twitter<br />
        <input type="checkbox" name="<?=$shortname?>_social_g_plusone_show" value="true"<?=get_option($shortname.'_social_g_plusone_show', 'true')=='true' ? ' checked' : ''?>>
        Google +1<br />
        <input type="checkbox" name="<?=$shortname?>_social_li_share_show" value="true"<?=get_option($shortname.'_social_li_share_show', 'true')=='true' ? ' checked' : ''?>>
        LinkedIn
    </td>
</tr>
<tr>
    <td> Display buttons </td>
    <td>
        <input type="checkbox" name="<?=$shortname?>_social_buttons_below_post" value="true"<?=get_option($shortname.'_social_buttons_below_post', 'false')=='true' ? ' checked' : ''?>>
        Below posts
    </td>
</tr>
<tr>
<td colspan="2">   
    <input type="hidden" name="<?=$shortname?>_action" value="save"><br />
    <input type="submit" value="Save">
</td>
</tr>
</table>
</form>
</div>