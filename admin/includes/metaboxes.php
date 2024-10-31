<?php

/**
*
* This file defines the functions which create the meta boxes, displays them, saves their data, and displays their data
*
* @since 0.0.4
*
* @package     Open_Schema_Data
* @subpackage  Open_Schema_Data/admin/includes
*/

/**
* The callback funtion for the main schema data meta box
*
* since 0.0.1
*/

function osd_main_metabox_callback( $post ) {
    wp_nonce_field ( basename(__FILE__), 'osd_main_nonce');
    $osd_stored_meta = get_post_meta($post->ID);
    ?>
    <div>
        <div class="meta-row">
            <div class="meta-td">
                <textarea id="schema_data" rows="20" cols="50" name="schema_data"><?php
                    if ( ! empty($osd_stored_meta['schema_data']) ) {echo esc_attr( $osd_stored_meta['schema_data'][0] );}
                ?></textarea>
            </div>
        </div>
    </div>
    <?php
}

/**
* The callback function for the article schema data meta box
*
* @since 0.0.3
*/

function osd_article_metabox_callback( $post ) {
    wp_nonce_field ( basename(__FILE__), 'osd_article_nonce');
    $osd_stored_meta = get_post_meta($post->ID);
    ?>
    <div id="osd-navigation">
    <h2 class="nav-tab-wrapper current">
        <a class="nav-tab nav-tab-active" href="javascript:;">General</a>
        <a class="nav-tab" href="javascript:;">Advanced</a>
    </h2>

    <?php
        require_once plugin_dir_path(__FILE__) . '../views/partials/general.php';
        require_once plugin_dir_path(__FILE__) . '../views/partials/advanced.php';
    ?>
    </div>
    <?php
}


/**
* Adds the main meta box to the UI
*
* @since 0.0.3
*/

function osd_add_main_metabox() {
    add_meta_box( 
        'osd_main_metabox',
        'Open Schema Data for Page',
        'osd_main_metabox_callback',
        array('post','page')
    );
}

add_action('add_meta_boxes', 'osd_add_main_metabox');


/**
* Adds the article meta box to the UI
*
* @since 0.0.3
*/

function osd_add_article_metabox() {
    add_meta_box(
        'osd_article_metabox',
        "Open Schema Data for Post",
        'osd_article_metabox_callback',
        'post',
        'normal',
        'default'
    );
}

add_action('add_meta_boxes', 'osd_add_article_metabox');


/**
* If any schema data exists in the main or article boxes
* this function adds the data to the header of the page
*
* @since 0.0.4
*/

function osd_add_schema() {
    $osd_stored_schema = get_post_meta(get_the_ID());
    
    // check for page schema data and add to the html head tag
    if ( ! empty($osd_stored_schema['schema_data'][0]) ) {
        ?><script type="application/ld+json"><?php
        echo $osd_stored_schema['schema_data'][0];
        ?></script><?php
    }
    
    // check for advanced post schema data and add to the html head tag
    if ( ! empty($osd_stored_schema['article_schema_data'][0]) ) {
        ?><script type="application/ld+json"><?php
        echo $osd_stored_schema['article_schema_data'][0];
        ?></script><?php
    }
    
    // check for general post schema data and add to the html head tag
    if ( !empty($osd_stored_schema['author_name'][0])  ||  !empty($osd_stored_schema['author_url'][0]) ) {
        $osd_author_schema = '{"@context": "http://schema.org","@type": "Person","url": "' . $osd_stored_schema["author_url"][0] . '","name": "' . $osd_stored_schema["author_name"][0] . '"}';
        if ( !empty($osd_author_schema) ) {
            ?><script type="application/ld+json"><?php
            echo $osd_author_schema;
            ?></script><?php
        }
    }
}

add_action('wp_head', 'osd_add_schema');


/**
* If any schema data exists in the main or article boxes, this
* function updates (or adds) the data to the metadata of the
* post or page once the user clicks the WordPress 'Update' button
*
* @since 0.0.4
*/

function osd_save_data($post_id) {
    if ( ! current_user_can( 'edit_posts' ) )
        return;
    
    // check save status
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = ( isset( $_POST['osd_main_nonce'] ) && wp_verify_nonce($_POST['osd_main_nonce'], basename(__FILE__))) ? 'true' : 'false';
    
    // depending on save status, exit script
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) { return; }
    
    // save the page schema data
    if ( isset( $_POST['schema_data'] ) ) {
        update_post_meta(
            $post_id, 'schema_data', wp_kses($_POST['schema_data'],"")
        );
    } else {
        delete_post_meta($post_id, 'schema_data');
    }
    
    // save the post schema data
    if ( isset( $_POST['article_schema_data'] ) ) {
        update_post_meta(
            $post_id, 'article_schema_data', wp_kses($_POST['article_schema_data'],"")
        );
    } else {
        delete_post_meta($post_id, 'article_schema_data');
    }
    
    if ( isset( $_POST['author_name'] ) ) {
        update_post_meta(
            $post_id, 'author_name', wp_kses($_POST['author_name'],"")
        );
    } else {
        delete_post_meta($post_id, 'author_name');
    }
    
    if ( isset( $_POST['author_url'] ) ) {
        update_post_meta(
            $post_id, 'author_url', wp_kses($_POST['author_url'],"")
        );
    } else {
        delete_post_meta($post_id, 'author_url');
    }
}

add_action('save_post', 'osd_save_data');