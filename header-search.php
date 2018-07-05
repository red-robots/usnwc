<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<?php
       wp_enqueue_script('jquery');
       wp_enqueue_script('jquery-core-ui');
       wp_enqueue_script('jquery-tabs-ui');
       wp_enqueue_script('hoverlink', get_bloginfo('template_directory').'/rollover.js');
    ?>

<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	wp_title( '|', true, 'right' );
?></title>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PLX2GN6');</script>
<!-- End Google Tag Manager -->
<?php wp_head();?>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-site-verification" content="e3L8kU2GBIb6wsJkRj2n6v1GDc-ajo6yg6IgX2xYl7w" />
<link rel="profile" href="https://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="stylesheet" type="text/css"  href="<?php echo get_template_directory_uri(); ?>/style.css?v=<?php echo time();?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/flexslider.css?v=<?php echo time();?>" />
<link rel="apple-touch-icon" sizes="57x57" href="/wp-content/uploads/2014/10/W_57x57.jpg" />
<link rel="apple-touch-icon" sizes="72x72" href="/wp-content/uploads/2014/10/W_72x72.jpg" />
<link rel="apple-touch-icon" sizes="114x114" href="/wp-content/uploads/2014/10/W_114x114.jpg" />
<link rel="apple-touch-icon" sizes="144x144" href="/wp-content/uploads/2014/10/W_144x144.jpg" />
<link rel="icon" type="image/png" sizes="16x16" href="/wp-content/uploads/2015/09/W-Logo_16X16.png">
<link rel="icon" type="image/png" sizes="32x32" href="/wp-content/uploads/2015/09/W-Logo_32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/wp-content/uploads/2015/09/W-Logo_96X96.png">
<link rel="stylesheet" href="/franklin-webfonts/franklingothicfs_condensed_macroman/stylesheet.css" type="text/css" charset="utf-8" />
<link rel="stylesheet" href="/franklin-webfonts/franklingothicfs_condenseditalic_macroman/stylesheet.css" type="text/css" charset="utf-8" />
<link rel="stylesheet" href="/franklin-webfonts/franklingothicfs_mediumcondensed_macroman/stylesheet.css" type="text/css" charset="utf-8" />
<link rel="stylesheet" href="https://usnwc.org/wp-content/themes/usnwc/css/addtohomescreen.css">
<!--[if lt IE 9]><script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<script src="<?php echo get_template_directory_uri(); ?>/js/addtohomescreen.min.js?"></script>
<script src="https://use.fontawesome.com/4945cee666.js"></script>
<script>
addToHomescreen({skipFirstVisit:true,maxDisplayCount:1});
</script>
<script src="//platform.twitter.com/oct.js" type="text/javascript"></script>
<script type="text/javascript">
	twttr.conversion.trackPid('l4lpc');
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://analytics.twitter.com/i/adsct?txn_id=l4lpc&p_id=Twitter" />
<img height="1" width="1" style="display:none;" alt="" src="//t.co/i/adsct?txn_id=l4lpc&p_id=Twitter" />
</noscript>
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '236370623380911'); // Insert your pixel ID here.
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=236370623380911&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->
<script type="application/ld+json">
{ "@context" : "http://schema.org",
  "@type" : "Organization",
  "name" : "U.S. National Whitewater Center",
  "url" : "http://www.usnwc.org",
  "sameAs" : [ "https://www.linkedin.com/company/220848/" ,
    "https://www.facebook.com/usnwc/",
    "https://www.youtube.com/user/theusnwc/",
    "https://www.instagram.com/usnwc/",
	“https://vimeo.com/usnwc”]
}
</script>
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PLX2GN6"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="base container <?php 
if(is_category()){
	$cats="";
	foreach(get_the_category($post->ID) as $cat){
		$cats.=$cat->category_nicename." ";
	}
	echo $cats;
} else {
	echo $post->post_name;
}
?>">
<nav class="mobile">
</nav>
<div class="page container">
<div class="false header"><img class="false img" src="<?php echo get_template_directory_uri()."/images/falselogo.png";?>"></div>
<header class="page">
	<?php get_search_form();?>
	<img class="showsearch" src="<?php echo get_template_directory_uri()."/images/search.png";?>">
	<img class="showmenu hamburger" src="<?php echo get_template_directory_uri()."/images/hamburger-75x75.png";?>">
    <nav>
   		<?php wp_nav_menu( array( 'theme_location' => 'header', 'container' => '' ) ); ?>
	</nav>
    <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img class="logo" src="<?php echo get_template_directory_uri()."/images/web_logo.png";?>" alt="U.S. National Whitewater Center Logo"></a>
</header>
<nav class="page breadcrumbs">
	<li class='breadcrumb-item' id='breadcrumb-0'><a href='<?php echo home_url( '/' );?>'>Home</a></li>
	<li class='breadcrumb-item'>  &raquo; Search</li>
</nav>
<main class="page">
