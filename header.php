<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<?php dttheme_is_mobile_view(); ?>
	<title><?php
		$status = dttheme_is_plugin_active('all-in-one-seo-pack/all_in_one_seo_pack.php') || dttheme_is_plugin_active('wordpress-seo/wp-seo.php');
		if (!$status) :
			$title = dttheme_public_title();
			if( !empty( $title) )
				echo $title;
			else
			wp_title( '|', true, 'right' );
		else :
			wp_title( '|', true, 'right' );
		endif;
		 ?></title>
	 <meta name="description" content="Elaine Duncan - Autism, Career, Trauma Counseling Services in Bothell, WA">
     <link href='https://fonts.googleapis.com/css?family=Alex+Brush|Yellowtail' rel='stylesheet' type='text/css'>
     <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'> 
     <link rel="profile" href="http://gmpg.org/xfn/11" />
     <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" /><?php
	 
	 do_action('load_head_styles_scripts');

	  if( dttheme_option('integration', 'enable-header-code') ):
        echo '<script type="text/javascript">';
		echo  dt_wp_kses( stripslashes(dttheme_option('integration', 'header-code')) );
        echo '</script>';
	  endif;
	 #WordPress Default head hook
	 wp_head();?>
	 <script>
	 	var RC2KEY = '6LfPU34UAAAAAMs4MnMWOx3nBKI0EH6KiDxCJdZA';
		function reCaptchaVerify(response) {
			if (response === document.querySelector('.g-recaptcha-response').value) {
				var hes = document.getElementById('header-email-second');
				hes.click();
			}
		}

		function reCaptchaExpired() {
			/* do something when it expires */
		}
	 </script>

	 <?php 
		wp_localize_script( 'wp-api', 'wpApiSettings', array(
			'root' => esc_url_raw( 'https://www.google.com/recaptcha/api/siteverify' ),
			'nonce' => wp_create_nonce( 'wp_rest' )
		) );
	 ?>
	 <script>
		 jQuery(document).ready(function($) {
			$("#header-email-first").click(function(event){
                event.preventDefault();
                $("#header-email-first").hide();
				$("#header-email-second").show();
				$("#header-captcha-body").show();
				
				$("#header-email-link").click(function(event){
                event.preventDefault();
                var email = 'elaine@counselinginbothell.com';
                var subject = 'Contact Elaine Duncan';
                var emailBody = '';
                window.location = 'mailto:' + email + '?subject=' + subject + '&body=' +   emailBody;
            });
            });
		 });
	 </script>
	 <style>
		#header-email-link { padding-left:5px !important; margin-left:0px !important; border-left:none 1px #fff !important; }
		#header-email-first, #header-email-second { font-size:13px; background-color:#fff; color: #4bbcd7; margin:0px; font-weight:normal; text-transform:none; padding:11px 7px }
		#header-captcha-error { color:red; font-weight:bold; }
		#header-captcha::first-child { margin-left:auto }
		#header-captcha-body { position:absolute; }
	 </style>
</head>
<?php $body_class_arg  = ( dttheme_option("appearance","layout") === "boxed" ) ? array("boxed") : array(); ?>
<body <?php body_class( $body_class_arg ); ?>>
<?php

// tu clave secreta
$secret = "6LfPU34UAAAAADBUZB3cmIqyNphpQlKGwUCnCxNO";   //get from https://www.google.com/recaptcha/
// tu site key
$sitekey = "6LfPU34UAAAAAMs4MnMWOx3nBKI0EH6KiDxCJdZA";  //get from https://www.google.com/recaptcha/

require_once "recaptcha-php/recaptchalib.php";

$response = null; 
$reCaptcha = new ReCaptcha($secret);


if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
	
    if ($_POST["g-recaptcha-response"]) {
            $response = $reCaptcha->verifyResponse(
            $_SERVER["REMOTE_ADDR"],
            $_POST["g-recaptcha-response"]
        );
    }

    if ($response != null && $response->success) { ?>
		<script>
			jQuery(document).ready(function($) {
			$("#header-email-link").show();
			$("#header-email-first").hide();
			$("#header-email-second").hide();
			$("#header-captcha").hide();  
        })
		</script>
		<?
	}
	elseif(($response != null && !$response->success)){
		?>
		<script>
		alert('you must validate the captcha');
		</script>
		<?
	}
	else
		?>
		<script>
		</script>
		<?
}

?>

<?php $picker = dttheme_option("general","disable-picker");
	  if(!isset($picker) && !is_user_logged_in() ):	dttheme_color_picker();	endif;

	  if( is_page_template('tpl-header1.php') ) {
		  	$header = "header1";
	  }elseif( is_page_template('tpl-header2.php') ){
		  	$header = "header2";
	  }elseif( is_page_template('tpl-header3.php') ){
		  	$header = "header3";
	  }elseif( is_page_template('tpl-header4.php') ){
		  	$header = "header4";
	  }else{
		  $header = dttheme_option("appearance","header_type");
		  $header = !empty($header) ? $header : "header1";
	  }
	  #Top Bar
	  
	  require_once(TEMPLATEPATH."-child/framework/headers/{$header}.php");?>
<!-- **Wrapper** -->
<div class="wrapper">
    <!-- **Inner Wrapper** -->
    <div class="inner-wrapper">

        <!-- Header Wrapper -->
        <div id="header-wrapper">

        <!-- **Header** -->
        <header id="header">
				<!-- **Logo - End** -->
                <div id="logo">
                <?php if( dttheme_option('general', 'logo') ):
                            $url = dttheme_option('general', 'logo-url');
                            $url = !empty( $url ) ? $url : IAMD_BASE_URL."images/logo.png";
							
							  $retina_url = dttheme_option('general','retina-logo-url');
							  $retina_url = !empty($retina_url) ? $retina_url : IAMD_BASE_URL."images/logo@2x.png";
							  
							  $width = dttheme_option('general','retina-logo-width');
							  $width = !empty($width) ? $width."px;" : "198px";
							  
							  $height = dttheme_option('general','retina-logo-height');
							  $height = !empty($height) ? $height."px;" : "40px";?>
                           <a href="<?php echo home_url();?>" title="<?php echo dttheme_blog_title();?>">
                           	<img class="normal_logo" src="<?php echo $url;?>" alt="<?php echo dttheme_blog_title(); ?>" title="<?php echo dttheme_blog_title(); ?>" />
                            <img class="retina_logo" src="<?php echo $retina_url;?>" alt="<?php echo dttheme_blog_title();?>" title="<?php echo dttheme_blog_title(); ?>" 
                             	  style="width:<?php echo $width;?>; height:<?php echo $height;?>;"/>
                           </a>
                <?php else: ?>
                            <h2><a href="<?php echo home_url();?>" title="<?php echo dttheme_blog_title();?>"><?php echo do_shortcode(get_option('blogname')); ?></a></h2>
                <?php endif;?>
            </div><!-- **Logo - End** -->
			
        	<div id="primary-menu">
				<nav id="main-menu">
				<?php $primaryMenu = NULL;
				if (function_exists('wp_nav_menu')) :
						$primaryMenu = wp_nav_menu(array('theme_location'=>'header_menu','menu_id'=>'','menu_class'=>'menu','fallback_cb'=>'dttheme_default_navigation'
						,'echo'=>false,'container'=>false,'walker' => new DTFrontEndMenuWalker()));
				endif;
				if(!empty($primaryMenu))	echo $primaryMenu;?>
				</nav><!-- **Navigation - End**-->
			 </div>
            <!-- **Header Container** -->
            <div class="container">
    
                <!-- **Navigation** -->
               <!--<div id="primary-menu">
                    <nav id="main-menu">
                    <?php $primaryMenu = NULL;
                    if (function_exists('wp_nav_menu')) :
                            $primaryMenu = wp_nav_menu(array('theme_location'=>'header_menu','menu_id'=>'','menu_class'=>'menu','fallback_cb'=>'dttheme_default_navigation'
                            ,'echo'=>false,'container'=>false,'walker' => new DTFrontEndMenuWalker()));
                    endif;
                    if(!empty($primaryMenu))	echo $primaryMenu;?>
                    </nav><!-- **Navigation - End**
                 </div>-->
                
            </div><!-- **Header Container End** -->
            
        </header><!-- **Header - End** -->
          
        </div><!-- Header Wrapper -->
    
        <!-- **Main** -->
        <div id="main"><?php
            if( is_page() ):
                global $post;
                dttheme_slider_section( $post->ID);	
            elseif( is_post_type_archive('product') ):
                dttheme_slider_section( get_option('woocommerce_shop_page_id') );	
            endif;		
            
            if( is_page_template('tpl-contact.php') ):
                global $post;
                $tpl_default_settings = get_post_meta($post->ID,'_tpl_default_settings',TRUE);
                $tpl_default_settings = is_array($tpl_default_settings) ? $tpl_default_settings  : array();
                if(array_key_exists("full-width-section",$tpl_default_settings)):
                    echo '<div class="fullwidth-map">';
                    echo do_shortcode($tpl_default_settings['full-width-section']);
                    echo '</div>';
                endif;
            endif;
			
			if( !in_array('events-archive',get_body_class()) && !in_array('events-single',get_body_class()) && !in_array('single-tribe_venue',get_body_class()) 
				&& !in_array('single-tribe_organizer',get_body_class())  ) {
					
						$disable_breadcrumb = dttheme_option('general','disable-breadcrumb');
						
						if( empty($disable_breadcrumb) and ( !is_front_page() ) ):
							if(!is_page_template('tpl-home.php') ):
								echo '<!-- **Breadcrumb** -->';
								echo '<section class="breadcrumb-section">';
								echo '	<div class="container">';
								new dttheme_breadcrumb;
								get_search_form();
								echo '	</div>';
								echo '</section><!-- **Breadcrumb** -->';
							endif;
						endif;
			}?><div class="container">        