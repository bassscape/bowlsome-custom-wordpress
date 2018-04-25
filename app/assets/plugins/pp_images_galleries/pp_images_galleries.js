(function($) {
	"use strict";
	$(function() {

		$(document).ready(function(){

			// Lightbox for opening WordPress gallery image links in an overlay
			$("a[rel*=kwp_lightbox]").wrap('<div class="lightgallery"></div>');
			$(".lightgallery").lightGallery({
				getCaptionFromTitleOrAlt: true,
				download: false
			});

			// Lightbox for opening WordPress gallery image links in an overlay
			$("div.gallery").lightGallery({
				selector: '.gallery-icon a',
				download: false
			});

		});

	});
}(jQuery));