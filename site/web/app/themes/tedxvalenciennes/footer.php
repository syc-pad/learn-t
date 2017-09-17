<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 */
 
?>

<?php
	//Check if blank template
	$grandconference_is_no_header = grandconference_get_is_no_header();
	$grandconference_screen_class = grandconference_get_screen_class();
	
	if(!is_bool($grandconference_is_no_header) OR !$grandconference_is_no_header)
	{

	$grandconference_homepage_style = grandconference_get_homepage_style();
	
	$tg_footer_sidebar = kirki_get_option('tg_footer_sidebar');
?>

<?php
    if(!empty($tg_footer_sidebar) && $grandconference_homepage_style != 'fullscreen' && $grandconference_homepage_style != 'fullscreen_white' && $grandconference_homepage_style != 'split')
    {
    	$footer_class = '';
    	
    	switch($tg_footer_sidebar)
    	{
    		case 1:
    			$footer_class = 'one';
    		break;
    		case 2:
    			$footer_class = 'two';
    		break;
    		case 3:
    			$footer_class = 'three';
    		break;
    		case 4:
    			$footer_class = 'four';
    		break;
    		default:
    			$footer_class = 'four';
    		break;
    	}
?>
<div id="footer" class="<?php if(isset($grandconference_homepage_style) && !empty($grandconference_homepage_style)) { echo esc_attr($grandconference_homepage_style); } ?> <?php if(!empty($grandconference_screen_class)) { echo esc_attr($grandconference_screen_class); } ?>">
<?php
	if(is_active_sidebar('Footer Sidebar')) 
	{
?>
	<ul class="sidebar_widget <?php echo esc_attr($footer_class); ?>">
	    <?php dynamic_sidebar('Footer Sidebar'); ?>
	</ul>
<?php
	}
?>
</div>
<?php
    }
?>

<?php	
	//If display photostream
	$pp_photostream = get_option('pp_photostream');
	if(GRANDCONFERENCE_THEMEDEMO && isset($_GET['footer']) && !empty($_GET['footer']))
	{
		$pp_photostream = 0;
	}

	if(!empty($pp_photostream) && $grandconference_homepage_style != 'fullscreen' && $grandconference_homepage_style != 'fullscreen_white' && $grandconference_homepage_style != 'split')
	{
		$photos_arr = array();
	
		if($pp_photostream == 'flickr')
		{
			$pp_flickr_id = get_option('pp_flickr_id');
			$photos_arr = grandconference_get_flickr(array('type' => 'user', 'id' => $pp_flickr_id, 'items' => 30));
		}
		else
		{
			$pp_instagram_username = get_option('pp_instagram_username');
			$pp_instagram_access_token = get_option('pp_instagram_access_token');
			$photos_arr = grandconference_get_instagram($pp_instagram_username, $pp_instagram_access_token, 30);
		}
		
		if(!empty($photos_arr) && $grandconference_screen_class != 'split' && $grandconference_screen_class != 'split wide' && $grandconference_homepage_style != 'fullscreen' && $grandconference_homepage_style != 'flow')
		{
?>
<br class="clear"/>
<div id="footer_photostream" class="footer_photostream_wrapper ri-grid ri-grid-size-3">
	<ul>
		<?php
			foreach($photos_arr as $photo)
			{
		?>
			<li><a target="_blank" href="<?php echo esc_url($photo['link']); ?>"><img src="<?php echo esc_url($photo['thumb_url']); ?>" alt="" /></a></li>
		<?php
			}
		?>
	</ul>
</div>
<?php
		}
	}
?>

<?php
if($grandconference_homepage_style != 'fullscreen' && $grandconference_homepage_style != 'fullscreen_white' && $grandconference_homepage_style != 'split')
{
	//Get Footer Sidebar
	$tg_footer_sidebar = kirki_get_option('tg_footer_sidebar');
	if(GRANDCONFERENCE_THEMEDEMO && isset($_GET['footer']) && !empty($_GET['footer']))
	{
	    $tg_footer_sidebar = 0;
	}
?>
<div class="footer_bar <?php if(isset($grandconference_homepage_style) && !empty($grandconference_homepage_style)) { echo esc_attr($grandconference_homepage_style); } ?> <?php if(!empty($grandconference_screen_class)) { echo esc_attr($grandconference_screen_class); } ?> <?php if(empty($tg_footer_sidebar)) { ?>noborder<?php } ?>">

	<div class="footer_bar_wrapper <?php if(isset($grandconference_homepage_style) && !empty($grandconference_homepage_style)) { echo esc_attr($grandconference_homepage_style); } ?>">
		<?php
			//Check if display social icons or footer menu
			$tg_footer_copyright_right_area = kirki_get_option('tg_footer_copyright_right_area');
			
			if($tg_footer_copyright_right_area=='social')
			{
				if($grandconference_homepage_style!='flow' && $grandconference_homepage_style!='fullscreen' && $grandconference_homepage_style!='carousel' && $grandconference_homepage_style!='flip' && $grandconference_homepage_style!='fullscreen_video')
				{	
					//Check if open link in new window
					$tg_footer_social_link = kirki_get_option('tg_footer_social_link');
			?>
			<div class="social_wrapper">
			    <ul>
			    	<?php
			    		$pp_facebook_url = get_option('pp_facebook_url');
			    		
			    		if(!empty($pp_facebook_url))
			    		{
			    	?>
			    	<li class="facebook"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> href="<?php echo esc_url($pp_facebook_url); ?>"><i class="fa fa-facebook-official"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_twitter_username = get_option('pp_twitter_username');
			    		
			    		if(!empty($pp_twitter_username))
			    		{
			    	?>
			    	<li class="twitter"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> href="http://twitter.com/<?php echo esc_attr($pp_twitter_username); ?>"><i class="fa fa-twitter"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_flickr_username = get_option('pp_flickr_username');
			    		
			    		if(!empty($pp_flickr_username))
			    		{
			    	?>
			    	<li class="flickr"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Flickr" href="http://flickr.com/people/<?php echo esc_attr($pp_flickr_username); ?>"><i class="fa fa-flickr"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_youtube_url = get_option('pp_youtube_url');
			    		
			    		if(!empty($pp_youtube_url))
			    		{
			    	?>
			    	<li class="youtube"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Youtube" href="<?php echo esc_url($pp_youtube_url); ?>"><i class="fa fa-youtube"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_vimeo_username = get_option('pp_vimeo_username');
			    		
			    		if(!empty($pp_vimeo_username))
			    		{
			    	?>
			    	<li class="vimeo"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Vimeo" href="http://vimeo.com/<?php echo esc_attr($pp_vimeo_username); ?>"><i class="fa fa-vimeo-square"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_tumblr_username = get_option('pp_tumblr_username');
			    		
			    		if(!empty($pp_tumblr_username))
			    		{
			    	?>
			    	<li class="tumblr"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Tumblr" href="http://<?php echo esc_attr($pp_tumblr_username); ?>.tumblr.com"><i class="fa fa-tumblr"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_google_url = get_option('pp_google_url');
			    		
			    		if(!empty($pp_google_url))
			    		{
			    	?>
			    	<li class="google"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Google+" href="<?php echo esc_url($pp_google_url); ?>"><i class="fa fa-google-plus"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_dribbble_username = get_option('pp_dribbble_username');
			    		
			    		if(!empty($pp_dribbble_username))
			    		{
			    	?>
			    	<li class="dribbble"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Dribbble" href="http://dribbble.com/<?php echo esc_attr($pp_dribbble_username); ?>"><i class="fa fa-dribbble"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			    		$pp_linkedin_url = get_option('pp_linkedin_url');
			    		
			    		if(!empty($pp_linkedin_url))
			    		{
			    	?>
			    	<li class="linkedin"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Linkedin" href="<?php echo esc_url($pp_linkedin_url); ?>"><i class="fa fa-linkedin"></i></a></li>
			    	<?php
			    		}
			    	?>
			    	<?php
			            $pp_pinterest_username = get_option('pp_pinterest_username');
			            
			            if(!empty($pp_pinterest_username))
			            {
			        ?>
			        <li class="pinterest"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Pinterest" href="http://pinterest.com/<?php echo esc_attr($pp_pinterest_username); ?>"><i class="fa fa-pinterest"></i></a></li>
			        <?php
			            }
			        ?>
			        <?php
			        	$pp_instagram_username = get_option('pp_instagram_username');
			        	
			        	if(!empty($pp_instagram_username))
			        	{
			        ?>
			        <li class="instagram"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Instagram" href="http://instagram.com/<?php echo esc_attr($pp_instagram_username); ?>"><i class="fa fa-instagram"></i></a></li>
			        <?php
			        	}
			        ?>
			        <?php
			        	$pp_behance_username = get_option('pp_behance_username');
			        	
			        	if(!empty($pp_behance_username))
			        	{
			        ?>
			        <li class="behance"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="Behance" href="http://behance.net/<?php echo esc_attr($pp_behance_username); ?>"><i class="fa fa-behance-square"></i></a></li>
			        <?php
			        	}
			        ?>
			        <?php
					    $pp_500px_url = get_option('pp_500px_url');
					    
					    if(!empty($pp_500px_url))
					    {
					?>
					<li class="500px"><a <?php if(!empty($tg_footer_social_link)) { ?>target="_blank"<?php } ?> title="500px" href="<?php echo esc_url($pp_500px_url); ?>"><i class="fa fa-500px"></i></a></li>
					<?php
					    }
					?>
			    </ul>
			</div>
		<?php
				}
			} //End if display social icons
			else
			{
				if ( has_nav_menu( 'footer-menu' ) ) 
			    {
				    wp_nav_menu( 
				        	array( 
				        		'menu_id'			=> 'footer_menu',
				        		'menu_class'		=> 'footer_nav',
				        		'theme_location' 	=> 'footer-menu',
				        	) 
				    ); 
				}
			}
		?>
	    <?php
	    	//Display copyright text
	        $tg_footer_copyright_text = kirki_get_option('tg_footer_copyright_text');

	        if(!empty($tg_footer_copyright_text))
	        {
	        	echo '<div id="copyright">'.wp_kses_post(htmlspecialchars_decode($tg_footer_copyright_text)).'</div><br class="clear"/>';
	        }
	    ?>
	    
	    <?php
	    	//Check if display to top button
	    	$tg_footer_copyright_totop = kirki_get_option('tg_footer_copyright_totop');
	    	
	    	if(!empty($tg_footer_copyright_totop))
	    	{
	    ?>
	    	<a id="toTop" href="javascript:;"><i class="fa fa-angle-up"></i></a>
	    <?php
	    	}
	    ?>
	</div>
</div>
<?php
}
?>
</div>

<?php
    } //End if not blank template
?>

<div id="side_menu_wrapper" class="overlay_background">
	<a id="close_share" href="javascript:;"><span class="ti-close"></span></a>
	<?php
		if(is_single())
		{
	?>
	<div id="fullscreen_share_wrapper">
		<div class="fullscreen_share_content">
		<?php
			get_template_part("/templates/template-share");
		?>
		</div>
	</div>
	<?php
		}
	?>
</div>

<?php
    //Check if theme demo then enable layout switcher
    if(GRANDCONFERENCE_THEMEDEMO)
    {	
?>
    <div id="option_wrapper">
    <div class="inner">
    	<div style="text-align:center">
	    	<h6 class="demo_title">Created With Grand Conference</h6>
	    	<div class="demo_desc">
		    	We designed Grand Conference theme to make it works especially for events & conference site. Here are a few included examples that you can import with one click.
	    	</div>
	    	<?php
	    		$customizer_styling_arr = array( 
					array(
						'id'	=>	'styling1', 
						'title' => 'Classic Conference', 
						'url' => grandconference_get_demo_url(),
					),
					array(
						'id'	=>	'demo2', 
						'title' => 'Music Event', 
						'url' => 'http://themes.themegoods.com/grandconference/demo2/',
					),
					array(
						'id'	=>	'demo3', 
						'title' => 'One Page Event', 
						'url' => 'http://themes.themegoods.com/grandconference/demo3/',
					),
					array(
						'id'	=>	'more_demo', 
						'title' => 'More Demos', 
						'url' => '',
					),
				);
	    	?>
	    	<ul class="demo_list">
	    		<?php
	    			foreach($customizer_styling_arr as $customizer_styling)
	    			{
	    		?>
	    		<li>
	        		<img src="<?php echo get_template_directory_uri(); ?>/cache/demos/customizer/screenshots/<?php echo esc_html($customizer_styling['id']); ?>.jpg" alt="" <?php if(empty($customizer_styling['url'])) { ?>class="no_blur"<?php } ?>/>
	        		<?php 
		        		if(!empty($customizer_styling['url']))
		        		{
			        ?>
	        		<div class="demo_thumb_hover_wrapper">
	        		    <div class="demo_thumb_hover_inner">
	        		    	<div class="demo_thumb_desc">
	    	    	    		<h6><?php echo esc_html($customizer_styling['title']); ?></h6>
	    	    	    		<a href="<?php echo esc_url($customizer_styling['url']); ?>" target="_blank" class="button white">Launch</a>
	        		    	</div> 
	        		    </div>	   
	        		</div>		
	        		<?php
		        		}
		        	?>   
	    		</li>
	    		<?php
	    			}
	    		?>
	    	</ul>

	    	<h6 class="demo_title">Predefined Stylings</h6>
	    	<?php
	    		$customizer_styling_arr = array( 
					array(
						'id'	=>	'styling1', 
						'title' => 'Left Align Menu', 
						'url' => grandconference_get_demo_url(),
					),
					array(
						'id'	=>	'styling2', 
						'title' => 'Center Align', 
						'url' => grandconference_get_demo_url('?menulayout=centeralign'),
					),
					array(
						'id'	=>	'styling3', 
						'title' => 'Center Logo + 2 Menus', 
						'url' => grandconference_get_demo_url('?menulayout=centeralogo'),
					),
					array(
						'id'	=>	'styling4', 
						'title' => 'Fullscreen Menu', 
						'url' => grandconference_get_demo_url('?menulayout=hammenufull'),
					),
					array(
						'id'	=>	'styling5', 
						'title' => 'Side Menu', 
						'url' => grandconference_get_demo_url('?menulayout=hammenuside'),
					),
					array(
						'id'	=>	'styling6', 
						'title' => 'With Frame', 
						'url' => grandconference_get_demo_url('?frame=1'),
					),
					array(
						'id'	=>	'styling7', 
						'title' => 'Boxed Layout', 
						'url' => grandconference_get_demo_url('?boxed=1'),
					),
					array(
						'id'	=>	'styling8', 
						'title' => 'With Top Bar', 
						'url' => grandconference_get_demo_url('?topbar=1'),
					),
				);
	    	?>
	    	<ul class="demo_list">
	    		<?php
	    			foreach($customizer_styling_arr as $customizer_styling)
	    			{
	    		?>
	    		<li>
	        		<img src="<?php echo get_template_directory_uri(); ?>/cache/demos/customizer/screenshots/<?php echo esc_html($customizer_styling['id']); ?>.jpg" alt=""/>
	        		<div class="demo_thumb_hover_wrapper">
	        		    <div class="demo_thumb_hover_inner">
	        		    	<div class="demo_thumb_desc">
	    	    	    		<h6><?php echo esc_html($customizer_styling['title']); ?></h6>
	    	    	    		<a href="<?php echo esc_url($customizer_styling['url']); ?>" target="_blank" class="button white">Launch</a>
	        		    	</div> 
	        		    </div>	   
	        		</div>		   
	    		</li>
	    		<?php
	    			}
	    		?>
	    	</ul>
    	</div>
    </div>
    </div>
    <div id="option_btn">
    	<a href="javascript:;" class="demotip" title="Choose Theme Styling"><span class="ti-settings"></span></a>
    	
    	<a href="http://themegoods.theme-demo.net/grandconferenceeventwordpress" class="demotip" title="Try Before You Buy" target="_blank"><span class="ti-pencil-alt"></span></a>
    	
    	<a href="http://themes.themegoods.com/grandconference/landing/showcase/" class="demotip" title="Showcase" target="_blank"><span class="ti-heart"></span></a>
    	
    	<a href="http://themes.themegoods.com/grandconference/doc" class="demotip" title="Theme Documentation" target="_blank"><span class="ti-book"></span></a>
    	
    	<a href="https://themeforest.net/item/grand-conference-event-wordpress/19560408?ref=ThemeGoods&license=regular&open_purchase_for_item_id=19560408&purchasable=source&ref=ThemeGoods" title="Purchase Theme" class="demotip" target="_blank"><span class="ti-shopping-cart"></span></a>
    </div>
<?php
    	wp_enqueue_script("grandconference-jquery-cookie", get_template_directory_uri()."/js/jquery.cookie.js", false, GRANDCONFERENCE_THEMEVERSION, true);
    	wp_enqueue_script("grandconference-script-demo", admin_url('admin-ajax.php')."?action=grandconference_script_demo", false, GRANDCONFERENCE_THEMEVERSION, true);
    }
?>

<?php
    $tg_frame = kirki_get_option('tg_frame');
    if(GRANDCONFERENCE_THEMEDEMO && isset($_GET['frame']) && !empty($_GET['frame']))
    {
	    $tg_frame = 1;
    }
    
    if(!empty($tg_frame))
    {
?>
    <div class="frame_top"></div>
    <div class="frame_bottom"></div>
    <div class="frame_left"></div>
    <div class="frame_right"></div>
<?php
    }
?>

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
