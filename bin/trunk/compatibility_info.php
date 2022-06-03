<?php
    /*  
    You can use this plugin to show the website maintenance scheduled information to the visitors of your website or put your site into full maintenance mode.
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

    $progress = 1;
    $color = "red";
    $message = "";
    $auto_config_text = "";

    //Setup theme compatibility details
    if($my_theme == "Astra"){
        $progress = 100;
        $auto_config_text = "{beginconfig ==05/21/2022 10:24:29 am ==}
        {||textcolor(option_group)||
        #FFFFFF
        ||textcolor(option_group)||}
        {||backgroundcolor(option_group)||
        #E39C19
        ||backgroundcolor(option_group)||}
        {||fontSize(option_group)||
        20
        ||fontSize(option_group)||}
        {||alertPadding(option_group)||
        15
        ||alertPadding(option_group)||}
        {endconfig}";
    }elseif($my_theme == "Kadence"){
        $progress = 92;
        $auto_config_text = "{beginconfig ==05/21/2022 10:24:29 am ==}
        {||textcolor(option_group)||
        #FFFFFF
        ||textcolor(option_group)||}
        {||backgroundcolor(option_group)||
        #E39C19
        ||backgroundcolor(option_group)||}
        {||fontSize(option_group)||
        18
        ||fontSize(option_group)||}
        {||alertPadding(option_group)||
        15
        ||alertPadding(option_group)||}
        {endconfig}";
    }elseif($my_theme == "OceanWP"){
        $progress = 87;
    }elseif($my_theme == "Twenty Twenty-One"){
        $progress = 100;
    }elseif($my_theme == "Twenty Twenty"){
        $progress = 62;
    }elseif($my_theme == "Twenty Nineteen"){
        $progress = 82;
    }elseif($my_theme == "Twenty Seventeen"){
        $progress = 1;
    }elseif($my_theme == "Twenty Sixteen"){
        $progress = 3;
    }elseif($my_theme == "Twenty Twenty-Two"){
        $progress = 96;
    }elseif($my_theme == "Hello Elementor"){
        $progress = 100;
    }else{
        $message = "This plugin is not tested with the theme you are currently using. But it may be working. If the theme is compatible you can <a href='https://github.com/Himashana/Maintenance-Alerts-WP-Plugin/wiki/Introduction'>submit the compatibility data and contribute to the project</a>";
    }



    
    //Set compaibility report color and message according to the compatibility report progress.
    if($progress >= 60){
        $color = "green";
        if($message == ""){
            $message = "This plugin is compatible with the theme you are currently using (Please note that the plugin default settings may not fully compatible. You may need to adjust them).";
        }
    }elseif($progress >= 40){
        $color = "orange";
        if($message == ""){
            $message = "The plugin compatible is less that 60% with the theme you are using.";
        }
    }else{
        $color = "red";
        if($message == ""){
            $message = "This plugin is not compatible with the theme you are currently using.";
        }
    }
