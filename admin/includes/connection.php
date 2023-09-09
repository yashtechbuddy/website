<?php
    error_reporting(0);
 		 ob_start();
    session_start();
 
 	header("Content-Type: text/html;charset=UTF-8");
	
	//local  
		DEFINE ('DB_USER', 'root');
		DEFINE ('DB_PASSWORD', '');
		DEFINE ('DB_HOST', 'localhost'); //host name depends on server
		DEFINE ('DB_NAME', 'rndtd_ssrcn_db');
		
	$mysqli =mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

	if (!$mysqli) 
	{
    	//echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		//header('Location:installation.php');
		
	}

	mysqli_query($mysqli,"SET NAMES 'utf8'");	 



	//Settings
	$setting_qry="SELECT * FROM tbl_settings where id=1";
    $setting_result=mysqli_query($mysqli,$setting_qry);
    $settings_details=mysqli_fetch_assoc($setting_result);

    

    define("APP_NAME",$settings_details['app_name']);
    define("APP_LOGO",$settings_details['app_logo']);
	define("APP_ICON",$settings_details['app_icon']);
	define("APP_EMAIL",$settings_details['app_email']);
	define("APP_WEBSITE",$settings_details['app_website']);
	define("APP_THEME_COLOR",$settings_details['theme_color']);
	define("WEBSITE_THEME_COLOR",$settings_details['client_theme_color']);

	$setting_theme_qry="SELECT * FROM tbl_theme_setting where id=1";
    $setting_theme_result=mysqli_query($mysqli,$setting_theme_qry);
    $settings_theme_details=mysqli_fetch_assoc($setting_theme_result);
	
	$back_color1=$settings_theme_details['back_color1'];
    $back_color2=$settings_theme_details['back_color2'];
    $sidebar_icon_title_color=$settings_theme_details['sidebar_icon_title_color'];
    $active_sidebar_icon_title_color=$settings_theme_details['active_sidebar_icon_title_color'];
	 $sidebar_icon_color=$settings_theme_details['sidebar_icon_color'];
    $sidebar_icon_active_color=$settings_theme_details['sidebar_icon_active_color'];
     $back_image=$settings_theme_details['back_image'];
    $button2_color=$settings_theme_details['button2_color'];
    $button1_color=$settings_theme_details['button1_color'];

    //Profile
    if(isset($_SESSION['id']))
    {
    	$profile_qry="SELECT * FROM tbl_admin where id='".$_SESSION['id']."'";
	    $profile_result=mysqli_query($mysqli,$profile_qry);
	    $profile_details=mysqli_fetch_assoc($profile_result);

	    define("PROFILE_IMG",$profile_details['image']);
		
		
		$type="";		
		if($profile_details['id']=="1")   // it will check login user is superadmin
		{
			$type="superadmin";
			define("USER_TYPE",$type);   //Create login user type = superadmin
		}
		else							// it will check login user is admin
		{
			$type="admin";
			define("USER_TYPE",$type);  //Create login user type = admin
		
		}		
    }
    
 
?> 
	 
 