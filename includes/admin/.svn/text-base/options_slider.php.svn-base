<?php
// options_slider.php
//
// (Nivo) slider options

if (!isset($shortname)) exit;

// initialize vars
$vars = array(  $shortname.'_slider_manualAdvance',
                $shortname.'_slider_captionOpacity',
                $shortname.'_slider_effect',
                $shortname.'_slider_animSpeed',
                $shortname.'_slider_pauseTime',
                $shortname.'_slider_pauseOnHover',
                $shortname.'_slider_directionNav',
                $shortname.'_slider_directionNavHide',
                $shortname.'_slider_prevText',
                $shortname.'_slider_nextText',
                $shortname.'_slider_controlNav',
                $shortname.'_slider_controlNavThumbs');

// process form submission
if (isset ($_POST[$shortname.'_action'])) {
    // manualAdvance
    if (!isset($_POST[$shortname.'_slider_manualAdvance']))
        $_POST[$shortname.'_slider_manualAdvance'] = 'true';
    // slider effect
    if (isset($_POST[$shortname.'_slider_effect']))
        if (is_array($_POST[$shortname.'_slider_effect']))
            $_POST[$shortname.'_slider_effect'] = implode(',', $_POST[$shortname.'_slider_effect']);
    // pauseOnHover
    if (!isset($_POST[$shortname.'_slider_pauseOnHover']))
        $_POST[$shortname.'_slider_pauseOnHover'] = 'false';
    // directionNav
    if (!isset($_POST[$shortname.'_slider_directionNav']))
        $_POST[$shortname.'_slider_directionNav'] = 'false';
    if (!isset($_POST[$shortname.'_slider_directionNavHide']))
        $_POST[$shortname.'_slider_directionNavHide'] = 'false';
    // controlNav
    if (!isset($_POST[$shortname.'_slider_controlNav']))
        $_POST[$shortname.'_slider_controlNav'] = 'false';
    if (!isset($_POST[$shortname.'_slider_controlNavThumbs']))
        $_POST[$shortname.'_slider_controlNavThumbs'] = 'false';
        
    // update options
    foreach ($vars as $var) {
        if (isset($_POST[$var]))
            update_option($var, $_POST[$var]);
        else
            delete_option($var);
    }
    echo '<div id="message" class="updated fade"><p>Slider options saved</p></div>';
}
?>
<link rel="stylesheet" type="text/css" href="<?=bloginfo('template_directory')?>/includes/admin/<?=$shortname?>_admin.css">
<script language="JavaScript">
var effects = '<?=get_option($shortname."_slider_effect", "")?>'.split(',');
</script>
<script language="JavaScript">
jQuery(document).ready(function(){
    // tick boxes for selected effect
    jQuery('.<?=$shortname?>_slider_effect').each(function(){
        if (effects.indexOf(jQuery(this).val()) >= 0)   jQuery(this).attr('checked', true);
        else                                            jQuery(this).attr('checked', false);
    });
    
    // hide other options if selected "random"
    ToggleShowEffects();
    jQuery('#<?=$shortname?>_slider_effect_random').change(ToggleShowEffects);
    
    // directionNav options
    jQuery('input[name=<?=$shortname?>_slider_directionNav]').change(function(){
        if (jQuery(this).attr('checked'))   jQuery('#<?=$shortname?>_slider_directionNavOptions').slideDown();
        else                                jQuery('#<?=$shortname?>_slider_directionNavOptions').slideUp();
    });
    
});

function ToggleShowEffects() {
    if (jQuery('#<?=$shortname?>_slider_effect_random').attr('checked'))
        jQuery('#<?=$shortname?>_slider_effects').slideUp().find(':checkbox').each(function(){jQuery(this).attr('checked', false);});
    else
        jQuery('#<?=$shortname?>_slider_effects').slideDown();
}
</script>
<script language="JavaScript">
// fix IE Array.indexOf
if (!Array.indexOf) {
  Array.prototype.indexOf = function (obj, start) {
    for (var i = (start || 0); i < this.length; i++) {
      if (this[i] == obj) {
        return i;
      }
    }
    return -1;
  }
}
</script>
<div class="admin-con247 wrap">
<h2>Slider Options</h2>
<form method="POST">

<table class="form-table">
<tr><td colspan="2">Please choose "Show slider" in Front Page Options &gt; Main Image to enable slider</td></tr>
<tr>
<td colspan="2"><h3>Appearance</h3></td>
</tr><tr>
<td width="200">Slider Auto Play</td>
<td><input type="checkbox" name="<?=$shortname?>_slider_manualAdvance" value="false"<?=(get_option($shortname.'_slider_manualAdvance', 'false') == 'false' ? ' checked' : '')?>>    AutoPlay</td>
</tr><tr>
<td>Caption Text Opacity</td>
<td><input type="text"  class="input_verysmall" name="<?=$shortname?>_slider_captionOpacity" value="<?=get_option($shortname.'_slider_captionOpacity', '0.8')?>"><br />
    <span>0 = transparent, 1 = completely solid <== kalo rajin diganti jqueryui slider</span> </td>
 </tr><tr>
 <td colspan="2"><h3>Transitions</h3></td>
 </tr><tr>
 <td>Choose effect(s)</td>
 <td>
    <ul>
        <li><input type="checkbox" name="<?=$shortname?>_slider_effect" class="<?=$shortname?>_slider_effect" id="<?=$shortname?>_slider_effect_random" value="random" /> random</li>
        <div id="<?=$shortname?>_slider_effects" style="display:none;">
            <li><input type="checkbox" name="<?=$shortname?>_slider_effect[]" class="<?=$shortname?>_slider_effect" value="sliceDown" /> sliceDown</li>
            <li><input type="checkbox" name="<?=$shortname?>_slider_effect[]" class="<?=$shortname?>_slider_effect" value="sliceDownLeft" /> sliceDownLeft</li>
            <li><input type="checkbox" name="<?=$shortname?>_slider_effect[]" class="<?=$shortname?>_slider_effect" value="sliceUp" /> sliceUp</li>
            <li><input type="checkbox" name="<?=$shortname?>_slider_effect[]" class="<?=$shortname?>_slider_effect" value="sliceUpLeft" /> sliceUpLeft</li>
            <li><input type="checkbox" name="<?=$shortname?>_slider_effect[]" class="<?=$shortname?>_slider_effect" value="sliceUpDown" /> sliceUpDown</li>
            <li><input type="checkbox" name="<?=$shortname?>_slider_effect[]" class="<?=$shortname?>_slider_effect" value="sliceUpDownLeft" /> sliceUpDownLeft</li>
            <li><input type="checkbox" name="<?=$shortname?>_slider_effect[]" class="<?=$shortname?>_slider_effect" value="fold" /> fold</li>
            <li><input type="checkbox" name="<?=$shortname?>_slider_effect[]" class="<?=$shortname?>_slider_effect" value="fade" /> fade</li>
            <li><input type="checkbox" name="<?=$shortname?>_slider_effect[]" class="<?=$shortname?>_slider_effect" value="slideInRight" /> slideInRight</li>
            <li><input type="checkbox" name="<?=$shortname?>_slider_effect[]" class="<?=$shortname?>_slider_effect" value="slideInLeft" /> slideInLeft</li>
            <li><input type="checkbox" name="<?=$shortname?>_slider_effect[]" class="<?=$shortname?>_slider_effect" value="boxRandom" /> boxRandom</li>
            <li><input type="checkbox" name="<?=$shortname?>_slider_effect[]" class="<?=$shortname?>_slider_effect" value="boxRain" /> boxRain</li>
            <li><input type="checkbox" name="<?=$shortname?>_slider_effect[]" class="<?=$shortname?>_slider_effect" value="boxRainReverse" /> boxRainReverse </li>
            <li><input type="checkbox" name="<?=$shortname?>_slider_effect[]" class="<?=$shortname?>_slider_effect" value="boxRainGrow" /> boxRainGrow</li>
            <li><input type="checkbox" name="<?=$shortname?>_slider_effect[]" class="<?=$shortname?>_slider_effect" value="boxRainGrowReverse" /> boxRainGrowReverse</li>
        </div>

    </ul>
</td>
</tr><tr>
<td>Transition speed </td>
<td><input  class="input_verysmall" type="text" name="<?=$shortname?>_slider_animSpeed" value="<?=get_option($shortname.'_slider_animSpeed', '500')?>"> ms</td>
</tr><tr>
<td>Show each slide for</td>
<td><input  type="text"  class="input_verysmall" name="<?=$shortname?>_slider_pauseTime" value="<?=get_option($shortname.'_slider_pauseTime', '3000')?>"> ms</td>
</tr><tr>
<td>Pause while hover </td>
<td><input type="checkbox" name="<?=$shortname?>_slider_pauseOnHover" value="true"<?=(get_option($shortname.'_slider_pauseOnHover', 'true') == 'true' ? ' checked' : '')?>>Pause while hovering on slide</td>
</tr><tr>
<td colspan="2"><h3>Navigation</h3></td></tr><tr>
<td>Arrow navigation</td>
<td><input type="checkbox" name="<?=$shortname?>_slider_directionNav" value="true"<?=(get_option($shortname.'_slider_directionNav', 'true') == 'true' ? ' checked' : '')?>> Enable
<div id="<?=$shortname?>_slider_directionNavOptions"<?=(get_option($shortname.'_slider_directionNav', 'true') == 'true' ? '' : ' style="display:none;"')?>> <input type="checkbox" name="<?=$shortname?>_slider_directionNavHide" value="true"<?=(get_option($shortname.'_slider_directionNavHide', 'true') == 'true' ? ' checked' : '')?>> Hide Button Unless hover   <br />     
       Prev label <input type="text" name="<?=$shortname?>_slider_prevText" value="<?=get_option($shortname.'_slider_prevText', 'Prev')?>"><br />
       Next label <input type="text" name="<?=$shortname?>_slider_nextText" value="<?=get_option($shortname.'_slider_nextText', 'Next')?>">
    </div></td>
   </tr><tr>
   
<td>Control navigation</td>
<td>
    <input type="checkbox" name="<?=$shortname?>_slider_controlNav" value="true"<?=(get_option($shortname.'_slider_controlNav', 'true') == 'true' ? ' checked' : '')?>> Enable
</td>
    </tr><tr>
    <td>
    <input type="hidden" name="<?=$shortname?>_action" value="save"><br />
    <input type="submit" value="Save">
    </td></tr></table>
</form>
</div>