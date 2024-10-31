<?php
/**
* Plugin Name: Open Schema Data
* Plugin URI: http://jasoncreviston.com/open-schema-data
* Author: Jason Creviston
* Author URI: http://jasoncreviston.com/about
* Version: 1.0.4
* License: GPLv2
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Description: Add custom schema data to your WordPress pages and posts.
*/

if ( ! defined('ABSPATH') ) {
    exit;
}

require_once plugin_dir_path(__FILE__) . 'admin/includes/class-open-schema-data.php';
require_once plugin_dir_path(__FILE__) . 'admin/includes/metaboxes.php';

function initiate_osd() {
    $osd_open_schema_data = new Open_Schema_Data_Admin( 'open-schema-data', '1.0.4');
}

initiate_osd();