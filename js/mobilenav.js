/*
 * This function populates the mobile nav base on the nav in the header and footer 
 */
function populateMobileNav(){
	var $mobileNav = jQuery('nav.mobile');
	jQuery('header.page nav.desktop > ul').children().each(function(){
		var $this = jQuery(this);
		var $mobileMenu = jQuery('<ul></ul>').addClass('mobile-menu');
		var $mobileTopLevel = jQuery('<li></li>').addClass('mobile-top-level');
		var $mobileSubMenu = jQuery('<ul></ul>').addClass('mobile-sub-menu');
		$this.children('ul').children('li').children('a').each(function(){
			if(jQuery(this).text()&&jQuery(this).attr('href')){
				$mobileSubMenu.append(jQuery('<a></a>').append(jQuery('<li></li>').text(jQuery(this).text())).attr('href',jQuery(this).attr('href')));
			}
		});
		if($this.children('a').length!==0){
			$mobileTopLevel.text($this.children('a').text());
			if($mobileSubMenu.children().length!==0){
				$mobileTopLevel.append($mobileSubMenu);
			}
			$mobileNav.append($mobileMenu.append($mobileTopLevel));
		}
	});
	var $mobileMenu = jQuery('<ul></ul>').addClass('mobile-menu');
	jQuery('footer.page nav > ul').children('li').children('a').each(function(){
		if(jQuery(this).text()&&jQuery(this).attr('href')){
			$mobileMenu.append(jQuery('<a></a>').append(jQuery('<li></li>').addClass('mobile-top-level').text(jQuery(this).text())).attr('href',jQuery(this).attr('href')));
		}
	});
	if($mobileMenu.children().length!==0){
		$mobileNav.append($mobileMenu);
	}
}
/* 
 * This function shows the mobile nav and sets up the event handler for displaying the sub-levels of navigation
 */
function showMobileNav(){
	var $mobileNav = jQuery('nav.mobile');
	var $topLevel=jQuery('nav.mobile .mobile-menu .mobile-top-level');						
	var $subMenu=jQuery('nav.mobile .mobile-menu .mobile-sub-menu');
	$subMenu.each(function(){													//initially hide all sub menus
			jQuery(this).hide();
		});
	$topLevel.show();
	$mobileNav.show();
	$topLevel.on('click',function(){									 
		var $thisSubMenu=jQuery(this).find('.mobile-sub-menu');		//get current sub menu corresponding to current top-level
		$subMenu.not($thisSubMenu).each(function(){								//for each sub menu that isn't current 
			jQuery(this).hide();
		});
		$thisSubMenu.fadeToggle(700);
	});
}

function showMenuHandler(e){							//event listener for click on hamburger
	var $showMenu = jQuery('header.page .showmenu'); 						//get the hamburger 
	var $pageContainer = jQuery('div.page.container');
	if(!$showMenu.hasClass('active')){						//if not actively animated, if animated do nothing event listener
		resetIfResize();									//on page-content will handle
		e.stopPropagation(); //stop propagation so that page content on click isn't triggered 
		showMobileNav();
		pushPageRight();	
		$showMenu.addClass('active').off('click', showMenuHandler);			//add class active once hamburger is clicked, and remove event listener for show menu so it doesn't redeclare other event listeners
		$pageContainer.on('click', pageContainerHandler);	//set up event listener for return animation on click for section-page-container
	}
}
/*
 * This function hides the mobile nav and deregisters the event handlers that act as the menu
 * navigation
 */
function hideMobileNav(){
	jQuery('nav.mobile').hide();
	jQuery('nav.mobile .mobile-menu .mobile-top-level').off('click');
}
/*
 * This function acts as the handler for the page container click set in showMenuHandler
 * The function pushes the page back to it's original position, deregisters itself so no further 
 * page alterations can be made from a click without first reseting the handler by clicking
 * the showmenu, and lastly resets the showmenu handler so the functionality is resumed after the page is pushed over
 */
function pageContainerHandler(e){
	e.preventDefault();	//prevent linking			//note any of it's children will bubble up and trigger this
	pushPageLeft();
	jQuery('div.page.container').off('click', pageContainerHandler);						//deactivate event listenter for page content once animated to 0 left 0 top
	jQuery('header.page .showmenu').removeClass('active').on('click', showMenuHandler);				//remove class active from hamburger after animation
}

/* 
 * This section of the code starts the ball rolling and calls the function to populate the mobile nav. 
 * It also sets the event handler for the show menu after the document DOM is ready.
 */
jQuery(document).ready(function(){
													//have to populate the nav before getting the items
	// jQuery('header.page .showmenu').on('click', showMenuHandler);
});
jQuery(document).ready(function ($) {
	populateMobileNav();
	showMobileNav();
	$('.burger, .overlay').click(function(){
	  $('.burger').toggleClass('clicked');
	  $('.overlay').toggleClass('show');
	  $('nav').toggleClass('show');
	  $('body').toggleClass('overflow');
	});
	$('nav.mobilemenu li').click(function() {
	    $(this).find('ul.dropdown').toggleClass('active');
	});

});// END #####################################    END