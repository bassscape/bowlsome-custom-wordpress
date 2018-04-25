// BEGIN HIDE MENU WHEN MENU ITEM CLICKED
jQuery('.jumbo-by-bonfire ul li a').on('click', function(e) {
'use strict';
		if(jQuery('.jumbo-by-bonfire-wrapper').hasClass('jumbo-menu-active'))
		{
			/* turn menu button into default state */
			jQuery(".jumbo-menu-button").removeClass("jumbo-menu-button-active");
			/* hide main menu */
			jQuery(".jumbo-by-bonfire-wrapper").removeClass("jumbo-menu-active");
			}
});
// END HIDE MENU WHEN MENU ITEM CLICKED