<h1>ABT THEME SUPPORT</h1>
<?php settings_errors(); ?>

<form action="options.php" method="post">
	<?php settings_fields( 'abt-theme-support' ); ?>
	<?php do_settings_sections( 'ablog_options_page' ); ?>
	<?php submit_button(); ?>
</form>