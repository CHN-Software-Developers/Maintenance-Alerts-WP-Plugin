<?php
	/**
 * Plugin Name:       Maintenance alerts
 * Plugin URI:        https://chnsoftwaredevelopers.com/Himashana/WP-Plugins/Maintenance_alerts
 * Description:       This plugin shows the website maintenance scheduled information to the visitors on the top of the website.
 * Version:           1.1.4
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Himashana
 * Author URI:        https://chnsoftwaredevelopers.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       Maintenance_alerts
 * Domain Path:       /languages
 */
 
 /*
    You can use this plugin to show the website maintenance scheduled information to the visitors of your website. 
    Copyright (C) 2021-2022  Himashana (Email : Himashana@chnsoftwaredevelopers.com)

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 2 of the License, or
    any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */
 
 
 
 //Create the menu
 add_action("admin_menu", "addMenu");
 function addMenu(){
	 add_menu_page( "Maintenance alerts", "Maintenance alerts", 4, "Maintenance-Alerts", "MaintenanceAlertsMenu", "dashicons-warning", 25);
	 add_submenu_page( "Maintenance-Alerts", "Compatibility", "Compatibility", 4, "Maintenance-Alerts-Compatibility", "MaintenanceAlertsMenuCompatibility");
	 add_submenu_page( "Maintenance-Alerts", "About", "About", 4, "Maintenance-Alerts-About", "MaintenanceAlertsMenuAbout");	 
 }
 
 

 
 
 //Display Maintenance Alert
 add_action("wp_body_open", "add_alert");
 
 function add_alert(){
	 
	 if(get_option('Maintenance_mode_action') == "enable --maintenance"){
		 wp_enqueue_style( 'maintenance_screen', '/wp-content/plugins/maintenance-alerts/maintenance_screen.css',false,'1.1','all');
	 
		 ?> <a href="<?php echo get_option('Onclick_event'); ?>" style="text-decoration:none;"><div style="position:fixed; z-index:10000; width:100%; height:2000px; overflow:hidden; color:<?php echo get_option('textcolor'); ?>; background-color:<?php echo get_option('backgroundcolor'); ?>; padding:<?php echo get_option('alertPadding'); ?>px;"><center><h4 style="font-size:<?php echo get_option('fontSize'); ?>px; color:<?php echo get_option('textcolor'); ?>;"> <?php echo'This site will be unavailable on Wednesday, 26 January 2022 from 6.30AM to 12.00PM due to planned maintenance.'; ?> </h4></center></div></a> <?php
	 }
	 
		 
	 //If the user select 'Enabled', a maintenance alert will display on the top of the website.
	 if(get_option('Action_select') == "Enabled"){
		 //If the header text is empty, it will show the default text.
		 if(get_option('field') <> ""){
			?> <a href="<?php echo get_option('Onclick_event'); ?>" style="text-decoration:none;"><div style="color:<?php echo get_option('textcolor'); ?>; background-color:<?php echo get_option('backgroundcolor'); ?>; padding:<?php echo get_option('alertPadding'); ?>px;"><center><h4 style="font-size:<?php echo get_option('fontSize'); ?>px; color:<?php echo get_option('textcolor'); ?>"> <?php echo get_option('field'); ?> </h4></center></div></a> <?php
		 }else{
			?> <a href="<?php echo get_option('Onclick_event'); ?>" style="text-decoration:none;"><div style="color:<?php echo get_option('textcolor'); ?>; background-color:<?php echo get_option('backgroundcolor'); ?>; padding:<?php echo get_option('alertPadding'); ?>px;"><center><h4 style="font-size:<?php echo get_option('fontSize'); ?>px; color:<?php echo get_option('textcolor'); ?>;"> <?php echo'This site will be unavailable on Wednesday, 26 January 2022 from 6.30AM to 12.00PM due to planned maintenance.'; ?> </h4></center></div></a> <?php
		 }
	 }
	 
 }
 
 function alert_register_settings(){
	 register_setting('option_group', 'field');
	 register_setting('option_group', 'Action_select');
	 register_setting('option_group', 'textcolor');
	 register_setting('option_group', 'backgroundcolor');
	 register_setting('option_group', 'fontSize');
	 register_setting('option_group', 'alertPadding');
	 register_setting('option_group', 'Onclick_event');
	 register_setting('option_group', 'Maintenance_mode_action');
	 register_setting('Activation_option_group', 'pro_activate');
	 register_setting('configure_advanced_settings', 'configuration_id');
 }
 
 add_action('admin_init', 'alert_register_settings');
 
 //If Click Maintenance Alerts Menu, it will show all the settings of the Maintenance Alerts.
 function MaintenanceAlertsMenu(){
	 //Variables
 	 $Message_text_color = "";
 	 $Message_background_color = "";
	 $Message_font_size = "";
	 $Message_alert_padding = "";
	 //The configuration_id change from version to version.
 	 $configuration_id_old_version = "config_0001"; // old version id
 	 $configuration_id_new_version = "config_0002"; // new version id
 	 $configuration_success_id = "config_0002_done";// configuration success identification id
	 
	 echo'<h1>Maintenance Alerts</h1><br>';
	 ?>
	 <!--Free Product activation-->
	 <div class="wrap top-bar-wrapper" style="background-color:white; padding:10px;">
		 <?php
			 if(get_option('pro_activate') <> ""){
				 echo'<h3>Product activated</h3>';
			 }else{
				 ?>
				 <form method="post" action="options.php">
					 <?php settings_errors(); ?>
					 <?php settings_fields('Activation_option_group'); ?>
					 <h3>Product activation</h3>
					 <input type="email" name="pro_activate" placeholder="Enter your Email">
				 	<?php submit_button('Activate'); ?>
		 		</form>
			<?php	 
			 }
		    ?>
	 </div><br>
	  
	 <!--Maintenance Alerts settings box-->
	 <div class="wrap top-bar-wrapper" style="background-color:white; padding:10px;">
		 <!-- General settings -->
		 <h3>General settings</h3><hr><br>
		 <form method="post" action="options.php">
			 <?php settings_errors(); ?>
			 <?php settings_fields('option_group'); ?>
			 Action : 
			 <?php
				 if(get_option('Action_select') == "Enabled"){
					?>
					<select id="Action_select" name="Action_select">
					  <option value="Enabled">Enabled</option>
					  <option value="Disabled">Disabled</option>
			 		</select>
			  		<?php
				 }else{
					?>
					<select id="Action_select" name="Action_select">
					  <option value="Disabled">Disabled</option>
					  <option value="Enabled">Enabled</option>
			 		</select>
			  		<?php 
				 }
				 ?>
			 <br><br>
			 <label for="alert_field_txt">Maintenance alert text :</label><br>
			 <input type="text" name="field" class="large-text" value="<?php 
				 //If the input field is empty, it will save the default text.
				 if(get_option('field') <> ""){
					 echo get_option('field'); 
				 }else{
					 echo'This site will be unavailable on Wednesday, 26 January 2022 from 6.30AM to 12.00PM due to planned maintenance.';
				 }
				 
				 ?>">
				 
				 <!-- The configuration_id change from version to version. -->
				 <?php if(get_option('configuration_id') == $configuration_id_new_version){ ?>
					 <!-- Advance settings -->
					 <br><br><h3>Advanced settings</h3><hr><br>
					 
					 <!-- Change text color -->
					 <label for="textcolor">Text color : </label>
					 <input type="text" id="textcolor" name="textcolor" value="<?php
						 if(get_option('textcolor') <> ""){
						 	echo get_option('textcolor'); 
							$Message_text_color = "";
						 }else{
							echo '#FFFFFF';
							$Message_text_color = "Some settings are not saved correctly!";
						 }
					 ?>">
					 
					 <!-- Change background color -->
					 <label for="backgroundcolor">Background color :</label>
					 <input type="text" id="backgroundcolor" name="backgroundcolor" value="<?php
						 if(get_option('backgroundcolor') <> ""){
						 	echo get_option('backgroundcolor'); 
							$Message_background_color = "";
						 }else{
							echo '#E39C19';
							$Message_background_color = "Some settings are not saved correctly!";
						 }
					 ?>">
					 
					 <br><br>
					 
					 <!-- Change font size -->
					 <label for="fontSize">Font size : <label style="background-color:blue; color:white; font-weight: bold;">&nbsp;New&nbsp;</label></label>
					 <input type="text" id="fontSize" name="fontSize" value="<?php
						 if(get_option('fontSize') <> ""){
						 	echo get_option('fontSize'); 
							$Message_font_size = "";
						 }else{
							echo '20';
							$Message_font_size = "Some settings are not saved correctly!";
						 }
					 ?>"> px
					 
					 <br><br>
					 
					 <!-- Change padding -->
					 <label for="alertPadding">Padding : <label style="background-color:blue; color:white; font-weight: bold;">&nbsp;New&nbsp;</label></label>
					 <input type="text" id="alertPadding" name="alertPadding" value="<?php
						 if(get_option('alertPadding') <> ""){
						 	echo get_option('alertPadding'); 
							$Message_alert_padding = "";
						 }else{
							echo '10';
							$Message_alert_padding = "Some settings are not saved correctly!";
						 }
					 ?>"> px
					 
					 <br><br>
					 
					 <!-- redirect when user click on the alert  -->
					 <label for="Onclick_event">On click :</label>
					 <input type="text" id="Onclick_event" name="Onclick_event" value="<?php echo get_option('Onclick_event'); ?>" placeholder="https://">
					 
					 <!-- Maintenance mode -->
					 <br><br><h3>Maintenance mode</h3><hr><br>
					 
					 <label for="Maintenance_mode_action">Enter "enable --maintenance" to enable maintenance screen <label style="background-color:blue; color:white; font-weight: bold;">&nbsp;New&nbsp;</label></label>
					 <input type="text" id="Maintenance_mode_action" name="Maintenance_mode_action" value="<?php
						 echo get_option('Maintenance_mode_action');
					 ?>">
					 
					 <!-- Error messages -->
					 <br><p style="color:red;"><?php echo $Message_text_color ?></p>
					 <p style="color:red;"><?php echo $Message_background_color ?></p>
					 <p style="color:red;"><?php echo $Message_font_size ?></p>
					 <p style="color:red;"><?php echo $Message_alert_padding ?></p>
				 <?php submit_button(); ?>
			 </form>
		 <?php } ?>
		 <?php
			 if(get_option('configuration_id') == $configuration_id_new_version){
				 //No anything to do.
			 }elseif(get_option('configuration_id') == $configuration_success_id){
				 ?>
					 <form method="post" action="options.php">
						 <?php settings_errors(); ?>
						 <?php settings_fields('configure_advanced_settings'); ?>
						 <br><br><h3>Advanced settings</h3><hr><br>
						 <input type="text" value="<?php echo $configuration_id_new_version ?>" style="display:none;" name="configuration_id" placeholder="none">
						 <p style="color:green;">Advanced settings configured successfully!</p>
					 	<?php submit_button('Continue...'); ?>
			 		</form>
				<?php	 
			 }else{
				 ?>
				 <form method="post" action="options.php">
					 <?php settings_errors(); ?>
					 <?php settings_fields('configure_advanced_settings'); ?>
					 <br><br><h3>Advanced settings</h3><hr><br>
					 <!--Display version updated message if the plugin is updated from old version to this version.-->
					 <?php if(get_option('configuration_id') == $configuration_id_old_version){
						 echo'Plugin updated successfully!';
					 }?>
					 <input type="text" value="<?php echo $configuration_success_id ?>" style="display:none;" name="configuration_id" placeholder="none">
				 	<?php submit_button('Configure advanced settings'); ?>
		 		</form>
			<?php
			 }
		    ?>
	 </div>
	 <!--Show new informations about the plugin.-->
	 <div class="wrap top-bar-wrapper" style="background-color:white; padding:10px;"><iframe src="https://chnsoftwaredevelopers.com/Himashana/WP-Plugins/Maintenance_alerts/wp-plugin-new-info.php" width="500px" height="200px"></div>
	 <?php
	 
 }
 
 //Theme Compatibility
 
 function MaintenanceAlertsMenuCompatibility(){
	 echo'<h1>Maintenance Alerts - Compatibility check</h1>';
	 echo'<div class="wrap top-bar-wrapper" style="background-color:white; padding:10px;">';
	 $my_theme = wp_get_theme();
	 echo 'Theme you are using : ' . $my_theme->get( 'Name' ).'<br>';
	 echo 'Theme version : ' . $my_theme->get( 'Version' ).'<br>';
	 echo'<h2>Compatibility</h2>';
	 if($my_theme == "Astra"){
		 echo'<div style="width:100%; background-color:#F4F4F4; height:20px;"><div style="width:100%; background-color:green; height:20px;"></div></div>';
	 }elseif($my_theme == "Kadence"){
		 echo'<div style="width:100%; background-color:#F4F4F4; height:20px;"><div style="width:92%; background-color:green; height:20px;"></div></div>';
	 }elseif($my_theme == "OceanWP"){
		 echo'<div style="width:100%; background-color:#F4F4F4; height:20px;"><div style="width:87%; background-color:green; height:20px;"></div></div>';
	 }elseif($my_theme == "Twenty Twenty-One"){
		 echo'<div style="width:100%; background-color:#F4F4F4; height:20px;"><div style="width:100%; background-color:green; height:20px;"></div></div>';
	 }elseif($my_theme == "Twenty Twenty"){
		 echo'<div style="width:100%; background-color:#F4F4F4; height:20px;"><div style="width:62%; background-color:orange; height:20px;"></div></div>';
	 }elseif($my_theme == "Twenty Nineteen"){
		 echo'<div style="width:100%; background-color:#F4F4F4; height:20px;"><div style="width:82%; background-color:green; height:20px;"></div></div>';
	 }elseif($my_theme == "Twenty Seventeen"){
		 echo'<div style="width:100%; background-color:#F4F4F4; height:20px;"><div style="width:1%; background-color:red; height:20px;"></div></div>';
		 echo'<p style="color:red;">This plugin is not compatible with the theme you are currently using.</p>';
	 }elseif($my_theme == "Twenty Sixteen"){
		 echo'<div style="width:100%; background-color:#F4F4F4; height:20px;"><div style="width:3%; background-color:red; height:20px;"></div></div>';
	 }elseif($my_theme == "Twenty Twenty-Two"){
		 echo'<div style="width:100%; background-color:#F4F4F4; height:20px;"><div style="width:96%; background-color:green; height:20px;"></div></div>';
	 }else{
		 echo'<p style="color:red;">This plugin is not tested with the theme you are currently using. But it may be working.</p>';
	 }
	 
	 echo'<br></div>';
 }
 
 //About the plugin
  function MaintenanceAlertsMenuAbout(){
	 echo'<h1>Maintenance Alerts - About</h1>';
	 ?>
	  	<div class="wrap top-bar-wrapper" style="background-color:white; padding:10px;">
			 * Plugin Name:       Maintenance alerts
			 <br>
			 * Plugin URI:        https://chnsoftwaredevelopers.com/Himashana/WP-Plugins/Maintenance_alerts
			 <br>
			 * Description:       This plugin shows the website maintenance scheduled information to the visitors on the top of the website.
			 <br>
			 * Version:           1.1.4
			 <br>
			 * Requires at least: 5.2
			 <br>
			 * Requires PHP:      7.2
			 <br>
			 * Author:            Himashana
			 <br>
			 * Author URI:        https://chnsoftwaredevelopers.com/
			 <br>
			 * License:           GPL v2 or later
			 <br>
			 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
			 <br>
			 * Text Domain:       Maintenance_alerts
			 <br>
			 * Domain Path:       /languages
		</div>
		
	 <?php
		 
 }
