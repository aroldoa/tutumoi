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
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Scada' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Dosis:200,300,400,500' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
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
	<div class="col-lg-5"><p>NEED HELP WITH AN ORDER?  <a href="#">INFO@TUTUMOI.COM</a></p></div>
		<div class="col-lg-6 col-lg-offset-1">
			<ul>
				<li><a href="#">Sign In</a></li>
				<li><a href="#">My Account</a></li>
				<li><a href="#">Customer Service</a></li>
				<li><a href="#">Shopping Bag</a></li>
				<li class="cart"><a href="#">(4)</a></li>
			</ul>
		</div>
	</div><!-- end of Top Links -->
	<header>
		<div class="col-lg-12 logoarea">
			<a href="#"><img src="<?php bloginfo( 'template_directory' ); ?>/images/logo.png" alt="Tutus"/></a>
		</div><!-- end of Logo -->
		<!-- <div class="col-lg-12 menu">
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
		</div>--><!-- end of Menu area -->
<div class="col-lg-12 menu">
		<?php
		$defaults = array(
			'theme_location'  => 'main',
			'menu'            => '',
			'container'       => 'nav',
			'container_class' => 'col-lg-9',
			'container_id'    => '',
			'menu_class'      => '',
			'menu_id'         => 'nav',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
			'depth'           => 0,
			'walker'          => ''
		);?>

		<?php wp_nav_menu( $defaults );?>

	<?php
	add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
	function add_menu_parent_class( $items ) {

		$parents = array();
		foreach ( $items as $item ) {
			if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
				$parents[] = $item->menu_item_parent;
			}
		}

		foreach ( $items as $item ) {
			if ( in_array( $item->ID, $parents ) ) {
				$item->classes[] = 'menu-parent-item';
			}
		}

		return $items;
	}

	?>
	<div class="col-lg-3">
				<form class="search">
					<input type="text" value="Search Here"/>
				</form>
			</div>
	</div><!-- end of Menu area -->
    </header><!-- end of header -->
