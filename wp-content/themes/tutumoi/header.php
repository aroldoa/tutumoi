<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" />
	<?php } ?>
	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div class="container wrap">
	<div class="col-lg-12 top-links">
	<div class="col-lg-5"><p>NEED HELP WITH AN ORDER?  INFO@TUTUMOI.COM</p></div>
		<div class="col-lg-6 col-lg-offset-1">
			<ul>
				<a href="#"><li>Sign In</li></a>
				<a href="#"><li>My Account</li></a>
				<a href="#"><li>Customer Service</li></a>
				<a href="#"><li>Shopping Bag</li></a>
			</ul>
		</div>
	</div><!-- end of Top Links -->
	<header>
		<div class="col-lg-12 logoarea">
			<a href="#"><img src="<?php bloginfo( 'template_directory' ); ?>/images/logo.png" alt="Tutus"/></a>
		</div><!-- end of Logo -->
		<div class="col-lg-12 menu">
			<nav class="col-lg-9">
				<ul>
				<li><a href="#">Colletions</a></li>
				<li><a href="#">Baby</a></li>
				<li><a href="#">Toddler / Girls</a></li>
				<li><a href="#">Moms</a></li>
				<li><a href="#">Accessories</a></li>
				<li><a href="#">Wedding</a></li>
				<li><a href="#">Tutumoi Moments</a></li>
				</ul>
			</nav>
			<div class="col-lg-3">
				<form class="search">
					<input type="text" value="Search Here"/>
				</form>
			</div>
		</div><!-- end of Menu area -->
    </header><!-- end of header -->
