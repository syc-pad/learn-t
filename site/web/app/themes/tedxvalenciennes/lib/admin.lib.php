<?php
//Layout styling
$customizer_styling_arr = array( 
	array('id'	=>	'styling1', 'title' => 'Classic Conference'),
	array('id'	=>	'demo2', 'title' => 'Music Event'),
	array('id'	=>	'demo3', 'title' => 'One Page Event'),
	array('id'	=>	'styling2', 'title' => 'Center Align Menu'),
	array('id'	=>	'styling3', 'title' => 'Center Logo With 2 Menus'),
	array('id'	=>	'styling4', 'title' => 'Fullscreen Menu'),
	array('id'	=>	'styling5', 'title' => 'Side Menu'),
	array('id'	=>	'styling6', 'title' => 'Frame'),
	array('id'	=>	'styling7', 'title' => 'Boxed'),
	array('id'	=>	'styling8', 'title' => 'With Top Bar'),
);

$customizer_styling_html = '<ul id="get_styling_content" class="demo_list">';

foreach($customizer_styling_arr as $customizer_styling)
{
	$customizer_styling_html.= '
		<li data-styling="'.$customizer_styling['id'].'">
			<div class="item_content_wrapper">
				<div class="item_content">
			    	<div class="item_thumb"><img src="'.get_template_directory_uri().'/cache/demos/customizer/screenshots/'.$customizer_styling['id'].'.jpg" alt=""/></div>
			    	<div class="item_content">
					    <div class="title"><strong>'.$customizer_styling['title'].'</strong></div>
						<div class="import">
						    <input data-styling="'.$customizer_styling['id'].'" type="button" value="Activate" class="pp_get_styling_button button"/>
						</div>
					</div>
				</div>
			</div>
	    </li>';
}

$customizer_styling_html.= '</ul>';

//Layout demo importer
$customizer_import_demo_arr = array( 
	array('id'	=>	1, 'title' => 'Classic Conference', 'url' => 'http://themes.themegoods.com/grandconference/demo/'),
	array('id'	=>	2, 'title' => 'Music Event', 'url' => 'http://themes.themegoods.com/grandconference/demo2/'),
	array('id'	=>	3, 'title' => 'One Page Event', 'url' => 'http://themes.themegoods.com/grandconference/demo3/'),
);

$customizer_import_demo_html = '<ul id="import_demo_content" class="demo_list">';

foreach($customizer_import_demo_arr as $customizer_import_demo)
{
	$customizer_import_demo_html.= '
		<li>
			<div class="item_content_wrapper">
				<div class="item_content">
			    	<div class="item_thumb">
			    		<a href="'.esc_url($customizer_import_demo['url']).'" target="_blank">
			    			<img src="'.get_template_directory_uri().'/cache/demos/xml/demo'.$customizer_import_demo['id'].'/'.$customizer_import_demo['id'].'.jpg" alt=""/>
			    		</a>		
			    	</div>
			    	<div class="item_content">
					    <div class="title"><strong>'.$customizer_import_demo['title'].'</strong></div>
						<div class="import">
						    <input data-key="'.$customizer_import_demo['id'].'" type="button" value="Import" class="pp_import_demo_button button"/>
						</div>
					</div>
				</div>
			</div>
	    </li>';
}

$customizer_import_demo_html.= '</ul><br class="clear"/>';

/*
	Begin creating admin options
*/

$getting_started_html = '<div class="one_half">
		<div class="step_icon">
			<a href="'.admin_url("themes.php?page=install-required-plugins").'">
				<i class="fa fa-plug"></i>
				<div class="step_title">Install Plugins</div>
			</a>
		</div>
		<div class="step_info">
			Theme has required and recommended plugins in order to build your website using layouts you saw on our demo site. We recommend you to install all plugins first.
		</div>
	</div>';

//Check if Grand Photography plugin is installed	
$grandconference_custom_post = 'grandconference-custom-post/grandconference-custom-post.php';

if( !function_exists('is_plugin_active') ) {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

$grandconference_custom_post_activated = is_plugin_active($grandconference_custom_post);
if($grandconference_custom_post_activated)
{
	$getting_started_html.= '<div class="one_half last">
		<div class="step_icon">
			<a href="'.admin_url("edit-tags.php?taxonomy=scheduleday&post_type=session").'">
				<i class="fa fa-calendar"></i>
				<div class="step_title">Create Day</div>
			</a>
		</div>
		<div class="step_info">
			First you need to create days for conference or event you have so you can assign sessions to each days of your event.
		</div>
	</div>
	
	<br style="clear:both;"/>
	
	<div class="one_half">
		<div class="step_icon">
			<a href="'.admin_url("post-new.php?post_type=session").'">
				<i class="fa fa-desktop"></i>
				<div class="step_title">Create Session</div>
			</a>
		</div>
		<div class="step_info">
			'.GRANDCONFERENCE_THEMENAME.' provide advanced session option. Session is using for conference or event session in certain time period. For example keynote session for conference.
		</div>
	</div>
	
	<div class="one_half last">
		<div class="step_icon">
			<a href="'.admin_url("post-new.php?post_type=speaker").'">
				<i class="fa fa-user"></i>
				<div class="step_title">Create Speaker</div>
			</a>
		</div>
		<div class="step_info">
			'.GRANDCONFERENCE_THEMENAME.' provide advanced speaker option. You can create list of speakers and assign them to each session.
		</div>
	</div>
	
	<div class="one_half">
		<div class="step_icon">
			<a href="'.admin_url("post-new.php?post_type=ticket").'">
				<i class="fa fa-tag"></i>
				<div class="step_title">Create Ticket</div>
			</a>
		</div>
		<div class="step_info">
			'.GRANDCONFERENCE_THEMENAME.' provide advanced ticket option. You can create ticket start selling it online using Woocommerce plugin.
		</div>
	</div>';
}
	
$getting_started_html.='<div class="one_half last">
		<div class="step_icon">
			<a href="'.admin_url("post-new.php?post_type=page").'">
				<i class="fa fa-file-text-o"></i>
				<div class="step_title">Create Page</div>
			</a>
		</div>
		<div class="step_info">
			'.GRANDCONFERENCE_THEMENAME.' support standard WordPress page option. You can also use our live content builder to create and organise page contents.
		</div>
	</div>
	
	<div class="one_half">
		<div class="step_icon">
			<a href="'.admin_url("customize.php").'">
				<i class="fa fa-sliders"></i>
				<div class="step_title">Customize Theme</div>
			</a>
		</div>
		<div class="step_info">
			Start customize theme\'s layouts, typography, elements colors using WordPress customize and see your changes in live preview instantly.
		</div>
	</div>
	
	<div class="one_half last">
		<div class="step_icon">
			<a href="javascript:;" onclick="jQuery(\'#pp_panel_demo-content_a\').trigger(\'click\');">
				<i class="fa fa-database"></i>
				<div class="step_title">Import Demo</div>
			</a>
		</div>
		<div class="step_info">
			Upload demo content from our demo site. We recommend you to install all recommended plugins before importing demo contents.
		</div>
	</div>
	
	<br style="clear:both;"/>
	
	<div style="height:30px"></div>
	
	<h1>Support</h1>
	<div class="getting_started_desc">To access our support portal. You first must find your purchased code.</div>
	<div style="height:30px"></div>
	<hr/>
	<div style="height:30px"></div>
	<div class="one_half nomargin">
		<div class="step_icon">
			<a href="https://themegoods.ticksy.com/submit/" target="_blank">
				<i class="fa fa-commenting-o"></i>
				<div class="step_title">Submit a Ticket</div>
			</a>
		</div>
		<div class="step_info">
			We offer excellent support through our ticket system. Please make sure you prepare your purchased code first to access our services.
		</div>
	</div>
	
	<div class="one_half last nomargin">
		<div class="step_icon">
			<a href="http://themes.themegoods.com/grandconference/doc" target="_blank">
				<i class="fa fa-book"></i>
				<div class="step_title">Theme Document</div>
			</a>
		</div>
		<div class="step_info">
			This is the place to go find all reference aspects of theme functionalities. Our online documentation is resource for you to start using theme.
		</div>
	</div>
';

//Get system info
$wordpress_multisite = '-';
if(is_multisite())
{
	$wordpress_multisite = '<i class="fa fa-check"></i>';
}

$wordpress_debug = '-';
if(WP_DEBUG)
{
	$wordpress_debug = '<i class="fa fa-check"></i>';
}

//Get memory_limit
$memory_limit = ini_get('memory_limit');
$memory_limit_class = '';
$memory_limit_text = '';
if(intval($memory_limit) < 128)
{
    $memory_limit_class = 'tg_error';
    $has_error = 1;
    $memory_limit_text = '*RECOMMENDED 128M';
}
$memory_limit_text = '<div class="'.$memory_limit_class.'">'.$memory_limit.' '.$memory_limit_text.'</div>';

//Get post_max_size
$post_max_size = ini_get('post_max_size');
$post_max_size_class = '';
$post_max_size_text = '';
if(intval($post_max_size) < 32)
{
    $post_max_size_class = 'tg_error';
    $has_error = 1;
    $post_max_size_text = '*RECOMMENDED 32M';
}
$post_max_size_text = '<div class="'.$post_max_size_class.'">'.$post_max_size.' '.$post_max_size_text.'</div>';

//Get max_execution_time
$max_execution_time = ini_get('max_execution_time');
$max_execution_time_class = '';
$max_execution_time_text = '';
if($max_execution_time < 180)
{
    $max_execution_time_class = 'tg_error';
    $has_error = 1;
    $max_execution_time_text = '*RECOMMENDED 180';
}
$max_execution_time_text = '<div class="'.$max_execution_time_class.'">'.$max_execution_time.' '.$max_execution_time_text.'</div>';

//Get max_input_vars
$max_input_vars = ini_get('max_input_vars');
$max_input_vars_class = '';
$max_input_vars_text = '';
if(intval($max_input_vars) < 2000)
{
    $max_input_vars_class = 'tg_error';
    $has_error = 1;
    $max_input_vars_text = '*RECOMMENDED 2000';
}
$max_input_vars_text = '<div class="'.$max_input_vars_class.'">'.$max_input_vars.' '.$max_input_vars_text.'</div>';

//Get upload_max_filesize
$upload_max_filesize = ini_get('upload_max_filesize');
$upload_max_filesize_class = '';
$upload_max_filesize_text = '';
if(intval($upload_max_filesize) < 32)
{
    $upload_max_filesize_class = 'tg_error';
    $has_error = 1;
    $upload_max_filesize_text = '*RECOMMENDED 32M';
}
$upload_max_filesize_text = '<div class="'.$upload_max_filesize_class.'">'.$upload_max_filesize.' '.$upload_max_filesize_text.'</div>';

//Get GD library version
$php_gd_arr = gd_info();

$wordpress_child_theme = '-';
if(is_child_theme())
{
	$wordpress_child_theme = '<i class="fa fa-check"></i>';
}

$system_info_html = '<table class="widefat" cellspacing="0">
			<thead>
				<tr>
					<th colspan="3">WordPress Environment</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="title">Home URL:</td>
					<td class="help"><a href="javascript" title="The URL of your site\'s homepage." class="tooltipster">[?]</a></td>
					<td class="value">'.home_url('/').'</td>
				</tr>
				<tr>
					<td class="title">Site URL:</td>
					<td class="help"><a href="javascript" title="The root URL of your site." class="tooltipster">[?]</a></td>
					<td class="value">'.site_url('/').'</td>
				</tr>
				<tr>
					<td class="title">WP Version:</td>
					<td class="help"><a href="javascript" title="The version of WordPress installed on your site." class="tooltipster">[?]</a></td>
					<td class="value">'.get_bloginfo('version').'</td>
				</tr>
				<tr>
					<td class="title">WP Multisite:</td>
					<td class="help"><a href="javascript" title="Whether or not you have WordPress Multisite enabled." class="tooltipster">[?]</a></td>
					<td class="value">'.$wordpress_multisite.'</td>
				</tr>
				<tr>
					<td class="title">WP Memory Limit:</td>
					<td class="help"><a href="javascript" title="The maximum amount of memory (RAM) that your site can use at one time." class="tooltipster">[?]</a></td>
					<td class="value">'.$memory_limit_text.'</td>
				</tr>
				<tr>
					<td class="title">WP Debug Mode:</td>
					<td class="help"><a href="javascript" title="Displays whether or not WordPress is in Debug Mode." class="tooltipster">[?]</a></td>
					<td class="value">'.$wordpress_debug.'</td>
				</tr>
				<tr>
					<td class="title">Language:</td>
					<td class="help"><a href="javascript" title="The current language used by WordPress. Default = English" class="tooltipster">[?]</a></td>
					<td class="value">'.get_bloginfo('language').'</td>
				</tr>
			</tbody>
		</table>
		
		<div style="height:30px"></div>
		
		<table class="widefat" cellspacing="0">
			<thead>
				<tr>
					<th colspan="3">Server Environment</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="title">Server Info:</td>
					<td class="help"><a href="javascript" title="Information about the web server that is currently hosting your site." class="tooltipster">[?]</a></td>
					<td class="value">'.$_SERVER['SERVER_SOFTWARE'].'</td>
				</tr>
				<tr>
					<td class="title">PHP Version:</td>
					<td class="help"><a href="javascript" title="The version of PHP installed on your hosting server." class="tooltipster">[?]</a></td>
					<td class="value">'.phpversion().'</td>
				</tr>
				<tr>
					<td class="title">PHP Post Max Size:</td>
					<td class="help"><a href="javascript" title="The largest file size that can be contained in one post." class="tooltipster">[?]</a></td>
					<td class="value">'.$post_max_size_text.'</td>
				</tr>
				<tr>
					<td class="title">PHP Time Limit:</td>
					<td class="help"><a href="javascript" title="The amount of time (in seconds) that your site will spend on a single operation before timing out (to avoid server lockups)" class="tooltipster">[?]</a></td>
					<td class="value">'.$max_execution_time_text.'</td>
				</tr>
				<tr>
					<td class="title">PHP Max Input Vars:</td>
					<td class="help"><a href="javascript" title="The maximum number of variables your server can use for a single function to avoid overloads." class="tooltipster">[?]</a></td>
					<td class="value">'.$max_input_vars_text.'</td>
				</tr>
				<tr>
					<td class="title">Max Upload Size:</td>
					<td class="help"><a href="javascript" title="The largest filesize that can be uploaded to your WordPress installation." class="tooltipster">[?]</a></td>
					<td class="value">'.$upload_max_filesize_text.'</td>
				</tr>
				<tr>
					<td class="title">GD Library:</td>
					<td class="help"><a href="javascript" title="This library help resizing images and improve site loading speed" class="tooltipster">[?]</a></td>
					<td class="value">'.$php_gd_arr['GD Version'].'</td>
				</tr>
			</tbody>
		</table>
		
		<p>
			<strong>*Notice: Please note that all recommended value suggested for above table is only if you want to use DEMO CONTENT IMPORTER feature only. If you won\'t use importer, you can ignore them.</strong>
		</p>
		
		<div style="height:20px"></div>
		
		<table class="widefat" cellspacing="0">
			<thead>
				<tr>
					<th colspan="3">Theme</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="title">Name:</td>
					<td class="help"><a href="javascript" title="The name of the current active theme." class="tooltipster">[?]</a></td>
					<td class="value">'.GRANDCONFERENCE_THEMENAME.'</td>
				</tr>
				<tr>
					<td class="title">Version:</td>
					<td class="help"><a href="javascript" title="The installed version of the current active theme." class="tooltipster">[?]</a></td>
					<td class="value">'.GRANDCONFERENCE_THEMEVERSION.'</td>
				</tr>
				<tr>
					<td class="title">Child Theme:</td>
					<td class="help"><a href="javascript" title="Displays whether or not the current theme is a child theme." class="tooltipster">[?]</a></td>
					<td class="value">'.$wordpress_child_theme.'</td>
				</tr>
			</tbody>
		</table>';

$api_url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

$grandconference_options = grandconference_get_options();

$grandconference_options = array (
 
//Begin admin header
array( 
		"name" => GRANDCONFERENCE_THEMENAME." Options",
		"type" => "title"
),
//End admin header


//Begin second tab "Home"
array( 	"name" => "Home",
		"type" => "section",
		"icon" => "fa-home",	
),
array( "type" => "open"),

array( "name" => "",
	"desc" => "",
	"id" => GRANDCONFERENCE_SHORTNAME."_home",
	"type" => "html",
	"html" => '
	<h1>Getting Started</h1>
	<div class="getting_started_desc">Welcome to '.GRANDCONFERENCE_THEMENAME.' theme. '.GRANDCONFERENCE_THEMENAME.' is now installed and ready to use! Read below for additional informations. We hope you enjoy using the theme!</div>
	<div style="height:30px"></div>
	<hr/>
	<div style="height:30px"></div>
	'.$getting_started_html.'
	',
),

array( "type" => "close"),
//End second tab "Home"


//Begin second tab "General"
array( 	"name" => "General",
		"type" => "section",
		"icon" => "fa-gear",	
),
array( "type" => "open"),

array( "name" => "<h2>Google Maps Setting</h2>API Key",
	"desc" => "Enter Google Maps API Key <a href=\"https://themegoods.ticksy.com/article/7785/\" target=\"_blank\">How to get API Key</a>",
	"id" => GRANDCONFERENCE_SHORTNAME."_googlemap_api_key",
	"type" => "text",
	"std" => ""
),

array( "name" => "Custom Google Maps Style",
	"desc" => "Enter javascript style array of map. You can get sample one from <a href=\"https://snazzymaps.com\" target=\"_blank\">Snazzy Maps</a>",
	"id" => GRANDCONFERENCE_SHORTNAME."_googlemap_style",
	"type" => "textarea",
	"std" => ""
),

array( "name" => "<h2>Custom Sidebar Settings</h2>Add a new sidebar",
	"desc" => "Enter sidebar name",
	"id" => GRANDCONFERENCE_SHORTNAME."_sidebar0",
	"type" => "text",
	"validation" => "text",
	"std" => "",
),

array( "type" => "close"),
//End second tab "General"


//Begin second tab "Styling"
array( "name" => "Styling",
	"type" => "section",
	"icon" => "fa-paint-brush",
),

array( "type" => "open"),

array( "name" => "<h2>Predefined Layouts</h2>",
	"desc" => "",
	"id" => GRANDCONFERENCE_SHORTNAME."_get_styling_button",
	"type" => "html",
	"html" => $customizer_styling_html.'
	<input type="hidden" id="pp_get_styling" name="pp_get_styling" value=""/>
	<div id="styling_message" class="styling_message"><i class="import_loading fa fa-cog fa-spin fa-3x fa-fw"></i><br/><br/>*Data is being procressed please be patient, don\'t navigate away from this page</div>
	',
),

array( "name" => "<h2>Theme Customizer</h2>",
	"desc" => "",
	"id" => GRANDCONFERENCE_SHORTNAME."_open_customize",
	"type" => "html",
	"html" => 'Or you can open theme customize and start customizing theme elements, colors, typography yourself by clicking below button or open Appearance > Customize<br/><br/><br/>
	<input id="pp_open_customize_button" name="pp_open_customize_button" type="button" value="Open Theme customize" class="button" onclick="window.location=\''.esc_url(admin_url('customize.php')).'\'"/>
	',
),
 
array( "type" => "close"),


//Begin fifth tab "Social Profiles"
array( 	"name" => "Social-Profiles",
		"type" => "section",
		"icon" => "fa-facebook-official",
),
array( "type" => "open"),
	
array( "name" => "<h2>Accounts Settings</h2>Facebook page URL",
	"desc" => "Enter full Facebook page URL",
	"id" => GRANDCONFERENCE_SHORTNAME."_facebook_url",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Twitter Username",
	"desc" => "Enter Twitter username",
	"id" => GRANDCONFERENCE_SHORTNAME."_twitter_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Google Plus URL",
	"desc" => "Enter Google Plus URL",
	"id" => GRANDCONFERENCE_SHORTNAME."_google_url",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Flickr Username",
	"desc" => "Enter Flickr username",
	"id" => GRANDCONFERENCE_SHORTNAME."_flickr_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Youtube Profile URL",
	"desc" => "Enter Youtube Profile URL",
	"id" => GRANDCONFERENCE_SHORTNAME."_youtube_url",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Vimeo Username",
	"desc" => "Enter Vimeo username",
	"id" => GRANDCONFERENCE_SHORTNAME."_vimeo_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Tumblr Username",
	"desc" => "Enter Tumblr username",
	"id" => GRANDCONFERENCE_SHORTNAME."_tumblr_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Dribbble Username",
	"desc" => "Enter Dribbble username",
	"id" => GRANDCONFERENCE_SHORTNAME."_dribbble_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Linkedin URL",
	"desc" => "Enter full Linkedin URL",
	"id" => GRANDCONFERENCE_SHORTNAME."_linkedin_url",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Pinterest Username",
	"desc" => "Enter Pinterest username",
	"id" => GRANDCONFERENCE_SHORTNAME."_pinterest_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Instagram Username",
	"desc" => "Enter Instagram username",
	"id" => GRANDCONFERENCE_SHORTNAME."_instagram_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "Behance Username",
	"desc" => "Enter Behance username",
	"id" => GRANDCONFERENCE_SHORTNAME."_behance_username",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "500px Profile URL",
	"desc" => "Enter 500px Profile URL",
	"id" => GRANDCONFERENCE_SHORTNAME."_500px_url",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "name" => "<h2>Photo Stream</h2>Photostream Source",
	"desc" => "Select photo stream photo source. It displays before footer area",
	"id" => GRANDCONFERENCE_SHORTNAME."_photostream",
	"type" => "select",
	"options" => array(
		'' => 'Disable Photo Stream',
		'instagram' => 'Instagram',
		'flickr' => 'Flickr',
	),
	"std" => ''
),
array( "name" => "Instagram Access Token",
	"desc" => "Enter Instagram Access Token. <a href=\"https://instagram.com/oauth/authorize/?client_id=3a81a9fa2a064751b8c31385b91cc25c&scope=basic+public_content&redirect_uri=https://smashballoon.com/instagram-feed/instagram-token-plugin/?return_uri=".admin_url("themes.php?page=functions.php")."&response_type=token\" >Find you Access Token here</a>",
	"id" => GRANDCONFERENCE_SHORTNAME."_instagram_access_token",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),

array( "name" => "Flickr ID",
	"desc" => "Enter Flickr ID. <a href=\"http://idgettr.com/\" target=\"_blank\">Find your Flickr ID here</a>",
	"id" => GRANDCONFERENCE_SHORTNAME."_flickr_id",
	"type" => "text",
	"std" => "",
	"validation" => "text",
),
array( "type" => "close"),

//End fifth tab "Social Profiles"


//Begin second tab "Script"
array( "name" => "Script",
	"type" => "section",
	"icon" => "fa-css3",
),

array( "type" => "open"),

array( "name" => "<h2>CSS Settings</h2>Custom CSS for desktop",
	"desc" => "You can add your custom CSS here",
	"id" => GRANDCONFERENCE_SHORTNAME."_custom_css",
	"type" => "css",
	"std" => "",
	'validation' => '',
),

array( "name" => "Custom CSS for<br/>iPad Portrait View",
	"desc" => "You can add your custom CSS here",
	"id" => GRANDCONFERENCE_SHORTNAME."_custom_css_tablet_portrait",
	"type" => "css",
	"std" => "",
	'validation' => '',
),

array( "name" => "Custom CSS for<br/>iPhone Landscape View",
	"desc" => "You can add your custom CSS here",
	"id" => GRANDCONFERENCE_SHORTNAME."_custom_css_mobile_landscape",
	"type" => "css",
	"std" => "",
	'validation' => '',
),

array( "name" => "Custom CSS for<br/>iPhone Portrait View",
	"desc" => "You can add your custom CSS here",
	"id" => GRANDCONFERENCE_SHORTNAME."_custom_css_mobile_portrait",
	"type" => "css",
	"std" => "",
	'validation' => '',
),
 
array( "type" => "close"),

//Begin second tab "System"
array( 	"name" => "System",
		"type" => "section",
		"icon" => "fa-dashboard",	
),
array( "type" => "open"),

array( "name" => "<h2>System Information</h2>",
	"desc" => "",
	"id" => GRANDCONFERENCE_SHORTNAME."_system",
	"type" => "html",
	"html" => $system_info_html,
),

array( "type" => "close"),
//End second tab "System"

);

//Check if WordPress importer is installed	
$wordpress_importer = ABSPATH . '/wp-content/plugins/wordpress-importer/wordpress-importer.php';

// Check if the file is available to prevent warnings
$pp_wordpress_importer_activated = file_exists($wordpress_importer);

if($pp_wordpress_importer_activated)
{
	$import_demo_html = $customizer_import_demo_html.'<strong>Included</strong>: Demo content including posts, pages and custom post type contents, images, videos and theme settings.
    <br/>
    <strong>NOT Included</strong>: Demo Revolution Slider.
    <input type="hidden" id="grandconference_import_demo_content" name="grandconference_import_demo_content" value="1"/>
    <div class="import_message"><i class="import_loading fa fa-cog fa-spin fa-3x fa-fw"></i><br/><br/>*Data is being imported please be patient, don\'t navigate away from this page</div>
    ';
}
else
{
	$import_demo_html = 'Please make sure you <a href="'.admin_url("themes.php?page=install-required-plugins").'">install WordPress Importer plugin</a> so demo importer is activated.';
}

//Begin second tab "Demo"
$grandconference_options[] = array( "name" => "Demo-Content",
    "type" => "section",
    "icon" => "fa-database",
);

$grandconference_options[] = array( "type" => "open");

$grandconference_options[] = array( "name" => "<h2>Import Demo Content</h2>",
    "desc" => "",
    "id" => GRANDCONFERENCE_SHORTNAME."_import_demo_content",
    "type" => "html",
    "html" => $import_demo_html,
);

$grandconference_options[] = array( "name" => "<h2>Import Revolution Slider</h2>",
    "desc" => "",
    "id" => GRANDCONFERENCE_SHORTNAME."_import_revslider",
    "type" => "html",
    "html" => 'Demo Revolution Sliders are included in import files. <a href="http://themes.themegoods.com/grandconference/doc/import-demo-revolution-sliders/" target="_blank">Click here to download demo slider</a>
    ',
);
 
$grandconference_options[] = array( "type" => "close");

grandconference_set_options($grandconference_options);
?>