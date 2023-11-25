<?php
/*
    You can use this plugin to show the website maintenance scheduled information to the visitors of your website or put your site into full maintenance mode.
    Copyright (C) 2021-2023  Himashana (Email : Himashana@chnsoftwaredevelopers.com)

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
    if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
        die;
    }

    delete_option('Maintenance_type');
    delete_option('field');
    delete_option('Action_select');
    delete_option('textcolor');
    delete_option('backgroundcolor');
    delete_option('fontSize');
    delete_option('alertPadding');
    delete_option('Onclick_event');
    delete_option('Force_maintenance_when_loggedin');
    delete_option('custom_maintenance_page');
    delete_option('CHN_Account_User');
    delete_option('first_user_config');
    delete_option('current_configuration');
    delete_option('config_restore_sequence');
    delete_option('is_License_accepted');
    delete_option('is_terms_and_conditions_accepted');
    delete_option('is_review_done');