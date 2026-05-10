<?php
function jtm_plugin_page() {
    ?>
    <div class="wrap">
      <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
      <form action="options.php" method="post">
        <?php
        // output security fields for the registered setting "wporg_options"
        settings_fields( 'jtmplugin' );
        // output setting sections and their fields
        // (sections are registered for "wporg", each field is registered to a specific section)
        do_settings_sections( 'jtmplugin' );
        // output save settings button
        submit_button( __( 'Save Settings', 'jtm-plugin' ) );
        ?>
      </form>
    </div>
    <?php
}

function jtm_plugin_sub_page() {
	?>
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="options.php" method="post">
			<?php
			// output security fields for the registered setting "wporg_options"
			settings_fields( 'jtmplugin' );
			// output setting sections and their fields
			// (sections are registered for "wporg", each field is registered to a specific section)
			do_settings_sections( 'jtmplugin' );
			// output save settings button
			submit_button( __( 'Save Settings', 'jtm-plugin' ) );
			?>
		</form>
	</div>
	<?php
}