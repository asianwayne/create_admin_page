<h1><?php _e('Ablog Custom Css'); ?></h1>

<?php settings_errors(); ?>
<form id="save-custom-css-form" action="options.php" method="post" class="abt-general-form">
	<?php settings_fields( 'abt-custom-css-option' ); ?>
	<?php do_settings_sections( 'abt_custom_css_page' ); ?>
	<?php submit_button(); ?>
</form>