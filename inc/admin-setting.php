<?php
function jtm_settings_init() {
	// register a new setting for "reading" page
	register_setting('jtmplugin', 'jtm_setting_name');
	register_setting('jtmplugin', 'jtm_setting_checkbox_name');

	// register a new section in the "reading" page
	add_settings_section(
		'JTM_settings_section',
		'general Settings Section', 
        'jtm_settings_section_callback',
		'jtmplugin'
	);

	// register a new field in the "wporg_settings_section" section, inside the "reading" page
	add_settings_field(
		'JTM_settings_field',
		'jtm Setting',
        'jtm_settings_field_callback',
		'jtmplugin',
		'JTM_settings_section'
	);

	add_settings_field(
		'JTM_settings_field_1',
		'checkbox',
        'jtm_settings_checkboxfield_callback',
		'jtmplugin',
		'JTM_settings_section'
	);
}

/**
 * register wporg_settings_init to the admin_init action hook
 */
add_action('admin_init', 'jtm_settings_init');

/**
 * callback functions
 */

// section content cb
function jtm_settings_section_callback() {
	echo '<p>Radhe Radhe Everyone</p>';
}

// field content cb
function jtm_settings_field_callback() {
	// get the value of the setting we've registered with register_setting()
	$setting = get_option('jtm_setting_name');
	// output the field
	?>
	<input type="text" name="jtm_setting_name" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
    <?php
}

function jtm_settings_checkboxfield_callback() {
	// get the value of the setting we've registered with register_setting()
	$setting = get_option('jtm_setting_checkbox_name');
	// output the field
	?>
	<input type="checkbox" name="jtm_setting_checkbox_name" <?php echo ($setting=='on'? 'checked':'')  ?>
    <?php
}