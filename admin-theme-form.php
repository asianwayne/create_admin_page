<h1><?php _e('设置博客主题选项'); ?></h1>
	<?php settings_errors(); ?>
	<form action="options.php" method="post">
		<?php settings_fields( 'abt_field_group' ); ?>
		<?php do_settings_sections( 'abt_admin_page' ); ?>
		<?php submit_button(); ?>
	</form>