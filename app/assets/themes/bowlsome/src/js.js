/* global viewportHeight, fluidvids, docReady */
(function($) {
	"use strict";
	$(function() {

		function mobile() {
			var checkWidth = $(window).width();
			var owl = $('.owl-carousel');
			if (checkWidth > 999) {
				
				//$('#bowlsome_shots').owlCarousel();
				owl.owlCarousel({
					loop:true,
				    margin:25,
				    autoWidth:true,
				    responsiveClass:true,
				    responsive:{
				        0:{
				            items:1,
				            merge:false,
				            mergeFit:false
				        },
				        768:{
				            items:2,
				            merge:false,
				            mergeFit:false
				        },
				        1000:{
				            items:3,
				            merge:true,
				            mergeFit:true
				        }
				    },
				    autoplay:false,
				    autoplayHoverPause:true,
				    autoplayTimeout:10000,
				    nav:true,
				    dots:false
				});
				console.log('resize event MORE than 768');
				
				var img = document.getElementById('height_guide_image');
				console.log('Carousel image height: ' + img.width);
				$(".owl-item .valign_text").css({height:img.width});
			} else if (checkWidth < 1000) {
				owl.owlCarousel('destroy');
				//demo.removeClass('owl-carousel');
				console.log('resize event LESS than 768');
			}
		}
		//document.getElementById("height_guide_image").onload = function() {mobile()};
		$(document).ready(mobile);
		$(window).resize(mobile);
		
		
		$(document).ready(function(){
			
			//$(".fouc_hide").show(); // try to avoid a flash of unstyled content by hiding elements until the page is loaded

			// Try to avoid people leaving the cart by removing links from the cart table
			//$('.woocommerce table.shop_table tr.cart_item td.product-thumbnail a').contents().unwrap();
			//$('.woocommerce table.shop_table tr.cart_item td.product-name a').contents().unwrap();
			
			/*
			$('.owl-carousel > div:nth-child(1)').flowtype({
				minimum : 768,
				//maximum : 1600,
				minFont : 11,
				maxFont : 32
			});
			/**/
			
			//$('.owl-stage').each(function() {
			//	$(this).find('.owl-item .valign_text').matchHeight({target: $('.owl-item.active:nth-child(2) div img')});
			//});
			/**/



			


		});

	});
}(jQuery));