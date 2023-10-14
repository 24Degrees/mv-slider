<?php
//$meta = get_post_meta( $post->ID, 'mv_slider_link_text', true );
$link_text = get_post_meta($post->ID, 'mv_slider_link_text', true);
$link_url = get_post_meta($post->ID, 'mv_slider_link_url', true);
?>
<table class="form-table mv-slider-metabox">
    <tr>
        <th>
            <label for="mv_slider_link_text">Link Text</label>
            <!-- note that the for attribute matches the name of the input -->
        </th>
        <td>
            <input type="text" name="mv_slider_link_text" id="mv_slider_link_text" class="regular-text link-text" value="<?php echo $link_text; ?>" required>
        </td>
    </tr>
    <tr>
        <th>
            <label for="mv_slider_link_url">Link URL</label>
            <!-- note that the for attribute matches the name of the input -->
        </th>
        <td>
            <input type="url" name="mv_slider_link_url" id="mv_slider_link_url" class="regular-text link-url" value="<?php echo $link_url; ?>" required>
        </td>
    </tr>
</table>