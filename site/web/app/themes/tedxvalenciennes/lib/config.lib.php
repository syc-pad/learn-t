<?php
//Setup theme constant and default data
$theme_obj = wp_get_theme('grandconference');

define("GRANDCONFERENCE_THEMENAME", $theme_obj['Name']);
define("GRANDCONFERENCE_THEMEDEMO", false);
define("GRANDCONFERENCE_SHORTNAME", "pp");
define("GRANDCONFERENCE_THEMEVERSION", $theme_obj['Version']);
define("GRANDCONFERENCE_THEMEDEMOURL", $theme_obj['ThemeURI']);
define("GRANDCONFERENCE_THEMEDATEFORMAT", get_option('date_format'));
define("GRANDCONFERENCE_THEMETIMEFORMAT", get_option('time_format'));
define("GRANDCONFERENCE_BUILDERDOCURL", 'http://themes.themegoods.com/grandconference/doc/create-a-page-using-content-builder-2/');

//Get default WP uploads folder
$wp_upload_arr = wp_upload_dir();
define("GRANDCONFERENCE_THEMEUPLOAD", $wp_upload_arr['basedir']."/".strtolower(sanitize_title(GRANDCONFERENCE_THEMENAME))."/");
define("GRANDCONFERENCE_THEMEUPLOADURL", $wp_upload_arr['baseurl']."/".strtolower(sanitize_title(GRANDCONFERENCE_THEMENAME))."/");

if(!is_dir(GRANDCONFERENCE_THEMEUPLOAD))
{
	wp_mkdir_p(GRANDCONFERENCE_THEMEUPLOAD);
}

/**
*  Begin Global variables functions
*/

//Get default WordPress post variable
function grandconference_get_wp_post() {
	global $post;
	return $post;
}

//Get default WordPress file system variable
function grandconference_get_wp_filesystem() {
	WP_Filesystem();
	global $wp_filesystem;
	return $wp_filesystem;
}

//Get default WordPress wpdb variable
function grandconference_get_wpdb() {
	global $wpdb;
	return $wpdb;
}

//Get default WordPress wp_query variable
function grandconference_get_wp_query() {
	global $wp_query;
	return $wp_query;
}

//Get default WordPress customize variable
function grandconference_get_wp_customize() {
	global $wp_customize;
	return $wp_customize;
}

//Get default WordPress current screen variable
function grandconference_get_current_screen() {
	global $current_screen;
	return $current_screen;
}

//Get default WordPress paged variable
function grandconference_get_paged() {
	global $paged;
	return $paged;
}

//Get default WordPress registered widgets variable
function grandconference_get_registered_widget_controls() {
	global $wp_registered_widget_controls;
	return $wp_registered_widget_controls;
}

//Get default WordPress registered sidebars variable
function grandconference_get_registered_sidebars() {
	global $wp_registered_sidebars;
	return $wp_registered_sidebars;
}

//Get default Woocommerce variable
function grandconference_get_woocommerce() {
	global $woocommerce;
	return $woocommerce;
}

//Get all google font usages in customizer
function grandconference_get_google_fonts() {
	$grandconference_google_fonts = array('tg_body_font', 'tg_header_font', 'tg_menu_font', 'tg_sidemenu_font', 'tg_sidebar_title_font', 'tg_button_font');
	
	global $grandconference_google_fonts;
	return $grandconference_google_fonts;
}

//Get menu transparent variable
function grandconference_get_page_menu_transparent() {
	global $grandconference_page_menu_transparent;
	return $grandconference_page_menu_transparent;
}

//Set menu transparent variable
function grandconference_set_page_menu_transparent($new_value = '') {
	global $grandconference_page_menu_transparent;
	$grandconference_page_menu_transparent = $new_value;
}

//Get no header checker variable
function grandconference_get_is_no_header() {
	global $grandconference_is_no_header;
	return $grandconference_is_no_header;
}

//Get deafult theme screen CSS class
function grandconference_get_screen_class() {
	global $grandconference_screen_class;
	return $grandconference_screen_class;
}

//Set deafult theme screen CSS class
function grandconference_set_screen_class($new_value = '') {
	global $grandconference_screen_class;
	$grandconference_screen_class = $new_value;
}

//Get theme homepage style
function grandconference_get_homepage_style() {
	global $grandconference_homepage_style;
	return $grandconference_homepage_style;
}

//Set theme homepage style
function grandconference_set_homepage_style($new_value = '') {
	global $grandconference_homepage_style;
	$grandconference_homepage_style = $new_value;
}

//Get page gallery ID
function grandconference_get_page_gallery_id() {
	global $grandconference_page_gallery_id;
	return $grandconference_page_gallery_id;
}

//Get default theme options variable
function grandconference_get_options() {
	global $grandconference_options;
	return $grandconference_options;
}

//Set default theme options variable
function grandconference_set_options($new_value = '') {
	global $grandconference_options;
	$grandconference_options = $new_value;
}

//Get top bar setting
function grandconference_get_topbar() {
	global $grandconference_topbar;
	return $grandconference_topbar;
}

//Set top bar setting
function grandconference_set_topbar($new_value = '') {
	global $grandconference_topbar;
	$grandconference_topbar = $new_value;
}

//Get is hide title option
function grandconference_get_hide_title() {
	global $grandconference_hide_title;
	return $grandconference_hide_title;
}

//Set is hide title option
function grandconference_set_hide_title($new_value = '') {
	global $grandconference_hide_title;
	$grandconference_hide_title = $new_value;
}

//Get theme page content CSS class
function grandconference_get_page_content_class() {
	global $grandconference_page_content_class;
	return $grandconference_page_content_class;
}

//Set theme page content CSS class
function grandconference_set_page_content_class($new_value = '') {
	global $grandconference_page_content_class;
	$grandconference_page_content_class = $new_value;
}

//Get Kirki global variable
function grandconference_get_kirki() {
	global $kirki;
	return $kirki;
}

//Get admin theme global variable
function grandconference_get_wp_admin_css_colors() {
	global $_wp_admin_css_colors;
	return $_wp_admin_css_colors;
}

//Get theme plugins
function grandconference_get_plugins() {
	global $grandconference_tgm_plugins;
	return $grandconference_tgm_plugins;
}

//Set theme plugins
function grandconference_set_plugins($new_value = '') {
	global $grandconference_tgm_plugins;
	$grandconference_tgm_plugins = $new_value;
}

//Get page custom fields values
function grandconference_get_page_postmetas() {
	//Get all sidebars
	$theme_sidebar = array(
		'' => '',
		'Page Sidebar' => 'Page Sidebar', 
		'Contact Sidebar' => 'Contact Sidebar', 
		'Blog Sidebar' => 'Blog Sidebar',
	);
	
	$dynamic_sidebar = get_option('pp_sidebar');
	
	if(!empty($dynamic_sidebar))
	{
		foreach($dynamic_sidebar as $sidebar)
		{
			$theme_sidebar[$sidebar] = $sidebar;
		}
	}
	
	/*
		Get gallery list
	*/
	$args = array(
	    'numberposts' => -1,
	    'post_type' => array('galleries'),
	);
	
	$galleries_arr = get_posts($args);
	$galleries_select = array();
	$galleries_select['(Display Post Featured Image)'] = '';
	
	foreach($galleries_arr as $gallery)
	{
		$galleries_select[$gallery->ID] = $gallery->post_title;
	}
	
	/*
		Get page templates list
	*/
	if(function_exists('get_page_templates'))
	{
		$page_templates = get_page_templates();
		$page_templates_select = array();
		$page_key = 1;
		
		foreach ($page_templates as $template_name => $template_filename) 
		{
			$page_templates_select[$template_name] = get_template_directory_uri()."/functions/images/page/".basename($template_filename, '.php').".png";
			$page_key++;
		}
	}
	else
	{
		$page_templates_select = array();
	}
	
	/*
		Get all menus available
	*/
	$menus = get_terms('nav_menu');
	$menus_select = array(
		 '' => 'Default Menu'
	);
	foreach($menus as $each_menu)
	{
		$menus_select[$each_menu->slug] = $each_menu->name;
	}
	
	$grandconference_page_postmetas = array();
	$pp_menu_layout = get_option('pp_menu_layout');
		
	if($pp_menu_layout != 'leftmenu')
	{
	    $grandconference_page_postmetas[99] = array("section" => "Page Menu", "id" => "page_menu_transparent", "type" => "checkbox", "title" => "Make Menu Transparent", "description" => "Check this option if you want to display main menu in transparent");
	}
	
	$grandconference_page_postmetas_extended = 
		array (
			/*
				Begin Page custom fields
			*/
			array("section" => esc_html__('Page Template', 'grandconference' ), "id" => "page_custom_template", "type" => "template", "title" => esc_html__('Page Template', 'grandconference' ), "description" => esc_html__('Select template for this page', 'grandconference' ), "items" => $page_templates_select),
			
			array("section" => esc_html__('Page Title', 'grandconference' ), "id" => "page_show_title", "type" => "checkbox", "title" => esc_html__('Hide Default Page Header', 'grandconference' ), "description" => esc_html__('Check this option if you want to hide default page header', 'grandconference' )),
			
			array("section" => esc_html__('Page Tagline', 'grandconference' ), "id" => "page_tagline", "type" => "textarea", "title" => esc_html__('Page Tagline (Optional)', 'grandconference' ), "description" => esc_html__('Enter page tagline. It will displays under page title (*Note: HTML code also support)', 'grandconference' )),
			
			array(
    			"section" 		=> esc_html__('Page Attributes', 'grandconference' ), 
    			"id" 			=> "page_header_type", 
    			"type" 			=> "select", 
    			"title" 		=> esc_html__('Header Content Type', 'grandconference' ), 
    			"description" 	=> esc_html__('Select header content type for this page.', 'grandconference' ), 
				"items" 		=> array(
					"Image" => "Featured Image",
					"Vimeo Video" => "Vimeo Video",
					"Youtube Video" => "Youtube Video",
			)),
				
			array(
				"section" 		=> esc_html__('Page Attributes', 'grandconference' ), 
				"id" 			=> "page_header_vimeo", 
				"type" 			=> "text", 
				"title" 		=> esc_html__('Vimeo Video ID (Optional)', 'grandconference' ), 
				"description" 	=> esc_html__('Please enter Vimeo Video ID for example 73317780', 'grandconference' )
			),
			
			array(
				"section" 		=> esc_html__('Page Attributes', 'grandconference' ), 
				"id" 			=> "page_header_youtube", 
				"type" 			=> "text", 
				"title" 		=> esc_html__('Youtube Video ID (Optional)', 'grandconference' ), 
				"description" 	=> esc_html__('Please enter Youtube Video ID for example 6AIdXisPqHc', 'grandconference' )
			),
			
			array("section" => esc_html__('Select Sidebar (Optional)', 'grandconference' ), "id" => "page_sidebar", "type" => "select", "title" => esc_html__('Page Sidebar (Optional)', 'grandconference' ), "description" => esc_html__('Select this page sidebar to display. To use this option, you have to select page template end with "Sidebar" only', 'grandconference' ), "items" => $theme_sidebar),
			
			array("section" => esc_html__('Select Menu', 'grandconference' ), "id" => "page_menu", "type" => "select", "title" => esc_html__('Page Menu (Optional)', 'grandconference' ), "description" => esc_html__('Select this page menu if you want to display main menu other than default one', 'grandconference' ), "items" => $menus_select),
		);
	
	
	$grandconference_page_postmetas = $grandconference_page_postmetas + $grandconference_page_postmetas_extended;
		
	return $grandconference_page_postmetas;
}
?>