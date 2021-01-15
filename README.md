# create_admin_page  wordpress 主题开发教学QQ群706173813 免费送主题

首先在inc或者frameword文件夹下创建admin文件夹，
放入theme-options.php还有enqueue和theme-support等两个文件，
并在functions.php里面通过require引入进来。

theme_options.php是主要文件。

首先创建注册admin page的函数，abt_create_admin_page,并添加在钩子admin_menu

function blk_register_admin_page(){}
add_action('admin_menu','blk_register_admin_page');

然后通过add_menu_page(）注册第一个管理页面，这函数有几个参数组成：
$page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position 
用法如下：
add_menu_page('Abog setting','ABLOG','manage_options',
'abt_admin_page','create_abt_admin_page','dashicons-columns',99);

这个创建的是主要管理页面也就是显示在管理面板左侧面板栏的页面，如果我们要添加二级页面，也就是显示在主要页面下面的
分类管理页面，我们要用到add_submenu_page（）函数，这函数由以下几个参数构成：
$parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function 
用法如下：
add_submenu_page('abt_admin_page','Ablog theme Option','Theme Options',
'manage_options','ablog_options_page','create_ablog_theme_option_callback');

如果要创建子级页面，第一个子级页面应该是和父级页面一样的menu_slug和一样的回调函数，不然会有错位。

每个子级页面都有自己回调函数来创建form表格。有单独的menu slug.

通过管理页面的回调函数，引入页面的模板，来调出在页面上展示的field的内容。

function create_abt_admin_page() {
	require get_template_directory() . '/framework/admin/templates/admin-theme-form.php';
}

管理页面form展示内容里添加要展示的字段组：

<h1><?php _e('设置博客主题选项'); ?></h1>
	<?php settings_errors(); ?>
	<form action="options.php" method="post">
		<?php settings_fields( 'abt_field_group' ); ?>
		<?php do_settings_sections( 'abt_admin_page' ); ?>
		<?php submit_button(); ?>
	</form>

然后创建字段注册函数，并添加在admin_init钩子上。

function abt_register_admin_fields() {}
add_action('admin_init','abt_register_admin_fields');
钩子最好添加在注册管理页面的函数里面，这样就会变成你只有在注册管理页面的时候才会导入这个钩子

字段注册函数主要有三个部分，可以注册无数字段：
注册流程：
首先注册section:add_settings_section()，参数有$id, $title, $callback, $page
召回函数可以为空，只有id是必须。

然后注册字段：register_setting（）参数第一个是字段组，第二个是字段内容，第三个参数是args，是array，可以用来
创建字段过滤函数等。字段内容的话会写在option表里面。也就是下面要创建的Input输入框的name值。
用法如下：register_setting('abt-theme-support','post_formats','abt_post_formats_callback');

第三个是要添加要显示的section:add_settings_section()参数有string $id, string $title, callable $callback, string $page
第二个字段的话是名字，可以用翻译函数—__() , 第三个是回调函数，第四个是要展示在哪个管理页面

然后创建回调函数：来创建input输入框与wordpress进行通信：

function abt_modal_wx_title_callback() {
	$modal_wx_title = esc_attr( get_option('modal_wx_title')); ?>

	<input type="text" name="modal_wx_title" value="<?php echo $modal_wx_title; ?>" placeholder="" class="regular-text">
	<p>option:modal_wx_title</p>

	<?php 
}

图片调用的input要多增加hidden的input框：和上传Button

function abt_flogo_callback($value) {
	$flogo = get_option('flogo');
	
	?>
	<input id="abt_flogo_entry" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="flogo" value="<?php echo $flogo; ?>" />
	<input id="upload_flogo_button" type="button" class="button" value="<?php _e( 'Upload', 'ablog-theme' )  ?>" />
	<input type="hidden" name="flogo" value="<?php echo $flogo; ?>" id="flogo">


	<p class="extra-text"><?php _e('this is a description'); ?></p>


	<?php 
}

图片输入还要在js创建wp.media来召唤图片上传弹出mediauploder.具体样例看js文件。

如果要单独在某个option页面调用css文件的话，要用到$hook参数，如

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







