<?php

// LOAD CORE (if you remove this, the theme will break)
require_once( 'library/dsa504.php' );

function dsa504_boomshakalaka() {

  // launching operation cleanup
  add_action( 'init', 'dsa504_head_cleanup' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'dsa504_enqueue', 999 );


} 
// let's get this party started
add_action( 'after_setup_theme', 'dsa504_boomshakalaka' );

function dsa504_fonts() {
  wp_register_style('googleFonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700');
  wp_enqueue_style( 'googleFonts');
}


//add_action('wp_print_styles', 'pbOS_fonts');

add_action( 'admin_menu', 'remove_menu_pages', 999 );

function remove_menu_pages() {
  //remove_menu_page( 'edit.php' );                   //Posts
  //remove_menu_page( 'upload.php' );                 //Media
  remove_menu_page( 'edit-comments.php' );          //Comments
  //remove_menu_page( 'themes.php' );                 //Appearance
  //remove_menu_page( 'tools.php' );                  //Tools
  //remove_menu_page( 'options-general.php' );        //Settings
  //remove_menu_page( 'edit.php?post_type=page' );
  
};

/**
 * Customizable navigation menu
 */
function register_menus() {
  register_nav_menus(
    array(
      'sidebar-menu' => __( 'Sidebar Menu' )
    )
  );
}

add_action( 'init', 'register_menus' );

add_action( 'wp_ajax_signUp', 'signUp' );
add_action( 'wp_ajax_nopriv_signUp', 'signUp' );

function signUp(){
	
	//
	// mailchimp integration 
	//
	
	$wp_root_path = str_replace('/wp-content/themes', '', get_theme_root());
	require_once( $wp_root_path.'/mailchimp.php');
	

	$url = 'https://us15.api.mailchimp.com/3.0/lists/' . $list_id . '/members/';
	
	// based on the track selected, assign subscriber to list group
	// ids:
	// a7ae87805c  membership-track
	// 9feea8a0f5  updates-track
	
	if($_POST['track'] == 'member-track'){
		$groups = ['a7ae87805c' => true, '9feea8a0f5' => false];
	}else{
		$groups = ['a7ae87805c' => false, '9feea8a0f5' => true];
	};
	
	$pfb_data = array(
		'email_address' => $_POST['email'],
		'status'        => 'subscribed', // change to subscribed on live
		'merge_fields'  => array(
		  'FNAME'       => $_POST['firstname'],
		  'LNAME'       => $_POST['lastname'],
		  'PHONE'     => $_POST['phone'],
		  'MMERGE10'     => $_POST['zip'],
		  'INTEREST' => $_POST['track']
		),
		'interests' => $groups,
	  );
	  
	   // Encode the data
	  $encoded_pfb_data = json_encode($pfb_data);

	  // Setup cURL sequence
	  $ch = curl_init();
	
	  curl_setopt($ch, CURLOPT_URL, $url);
	  curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $api_key);
	  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	  curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	  curl_setopt($ch, CURLOPT_POST, 1);
	  curl_setopt($ch, CURLOPT_POSTFIELDS, $encoded_pfb_data);
	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	  $results = curl_exec($ch); // store response
	  $response = curl_getinfo($ch, CURLINFO_HTTP_CODE); // get HTTP CODE
	  $errors = curl_error($ch); // store errors

	  curl_close($ch);
	  
	  $results = array(
		'results' => $result_info,
		'response' => $response,
		'errors' => $errors
	  );

	  // Sends data back
	  //echo json_encode($results);
	  //die;
	
	//
	// send mail notification of signup 
	//
	$to = array("hello@dsaneworleans.org", "membership@dsaneworleans.org");
    //$to = array("membership@dsaneworleans.org");
	
	$subject = "New Signup Message From DSA504 Site!";
    $message = "
	There's been a new submission via the DSA504 website form. Huzzah!
	
	Name: ".$_POST["firstname"]." ".$_POST["lastname"]."
	Email: ".$_POST["email"]."
	Phone: ".$_POST["phone"]."
	ZIP: ".$_POST["zip"]."
	User Track: ".$_POST["track"]."
	
	Also sent to: ".$_POST["committee-mail"]."
	
	"; 
	
	if($_POST["committee-mail"]!==""){
		array_push($to, $_POST["committee-mail"]);
	}
	
    if( wp_mail($to, $subject, $message) ){
        echo "ok";
    } else {
        echo "error";
    }

    die();
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'DSA504 Theme Settings',
		'menu_title'	=> 'DSA504 Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}
?>
