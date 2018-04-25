// BEGIN SHOW/HIDE MAIN MENU
jQuery('.jumbo-menu-button, .jumbo-custom-activator').on('click', function(e) {
e.preventDefault();

	if(jQuery('.jumbo-by-bonfire-wrapper').hasClass('jumbo-menu-active'))
	{
		/* return menu button to default state */
		jQuery(".jumbo-menu-button").removeClass("jumbo-menu-button-active");
		/* hide main menu */
		jQuery(".jumbo-by-bonfire-wrapper").removeClass("jumbo-menu-active");
	} else {
		/* menu button active */
		jQuery(".jumbo-menu-button").addClass("jumbo-menu-button-active");
		/* show main menu */
		jQuery(".jumbo-by-bonfire-wrapper").addClass("jumbo-menu-active");
	}

});
// END SHOW/HIDE MAIN MENU


// BEGIN SHOW/HIDE GRAVATAR TOOLTIP
jQuery(".jumbo-gravatar-wrapper").on({
	mouseenter: function () {
		jQuery(".jumbo-gravatar-tooltip-wrapper").addClass("jumbo-gravatar-tooltip-wrapper-active");
	},
	mouseleave: function () {
		jQuery(".jumbo-gravatar-tooltip-wrapper").removeClass("jumbo-gravatar-tooltip-wrapper-active");
	}
});
// END SHOW/HIDE GRAVATAR TOOLTIP


// BEGIN HIDE MAIN MENU WHEN ESC BUTTON PRESSED
jQuery(document).keyup(function(e) {
	if (e.keyCode == 27) { 
		/* turn menu button into default state */
		jQuery(".jumbo-menu-button").removeClass("jumbo-menu-button-active");
        /* hide main menu */
		jQuery(".jumbo-by-bonfire-wrapper").removeClass("jumbo-menu-active");
		return false;
	}
});
// END HIDE MAIN MENU WHEN ESC BUTTON PRESSED


// BEGIN HIDE MENU DESCRIPTION DIV IF NO DESCRIPTION ENTERED
jQuery(document).ready(function() { jQuery('.bonfire-jumbo-main-desc:empty').remove(); });
// END HIDE MENU DESCRIPTION DIV IF NO DESCRIPTION ENTERED


// BEGIN SHOW/HIDE SECONDARY MENU
jQuery(function() {
    /* toggle menu when clicked on the menu button or close button */
    jQuery(".jumbo-secondary-menu-button").on('click', function(e) {
        /* toggle secondary menu button */
        jQuery(".jumbo-secondary-menu-button").toggleClass("jumbo-secondary-menu-button-active");
        /* toggle secondary menu */
        jQuery(".jumbo-by-bonfire-secondary-wrapper").toggleClass("jumbo-secondary-menu-active");
        e.stopPropagation()
    });
    /* hide menu when clicked outside of it */
    jQuery(window).on('click touchend', function(e) {
        /* deactivate secondary menu button */
        jQuery(".jumbo-secondary-menu-button").removeClass("jumbo-secondary-menu-button-active");
        /* close secondary menu */
        jQuery(".jumbo-by-bonfire-secondary-wrapper").removeClass("jumbo-secondary-menu-active");
        /* close any open submenus */
        jQuery(".jumbo-by-bonfire-secondary .menu > li").find(".sub-menu").slideUp(300);
    	jQuery(".jumbo-by-bonfire-secondary .menu > li > span, .jumbo-by-bonfire-secondary .sub-menu > li > span").removeClass("jumbo-submenu-active");
    
    });  
    jQuery('.jumbo-secondary-menu-button, .jumbo-by-bonfire-secondary-wrapper').on('click touchend', function(e) {
        event.stopPropagation();
    });
});
// END SHOW/HIDE SECONDARY MENU


// BEGIN CONVERTING DEFAULT WP MENU TO A SLIDE-DOWN ONE
jQuery(document).ready(function ($) {
'use strict';
	/* add sub-menu arrow */
	$('.jumbo-by-bonfire-secondary ul li ul').before($('<span class="jumbo-sub-arrow"><span class="jumbo-sub-arrow-inner"></span></span>'));

	/* accordion */
	$(".jumbo-by-bonfire-secondary .menu > li > span, .jumbo-by-bonfire-secondary .sub-menu > li > span").on('click', function(e) {
	e.preventDefault();
        /* before opening/closing sub-menu, remove smooth scroll (iOS workaround) */
        $(".jumbo-by-bonfire-secondary").removeClass("smooth-scroll");
        
            if (false == $(this).next().is(':visible')) {
                $(this).parent().siblings().find(".sub-menu").delay(10).slideUp(350);
                $(this).siblings().find(".sub-menu").delay(10).slideUp(350);
                $(this).parent().siblings().find("span").removeClass("jumbo-submenu-active");
                $(this).siblings().find("span").removeClass("jumbo-submenu-active");
            }
            $(this).next().delay(10).slideToggle(350);
            $(this).toggleClass("jumbo-submenu-active");
        
        /* after opening/closing sub-menu, restore smooth scroll (iOS workaround) */
        setTimeout(function() {
            $(".jumbo-by-bonfire-secondary").addClass("smooth-scroll");
        }, 400);
	})
	
	/* sub-menu arrow animation */
	$(".jumbo-by-bonfire-secondary .menu > li > span").on('click', function(e) {
	e.preventDefault();
		if($(".jumbo-by-bonfire-secondary .sub-menu > li > span").hasClass('jumbo-submenu-active'))
			{
				$(".jumbo-by-bonfire-secondary .sub-menu > li > span").removeClass("jumbo-submenu-active");
			}
	})

	/* close sub-menus when menu button, search button or overlay clicked */
	$(".jumbo-secondary-menu-button").on('click', function(e) {
		if($(".jumbo-by-bonfire-secondary .menu > li > span, .jumbo-by-bonfire-secondary .sub-menu > li > span").hasClass('jumbo-submenu-active'))
			{
				$(".jumbo-by-bonfire-secondary .menu > li").find(".sub-menu").delay(10).slideUp(350);
				$(".jumbo-by-bonfire-secondary .menu > li > span, .sub-menu > li > span").removeClass("jumbo-submenu-active");
			}
	})
	
});
// END CONVERTING DEFAULT WP MENU TO A SLIDE-DOWN ONE