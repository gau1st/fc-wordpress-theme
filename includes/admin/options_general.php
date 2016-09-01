<?php
// options_general.php
//
// general options

if (!isset($shortname)) exit;

// initialize vars
$vars = array($shortname.'_background_color',
              $shortname.'_background_image_which',                 // 'none', 'url'
              $shortname.'_background_image_url',
              $shortname.'_background_image_repeat',                // 'repeat'
              $shortname.'_background_image_attachment',            // 'scroll', 'fixed'
              $shortname.'_favicon_use_custom',                     // 'true', 'false'
              $shortname.'_favicon_url',                            // leave blank if not using custom favicon
              $shortname.'_frontpage_main_image_everywhere',        // use main image in frontpage everywhere
              $shortname.'_logo_which',                             // 'url', 'text'
              $shortname.'_logo_text',
              $shortname.'_logo_font_size',
              $shortname.'_logo_font_color',
              $shortname.'_logo_tagline',
              $shortname.'_logo_image_url',
              $shortname.'_footer_text',
              $shortname.'_copyright_text',
              $shortname.'_excerpt_length',
              $shortname.'_cat_page_layout',
              $shortname.'_google_analytics_id',
              $shortname.'_favicon_which',
              $shortname.'_favicon_image_url',
              $shortname.'_header_where',                           // 'homepage' or '__all'
              $shortname.'_font_face',
              $shortname.'_font_size'
              );
$cat_page_layouts = array(
                        'rightsidebar'              => "2 Columns, right sidebar",
                        'leftsidebar'               => "2 Columns, left sidebar",
                        'rightnavmenu'              => "2 Columns, right navigation menu",
                        'leftnavmenu'               => "2 Columns, left navigation menu",
                        'threecolumn-rightsidebar'  => "3 Columns, left nav + right sidebar",
                        'threecolumn-leftsidebar'   => "3 Columns, left sidebar + right nav",
                        'nosidebar'                 => "1 Column, content only"
                    );
$font_faces = array('Arial', 'Verdana', 'Tahoma', 'Helvetica', 'Georgia', 'MS Comic Sans');
$font_sizes = array('7px', '7.5px', '8px', '8.5px', '9px', '10px', '11px', '12px', '14px', '16px', '18px', '21px', '24px');
$logo_font_faces = array('Arial', 'Verdana', 'Tahoma', 'Helvetica', 'Georgia', 'MS Comic Sans');
$logo_font_sizes = array('21px', '24px', '28px', '32px', '37px', '42px', '46px', '54px', '62px');
$bgimage = array(
    'images/bg/curly1.png',
    'images/bg/diagonal1.png',
    'images/bg/diagonal2.png',
    'images/bg/diagonal3.png',
    'images/bg/diagonal4.png',
    'images/bg/object2.png',
    'images/bg/object3.png',
    'images/bg/object4.png',
    'images/bg/object5.png',
    'images/bg/object6.png',
    'images/bg/object7.png',
    'images/bg/object8.png'
);


// process form submission
if (isset ($_POST[$shortname.'_action'])) {
    if (!isset($_POST[$shortname.'_background_image_attachment']))
        $_POST[$shortname.'_background_image_attachment'] = 'scroll';
    if (! in_array($_POST[$shortname.'_cat_page_layout'], array_keys($cat_page_layouts))) {
        $_POST[$shortname.'_cat_page_layout'] = 'rightsidebar';
    }
    foreach ($vars as $var) {
        if (isset($_POST[$var]))
            update_option($var, $_POST[$var]);
        else
            delete_option($var);
    }
    echo '<div id="message" class="updated fade"><p>General options saved</p></div>';
}

// which?
$bg_which   = get_option($shortname.'_background_image_which', 'none');         // bg image
$logo_which = get_option($shortname.'_logo_which', 'text');                     // logo
?>
<script language="JavaScript" src="<?=bloginfo('template_directory')?>/includes/admin/miniColors/jquery.miniColors.min.js"></script>
<script language="JavaScript">
jQuery(document).ready(function(){
    jQuery('#background_image_preset img').each(function(){
        if (jQuery(this).attr('src') == jQuery('#<?=$shortname?>_background_image_url').val())
            jQuery(this).closest('.bg_container').addClass('background_image_preset_selected');
    });
    jQuery('#<?=$shortname?>_background_color').miniColors();
    jQuery('#<?=$shortname?>_logo_font_color').miniColors();
    jQuery('#background_image_preset img').click(function(){
        var imgurl = jQuery(this).attr('src');
        jQuery('.background_image_preset_selected').removeClass('background_image_preset_selected');
        jQuery(this).closest('.bg_container').addClass('background_image_preset_selected');
        jQuery('#<?=$shortname?>_background_image_url').val(imgurl);
        jQuery('#<?=$shortname?>_background_image_which_url').attr('checked', true);
        jQuery('#<?=$shortname?>_background_image_repeat').attr('checked', true);
        jQuery('#<?=$shortname?>_background_image_attachment').attr('checked', false);
    });
    jQuery('#<?=$shortname?>_background_image_url').keydown(function(){
        jQuery('.background_image_preset_selected').removeClass('background_image_preset_selected');
    });
    
    // upload image button
    var formfield = '';
    jQuery('.btn_image_upload').click(function() {
        formfield = jQuery(this).attr('id').replace(/_upload/i, '_url');
        tb_show('', 'media-upload.php?type=image&TB_iframe=true');
        return false;
    });
    window.send_to_editor = function(html) {
        imgurl = jQuery('img',html).attr('src');
        jQuery('#'+formfield).val(imgurl);
        var which_btn = formfield.replace(/_url/i, '_which');
        jQuery('#'+which_btn+'[value="url"]').attr('checked', true);
        formfield = '';
        tb_remove();
    }
});
</script>
<link rel="stylesheet" type="text/css" href="<?=bloginfo('template_directory')?>/includes/admin/<?=$shortname?>_admin.css">
<link rel="stylesheet" type="text/css" href="<?=bloginfo('template_directory')?>/includes/admin/miniColors/jquery.miniColors.css">
<div class="admin-con247 wrap">
<h2>General Options</h2>
<form method="POST">
<table class="form-table">
<tr>
<td colspan="2"><h3>Appearance</h3></td>
</tr>
<?php /*
<tr>
<td>Font</td>
<td><select name="<?=$shortname?>_font_face">
       <option value="">Default</option>
		<?php
        foreach ($font_faces as $f)
            echo '
                <option value="'.$f.'"'.(get_option($shortname.'_font_face', '')==$f ? ' selected' : '').'>'.$f.'</option>
            ';
        ?>
    </select>
    <select name="<?=$shortname?>_font_size">
        <option value="">Default</option>
		<?php
        foreach ($font_sizes as $f)
            echo '
                <option value="'.$f.'"'.(get_option($shortname.'_font_size', '')==$f ? ' selected' : '').'>'.$f.'</option>
            ';
        ?>
    </select>
</td>
</tr>
*/ ?>
<tr>
<td>Background Color</td>
<td><input type="text" class="input_small" name="<?=$shortname?>_background_color" id="<?=$shortname?>_background_color" value="<?=get_option($shortname.'_background_color', '#cc9966')?>"></td>
</tr><tr>
<td>Background Image</td>
<td><input type="radio" id="<?=$shortname?>_background_image_which" name="<?=$shortname?>_background_image_which" value="url"<?=($bg_which == 'url' ? ' checked' : '')?>>From URL <BR />
	<input type="text"  class="input_text" id="<?=$shortname?>_background_image_url" name="<?=$shortname?>_background_image_url" value="<?=get_option($shortname.'_background_image_url', 'http://')?>">
	<input type="button" class="btn_image_upload" id="<?=$shortname?>_background_image_upload" value="Upload...">
	<br />
	Or, pick a preset background:
	<div id="background_image_preset">
<?php
foreach ($bgimage as $img)
    echo '<div class="bg_container"><img src="'.get_bloginfo('template_url').'/'.$img.'"> </div>';
?>
	</div>
    <div class="repeat_img">
    <select id="<?=$shortname?>_background_image_repeat" name="<?=$shortname?>_background_image_repeat">
        <option value="repeat"<?=(get_option($shortname.'_background_image_repeat', 'repeat') == 'repeat' ? ' selected' : '')?>>repeat</option>
        <option value="repeat-x"<?=(get_option($shortname.'_background_image_repeat', 'repeat') == 'repeat-x' ? ' selected' : '')?>>repeat horizontally</option>
        <option value="repeat-y"<?=(get_option($shortname.'_background_image_repeat', 'repeat') == 'repeat-y' ? ' selected' : '')?>>repeat vertically</option>
        <option value="no-repeat"<?=(get_option($shortname.'_background_image_repeat', 'no-repeat') == 'no-repeat' ? ' selected' : '')?>>no repeat</option>
    </select>
    <input type="checkbox" id="<?=$shortname?>_background_image_attachment" name="<?=$shortname?>_background_image_attachment" value="fixed"<?=(get_option($shortname.'_background_image_attachment', 'scroll') == 'fixed' ? ' checked' : '')?>> fixed
	<br />
    <input type="radio" name="<?=$shortname?>_background_image_which" value="none"<?=($bg_which == 'none' ? ' checked' : '')?>>
    No background image
    </div>
</td>
</tr><tr>
<td>Excerpt Length</td>
<td><input type="text" class="input_small" name="<?=$shortname?>_excerpt_length" value="<?=get_option($shortname.'_excerpt_length', 55)?>"></td>
</tr><tr>
<td>Category Page Layout</td>
<td>
<select name="<?=$shortname?>_cat_page_layout">
<?php
foreach ($cat_page_layouts as $k=>$v)
    echo '
        <option value="'.$k.'"'.(get_option($shortname.'_cat_page_layout', 'rightsidebar')==$k ? ' selected' : '').'>'.$v.'</option>
    ';
?>
</select>
</td>
</tr><tr>
<td colspan="2"><h3>Header, Logo and Footer</h3></td>
</tr><tr>
 <td>Logo</td>
 <td>
    <input type="radio" id="<?=$shortname?>_logo_image_which" name="<?=$shortname?>_logo_which" value="url"<?=($logo_which == 'url' ? ' checked' : '')?>>
    From URL<br />
    <input type="text"  class="input_text" id="<?=$shortname?>_logo_image_url" name="<?=$shortname?>_logo_image_url" value="<?=get_option($shortname.'_logo_image_url', 'http://')?>">
    <input type="button" class="btn_image_upload" id="<?=$shortname?>_logo_image_upload" value="Upload...">
    
	<br />
    <input type="radio" name="<?=$shortname?>_logo_which" value="text"<?=($logo_which == 'text' ? ' checked' : '')?>>
    Use text <br />
    <input type="text"  class="input_text" name="<?=$shortname?>_logo_text" value="<?=get_option($shortname.'_logo_text', '')?>">
    <br />
    <select name="<?=$shortname?>_logo_font_size">
<?php
foreach ($logo_font_sizes as $f)
    echo '
        <option value="'.$f.'"'.(get_option($shortname.'_logo_font_size', '37px')==$f ? ' selected' : '').'>'.$f.'</option>
    ';
?>
    </select>
    <input type="text" class="input_small" name="<?=$shortname?>_logo_font_color" id="<?=$shortname?>_logo_font_color" value="<?=get_option($shortname.'_logo_font_color', '#999999')?>">
 </td>
 </tr><tr>
 <td>Tagline</td>
 <td><input type="text"  class="input_text" name="<?=$shortname?>_logo_tagline" value="<?=get_option($shortname.'_logo_tagline', '')?>"><br /><span>(only shown when using text logo)</span></td>
</tr><tr>
<td> Favicon</td>
<td>
<input type="checkbox" name="<?=$shortname?>_favicon_use_custom" value="true"<?=(get_option($shortname.'_favicon_use_custom', 'false')=='true' ? ' checked' : '')?>>
    Use custom bookmark icon (favicon)<br />
    <input type="text"  class="input_text" id="<?=$shortname?>_favicon_url" name="<?=$shortname?>_favicon_url" value="<?=get_option($shortname.'_favicon_url', 'http://')?>">
    <input type="button" class="btn_image_upload" id="<?=$shortname?>_favicon_upload" value="Upload...">
 </td>
 </tr><tr>
 <td>Header image</td>
 <td>
     <input type="checkbox" name="<?=$shortname?>_frontpage_main_image_everywhere" value="true"<?=(get_option($shortname.'_frontpage_main_image_everywhere', 'false') == 'true' ? ' checked' : '')?>>
    Use Front Page main image on every page. See Front Page menu for more options.
 </td>
 </tr><tr>
<td>Footer text</td>
<td> <textarea  class="input_textarea" name="<?=$shortname?>_footer_text"><?=get_option($shortname.'_footer_text', '')?></textarea></td>
 </tr><tr>
<td>Copyright text</td>
<td> <textarea  class="input_textarea" name="<?=$shortname?>_copyright_text"><?=get_option($shortname.'_copyright_text', '')?></textarea></td>
 </tr><tr>
 <td colspan="2"><h3>Tracking</h3></td>
 </tr><tr>
 <td>Google Analytics Tracker ID</td>
 <td><input type="text" class="input_small" name="<?=$shortname?>_google_analytics_id" value="<?=get_option($shortname.'_google_analytics_id', '')?>">  </td>
 </tr><tr>
 <td colspan="2">
    <input type="hidden" name="<?=$shortname?>_action" value="save"><br />
    <input type="submit" value="Save"> </td></tr>
    </table>
</form>
</div>