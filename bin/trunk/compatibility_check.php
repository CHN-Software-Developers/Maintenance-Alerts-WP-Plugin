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

 
//  Theme compatibility informations.

    echo'<h1>Maintenance Alerts - Compatibility check</h1>';
    echo'<div class="wrap top-bar-wrapper" style="background-color:white; padding:10px;">';
    $my_theme = wp_get_theme();
    echo 'Theme you are using : ' . $my_theme->get( 'Name' ).'<br>';
    echo 'Theme version : ' . $my_theme->get( 'Version' ).'<br>';
    echo'<h2>Compatibility</h2>';

    include_once dirname( __FILE__ ) . '\compatibility_info.php';
    
    ?>
    <div style="width:100%; background-color:#F4F4F4; height:20px;"><div style="width:<?php echo $progress ?>%; background-color:<?php echo $color ?>; height:20px;"></div></div>';
    <br><p style="color:<?php echo $color ?>;"><?php echo $message ?></p>
    <?php

    echo'<br></div>';