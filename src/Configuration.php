<?php
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

 
//  Plugin configuration.

    // This array describes the settings that need to export or import.
    $configuration_array = array(
        "maintenancetype(Maintenance_type_group)" => "Maintenance_type",
        "maintenancetext(option_group)" => "field",
        "Actionselect(option_group)" => "Action_select",
        "textcolor(option_group)" => "textcolor",
        "backgroundcolor(option_group)" => "backgroundcolor",
        "fontSize(option_group)" => "fontSize",
        "alertPadding(option_group)" => "alertPadding",
        "Onclickevent(option_group)" => "Onclick_event",
        "Forcemaintenancewhenloggedin(option_group)" => "Force_maintenance_when_loggedin",
        "custommaintenancepage(option_group)" => "custom_maintenance_page"
    );

    // This array contains the option groups related to the configuration_array.
    $option_groups_array = array("Maintenance_type_group", "option_group");

    ?>

        <h1>Maintenance Alerts - Configuration</h1>';
        
        <div class="wrap top-bar-wrapper" style="background-color:white; padding:10px;">
            
            

            <h2></h2>
            <!-- Get and display the current configuration to the user according to a format -->
            <h2>Export configuration</h2>

            <div class="notice notice-warning is-dismissible">
                <br><b><p>You can save the following configuration text in a text file for later use or transfer it to a new website.</p></b><br>
            </div>
            
            <div style="background-color:#E2E7EC; width:700px; padding:10px; border:4px solid gray;" disabled>
                <?php
                    // This section make the formatted configuration text to export.
                    echo "<div style=color:blue;>{beginconfig ==" . date("m/d/Y h:i:s a",time()) . " ==}</div>";
                    foreach($configuration_array as $key => $value)
                    {
                      echo "<div style=color:blue;>{||" . $key . "||</div><div style=color:green;>" . get_option($value) . "</div><div style=color:blue;>||" . $key . "||}</div>";
                    }
                    echo "<div style=color:blue;>{endconfig}</div><br>";
                ?>
            </div>

            <!-- Import custom configuration formatted text -->
            <h2>Import configuration</h2>
            <div style="background-color:#E2E7EC; width:700px; padding:10px; border:4px solid gray;" disabled>
            <form method="post" action="options.php">
                <?php settings_fields('configuration'); ?>
                <?php
                    echo'<input type="text" name="current_configuration" placeholder="Enter the formatted configuration text here." class="large-text">';
                    echo'<input type="text" name="config_restore_sequence" value="0" class="large-text" style="display:none;">';
                    submit_button('Import');
                ?>
            </form>

            <?php
                // If imported configuration exists then, display for the user to restore it.
                if(get_option('current_configuration') != ""){
                    ?>
                    
                    <h2>Restore imported configuration</h2>
                    <?php 

                        //Read and replace settings
                        $config_data_text =  get_option('current_configuration'); 
                    
                        if(get_option('config_restore_sequence') == "0"){
                            foreach($option_groups_array as $option_group_text){
                                ?>
                                    <div>
                                        <b><p><?php echo $option_group_text; ?></p></b>
                                        <?php
                                            foreach($configuration_array as $key => $value)
                                            {
                                                $config_string_openclose = "||" . $key . "||";
                    
                                                $config = substr($config_data_text, strpos($config_data_text, $config_string_openclose)+strlen($config_string_openclose));
                                                $config = substr($config, 0, strpos($config, $config_string_openclose));              
                                                if($config != ""){
                                                    if(str_contains($key, $option_group_text)){
                                                        echo $key . ' : '.$config.'<br>';
                                                    }
                                                }
                                            }
                                        ?>
                                    </div>
                                <?php
                            }    
                            ?>
                                <form method="post" action="options.php">
                                    <?php settings_fields('configuration'); ?>
                                    <?php
                                        echo'<input type="text" name="current_configuration" value="' . $config_data_text . '" class="large-text" style="display:none;">';
                                        echo'<input type="text" name="config_restore_sequence" value="1" class="large-text" style="display:none;">';
                                        submit_button('Begin');
                                    ?>
                                </form>
                            <?php
                        }elseif(get_option('config_restore_sequence') == "1"){
                            foreach($option_groups_array as $option_group_text){
                                ?>
                                <br>
                                    <div style="border:2px solid gray; padding:6px;">
                                        <form method="post" action="options.php">
                                            <?php settings_fields($option_group_text); ?>
                                            <b><p><?php echo $option_group_text; ?></p></b>
                                            <?php
                                                foreach($configuration_array as $key => $value)
                                                {
                                                    $config_string_openclose = "||" . $key . "||";
                        
                                                    $config = substr($config_data_text, strpos($config_data_text, $config_string_openclose)+strlen($config_string_openclose));
                                                    $config = substr($config, 0, strpos($config, $config_string_openclose));              
                                                    if($config != ""){
                                                        if(str_contains($key, $option_group_text)){
                                                            echo $key . ' : '.$config.'<br>';
                                                            echo'<input type="text" name=" ' . $value . '" value="' . $config . '" class="large-text" style="display:none;">';
                                                        }
                                                    }
                                                }
                                                submit_button('Restore');
                                            ?>
                                        </form>
                                    </div>
                                <?php
                            }
                            
                            ?>
                                <form method="post" action="options.php">
                                    <?php settings_fields('configuration'); ?>
                                    <?php
                                        echo'<input type="text" name="current_configuration" value="" class="large-text" style="display:none;">';
                                        echo'<input type="text" name="config_restore_sequence" value="" class="large-text" style="display:none;">';
                                        submit_button('Finish restore');
                                    ?>
                                </form>
                            <?php
                            
                        }
                }
                ?>
            </div>
        <br></div>