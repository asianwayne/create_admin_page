<?php 
/**
 * @package ablog theme
 *
 */

$format_options = get_option('post_formats');

// $array = array_values($format_options);
// foreach($array as $option) {
// 	echo $option;
// }

$formats = array('aside','gallery','video','audio','link','image','quote','status','chat');
$output = array();
foreach ($formats as $format) {
	//var_dump($format);
	if (isset($format_options[$format]) == 1) {
		array_push($output, $format);
	}
	
}
if (!empty($format_options)) {
	
	add_theme_support( 'post-formats',$output );
} 
