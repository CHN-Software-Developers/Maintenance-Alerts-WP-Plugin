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
    global $wp;
	wp_enqueue_style( 'maintenance_screen', plugin_dir_url(__FILE__).'maintenance_screen.css',false,'1.1','all');
	if(add_query_arg( $wp->query_vars, home_url() ) != "http://127.0.0.1/Maintenance-Alerts-WP-Plugin/wordpress?page_id=13"){
    ?> 
    <a href="<?php echo get_option('Onclick_event'); ?>" style="text-decoration:none;">
        <div style="position:fixed; z-index:10000; width:100%; height:2000px; overflow:hidden; color:<?php echo get_option('textcolor'); ?>; background-color:<?php echo get_option('backgroundcolor'); ?>; padding:<?php echo get_option('alertPadding'); ?>px;">
            <center>
                <!-- <h4 style="font-size:<?php echo get_option('fontSize'); ?>px; color:<?php echo get_option('textcolor'); ?>;"> 
                    <?php echo'This site will be unavailable on Wednesday, 26 January 2022 from 6.30AM to 12.00PM due to planned maintenance.';?> 
                </h4> -->
            </center>
            <iframe src="http://127.0.0.1/Maintenance-Alerts-WP-Plugin/wordpress/?page_id=13" style="position:fixed; width:100%; height:100%; top:0px; left:0px;"></iframe>
        </div>
    </a>
    <?php
    }
    ?>