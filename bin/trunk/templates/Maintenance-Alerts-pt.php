<?php
/**
* Template Name: Maintenance Alerts(blank)
*
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo plugin_dir_url(__FILE__).'templates_styles.css' ?>">
</head>

<body>
    
    <?php get_header(); ?>
                
    <?php
        while(have_posts()) : the_post();
            if(wp_get_theme()->get('Name') == "Kadence"){    
                the_content();
            }elseif(wp_get_theme()->get('Name') == "Astra"){
                get_template_part( 'template-parts/content', 'page' );
                if ( comments_open() || get_comments_number() ) {
                    comments_template();
                }
            }
            
        endwhile;
    ?>
</body>
</html>