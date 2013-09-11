<?php
function wmf_add_options_page_redirector() {
		add_options_page(__('WMF Mobile Redirector','wmfrt2d'), __('WMF Mobile Redirector','wmfrt2d'), 'manage_options', __FILE__, 'wmf_settings_form_redirector');
	}

	function wmf_add_defaults_redirector() {
			$arr = array(	
				"mobilesite"			=> "",
				"tabletsite"			=> "",
				"mobileactive"			=> "false",
				"tabletactive"			=> "false",
				"backlink"			=> "false"
			);
			update_option( 'wmf_reoptions', $arr );
	}

	function wmf_init_redirector(){
	
		register_setting( 'wmf_replugin_options', 'wmf_reoptions' );

	}


	function wmf_settings_form_redirector(){
	?>
	<div class="wrap">
		<div class="icon32" id="icon-options-general"><br></div>
		<?php _e('<h2>WMF Mobile Redirector Options</h2>','wmfrt2d');?>
		<form method="post" action="options.php">
        
			<?php 
			settings_fields('wmf_replugin_options');  
			$options = get_option('wmf_reoptions');  
			?>
			<table class="form-table">
			    <tr><?php _e('<h3>Info</h3>','wmfrt2d');?></tr>
				<tr><?php _e('<p>Please write your mobile & tablet web site address like this sample; <strong>http://m.yoursite.com</strong></p>','wmfrt2d');?></tr>
				
                <tr valign="top" style="border-top:#dddddd 1px solid;">
					<th scope="row"><?php echo _e('Mobile Site Address','wmfrt2d');?></th>
					<td>
						<label><input name="wmf_reoptions[mobilesite]" type="text" value="<?php if (isset($options['mobilesite'])) { echo $options['mobilesite']; } ?>"  /> </label><br /><span style="color:#666666;margin-left:2px;"><?php echo _e('Please enter your mobile web site address','wmfrt2d');?></span>
					</td>
				</tr>
                
                <tr valign="top" style="border-top:#dddddd 1px solid;">
					<th scope="row"><?php _e('Tablet Site Address','wmfrt2d');?></th>
					<td>
						<label><input name="wmf_reoptions[tabletsite]" type="text" value="<?php if (isset($options['tabletsite'])) { echo $options['tabletsite']; } ?>"  /> </label><br /><span style="color:#666666;margin-left:2px;"><?php _e('Please enter your tablet site address','wmfrt2d');?></span>
					</td>
				</tr>
                
                <tr valign="top" style="border-top:#dddddd 1px solid;">
					<th scope="row"><?php _e('Mobile Site Redirection','wmfrt2d');?></th>
					<td>
						<fieldset class="switch switch1" <?php if($options['mobileactive'] == "true"){ echo 'style="background-position:right"';}else{echo 'style="background-position:left"';}?>>
                            <label class="off"><?php echo __('On','wmfrt2d');?><input type="radio" class="on_off" name="wmf_reoptions[mobileactive]" id="wmf_reoptions[mobileactive]" value="true" <?php if($options['mobileactive'] == "true"){ echo 'checked';}?> /></label>
                            <label class="on"><?php echo __('Off','wmfrt2d');?><input type="radio" class="on_off" name="wmf_reoptions[mobileactive]" id="wmf_reoptions[mobileactive]" value="false" <?php if($options['mobileactive'] == "false"){ echo 'checked';}?> /></label>
                            
                        </fieldset>
                        <span style="color:#666666;margin-left:2px;"><?php echo _e('Enable or disable mobile device redirection.','wmfrt2d');?></span>
					</td>
				</tr>
                
                <tr valign="top" style="border-top:#dddddd 1px solid;">
					<th scope="row"><?php _e('Tablet Site Redirection','wmfrt2d');?></th>
					<td>
						<fieldset class="switch switch2" <?php if($options['tabletactive'] == "true"){ echo 'style="background-position:right"';}else{echo 'style="background-position:left"';}?>>
                            <label class="off"><?php echo __('On','wmfrt2d');?><input type="radio" class="on_off" name="wmf_reoptions[tabletactive]" id="wmf_reoptions[tabletactive]" value="true" <?php if($options['tabletactive'] == "true"){ echo 'checked';}?> /></label>
                            <label class="on"><?php echo __('Off','wmfrt2d');?><input type="radio" class="on_off" name="wmf_reoptions[tabletactive]" id="wmf_reoptions[tabletactive]" value="false" <?php if($options['tabletactive'] == "false"){ echo 'checked';}?> /></label>
                            
                        </fieldset>
                        <span style="color:#666666;margin-left:2px;"><?php echo _e('Enable or disable tablet device redirection.','wmfrt2d');?></span>
					</td>
				</tr>
                
                <tr valign="top" style="border-top:#dddddd 1px solid;">
					<th scope="row"><?php _e('Backlink','wmfrt2d');?></th>
					<td>
						<fieldset class="switch switch3" <?php if($options['backlink'] == "true"){ echo 'style="background-position:right"';}else{echo 'style="background-position:left"';}?>>
                            <label class="off"><?php echo __('On','wmfrt2d');?><input type="radio" class="on_off" name="wmf_reoptions[backlink]" id="wmf_reoptions[backlink]" value="true" <?php if($options['backlink'] == "true"){ echo 'checked';}?> /></label>
                            <label class="on"><?php echo __('Off','wmfrt2d');?><input type="radio" class="on_off" name="wmf_reoptions[backlink]" id="wmf_reoptions[backlink]" value="false" <?php if($options['backlink'] == "false"){ echo 'checked';}?> /></label>
                            
                        </fieldset>
                        <span style="color:#666666;margin-left:2px;"><?php echo _e('If enable this option you can use back link to desktop site & stop redirection.<br> Here is the sample back link: '.get_bloginfo('wpurl').'/?desktop=1','wmfrt2d');?></span>
					</td>
				</tr>
                
                                
			</table>
			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes','wmfrt2d') ?>" />
			</p>
		</form>


	</div>
	<?php	
	}

add_action('admin_menu', 'wmf_add_options_page_redirector');
register_activation_hook(__FILE__, 'wmf_add_defaults_redirector');
add_action('admin_init', 'wmf_init_redirector');
?>