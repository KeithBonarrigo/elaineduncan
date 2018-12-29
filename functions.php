<?php
if (!session_id()) {
    session_start();
}
// Remove WP Version From Styles	
add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );

// Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}
//for google captcha
wp_register_script('google-captcha', 'https://www.google.com/recaptcha/api.js', array(), false, false);
wp_enqueue_script('google-captcha');
wp_enqueue_script( 'api-handler', 'https://counselinginbothell.com/wp-content/themes/soulmedic-child/js/google-captcha-api.js', [ 'jquery', 'wp-api' ], '1.0', false );

/**
 * Register our sidebars and widgetized areas.
 *
 */
function elaine_widgets_init() {

	register_sidebar( array(
		'name'          => 'Elaine Left Sidebar',
		'id'            => 'elaine_left_sidebar',
		'before_widget' => '<div class="left-sidebar">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'elaine_widgets_init' );

function signOffText() {
   // $data = 'Thank you so much for reading!';
	global $wpdb;
	$wpdb->show_errors();
	/* wpdb class should not be called directly.global $wpdb variable is an instantiation of the class already set up to talk to the WordPress database */
	$result = $wpdb->get_results($wpdb->prepare("SELECT * FROM wp_options WHERE option_id = %d", 1)); /*mulitple row results can be pulled from the database with get_results function and outputs an object which is stored in $result */
	//print_r($wpdb);
	if($result){
		foreach($result as $row){
			$data = $row->option_name."<br>";
		 }
	 }else{
	 	$data = "data";
	 }
	 //$data = $row[0]->testContent;
	 //return $data;
	 /* Print the contents of $result looping through each row returned in the result */
}
add_shortcode('signoff', 'signOffText');
?>
