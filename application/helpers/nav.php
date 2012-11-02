<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Front-End Nav helper class.
 *
 * @package    Nav
 * @author     Ushahidi Team
 * @copyright  (c) 2008 Ushahidi Team
 * @license    http://www.ushahidi.com/license.html
 */
class nav_Core {
	
	/**
	 * Generate Main Tabs
     * @param string $this_page
     * @param array $dontshow
	 * @return string $menu
     */
	public static function main_tabs($this_page = FALSE, $dontshow = FALSE)
	{
		$menu = "";
		
		if( ! is_array($dontshow))
		{
			// Set $dontshow as an array to prevent errors
			$dontshow = array();
		}
		
			// Home
		if( ! in_array('home',$dontshow))
		{
			$menu .= "<li><a href=\"".url::site()."main\"";
			$menu .= ($this_page == 'home') ? "  class=\"active\"" : "";
		  	$menu .= "<span class=\"item-swatchform\"><img src=\"".url::file_loc('img')."media/img/home.png\"/></span>v4volunteer</a></li>";
		 }

			// Reports List
		if( ! in_array('reports',$dontshow))
		{
			$menu .= "<li><a href=\"".url::site()."reports\" target=\"_blank\"";
			$menu .= ($this_page == 'reports') ? " class=\"active\"" : "";
		 	$menu .= "</a><span class=\"item-swatchform\"><img src=\"".url::file_loc('img')."media/img/report.png\"/></span>Reports</a></li>";
		 }
		

		
		// Alerts
		if(! in_array('alerts',$dontshow))
		{
			if(Kohana::config('settings.allow_alerts'))
			{
				$menu .= "<li><a href=\"".url::site()."alerts\"";
				$menu .= ($this_page == 'alerts') ? " class=\"active\"" : "";
			 	$menu .= "<span class=\"item-swatchform\"><img src=\"".url::file_loc('img')."media/img/alerts.png\"/></span>Subscribe to Alerts</a></li>";
				
			}
		}
		

		
		
if( ! in_array('contact',$dontshow))
		{
			if (Kohana::config('settings.site_contact_page'))
			{
				$menu .= "<li><a href=\"".url::site()."contact\"";
				$menu .= ($this_page == 'contact') ? " class=\"active\"" : "";
			 	$menu .= "<span class=\"item-swatchform\"><img src=\"".url::file_loc('img')."media/img/contact.png\"/></span>Contact us</a></li>";
			}
		}
		
		if( ! in_array('submit',$dontshow))
		{
					
			$menu .= "<li><DIV class=\"outer-submit\"><form method=\"get\" action=\"".url::site()."reports/submit?type=0\">
			<Button type=\"submit\" class =\"forms\" name=\"type\" value=\"1\"/>
			<span class=\"item-swatchform\"><img src=\"".url::file_loc('img')."media/img/volunteer.png\"/ height = \"40px\" width = \"40px\"></span>
			Volunteer Now</Button></Form></DIV>";
			$menu .= ($this_page == 'submit') ? " class=\"active\"" : "";
		 	$menu .= "</a></li>";
		 }
		 	if( ! in_array('submit',$dontshow))
		{
					
			$menu .= "<li><DIV class=\"outer-submit\"><form method=\"get\" action=\"".url::site()."reports/submit?type=0\">
			<Button type=\"submit\" class =\"forms\" name=\"type\" value=\"2\"/>
			<span class=\"item-swatchform\"><img src=\"".url::file_loc('img')."media/img/ngo.png\"/></span>
			Register NGO</Button></Form></DIV>";
			$menu .= ($this_page == 'submit') ? " class=\"active\"" : "";
		 	$menu .= "</a></li>";
		 }
		 
		if( ! in_array('submit',$dontshow))
		{
					
			$menu .= "<li><DIV class=\"outer-submit\"><form method=\"get\" action=\"".url::site()."reports/submit?type=0\">
			<Button type=\"submit\" class =\"forms\" name=\"type\" value=\"3\"/>
			<span class=\"item-swatchform\"><img src=\"".url::file_loc('img')."media/img/activity.png\"/></span>
			Post Activities</Button></Form></DIV>";
			$menu .= ($this_page == 'submit') ? " class=\"active\"" : "";
		 	$menu .= "</a></li>";
		 }
		 

	 if( ! in_array('submit',$dontshow))
		{
		$menu .= "<li><DIV class=\"outer-submit\"><form method=\"get\" action=\"".url::site()."reports/submit?type=0\">
		<Button type=\"submit\" class =\"forms\" name=\"type\" value=\"4\"/>
		<span class=\"item-swatchform\"><img src=\"".url::file_loc('img')."media/img/blood.png\"/></span>
		Report Blood Group</Button></Form></DIV>";
		$menu .= ($this_page == 'submit') ? " class=\"active\"" : "";
		$menu .= "</a></li>";
		} 
		echo $menu;
		
		// Action::nav_admin_reports - Add items to the admin reports navigation tabs
		Event::run('ushahidi_action.nav_main_top', $this_page);
	}
	
	
}
