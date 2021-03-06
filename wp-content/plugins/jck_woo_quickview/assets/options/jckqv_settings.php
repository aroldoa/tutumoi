<?php

$slug = 'jckqv';

return array(
	'tabs' => array(
		/*
		array(
			'id' => 'general',
			'title' => __('General Settings', $slug)
		),
		*/
		array(
			'id' => 'trigger',
			'title' => __('Quickview Trigger Settings', $slug)
		),
		array(
			'id' => 'popup',
			'title' => __('Popup Settings', $slug)
		)
	),
	'sections' => array(
		/*
	    array(
	    	'tab_id' => 'general',
	        'section_id' => 'general',
	        'section_title' => 'General',
	        'section_description' => '',
	        'fields' => array(
	            array(
	                'id' => 'styles',
	                'title' => __('Enable Quickview Stylesheet', $slug),
	                'subtitle' => '',
	                'type' => 'checkbox',
	                'default' => 1,
	                'placeholder' => ''
	            )
	        )
	    ),
	    */
	    array(
	    	'tab_id' => 'trigger',
	        'section_id' => 'general',
	        'section_title' => 'General',
	        'section_description' => '',
	        'fields' => array(
	            array(
	                'id' => 'method',
	                'title' => __('Quickview Method', $slug),
	                'subtitle' => '',
	                'type' => 'select',
	                'default' => 'click',
	                'placeholder' => '',
	                'choices' => array(
	                    'mouseover' => __('Hover Quickview Button', $slug),
	                    //'hoverprod' => __('Hover Product', $slug),
	                    'click' => __('Click Quickview Button', $slug),
	                    //'clickprod' => __('Click Product', $slug)
	                )
	            ),
	            /*
	            array(
	                'id' => 'delay',
	                'title' => __('Popup Delay', $slug),
	                'type' => 'text',
	                'subtitle' => __('If using a hover method, how long should the user hover in milliseconds before the popup is displayed?', $slug),
	                'default' => '500',
	                'placeholder' => '',
	            )
	            */
	        )
	    ),
	    array(
	    	'tab_id' => 'trigger',
	        'section_id' => 'position',
	        'section_title' => 'Positioning',
	        'section_description' => '',
	        'fields' => array(
	            array(
	                'id' => 'autoinsert',
	                'title' => __('Automatically insert Button?', $slug),
	                'subtitle' => __('Would you like Quickview to attempt to automatically insert the Quickview button?<br><br> For alternative insertion options, please see <a href="http://www.jckemp.com/plugins/woocommerce-quickview/#manually_insert_the_quickview_button" target="_blank">the documentation</a>.', $slug),
	                'type' => 'checkbox',
	                'default' => 1,
	                'placeholder' => ''
	            ),
	            array(
	                'id' => 'position',
	                'title' => __('Button Position', $slug),
	                'subtitle' => __('If you chose to automatically insert the button, where should it be displayed?', $slug),
	                'type' => 'select',
	                'default' => 'beforetitle',
	                'placeholder' => '',
	                'choices' => array(
	                	'beforeitem' => __('Before Item', $slug),
	                    'beforetitle' => __('Before Title', $slug),
	                    'aftertitle' => __('After Title', $slug),
	                    'afteritem' => __('After Item', $slug)
	                )
	            ),
	            array(
	                'id' => 'align',
	                'title' => __('Button Align', $slug),
	                'subtitle' => __('', $slug),
	                'type' => 'select',
	                'default' => 'left',
	                'placeholder' => '',
	                'choices' => array(
	                	'left' => __('Left', $slug),
	                    'center' => __('Centre', $slug),
	                    'right' => __('Right', $slug),
	                    'none' => __('None', $slug)
	                )
	            ),
	            array(
	                'id' => 'margins',
	                'title' => __('Margins', $slug),
	                'type' => 'multiinputs',
	                'subtitle' => __('Enter a pixel value (positive/negative) to offset the quickview button.', $slug),
	                'default' => array(
	                	'Top' => 0,
	                	'Right' => 0,
	                	'Bottom' => 10,
	                	'Left' => 0
	                ),
	                'placeholder' => '',
	            )
	        )
	    ),
	    array(
	    	'tab_id' => 'trigger',
	        'section_id' => 'styling',
	        'section_title' => 'Styling',
	        'section_description' => '',
	        'fields' => array(
	            array(
	                'id' => 'autohide',
	                'title' => __('Auto-hide Button?', $slug),
	                'subtitle' => __('Should the quickview button only show when the product is hovered?', $slug),
	                'type' => 'checkbox',
	                'default' => 0,
	                'placeholder' => ''
	            ),
	            array(
	                'id' => 'hoverel',
	                'title' => __('Button Parent', $slug),
	                'type' => 'text',
	                'subtitle' => __('If the button is set to autohide, enter a parent class, id, or element that should display the quickview button when hovered.', $slug),
	                'default' => __('.product', $slug),
	                'placeholder' => '',
	            ),
	            array(
	                'id' => 'icon',
	                'title' => __('Icon', $slug),
	                'subtitle' => __('Choose the Icon to use on the Quickview button', $slug),
	                'type' => 'select',
	                'default' => 'eye',
	                'placeholder' => '',
	                'choices' => array(
	                	'none' => __('No Icon', $slug),
	                    'search' => __('Magnifier', $slug),
	                    'eye' => __('Eye', $slug),
	                    'plus' => __('Plus Symbol', $slug)
	                )
	            ),
	            array(
	                'id' => 'text',
	                'title' => __('Quickview Text', $slug),
	                'type' => 'text',
	                'subtitle' => __('', $slug),
	                'default' => __('Quickview', $slug),
	                'placeholder' => '',
	            ),
	            array(
	                'id' => 'btnstyle',
	                'title' => __('Button Style', $slug),
	                'subtitle' => __('', $slug),
	                'type' => 'select',
	                'default' => 'flat',
	                'placeholder' => '',
	                'choices' => array(
	                    'none' => __('None', $slug),
	                    'border' => __('Border', $slug),
	                    'flat' => __('Flat', $slug)
	                )
	            ),
	            array(
	                'id' => 'padding',
	                'title' => __('Padding', $slug),
	                'type' => 'multiinputs',
	                'subtitle' => __('Enter a pixel value (positive/negative) to pad the quickview button.', $slug),
	                'default' => array(
	                	'Top' => 8,
	                	'Right' => 10,
	                	'Bottom' => 8,
	                	'Left' => 10
	                ),
	                'placeholder' => '',
	            ),
	            array(
	                'id' => 'btncolour',
	                'title' => __('Button Colour', $slug),
	                'subtitle' => __('If your button is "Flat" style, this is the background colour. If it\'s "Border" style, this is the border colour.', $slug),
	                'type' => 'color',
	                'default' => '#66cc99',
	                'placeholder' => '',
	            ),
	            array(
	                'id' => 'btnhovcolour',
	                'title' => __('Button Hover Colour', $slug),
	                'subtitle' => __('If your button is "Flat" style, this is the background colour on hover. If it\'s "Border" style, this is the border colour on hover.', $slug),
	                'type' => 'color',
	                'default' => '#47C285',
	                'placeholder' => '',
	            ),
	            array(
	                'id' => 'btntextcolour',
	                'title' => __('Button Text Colour', $slug),
	                'type' => 'color',
	                'default' => '#ffffff',
	                'placeholder' => '',
	            ),
	            array(
	                'id' => 'btntexthovcolour',
	                'title' => __('Button Text Hover Colour', $slug),
	                'type' => 'color',
	                'default' => '#ffffff',
	                'placeholder' => '',
	            ),
	            array(
	                'id' => 'borderradius',
	                'title' => __('Border Radius', $slug),
	                'type' => 'multiinputs',
	                'subtitle' => __('Enter a border radius in pixels.', $slug),
	                'default' => array(
	                	'Top Left' => 4,
	                	'Top Right' => 4,
	                	'Btm Right' => 4,
	                	'Btm Left' => 4
	                ),
	                'placeholder' => '',
	            ),
	        )
	    ),
	    array(
	    	'tab_id' => 'popup',
	        'section_id' => 'general',
	        'section_title' => 'General',
	        'section_description' => '',
	        'fields' => array(
	            array(
	                'id' => 'gallery',
	                'title' => __('Enable Gallery?', $slug),
	                'subtitle' => __('Should the popup allow you to navigate between the other products on the page?', $slug),
	                'type' => 'checkbox',
	                'default' => 1,
	                'placeholder' => ''
	            ),
	            array(
	                'id' => 'overlaycolour',
	                'title' => __('Overlay Colour', $slug),
	                'type' => 'color',
	                'default' => '#000000',
	                'placeholder' => '',
	            ),
	            array(
	                'id' => 'overlayopacity',
	                'title' => __('Overlay Opacity', $slug),
	                'type' => 'text',
	                'subtitle' => __('Enter a value where 0 = transparent, and 1 = opaque.', $slug),
	                'default' => '0.8',
	                'placeholder' => '',
	            )
	        )
	    ),
	    array(
	    	'tab_id' => 'popup',
	        'section_id' => 'imagery',
	        'section_title' => 'Imagery',
	        'section_description' => '',
	        'fields' => array(
	        	array(
	                'id' => 'imgscale',
	                'title' => __('Image Scale Mode', $slug),
	                'subtitle' => __('The main images use the <a href="'.admin_url().'admin.php?page=wc-settings&tab=products" target="_blank"><strong>Single Product Image</strong></a> sizing, and thumbnails use the <a href="'.admin_url().'admin.php?page=wc-settings&tab=products" target="_blank"><strong>Product Thumbnails</strong></a> sizing.<br><br> <strong>Fit if Smaller</strong> scales image to fit only if size of slider viewport is less then size of image.<br><br> <strong>Fit</strong> same as above, but enlarges image if it\'s smaller then viewport. Best if images are different sizes.<br><br> <strong>Fill</strong> (default) scales image to completely fill slider viewport. Best if images are cropped.<br><br> <strong>None</strong> doesn\'t change size of image.', $slug),
	                'type' => 'select',
	                'default' => 'fill',
	                'placeholder' => '',
	                'choices' => array(
	                    'fill' => __('Fill', $slug),
	                    'fit-if-smaller' => __('Fit if Smaller', $slug),
	                    'fit' => __('Fit', $slug),
	                    'none' => __('None', $slug)
	                )
	            ),
	            array(
	                'id' => 'imgtransition',
	                'title' => __('Image Transition', $slug),
	                'subtitle' => __('', $slug),
	                'type' => 'select',
	                'default' => 'horizontal',
	                'placeholder' => '',
	                'choices' => array(
	                    'horizontal' => __('Horizontal Slide', $slug),
	                    'vertical' => __('Vertical Slide', $slug),
	                    'fade' => __('Fade', $slug)
	                )
	            ),
	            array(
	                'id' => 'transitionspeed',
	                'title' => __('Transition Speed', $slug),
	                'type' => 'text',
	                'subtitle' => __('The speed in milliseconds at which the image gallery transition occurs.', $slug),
	                'default' => '600',
	                'placeholder' => '',
	            ),
	            array(
	                'id' => 'bgcolour',
	                'title' => __('Background Colour', $slug),
	                'type' => 'color',
	                'default' => '#ffffff',
	                'placeholder' => '',
	            ),
	            array(
	                'id' => 'navarr',
	                'title' => __('Show Navigation Arrows?', $slug),
	                'subtitle' => __('Show previous/next arrows on the image gallery?', $slug),
	                'type' => 'checkbox',
	                'default' => 1,
	                'placeholder' => ''
	            ),
	            array(
	                'id' => 'hidenavarr',
	                'title' => __('Auto-hide Navigation Arrows?', $slug),
	                'subtitle' => __('Should the navigation arrows only be visible on hover?', $slug),
	                'type' => 'checkbox',
	                'default' => 0,
	                'placeholder' => ''
	            ),
	            array(
	                'id' => 'thumbnails',
	                'title' => __('Thumbnail type', $slug),
	                'subtitle' => __('', $slug),
	                'type' => 'select',
	                'default' => 'thumbnails',
	                'placeholder' => '',
	                'choices' => array(
	                    'thumbnails' => __('Sliding Thumbnails', $slug),
	                    // 'tabs' => __('Stacked Thumbnails', $slug),
	                    'bullets' => __('Bullets', $slug),
	                    'none' => __('None', $slug)
	                )
	            ),
	            /*
	            array(
	                'id' => 'enablezoom',
	                'title' => __('Enable Zoom?', $slug),
	                'subtitle' => __('Should the images in the slider be zoomable?', $slug),
	                'type' => 'checkbox',
	                'default' => 1,
	                'placeholder' => ''
	            ),
	            array(
	                'id' => 'zoomposition',
	                'title' => __('Zoom Position', $slug),
	                'subtitle' => __('', $slug),
	                'type' => 'select',
	                'default' => 'inside',
	                'placeholder' => '',
	                'choices' => array(
	                    'inside' => __('Inside', $slug),
	                    'outside' => __('Outside', $slug),
	                    'follow' => __('Follow', $slug)
	                )
	            ),
	            */
	        )
	    ),
	    array(
	    	'tab_id' => 'popup',
	        'section_id' => 'content',
	        'section_title' => 'Content',
	        'section_description' => '',
	        'fields' => array(
	            array(
	                'id' => 'showtitle',
	                'title' => __('Show Title?', $slug),
	                'subtitle' => __('', $slug),
	                'type' => 'checkbox',
	                'default' => 1,
	                'placeholder' => ''
	            ),
	            array(
	                'id' => 'showprice',
	                'title' => __('Show Price?', $slug),
	                'subtitle' => __('', $slug),
	                'type' => 'checkbox',
	                'default' => 1,
	                'placeholder' => ''
	            ),
	            array(
	                'id' => 'showrating',
	                'title' => __('Show Rating?', $slug),
	                'subtitle' => __('', $slug),
	                'type' => 'checkbox',
	                'default' => 1,
	                'placeholder' => ''
	            ),
	            array(
	                'id' => 'showbanner',
	                'title' => __('Show Banner?', $slug),
	                'subtitle' => __('E.g: "Sale!"', $slug),
	                'type' => 'checkbox',
	                'default' => 1,
	                'placeholder' => ''
	            ),
	            array(
	                'id' => 'showdesc',
	                'title' => __('Show Description?', $slug),
	                'subtitle' => __('', $slug),
	                'type' => 'select',
	                'default' => 'full',
	                'placeholder' => '',
	                'choices' => array(
	                    'no' => __('No', $slug),
	                    'full' => __('Full', $slug),
	                    'short' => __('Short', $slug)
	                )
	            ),
	            array(
	                'id' => 'showatc',
	                'title' => __('Show Product Options / Add to Cart?', $slug),
	                'subtitle' => __('', $slug),
	                'type' => 'checkbox',
	                'default' => 1,
	                'placeholder' => ''
	            ),
	            array(
	                'id' => 'ajaxcart',
	                'title' => __('Enable AJAX Add to Cart?', $slug),
	                'subtitle' => __('Add products to cart from the quickview without reloading the page.', $slug),
	                'type' => 'checkbox',
	                'default' => 1,
	                'placeholder' => ''
	            ),
	            array(
	                'id' => 'showqty',
	                'title' => __('Show Qty Field?', $slug),
	                'subtitle' => __('', $slug),
	                'type' => 'checkbox',
	                'default' => 1,
	                'placeholder' => ''
	            ),
	            array(
	                'id' => 'showmeta',
	                'title' => __('Show Product Meta?', $slug),
	                'subtitle' => __('E.g: Categories, Tags, etc.', $slug),
	                'type' => 'checkbox',
	                'default' => 1,
	                'placeholder' => ''
	            ),
	            /*
	            array(
	                'id' => 'showview',
	                'title' => __('Show "View Product" Button?', $slug),
	                'subtitle' => __('Add a button tot he end of the quickview to take the customer through to the main product page.', $slug),
	                'type' => 'checkbox',
	                'default' => 1,
	                'placeholder' => ''
	            ),
	            */
	            array(
	                'id' => 'themebtn',
	                'title' => __('Try to use your Theme\'s Button Styling?', $slug),
	                'subtitle' => __('Check this if you\'d like to attempt to use the button styling from your theme. If this fails, use the styling tools below, or add your own CSS.', $slug),
	                'type' => 'checkbox',
	                'default' => 0,
	                'placeholder' => ''
	            ),
	            array(
	                'id' => 'btncolour',
	                'title' => __('Button Colour', $slug),
	                'type' => 'color',
	                'default' => '#66cc99',
	                'placeholder' => '',
	            ),
	            array(
	                'id' => 'btnhovcolour',
	                'title' => __('Button Hover Colour', $slug),
	                'type' => 'color',
	                'default' => '#47C285',
	                'placeholder' => '',
	            ),
	            array(
	                'id' => 'btntextcolour',
	                'title' => __('Button Text Colour', $slug),
	                'type' => 'color',
	                'default' => '#ffffff',
	                'placeholder' => '',
	            ),
	            array(
	                'id' => 'btntexthovcolour',
	                'title' => __('Button Text Hover Colour', $slug),
	                'type' => 'color',
	                'default' => '#ffffff',
	                'placeholder' => '',
	            ),
	        )
	    ),
	    /*
	    array(
	    	'tab_id' => 'popup',
	        'section_id' => 'related',
	        'section_title' => 'Related products',
	        'section_description' => '',
	        'fields' => array(
	            array(
	                'id' => 'showrelated',
	                'title' => __('Show Related Products?', $slug),
	                'subtitle' => __('Adds related products to the bottom of the popup, in a slider.', $slug),
	                'type' => 'checkbox',
	                'default' => 1,
	                'placeholder' => ''
	            )
	        )
	    ),	 
	    */   
    )
);