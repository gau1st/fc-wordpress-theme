<?php
// contactform.php
// shortcode handler for contact form

// attributes:
// - fields   => "Name, *Email, _Comment"
//               use _ for textarea, * for required (plus validation)
// - submit   => submit button label

$_247themes_sc_contactform_js = '
<script language="JavaScript">
$(document).ready(function(){
    $("#_247themes_contactform").submit(function(){
        var valid_data = true;
        $("#_247themes_contactform :input").each(function(){
            if (!valid_data) return false;
            var fieldname = $(this).attr("name").toLowerCase();
            if ($(this).hasClass("required")) {
                if (!$(this).val().length) {
                    alert("'.__('Please fill in the field marked', $shortname).' "+$(this).attr("name"));
                    $(this).focus();
                    $(this).select();
                    valid_data = false;
                    return false;
                }
                if (fieldname.indexOf("email")!=-1 || fieldname.indexOf("e-mail")!=-1) {
                    var re = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
                    if (!$(this).val().match(re)) {
                        alert("'.__('Invalid email address', $shortname).' in "+$(this).attr("name"));
                        $(this).focus();
                        $(this).select();
                        valid_data = false;
                        return false;
                    }
                }
            }
        });
        if (!valid_data) return false;
        var params = $("#_247themes_contactform").serializeArray();
        params.push({name:"action", value:"'.$shortname.'_contactform_send"});
        params.push({name:"my_ref", value:"'.wp_create_nonce($shortname.'_contactform').'"});
        $.post("'.admin_url('admin-ajax.php').'", params, 
            function(data){
                $(".entry-content").slideUp(function(){$(this).replaceWith(data).slideDown();});
            }
        );
        return false;
    });
});
</script>
';

function _247themes_sc_contactform($atts, $content=null, $code='') {
    if (strlen($content))        // has content, disregard attributes
        return _247themes_sc_contactform_enclosed($content);
    else {                      // no enclosed content, use attributes
        if (count($atts)) {     // throw away the first attribute if has fn name
            if ($atts[0] == $code)
                $atts = array_slice($atts, 1);
            return _247themes_sc_contactform_atts($atts);
        }   
        else                    // no atributes
            return '';
    }
}

function _247themes_sc_contactform_atts($atts) {
    global $_247themes_sc_contactform_js, $shortname;
    if (!isset($atts['fields'])) return '';
    if (!strlen($atts['fields'])) return '';
    
    // comma-separated
    $fields = explode(',', $atts['fields']);
    if (count($fields) <= 0)    return '';
    $ans = '
	<div class="_247themes_contactcontainer">
    <form id="_247themes_contactform">
    ';
    foreach ($fields as $f) {
        $required = false; $textarea = false; $any_required = false;
        $f = trim($f);
        for($i=0; $i<2; $i++) {
            if (substr($f, 0, 1) == '_')        $textarea = true;
            elseif (substr($f, 0, 1) == '*')    $required = true;
            else                                break;
            $f = substr($f, 1);
        }
        if ($required)  $any_required = true;   // any required fields?
        if ($textarea)            // textarea
            $ans.= '
            <div class="contact-separator">
			<div class="contact-label">'.$f.($required ? ' <span class="contact-label-required">*</span>' : '').'</div>
             <div class="contact-input"><textarea name="'.$f.'"'.($required ? ' class="required"' : '').'></textarea></div>
            </div>
            ';
        else                                    // text field
            $ans.= '
            <div class="contact-separator">
            <div class="contact-label">'.$f.($required ? ' <span class="contact-label-required">*</span>' : '').'</div>
            <div class="contact-input"><input type="text" name="'.$f.'"'.($required ? ' class="required"' : '').'></div>
            </div>
            ';
    }
    $ans.= '
            <div class="contact-separator">
                <div style="padding-bottom:10px;"><span class="contact-label-required">* = '.__('required field', $shortname).'</span></div>
                <div class="contact-button"><input type="submit" value="'.(isset($atts['submit'])&&strlen($atts['submit']) ? $atts['submit'] : 'Send').'"></div>
            </div>
       
		
    </form>
	</div>
    ';
    return $_247themes_sc_contactform_js.$ans;
}

// a complete form without the <form> and </form> tags
function _247themes_sc_contactform_enclosed($content) {
    global $_247themes_sc_contactform_js;
    return 
    $_247themes_sc_contactform_js.
    '<form id="247themes_contactform">
    '.
    do_shortcode($content).
    '</form>
    ';
}

// ajax handler
function _247themes_ajax_contactform_send() {
    global $shortname;
	check_ajax_referer($shortname.'_contactform', 'my_ref');
	// format message body to send
	$msg = array();
	foreach ($_POST as $k=>$v) {
	    if ($k=='action' || $k=='my_ref')
	        continue;
	    $msg[] = $k.':'.chr(10).$v;
	}
	$msg = implode(chr(10).chr(10), $msg);
	
	// send email
	$mailto = get_option($shortname.'_contact_webmaster_email', '');
	if (strlen($mailto))
	    mail($mailto, 'Message from '.bloginfo('name'), $msg);
    $duplicate = get_option($shortname.'_contact_duplicate_message_to_sender', 0);
    if ($duplicate && isset($_POST['email']) && strlen($_POST['email']))
        mail($_POST['email'], 'Your message to '.bloginfo('name'), $msg);
	
	// return thank you message
	$msg = '<div id="entry-content">'.
	       get_option($shortname.'_contact_message_thanks', 'Thank you for sending us a message').
	       '</div>';
	die($msg);
}

add_shortcode('contactform', '_247themes_sc_contactform');
add_action('wp_ajax_247themes_contactform_send', '_247themes_ajax_contactform_send');
add_action('wp_ajax_nopriv_247themes_contactform_send', '_247themes_ajax_contactform_send');