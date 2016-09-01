<?php
// options_contact.php
//
// contact form options

if (!isset($shortname)) exit;

// initialize vars
$vars = array($shortname.'_contact_webmaster_email',
              $shortname.'_contact_duplicate_message_to_sender',
              $shortname.'_contact_message_thanks');

// process form submission
if (isset ($_POST[$shortname.'_action'])) {
    foreach ($vars as $var) {
        if (isset($_POST[$var]))
            update_option($var, $_POST[$var]);
        else
            delete_option($var);
    }
    echo '<div id="message" class="updated fade"><p>Contact options saved</p></div>';
}
?>
<link rel="stylesheet" type="text/css" href="<?=bloginfo('template_directory')?>/includes/admin/<?=$shortname?>_admin.css">
<div class="admin-con247 wrap">
<h2>Contact Options</h2>
<form method="POST">
<table class="form-table">
<tr>
	<td width="200" style="white-space:nowrap" valign="top"><label>Webmaster email </label></td>
    <td><div class="input"><input class="input_text" type="text" name="<?=$shortname?>_contact_webmaster_email" value="<?=get_option($shortname.'_contact_webmaster_email', '')?>"></div></td>
   
</tr>
<tr>
	<td colspan="2">    
    <div class="input"><input type="checkbox" name="<?=$shortname?>_contact_duplicate_message_to_sender" value="1"<?=(get_option($shortname.'_contact_duplicate_message_to_sender', '0')=='1' ? ' checked' : '')?>>&nbsp;Send copy of message to sender</div>
    </td>
</tr>
<tr>
<td style="white-space:nowrap"><label>Thank you message</label></td>
<td><div class="input"><textarea class="input_textarea" name="<?=$shortname?>_contact_message_thanks"><?=get_option($shortname.'_contact_message_thanks', '')?></textarea></div></td>
</tr>
<tr>
 <td colspan="2">
    <div class="input">
    <input type="hidden" name="<?=$shortname?>_action" value="save">
    <input type="submit" value="Save"></div>
</td>
</tr>
</table>
</form>
</div>