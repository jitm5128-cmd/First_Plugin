<?php 

// Register Meta Box
function add_project_meta_info_meta_box() {
    add_meta_box(
        'project_meta_info',
        'Project Meta Info',
        'project_meta_info_meta_box_callback',
        ["post"],
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'add_project_meta_info_meta_box');

// Meta Box Callback
function project_meta_info_meta_box_callback($post) {
    wp_nonce_field('project_meta_info_meta_box', 'project_meta_info_meta_box_nonce');
    $values = get_post_meta($post->ID);
    ?>
    <div class="meta-box-container">
        
        <div class="meta-box-field">
            <label for="project_url">Project URL</label>
            <input
                type="url"
                id="project_url"
                name="project_url"
                value="<?php echo esc_attr(isset($values['project_url'][0]) ? $values['project_url'][0] : ''); ?>"
            />
        </div>
        
        <div class="meta-box-field">
            <label for="project_duration">Project Duration</label>
            <input
                type="text"
                id="project_duration"
                name="project_duration"
                value="<?php echo esc_attr(isset($values['project_duration'][0]) ? $values['project_duration'][0] : ''); ?>"
            />
        </div>
        
        <div class="meta-box-field">
            <label for="project_cost">Development Cost</label>
            <input
                type="text"
                id="project_cost"
                name="project_cost"
                value="<?php echo esc_attr(isset($values['project_cost'][0]) ? $values['project_cost'][0] : ''); ?>"
            />
        </div>
    </div>
    <?php
}

// Save Meta Box Data
function save_project_meta_info_meta_box_data($post_id) {
    if (!isset($_POST['project_meta_info_meta_box_nonce'])) {
        return;
    }
    if (!wp_verify_nonce($_POST['project_meta_info_meta_box_nonce'], 'project_meta_info_meta_box')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    
    if (isset($_POST['project_url'])) {
        update_post_meta($post_id, 'project_url', sanitize_text_field($_POST['project_url']));
    }
    
    if (isset($_POST['project_duration'])) {
        update_post_meta($post_id, 'project_duration', sanitize_text_field($_POST['project_duration']));
    }
    
    if (isset($_POST['project_cost'])) {
        update_post_meta($post_id, 'project_cost', sanitize_text_field($_POST['project_cost']));
    }
}
add_action('save_post', 'save_project_meta_info_meta_box_data');