<?php 
/**
 * @package ablog-theme
 */

function blk_register_admin_page() {
	add_menu_page('Abog setting','ABLOG','manage_options','abt_admin_page','create_abt_admin_page','dashicons-columns',99);  // $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position 
	add_submenu_page('abt_admin_page','Ablog Theme Settings','General','manage_options','abt_admin_page','create_abt_admin_page');
	add_submenu_page('abt_admin_page','Ablog theme Option','Theme Options','manage_options','ablog_options_page','create_ablog_theme_option_callback');

	add_submenu_page('abt_admin_page','abt Custom Css','Custom Css','manage_options','abt_custom_css_page','create_abt_custom_css_callback');  // $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function 
	

	add_action('admin_init','abt_register_admin_fields');
}

add_action('admin_menu','blk_register_admin_page');

function create_abt_admin_page() {
	require get_template_directory() . '/framework/admin/templates/admin-theme-form.php';
}

function abt_register_admin_fields() {
	add_settings_section( 'abt_field_group_section',__('博客基本信息设置','ablog-theme'),'','abt_admin_page' );  //$id, $title, $callback, $page

	//社交网络图标和链接
	add_settings_section('abt_socialwork_one_section','Social work network #1','','abt_admin_page');

	register_setting('abt_field_group','social_title_1');
	add_settings_section('abt_social_title_1','Social Title','abt_social_title_1_field_callback','abt_admin_page','abt_socialwork_one_section','');

	register_setting('abt_field_group','social_icon_1');
	add_settings_section('abt_social_icon_1','Social icon','abt_social_icon_1_field_callback','abt_admin_page','abt_socialwork_one_section','');

	register_setting('abt_field_group','social_url_1');
	add_settings_section('abt_social_url_1','Social url','abt_social_url_1_field_callback','abt_admin_page','abt_socialwork_one_section','');

	//社交网络2
	//
	
	add_settings_section('abt_socialwork_two_section','Social work network #2','','abt_admin_page');

	register_setting('abt_field_group','social_title_2');
	add_settings_section('abt_social_title_2','Social Title','abt_social_title_2_field_callback','abt_admin_page','abt_socialwork_two_section','');

	register_setting('abt_field_group','social_icon_2');
	add_settings_section('abt_social_icon_2','Social icon','abt_social_icon_2_field_callback','abt_admin_page','abt_socialwork_two_section','');

	register_setting('abt_field_group','social_url_2');
	add_settings_section('abt_social_url_2','Social url','abt_social_url_2_field_callback','abt_admin_page','abt_socialwork_two_section','');

	//社交网络3
	//
	add_settings_section('abt_socialwork_three_section','Social work network #3','','abt_admin_page');

	register_setting('abt_field_group','social_title_3');
	add_settings_section('abt_social_title_3','Social Title','abt_social_title_3_field_callback','abt_admin_page','abt_socialwork_three_section','');

	register_setting('abt_field_group','social_icon_3');
	add_settings_section('abt_social_icon_3','Social icon','abt_social_icon_3_field_callback','abt_admin_page','abt_socialwork_three_section','');

	register_setting('abt_field_group','social_url_3');
	add_settings_section('abt_social_url_3','Social url','abt_social_url_3_field_callback','abt_admin_page','abt_socialwork_three_section','');

	//社交网络4
	//
	add_settings_section('abt_socialwork_four_section','Social work network #4','','abt_admin_page');

	register_setting('abt_field_group','social_title_4');
	add_settings_section('abt_social_title_4','Social Title','abt_social_title_4_field_callback','abt_admin_page','abt_socialwork_four_section','');

	register_setting('abt_field_group','social_icon_4');
	add_settings_section('abt_social_icon_4','Social icon','abt_social_icon_4_field_callback','abt_admin_page','abt_socialwork_four_section','');

	register_setting('abt_field_group','social_url_4');
	add_settings_section('abt_social_url_4','Social url','abt_social_url_4_field_callback','abt_admin_page','abt_socialwork_four_section','');

	//modal section
	
	add_settings_section('abt_modal_section',__('文章打赏弹出设置','ablog-theme'),'','abt_admin_page');
	register_setting('abt_field_group','modal_wx_title');
	add_settings_section('abt_wx_modal_title',__('微信打赏标题','ablog-theme'),'abt_modal_wx_title_callback','abt_admin_page','abt_modal_section');

	register_setting('abt_field_group','modal_ali_title');
	add_settings_section('abt_modal_ali_title',__('支付宝打赏标题','ablog-theme'),'abt_modal_ali_title_callback','abt_admin_page','abt_modal_section');

	register_setting('abt_field_group','modal_wx_img');
	add_settings_section('abt_modal_wx_img',__('微信打赏二维码','ablog-theme'),'abt_modal_wx_img_callback','abt_admin_page','abt_modal_section');

	register_setting('abt_field_group','modal_ali_img');
	add_settings_section('abt_modal_ali_img',__('支付宝打赏二维码','ablog-theme'),'abt_modal_ali_img_callback','abt_admin_page','abt_modal_section');



	//fields
	register_setting('abt_field_group','copyright'); //第二个是写入option表里的 值 ， 注册设置选项和数据 
	add_settings_field( 'abt_copyright','Copyright','abt_copyright_field_callback','abt_admin_page','abt_field_group_section',''  );  //$id, $title, $callback, $page, $section, $args  为这个管理页面的区域section添加字段， 就是管理页面每一项的内容。 通过回调函数读取注册的option的值。 
	register_setting('abt_field_group','intro_heading');
	add_settings_field( 'abt_intro_heading','Who am I','abt_intro_heading_callback','abt_admin_page','abt_field_group_section','' );
	register_setting('abt_field_group','intro_text');
	add_settings_field( 'abt_intro_text','首页介绍信息','abt_intro_text_callback','abt_admin_page','abt_field_group_section','' );
	register_setting('abt_field_group','intro_option_one');
	add_settings_field( 'abt_intro_option_one','介绍选项一','abt_intro_option_one_callback','abt_admin_page','abt_field_group_section','' );
	register_setting('abt_field_group','intro_option_two');
	add_settings_field( 'abt_intro_option_two','介绍选项二','abt_intro_option_two_callback','abt_admin_page','abt_field_group_section','' );
	register_setting('abt_field_group','intro_option_three');
	add_settings_field( 'abt_intro_option_three','介绍选项三','abt_intro_option_three_callback','abt_admin_page','abt_field_group_section','' );
	register_setting('abt_field_group','intro_option_four');
	add_settings_field( 'abt_intro_option_four','介绍选项四','abt_intro_option_four_callback','abt_admin_page','abt_field_group_section','' );
	register_setting('abt_field_group','beianhao');
	add_settings_field('abt_beianhao',__('备案号','ablog-theme'),'abt_beianhao_callback','abt_admin_page','abt_field_group_section');

	//image
	register_setting('abt_field_group','home_avatar');
	add_settings_field('abt_home_avatar',__('首页焦点图','ablog-theme'),'abt_home_avatar_callback','abt_admin_page','abt_field_group_section');

	register_setting('abt_field_group','flogo');
	add_settings_field('abt_flogo',__('底部logo','ablog-theme'),'abt_flogo_callback','abt_admin_page','abt_field_group_section');

	/*
		Theme SUpport options
	 */
	
	add_settings_section('abt-theme-options','Theme Option','abt_theme_options_section_callback','ablog_options_page'); // $id, $title, $callback, $page 
	
	register_setting('abt-theme-support','post_formats','abt_post_formats_callback');
	add_settings_field( 'abt_post_formats','Post Formats','abt_post_formats_fields_callback','ablog_options_page','abt-theme-options' );  //$id, $title, $callback, $page, $section, $args 

	//焦点图社交icon显示状态
	register_setting('abt-theme-support','social_icon_status');
	add_settings_field('abt_social_icon_status','Show banner social icons','abt_social_icon_status_callback','ablog_options_page','abt-theme-options');

	//尾部社交icon显示状态
	register_setting('abt-theme-support','footer_icon_status');
	add_settings_field('footer_icon_status','Show footer icon','abt_show_footer_icon_callback','ablog_options_page','abt-theme-options');

	//显示logo还是显示博客标题
	register_setting('abt-theme-support','abt_custom_logo');
	add_settings_field('abt_show_custom_logo','Show logo image','abt_show_custom_logo_callback','ablog_options_page','abt-theme-options');


	//custom css fields
	
	register_setting('abt-custom-css-option','abt_custom_css','sanitize_abt_custom_css');
	add_settings_section( 'abt-custom-css-option-section','','','abt_custom_css_page' );  //$id, $title, $callback, $page
	add_settings_field( 'abt_custom_css_option','Custom Css Setting','abt_custom_css_option_callback','abt_custom_css_page','abt-custom-css-option-section','' );  //$id, $title, $callback, $page, $section, $args 

}

//admin [page] callback
//
//
//

//modal functions
//
function abt_modal_wx_img_callback() {
	$modal_wx_img = esc_attr( get_option('modal_wx_img') ); ?>
	<input id="abt_modal_wx_img_entry" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="modal_wx_img" value="<?php echo $modal_wx_img; ?>" />
	<input id="upload_modal_wx_img_button" type="button" class="button" value="<?php _e( 'Upload', 'ablog-theme' )  ?>" />
	<input type="hidden" name="modal_wx_img" value="<?php echo $modal_wx_img; ?>" id="modal_wx_img">


	<p class="extra-text"><?php _e('this is a description'); ?></p>

	
	<?php 
}

function abt_modal_ali_img_callback() {
	$modal_ali_img = esc_attr( get_option('modal_ali_img') ); ?>
	<input id="abt_modal_ali_img_entry" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="modal_ali_img" value="<?php echo $modal_ali_img; ?>" />
	<input id="upload_modal_ali_img_button" type="button" class="button" value="<?php _e( 'Upload', 'ablog-theme' )  ?>" />
	<input type="hidden" name="modal_ali_img" value="<?php echo $modal_ali_img; ?>" id="modal_ali_img">


	<p class="extra-text"><?php _e('this is a description'); ?></p>

	
	<?php 
}

function abt_modal_wx_title_callback() {
	$modal_wx_title = esc_attr( get_option('modal_wx_title')); ?>

	<input type="text" name="modal_wx_title" value="<?php echo $modal_wx_title; ?>" placeholder="" class="regular-text">
	<p>option:modal_wx_title</p>

	<?php 
}

function abt_modal_ali_title_callback() {
	$modal_ali_title = esc_attr( get_option('modal_ali_title')); ?>

	<input type="text" name="modal_ali_title" value="<?php echo $modal_ali_title; ?>" placeholder="" class="regular-text">
	<p>option:modal_ali_title</p>

	<?php 
}

function abt_social_title_1_field_callback() {
	$social_title_1 = esc_attr( get_option('social_title_1')); ?>
	
	<input type="text" name="social_title_1" value="<?php echo $social_title_1; ?>" placeholder="" class="regular-text">
	<p>option:social_title_1</p>
	

	<?php 
}

function abt_social_icon_1_field_callback() {
	$social_icon_1 = esc_attr( get_option('social_icon_1')); ?>

	<input type="text" name="social_icon_1" value="<?php echo $social_icon_1; ?>" placeholder="" class="regular-text">
	<p>option:social_icon_1</p>

	<?php 
}

function abt_social_url_1_field_callback() {
	$social_url_1 = esc_attr( get_option('social_url_1')); ?>

	<input type="text" name="social_url_1" value="<?php echo $social_url_1; ?>" placeholder="" class="regular-text">
	<p>option:social_url_1</p>

	<?php 
}

function abt_social_title_2_field_callback() {
	$social_title_2 = esc_attr( get_option('social_title_2')); ?>

	<input type="text" name="social_title_2" value="<?php echo $social_title_2; ?>" placeholder="" class="regular-text">
	<p>option:social_title_2</p>

	<?php 
}

function abt_social_icon_2_field_callback() {
	$social_icon_2 = esc_attr( get_option('social_icon_2')); ?>

	<input type="text" name="social_icon_2" value="<?php echo $social_icon_2; ?>" placeholder="" class="regular-text">
	<p>option:social_icon_2</p>

	<?php 
}

function abt_social_url_2_field_callback() {
	$social_url_2 = esc_attr( get_option('social_url_2')); ?>

	<input type="text" name="social_url_2" value="<?php echo $social_url_2; ?>" placeholder="" class="regular-text">
	<p>option:social_url_2</p>

	<?php 
}

function abt_social_title_3_field_callback() {
	$social_title_3 = esc_attr( get_option('social_title_3')); ?>

	<input type="text" name="social_title_3" value="<?php echo $social_title_3; ?>" placeholder="" class="regular-text">
	<p>option:social_title_3</p>

	<?php 
}

function abt_social_icon_3_field_callback() {
	$social_icon_3 = esc_attr( get_option('social_icon_3')); ?>

	<input type="text" name="social_icon_3" value="<?php echo $social_icon_3; ?>" placeholder="" class="regular-text">
	<p>option:social_icon_3</p>

	<?php 
}

function abt_social_url_3_field_callback() {
	$social_url_3 = esc_attr( get_option('social_url_3')); ?>

	<input type="text" name="social_url_3" value="<?php echo $social_url_3; ?>" placeholder="" class="regular-text">
	<p>option:social_url_3</p>

	<?php 
}

function abt_social_title_4_field_callback() {
	$social_title_4 = esc_attr( get_option('social_title_4')); ?>

	<input type="text" name="social_title_4" value="<?php echo $social_title_4; ?>" placeholder="" class="regular-text">
	<p>option:social_title_4</p>

	<?php 
}

function abt_social_icon_4_field_callback() {
	$social_icon_4 = esc_attr( get_option('social_icon_4')); ?>

	<input type="text" name="social_icon_4" value="<?php echo $social_icon_4; ?>" placeholder="" class="regular-text">
	<p>option:social_icon_4</p>

	<?php 
}

function abt_social_url_4_field_callback() {
	$social_url_4 = esc_attr( get_option('social_url_4')); ?>

	<input type="text" name="social_url_4" value="<?php echo $social_url_4; ?>" placeholder="" class="regular-text">
	<p>option:social_url_4</p>

	<?php 
}



function abt_show_custom_logo_callback() {

	?>

	

	<select name="abt_custom_logo" id="abt_custom_logo">
		<?php 
	$custom_logo = get_option('abt_custom_logo');
	$show_logo = array('logo','title');
	
	foreach ($show_logo as $item) :
		if( get_option('abt_custom_logo') == $item ){$selected = "selected";  } else{$selected = "";}
	 ?>
		<option value="<?php echo $item; ?>" <?php echo $selected; ?>><?php echo $item; ?></option>
		<?php endforeach; ?>
	</select>

	<?php
	

}
function abt_social_icon_status_callback() {
	
 ?>
	<span class="label">
		<?php if( !empty($value['name']) ) echo $value['name']; ?></span>
		<?php if( get_option('social_icon_status') == true ){$checked = "checked=\"checked\"";  } else{$checked = "";} ?>
		<input class="on-of" type="checkbox" name="social_icon_status" id="<?php echo $value['id'] ?>" value="true" <?php echo $checked; ?> />

	<?php 
	
}

function abt_show_footer_icon_callback() {
	?>
	<span class="label">
		<?php if( !empty($value['name']) ) echo $value['name']; ?></span>
		<?php if( get_option('footer_icon_status') == true ){$checked = "checked=\"checked\"";  } else{$checked = "";} ?>
		<input class="on-of" type="checkbox" name="footer_icon_status" id="<?php echo $value['id'] ?>" value="true" <?php echo $checked; ?> />

	<?php 
}

function abt_copyright_field_callback() {
	$copyright = esc_attr( get_option('copyright')); ?>

	<input type="text" name="copyright" value="<?php echo $copyright; ?>" placeholder="输入版权信息" class="regular-text">
	<p>option:copyright</p>

	<?php 
}

function create_ablog_theme_option_callback() {
	require_once get_template_directory() . '/framework/admin/templates/abt-theme-support.php';
}

function create_abt_custom_css_callback() {
	require_once get_template_directory() . '/framework/admin/templates/abt-custom-css.php';
}

//post formats callback function

function abt_post_formats_callback($input) {
	return $input;
}

function abt_post_formats_fields_callback() {
	$post_formats = get_option('post_formats');  //esc_attr cant use in array
	$formats = array('aside','gallery','video','audio','link','image','quote','status','chat');
	$output = '';
	foreach ($formats as $format) {
		$checked = (@$post_formats[$format] == 1 ? 'checked' : '' );  // @即isset函数
		$output .= '<label><input type="checkbox" id="' . $format . '" name="post_formats['. $format .']" value="1" '. $checked .' >' . $format . '</label></br>';
	}
	echo $output;
}

//section callback

function abt_theme_options_section_callback() {
	echo "Activate and deactivate";
}

//sanitize callback

function sanitize_abt_custom_css($input) {
	$output = esc_textarea( $input );
	return $output;
}


//fileds callback
function abt_intro_heading_callback() {
	$intro_heading = esc_attr( get_option('intro_heading')); ?>

	<input type="text" name="intro_heading" value="<?php echo $intro_heading; ?>" placeholder="介绍标题" class="regular-text">
	<p>option:intro_heading</p>

	<?php 
}


function abt_intro_option_one_callback() {
	$intro_option_one = esc_attr( get_option('intro_option_one')); ?>

	<input type="text" name="intro_option_one" value="<?php echo $intro_option_one; ?>" placeholder="选项一" class="regular-text">
	<p>option:intro_option_one</p>

	<?php 
}

function abt_intro_option_two_callback() {
	$intro_option_two = esc_attr( get_option('intro_option_two')); ?>

	<input type="text" name="intro_option_two" value="<?php echo $intro_option_two; ?>" placeholder="选项二" class="regular-text">
	<p>option:intro_option_two</p>

	<?php 
}
function abt_intro_option_three_callback() {
	$intro_option_three = esc_attr( get_option('intro_option_three')); ?>

	<input type="text" name="intro_option_three" value="<?php echo $intro_option_three; ?>" placeholder="选项三" class="regular-text">
	<p>option:intro_option_three</p>

	<?php 
}

function abt_beianhao_callback() {
	$beianhao = esc_attr( get_option('beianhao')); ?>

	<input type="text" name="beianhao" value="<?php echo $beianhao; ?>" placeholder="输入你的备案号" class="regular-text">
	<p>option:beianhao</p>

	<?php 
}


function abt_intro_option_four_callback() {
	$intro_option_four = esc_attr( get_option('intro_option_four')); ?>

	<input type="text" name="intro_option_four" value="<?php echo $intro_option_four; ?>" placeholder="选项三" class="regular-text">
	<p>option:intro_option_four</p>

	<?php 
}

function abt_intro_text_callback() {
	$intro_text = esc_attr( get_option('intro_text')); ?>

	<input type="text" name="intro_text" value="<?php echo $intro_text; ?>" placeholder="介绍信息" class="regular-text">
	<p>option:intro_text</p>

	<?php 
}

function abt_home_avatar_callback() {
	$home_avatar = esc_attr( get_option('home_avatar') ); ?>
	<input id="abt_home_avatar_entry" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="home_avatar" value="<?php echo $home_avatar; ?>" />
	<input id="upload_home_avatar_button" type="button" class="button" value="<?php _e( 'Upload', 'ablog-theme' )  ?>" />
	<input type="hidden" name="home_avatar" value="<?php echo $home_avatar; ?>" id="home_avatar">


	<p class="extra-text"><?php _e('this is a description'); ?></p>

	
	<?php 
}

function abt_flogo_callback($value) {
	$flogo = get_option('flogo');
	
	?>
	<input id="abt_flogo_entry" class="img-path" type="text" size="56" style="direction:ltr; text-align:left" name="flogo" value="<?php echo $flogo; ?>" />
	<input id="upload_flogo_button" type="button" class="button" value="<?php _e( 'Upload', 'ablog-theme' )  ?>" />
	<input type="hidden" name="flogo" value="<?php echo $flogo; ?>" id="flogo">


	<p class="extra-text"><?php _e('this is a description'); ?></p>


	<?php 
}

/**

function abt_flogo_callback() {
	$flogo = esc_attr( get_option('flogo') ); ?>
	<input type="text" id="dom_flogo_url" class="regular-text" value="<?php echo $flogo; ?>">
	<br>
	<input type="button" class="button button-secondary mt-2" value="选择图片上传" id="upload-flogo">
	<input type="hidden" name="flogo" value="<?php echo $flogo; ?>" id="flogo">
	<p>网站背景图调用关键词：flogo,尺寸 未知</p>

	<?php
}
*/


function abt_custom_css_option_callback() {
	$css = get_option('abt_custom_css');
	$css = (empty($css)) ? '/* ABT CUSTOM CSS */' : $css;  ?>
	<div id="customCss"><?php echo $css; ?></div>
	<textarea name="abt_custom_css" id="abt_custom_css" cols="30" rows="10" style="display: none;visibility: hidden;"><?php echo $css; ?></textarea>
	<?php
}

