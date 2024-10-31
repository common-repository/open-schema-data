<?php

/**
 * Provides the 'Advanced' view for the corresponding tab in the Article Meta Box
 *
 * @since 0.0.2
 *
 * @package     Open-Schema-Data
 * @subpackage  Open-Schema-Data/admin/views/partials
 */

?>
<div class="inside hidden">
    <textarea id="article_schema_data" rows="20" cols="50" name="article_schema_data"><?php if ( ! empty($osd_stored_meta['article_schema_data']) ) {
            echo esc_attr( $osd_stored_meta['article_schema_data'][0] );
        }?></textarea>
</div>
<?php
?>