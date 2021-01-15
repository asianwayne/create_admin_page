<?php 

function load_abt_admin_scripts($hook) {
	
	if ('ablog_page_abt_custom_css_page'  == $hook ) {
		wp_enqueue_script( 'ace-js', get_template_directory_uri() . '/js/ace/ace.js',array(),'1.0.0',true );
		wp_enqueue_script( 'custom-css-js', get_template_directory_uri() . '/framework/js/abt-custom-css.js',array(),'1.0.0',true );
		wp_enqueue_style('custom-css',get_template_directory_uri() . '/asssets/css/custom-css.css');
	} else {
		return;
	}

	// wp_enqueue_script('theme-page-jquery',get_template_directory_uri() . '/inc/js/abt-admin.js',array('jquery'),'1.0.0',true);
	
}

add_action('admin_enqueue_scripts','load_abt_admin_scripts');