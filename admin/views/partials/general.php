<?php

/**
 * Provides the 'General' view for the corresponding tab in the Article Meta Box
 *
 * @since 0.0.4
 *
 * @package     Open-Schema-Data
 * @subpackage  Open-Schema-Data/admin/views/partials
 */

global $osd_author_name;
global $osd_author_url;
global $osd_author_schema;

if ( ! empty($osd_stored_meta['author_name'][0]) ) {
    $osd_author_name = esc_attr( $osd_stored_meta['author_name'][0] );
} else {
    $osd_author_name = "";
}

if ( ! empty($osd_stored_meta['author_url'][0]) ) {
    $osd_author_url = esc_attr( $osd_stored_meta['author_url'][0] );
} else {
    $osd_author_url = "";
}
?>

<div class="inside">
    <div>
        <label for="author_name">Author Name</label>
        <input type="text" class="breath input" id="author_name" name="author_name" value="<?php if (! empty($osd_author_name)) {
        echo $osd_author_name;} ?>">
        <br />
        <label for="website">Website</label>
        <input type="text" class="breath input" id="author_url" name="author_url" value="<?php if (! empty($osd_author_url)) {
        echo $osd_author_url;} ?>">
    </div>
</div>