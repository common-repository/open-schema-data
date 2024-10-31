<?php

/**
 * Defines the plugin name, version and two hooks to enqueue the stylesheet and JavaScipt.
 *
 * @since 0.0.3
 *
 * @package     Open_Schema_Data
 * @subpackage  Open_Schema_Data/admin/includes
 */
 
class Open_Schema_Data_Admin {
 
    private $osd_name;
    private $osd_version;
    
    /**
     * Enqueue all files specifically for the dashboard
     *
     * @since 0.0.2
     */
    public function enqueue_admin_styles() {
        
        wp_enqueue_style(
            $this->name . '-admin',
            plugins_url( 'open-schema-data/admin/assets/css/admin.css' ),
            false,
            $this->version
        );
    }
    
    public function enqueue_admin_scripts() {
        
        if ( 'post' === get_current_screen()->id || 'page' === get_current_screen()->id ) {
            
            wp_enqueue_script(
                $this->name . '-tabs',
                plugins_url( 'open-schema-data/admin/assets/js/tabs.js' ),
                array( 'jquery' ),
                $this->version
            );
        }
    }

    /**
     * Intitialize the class and set its properties
     *
     * @since   0.0.3
     * @var     string  $osd_name       The name of this plugin
     * @var     string  $osd_version    The version of this plugin
     */
    
    public function __construct( $osd_name, $osd_version) {
    
        $this->name = $osd_name;
        $this->version = $osd_version;
        
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ) );
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );  
    }
    
}