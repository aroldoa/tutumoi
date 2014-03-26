    <div class="pre-footer">
	    <div class="col-lg-12">
			<ul class="socialbuttons">
				<li><a href="#"><img src="<?php bloginfo( 'template_directory' ); ?>/images/facebook.png" alt="Facebook"/></a></li>
				<li><a href="#"><img src="<?php bloginfo( 'template_directory' ); ?>/images/twitter.png" alt="Facebook"/></a></li>
				<li><a href="#"><img src="<?php bloginfo( 'template_directory' ); ?>/images/linkedin.png" alt="Facebook"/></a></li>
				<li><a href="#"><img src="<?php bloginfo( 'template_directory' ); ?>/images/pinterest.png" alt="Facebook"/></a></li>
				<li><a href="#"><img src="<?php bloginfo( 'template_directory' ); ?>/images/google+.png" alt="Facebook"/></a></li>
			</ul>
	    </div>
    </div>
	    <div class="clearfix"></div>
	<footer>
	    <div class="col-sm-3">
		    <h5>Customer Support</h5>

		    <?php

				$footernav = array(
					'theme_location'  => 'footernav',
					'menu'            => '',
					'container'       => '',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => '',
					'menu_id'         => '',
					'echo'            => true,
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="footermenu" class="%2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'          => ''
				);

				wp_nav_menu( $footernav );

			?>

		    <!--<ul id="footermenu">
				<li><a href="#">About Us</a></li>
			    <li><a href="#">Shipping & Returns</a></li>
			    <li><a href="#">Our  Locations</a></li>
			    <li><a href="#">Help Placing an Order</a></li>
		    </ul>-->
		</div>
		<div class="col-sm-3">


    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget')) : else : ?>

   	<?php endif; ?>

		   <!-- <h5>Recent Articles</h5>
		    <ul id="recent-articles">
			    <li><a href="#">How to dress up and go to the radio but make sure
you stand out from the crowd!</a> <span>1.31.2014</span></li>
			    <li><a href="#">How to dress up and go to the radio but make sure
you stand out from the crowd!</a> <span>1.31.2014</span></li>
			    <li><a href="#">How to dress up and go to the radio but make sure
you stand out from the crowd!</a> <span>1.31.2014</span></li>
		    </ul> -->
		</div>
		<div class="col-sm-3">
		    <h5>Instagram Feed</h5>
		</div>
		<div class="col-sm-3">
		    <h5>Join Our Newsletter</h5>
		</div>
	 </footer>
	 <div class="copyright">
		 <div class="col-lg-10">
			 &copy; Copyright 2014 Tutumoi, Inc.
		 </div>
		 <div class="col-lg-2"></div>
	 </div>
</div><!-- end of Wrap -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.hoverIntent.minified.js"></script>
    <script src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.dcmegamenu.1.3.4.min.js"></script>
    <script src="<?php bloginfo( 'template_directory' ); ?>/js/bootstrap.min.js"></script>
    <!-- Include the plugin *after* the jQuery library -->
	<script src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.bxslider.js"></script>

    <script>
    (function(){

    	jQuery('#mega-menu-1').dcMegaMenu({
    		rowItems: '3',
        	speed: 'fast'
    	});

		// var navLi = $('nav li').children('ul').hide().end();

		// navLi.hover(function(){
		// 	$(this).find('> ul').stop(true, true).slideDown(250);
		// },function(){
		// 	$(this).find('> ul').stop(true, true).hide();
		// });

		//hover over swap
		$('.overlay').hover(
			function(){
				$div = $(this);
				$div.find('#product_category_image_0').stop(true, true).fadeTo(100,0);
				$div.find('#product_category_image_1').stop(true, true).fadeIn(200);
			},
			function(){
				$div.find('#product_category_image_1').stop(true, true).fadeOut(100);
				$div.find('#product_category_image_0').stop(true, true).fadeTo(200,1);
			}
		);

		//single product tabs
		$('.panel').css('display','none');

		// Eexplanation:
		// 	After saving the element that we are looking for, we need to slide it down so it appears. Afer this we need to go up to its parent element and select all of it's uncles (or its parents siblings).
		// 	Then we look fot their children (the element's cousins, aka all other elements with the class of panel) and then slide those up.
		$('.tabs').on('click','li',function(){
			$details = $(this).find('.panel');
			$details.slideDown(200).parent().siblings().find('.panel').slideUp(200);
		});


		//single product slideshow
		$('.bxslider').bxSlider({
		 	pagerCustom: '#bx-pager'
		});


	})();
    </script>

	<?php wp_footer(); ?>
	<!-- Don't forget analytics -->
</body>
</html>
