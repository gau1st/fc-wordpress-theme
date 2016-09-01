<?php
// options_frontpage.php
//
// front page options

if (!isset($shortname)) exit;

// initialize vars
$vars = array($shortname.'_frontpage_main_image_which',             // 'none', 'url', 'slider'
              $shortname.'_frontpage_main_image_url',               // url for static image
              $shortname.'_frontpage_main_image_everywhere',
              $shortname.'_frontpage_featured_category');

// process form submission
if (isset ($_POST[$shortname.'_action'])) {
    foreach ($vars as $var) {
        if (isset($_POST[$var]))
            update_option($var, $_POST[$var]);
        else
            delete_option($var);
    }
    echo '<div id="message" class="updated fade"><p>Front page options saved</p></div>';
}

// which?
$mainimg_which  = get_option($shortname.'_frontpage_main_image_which', 'slider');
?>
<script language="JavaScript">
jQuery(document).ready(function(){
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
        jQuery('#'+which_btn+'[value="static"]').attr('checked', true);
        formfield = '';
        tb_remove();
    }
});
</script>
<link rel="stylesheet" type="text/css" href="<?=bloginfo('template_directory')?>/includes/admin/<?=$shortname?>_admin.css">
<div class="admin-con247 wrap">
<h2>Front Page Options</h2>
<form method="POST">
<table class="form-table">
<tr>
<td width="200"><h3>Main Image</h3></td>
<td><input type="radio" name="<?=$shortname?>_frontpage_main_image_which" value="slider"<?=($mainimg_which=='slider' ? ' checked' : '')?>>
Show slider
<br />
<input type="radio" id="<?=$shortname?>_frontpage_main_image_which" name="<?=$shortname?>_frontpage_main_image_which" value="static"<?=($mainimg_which=='static' ? ' checked' : '')?>>
From URL
<input type="text" class="input_text" id="<?=$shortname?>_frontpage_main_image_url" name="<?=$shortname?>_frontpage_main_image_url" value="<?=get_option($shortname.'_frontpage_main_image_url', 'http://')?>">
<input type="button" class="btn_image_upload" id="<?=$shortname?>_frontpage_main_image_upload" value="Upload...">
<br />
<input type="radio" name="<?=$shortname?>_frontpage_main_image_which" value="none"<?=($mainimg_which=='none' ? ' checked' : '')?>>
No Image
<br /><br />
</td></tr>
<tr>
<td colspan="2">
<input type="checkbox" name="<?=$shortname?>_frontpage_main_image_everywhere" value="true"<?=(get_option($shortname.'_frontpage_main_image_everywhere', 'false')=='true' ? ' checked' : '')?>>
Use Front Page main image on every page
</td></tr>
<tr>
<td><h3>Featured Category</h3></td>
<td>Show this as featured category
<select name="<?=$shortname?>_frontpage_featured_category">
    <option value="">None</option>
<?php
foreach (get_categories() as $cat) {
    echo '
        <option value="'.$cat->term_id.'"'.($cat->term_id==get_option($shortname.'_frontpage_featured_category', '') ? ' selected' : '').'>'.$cat->name.'</option>
    ';
}
?>
</select></td>
</tr><tr>
<td colspan="2">
    <input type="hidden" name="<?=$shortname?>_action" value="save"><br />
    <input type="submit" value="Save">
</td></tr></table>
</form>
</div>