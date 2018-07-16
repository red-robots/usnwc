var page_min_width = 940;
var mobile_width = 500;
var isotope_set = false;
var is_filtering = false;
var current_page_width = 0;

jQuery.noConflict();

jQuery(document).ready(function ($) {
    


$('.grid').isotope({
  // set itemSelector so .grid-sizer is not used in layout
  itemSelector: '.grid-item',
  percentPosition: true,
  masonry: {
    // use element for option
    columnWidth: '.grid-sizer'
  }
});







var $grid = $('.tile.container').isotope({
          itemSelector: '.element-item',
          // layoutMode: 'fitRows'
        });
        // filter functions
        var filterFns = {
          // show if number is greater than 50
          numberGreaterThan50: function() {
            var number = $(this).find('.number').text();
            return parseInt( number, 10 ) > 50;
          },
          // show if name ends with -ium
          ium: function() {
            var name = $(this).find('.name').text();
            return name.match( /ium$/ );
          }
        };
        // bind filter button click

        $('.filters-button-group').on( 'click', 'button', function() {
          var filterValue = $( this ).attr('data-filter');
          // use filterFn if matches value
          filterValue = filterFns[ filterValue ] || filterValue;
          $grid.isotope({ filter: filterValue });
        });
        // change is-checked class on buttons
        $('.button-group').each( function( i, buttonGroup ) {
          var $buttonGroup = $( buttonGroup );
          $buttonGroup.on( 'click', 'button', function() {
            $buttonGroup.find('.is-checked').removeClass('is-checked');
            $( this ).addClass('is-checked');
          });
        });



        $('.wrap').isotope();

$('a.filter').click(function() {
    var to_filter = $(this).attr('rel');
    if(to_filter == 'all') {
        $('.wrap').isotope({filter: '.box'});
    } else {
        $('.wrap').isotope({filter: '.'+to_filter});
    }

});

// ######################################################################################
// ######################################################################################
// ######################################################################################
// ######################################################################################
// ######################################################################################


/* isotope.combofilter.js
 * Author: Drew Taylor 
 */
    var $container;
    var filters = {};
    $(function(){
        $container = $('#filter-container');
        var $filterDisplay = $('#filter-display');
        $container.imagesLoaded( function(){
            $container.isotope({
                itemSelector : '.item',
                sortBy : 'random'
            });
        });
        var numItemsDisp = $('img.item:not(.isotope-hidden)').length;
        $filterDisplay.append( '<span class="filter-label data-counter pull-right">Displaying all&nbsp;'+numItemsDisp+'&nbsp;artworks</span>' );
        var group = '';
        // filter on click
        $('.filter a').click(function(){
            // exit directly if filter already disabled
            if ($(this).hasClass('disabled') ){
                return false;
            }
            var $this = $(this);
            var $optionSet = $(this).parents('.option-set');
            group = $optionSet.attr('data-filter-group');
            // store filter value in object
            var filterGroup = filters[ group ];
            if ( !filterGroup ) {
                filterGroup = filters[ group ] = [];
            }
            var isAll = $this.hasClass('all');
            // reset filter group
            if ( isAll ) {
                Array.prototype.remove = function(from, to) {
                    var rest = this.slice((to || from) + 1 || this.length);
                    this.length = from < 0 ? this.length + from : from;
                    return this.push.apply(this, rest);
                };
                filters[ group ].remove(0,-1)
            }
            var index = $.inArray($this.attr('data-filter-value'), filterGroup );
            if ( !isAll && index === -1 ) {
                // push filter to group
            filters[ group ].push($this.attr('data-filter-value') );
            }
            else if ( !isAll ) {
                // remove filter from group
                filters[ group ].splice( index, 1 );
            }
            // class toggling
            if ($this.hasClass('active') ) {
                $this.removeClass('active');
            }
            else {
                $this.addClass('active');
            }
            // let's do some filtering :>
            var comboFilter = getComboFilter( filters );
            $container.isotope({ filter: comboFilter });
            // gotta check and set those disabled filters!
            var $that = $(this);
            // artist
            $('a.artist:not(.clone)').each(function() {
                var $this = $(this);
                var getVal = $this.attr('data-filter-value');
                var numItems = $('img'+getVal+':not(.isotope-hidden)').length;
                if(!$(this).hasClass('active') && !$that.hasClass('artist') ){
                    if(numItems === 0){
                        $this.addClass('disabled');
                    }
                    else {
                        $this.removeClass('disabled');
                    }
                }
                else if( $this.hasClass('active') && $this.hasClass('disabled') ){
                    $this.removeClass('disabled');
                }
                else if(!$(this).hasClass('active') ) {
                    if(numItems > 0){
                        $this.removeClass('disabled');
                    }
                }
            });
            // medium
            $('a.medium:not(.clone)').each(function() {
                var $this = $(this);
                var getVal = $this.attr('data-filter-value');
                var numItems = $('img'+getVal+':not(.isotope-hidden)').length;
                if(!$(this).hasClass('active') && !$that.hasClass('medium') ){
                    if(numItems === 0){
                        $this.addClass('disabled');
                    }
                    else {
                        $this.removeClass('disabled');
                    }
                }
                else if( $this.hasClass('active') && $this.hasClass('disabled') ){
                    $this.removeClass('disabled');
                }
                else if(!$(this).hasClass('active') ) {
                    if(numItems > 0){
                        $this.removeClass('disabled');
                    }
                }
            });
            // colour
            $('a.colour:not(.clone)').each(function() {
                var $this = $(this);
                var getVal = $this.attr('data-filter-value');
                var numItems = $('img'+getVal+':not(.isotope-hidden)').length;
                if(!$(this).hasClass('active') && !$that.hasClass('colour') ){
                    if(numItems === 0){
                        $this.addClass('disabled');
                    }
                    else {
                        $this.removeClass('disabled');
                    }
                }
                else if( $this.hasClass('active') && $this.hasClass('disabled') ){
                    $this.removeClass('disabled');
                }
                else if(!$(this).hasClass('active') ) {
                    if(numItems > 0){
                        $this.removeClass('disabled');
                    }
                }
            });
            // size
            $('a.size:not(.clone)').each(function() {
                var $this = $(this);
                var getVal = $this.attr('data-filter-value');
                var numItems = $('img'+getVal+':not(.isotope-hidden)').length;
                if(!$(this).hasClass('active') && !$that.hasClass('size') ){
                    if(numItems === 0){
                        $this.addClass('disabled');
                    }
                    else {
                        $this.removeClass('disabled');
                    }
                }
                else if( $this.hasClass('active') && $this.hasClass('disabled') ){
                    $this.removeClass('disabled');
                }
                else if(!$(this).hasClass('active') ) {
                    if(numItems > 0){
                        $this.removeClass('disabled');
                    }
                }
            });
            // subject
            $('a.subject:not(.clone)').each(function() {
                var $this = $(this);
                var getVal = $this.attr('data-filter-value');
                var numItems = $('img'+getVal+':not(.isotope-hidden)').length;
                if(!$(this).hasClass('active') && !$that.hasClass('subject') ){
                    if(numItems === 0){
                        $this.addClass('disabled');
                    }
                    else {
                        $this.removeClass('disabled');
                    }
                }
                else if( $this.hasClass('active') && $this.hasClass('disabled') ){
                    $this.removeClass('disabled');
                }
                else if(!$(this).hasClass('active') ) {
                    if(numItems > 0){
                        $this.removeClass('disabled');
                    }
                }
            });
            // price
            $('a.price:not(.clone)').each(function() {
                var $this = $(this);
                var getVal = $this.attr('data-filter-value');
                var numItems = $('img'+getVal+':not(.isotope-hidden)').length;
                if(!$(this).hasClass('active') && !$that.hasClass('price') ){
                    if(numItems === 0){
                        $this.addClass('disabled');
                    }
                    else {
                        $this.removeClass('disabled');
                    }
                }
                else if( $this.hasClass('active') && $this.hasClass('disabled') ){
                    $this.removeClass('disabled');
                }
                else if(!$(this).hasClass('active') ) {
                    if(numItems > 0){
                        $this.removeClass('disabled');
                    }
                }
            });
            // sale
            $('a.sale:not(.clone)').each(function() {
                var $this = $(this);
                var getVal = $this.attr('data-filter-value');
                var numItems = $('img'+getVal+':not(.isotope-hidden)').length;
                if(!$(this).hasClass('active') && !$that.hasClass('sale') ){
                    if(numItems === 0){
                        $this.addClass('disabled');
                    }
                    else {
                        $this.removeClass('disabled');
                    }
                }
                else if( $this.hasClass('active') && $this.hasClass('disabled') ){
                    $this.removeClass('disabled');
                }
                else if(!$(this).hasClass('active') ) {
                    if(numItems > 0){
                        $this.removeClass('disabled');
                    }
                }
            });
            // update filter display
            var arrLbl = [];
            arrLbl = comboFilter.split('.');
            // before iterating we empty previous display vals
            $filterDisplay.empty();
            // clone method for filter display
            var clone = 'clone';
            var cloneId = 0; // because cloning an id attr just wrong :>
            $('a.active').each(function() {
                cloneId++;
                $(this).clone().appendTo($filterDisplay).attr('id',clone+cloneId).addClass('clone');
            });
            $('a.clone').on('click', function() {
                var that = $(this);
                var parent = that.attr('data-filter-value');
                $('div.filter').find(parent).each(function() {
                    $(this).trigger('click');
                });
            });
            // resolves any outstanding issues with disableds
            // TODO: Find a way around using indexOf this way. Lots of unneccesary overhead.
            if ( comboFilter.indexOf('medium') == -1 
                && comboFilter.indexOf('colour') == -1 
                && comboFilter.indexOf('size') == -1 
                && comboFilter.indexOf('subject') == -1 
                && comboFilter.indexOf('price') == -1 
                && comboFilter.indexOf('sale') == -1 
                && comboFilter.indexOf('artist') > 0 ){
                    $('a.artist:not(.clone)').removeClass('disabled');
            }
            if ( comboFilter.indexOf('artist') == -1 
                && comboFilter.indexOf('colour') == -1 
                && comboFilter.indexOf('size') == -1 
                && comboFilter.indexOf('subject') == -1 
                && comboFilter.indexOf('price') == -1 
                && comboFilter.indexOf('sale') == -1 
                && comboFilter.indexOf('medium') > 0 ){
                    $('a.medium:not(.clone)').removeClass('disabled');
            }
            if ( comboFilter.indexOf('artist') == -1 
                && comboFilter.indexOf('medium') == -1 
                && comboFilter.indexOf('size') == -1 
                && comboFilter.indexOf('subject') == -1 
                && comboFilter.indexOf('price') == -1 
                && comboFilter.indexOf('sale') == -1 
                && comboFilter.indexOf('colour') > 0 ){
                    $('a.colour:not(.clone)').removeClass('disabled');
            }
            if ( comboFilter.indexOf('artist') == -1 
                && comboFilter.indexOf('medium') == -1 
                && comboFilter.indexOf('colour') == -1 
                && comboFilter.indexOf('subject') == -1 
                && comboFilter.indexOf('price') == -1 
                && comboFilter.indexOf('sale') == -1 
                && comboFilter.indexOf('size') > 0 ){
                    $('a.size:not(.clone)').removeClass('disabled');
            }
            if ( comboFilter.indexOf('artist') == -1 
                && comboFilter.indexOf('medium') == -1 
                && comboFilter.indexOf('size') == -1 
                && comboFilter.indexOf('colour') == -1 
                && comboFilter.indexOf('price') == -1 
                && comboFilter.indexOf('sale') == -1 
                && comboFilter.indexOf('subject') > 0 ){
                    $('a.subject:not(.clone)').removeClass('disabled');
            }
            if ( comboFilter.indexOf('artist') == -1 
                && comboFilter.indexOf('medium') == -1 
                && comboFilter.indexOf('size') == -1 
                && comboFilter.indexOf('colour') == -1 
                && comboFilter.indexOf('subject') == -1 
                && comboFilter.indexOf('sale') == -1 
                && comboFilter.indexOf('price') > 0 ){
                    $('a.price:not(.clone)').removeClass('disabled');
            }
            // filter display count
            var numItemsHidden = $('img.item.isotope-hidden').length;
            var numItemsDisp = $('img.item:not(.isotope-hidden)').length;
            var numItemsVisible = $('img.item:not(.isotope-hidden)').length;
            var activeCheck = $('a.active').size();
            if(numItemsHidden !== 0 && numItemsDisp != 1) {
                // clear filter
                $filterDisplay.append( '<a onclick="clearAll();" id="reset-filters" class="pull-right filter-btn">Clear All</a>' );
                $filterDisplay.append( '<span class="filter-label data-counter pull-right">Displaying:&nbsp;'+numItemsDisp+'&nbsp;works&nbsp;&nbsp;</span>' );
            }
            else if (numItemsHidden !== 0 && numItemsDisp === 1) {
                $filterDisplay.append( '<a onclick="clearAll();" id="reset-filters" class="pull-right filter-btn">Clear All</a>' );
                $filterDisplay.append( '<span class="filter-label data-counter pull-right">Displaying:&nbsp;'+numItemsDisp+' work&nbsp;&nbsp;</span>' );
            }
            else if (numItemsHidden === 0 && activeCheck > 0) {
                $filterDisplay.append( '<a onclick="clearAll();" id="reset-filters" class="pull-right filter-btn">Clear All</a>' );
                $filterDisplay.append( '<span class="filter-label data-counter pull-right">Displaying all artworks ('+numItemsDisp+')&nbsp;&nbsp;</span>' );
            }
            else if (numItemsHidden === 0 && activeCheck === 0) {
                $filterDisplay.append( '<span class="filter-label data-counter pull-right">Displaying all&nbsp;'+numItemsDisp+'&nbsp;artworks</span>' );
            }
            else{ // strictly fall-back - this should never get triggered 
                $filterDisplay.append( '<a onclick="clearAll();" id="reset-filters" class="pull-right filter-btn">Clear All</a>' );
                $filterDisplay.append( '<span class="filter-label data-counter pull-right">Displaying:&nbsp;'+numItemsDisp+'&nbsp;works&nbsp;&nbsp;</span>' );
                //console.log("else was triggered"); // <-- uncomment for debugging
            }
        });
    });
    function getComboFilter( filters ) {
        var i = 0;
        var comboFilters = [];
        var message = [];
        for ( var prop in filters ) {
            message.push( filters[ prop ].join(' ') );
            var filterGroup = filters[ prop ];
            // skip to next filter group if it doesn't have any values
            if ( !filterGroup.length ) {
                continue;
            }
            if ( i === 0 ) {
                // copy to new array
                comboFilters = filterGroup.slice(0);
            }
            else {
                var filterSelectors = [];
                // copy to fresh array
                var groupCombo = comboFilters.slice(0); // [ A, B ]
                // merge filter Groups
                for (var k=0, len3 = filterGroup.length; k < len3; k++) {
                    for (var j=0, len2 = groupCombo.length; j < len2; j++) {
                        filterSelectors.push( groupCombo[j] + filterGroup[k] ); // [ 1, 2 ]
                    }
                }
                // apply filter selectors to combo filters for next group
                comboFilters = filterSelectors;
            }
            i++;
        }
        comboFilters.sort();
        var comboFilter = comboFilters.join(', ');
        return comboFilter;
    }
    function clearAll(){
        $('a.active').trigger('click');
        $('#filter-display').empty();
        var numItemsDisp = $('img.item:not(.isotope-hidden)').length;
        $('#filter-display').append( '<span class="filter-label data-counter pull-right">Displaying all&nbsp;'+numItemsDisp+'&nbsp;artworks</span>' );
    }

// ###########################################################################################
// ###########################################################################################
// ###########################################################################################
// ###########################################################################################
// ###########################################################################################
// ###########################################################################################







    $('section.post.container.passes ul.top-level-menu li.top-level-item').click(function(){
        var $this = $(this);
        if($this.hasClass('active')){
            $this.removeClass('active');
        } else {
            $this.addClass('active');
        }
    });
    $('section.post.container.passes-tours .buttons .button.expand-button.type-passes').click(function(){
        var $section = $('section.post.container.passes');
        var $section_hide = $('section.post.container.tours');
        if($section_hide.length>0){
            $section_hide.removeClass('active');
        }
        if($section.length>0){
            if($section.hasClass('active')){
                $section.removeClass('active');
            } else {
                $section.addClass('active');
            }
        }
        $('html').animate({
            scrollTop: $section.offset().top,
        }, 200);
        // gtag('event', 'click',{event_category:'Passes and Tours',event_action:'Toggle',event_label:'Passes Button'});
    });
    $('section.post.container.passes-tours .buttons .button.expand-button.type-tours').click(function(){
        var $section = $('section.post.container.tours');
        var $section_hide = $('section.post.container.passes');
        if($section_hide.length>0){
            $section_hide.removeClass('active');
        }
        if($section.length>0){
            if($section.hasClass('active')){
                $section.removeClass('active');
            } else {
                $section.addClass('active');
            }
        }
        $('html').animate({
            scrollTop: $section.offset().top,
        }, 200);
        // gtag('event', 'click',{event_category:'Passes and Tours',event_action:'Toggle',event_label:'Tours Button'}); 
    });

    // $('.type-passes').on('click', function(e){ 
    //     gtag('event', 'click',{event_category:'Passes and Tours',event_action:'Toggle',event_label:'Passes Button'}); 
    // });
    // $('.type-Tours').on('click', function(e){ 
    //     gtag('event', 'click',{event_category:'Passes and Tours',event_action:'Toggle',event_label:'Tours Button'}); 
    // });

    $('.tribe-search-x').click(function(){
       window.location.href = window.location.protocol+'//'+window.location.hostname+window.location.pathname; 
    });
    function anchor_scroll_capsule(e) {
        if (!e.sudo) {
            if (e.target.href) {
                var index = e.target.href.indexOf('#');
                if (index > -1) {
                    var target_hash = e.target.href.substr(index);
                    var $target_anchor = $('[name="' + target_hash.substr(1) + '"]');
                    if ($target_anchor.length === 0) {
                        return;
                    }
                }
            }
        }
        $(document).imagesLoaded(function () {
            var hash = window.location.hash;
            if (hash.length > 0) {
                var $anchor = $('[name="' + hash.substr(1) + '"]');
                if ($anchor.length > 0) {
                    var $header = $('header.page');
                    var header_height = $header.height() ? $header.height() : 0;
                    var scrollTo = $anchor.offset().top - header_height;
                    scrollTo = scrollTo > 0 ? scrollTo : 0;
                    setTimeout(function(){
                        $('html').animate({
                            scrollTop: scrollTo,
                        }, 200);
                    },e.data.delay);
                }
            }
        });
    }
    if($('.flexslider').length === 0){
        anchor_scroll_capsule({
            sudo: true,
            data: {
                delay: 500,
            },
        });
    }
    $('a').click({ delay: 200 }, anchor_scroll_capsule);
    var $slides = $('.flexslider .slides li');
    if ($slides.length > 0) {
        $slides.eq(1).add($slides.eq(-1)).find('img.lazy')
            .each(function () {
                var src = $(this).attr('data-src');
                $(this).removeClass('lazy');
                $(this).attr('src', src).removeAttr('data-src');
            });
    }
    $(window).load(function () {   
        $('.flexslider').flexslider({
            animation: "fade",
            smoothHeight: true,
            before: function (slider) { // Fires asynchronously with each slider animation
                var $slides = $(slider.slides),
                    index = slider.animatingTo,
                    current = index,
                    nxt_slide = current + 1,
                    prev_slide = current - 1;
                if ($slides.length > 0) {
                    $slides.eq(current).add($slides.eq(nxt_slide)).add($slides.eq(prev_slide))
                        .find('img.lazy').each(function () {
                            var src = $(this).attr('data-src');
                            $(this).removeClass('lazy');
                            $(this).attr('src', src).removeAttr('data-src');
                        });
                    if($slides.eq(current).find('.iframe-wrapper').length > 0){
                        slider.pause();
                        setTimeout(function(){
                          slider.play();
                        },10000);
                    }
                }
            },
            start: function(slider){
                anchor_scroll_capsule({
                    sudo: true,
                    data: {
                        delay: 200,
                    },
                });
                var $slides = $(slider.slides);
                if ($slides.length > 0) {
                    if($slides.eq(0).find('.iframe-wrapper').length > 0){
                        slider.pause();
                        setTimeout(function(){
                        slider.play();
                        },10000);
                    }
                }
            }
        }); // end register flexslider
    });
});
// QuickEach
jQuery.fn.quickEach = (function () {
    var jq = jQuery([1]);
    return function (c) {
        var i = -1, el, len = this.length;
        try {
            while (
                ++i < len &&
                (el = jq[0] = this[i]) &&
                c.call(jq, i, el) !== false
            );
        } catch (e) {
            delete jq[0];
            throw e;
        }
        delete jq[0];
        return this;
    };
}());

(function ($) {

    // Responsive Videos
    $('.vid-container').fitVids();

    // Show/Hide Filter Menu
    //   uncomment to show and hide the filter nav
	/*$('#filtering-nav ul').hide();
	$('a.filter-btn').click(function(){
		$('#filtering-nav ul').slideToggle();
		return false;
	});*/



    // Submenus
    var submenu_config = {
        over: function () { $('ul', this).fadeIn(200); },
        timeout: 300,
        out: function () { $('ul', this).fadeOut(300); }
    };
    $('header nav ul > li').not("header nav ul li li").hoverIntent(submenu_config);

	/* old code 
	// Create the dropdown base
	$("<select />").appendTo(".header-nav");
	
	// Create default option "Go to..."
	$("<option />", {
	   "selected": "selected",
	   "value"   : "",
	   "text"    : "Go to..."
	}).appendTo(".header-nav select");
	
	// Populate dropdown with menu items
	$(".nav a").each(function() {
	 	var el = $(this);
	 	
	 	if( el.parent().parent().hasClass('sub-menu') ){
	 		var prefix = "- ";
	 	} else{
	 		var prefix = '';
	 	}
	 	
		$("<option />", {
		     "value"   : el.attr("href"),
		     "text"    : prefix + el.text()
		}).appendTo(".header-nav select");
	});

	// Dropdown menu clicks
	$(".header-nav select").change(function() {
        window.location = $(this).find("option:selected").val();
	});
	*/
	/* old code 
	// Vertically align header items
	$(window).load(function(){
	   $('#site-info, #social-networks, .header-nav ul:not(.sub-menu)').vit();
	});
	*/

    // Sidebar Ads
    $('.shaken_sidebar_ads a:odd img').addClass('last-ad');

    // Share Icons
    $('.share-container').hide();

    $('.share').on('click', function () {
        $('.share-container', $(this).parent()).slideToggle('fast');
    });

    // Display pop-up when clicking on share icons
    $('.share-window').on('click', function () {
        var width = 650;
        var height = 500;
        var left = (screen.width - width) / 2;
        var top = (screen.height - height) / 2;
        var params = 'width=' + width + ', height=' + height;
        params += ', top=' + top + ', left=' + left;
        params += ', directories=no';
        params += ', location=no';
        params += ', menubar=no';
        params += ', resizable=no';
        params += ', scrollbars=no';
        params += ', status=no';
        params += ', toolbar=no';
        newwin = window.open($(this).attr('href'), 'Share', params);
        if (window.focus) { newwin.focus(); }
        return false;
    });

    // Lightbox Init
    var fancyboxArgs = {
        padding: 0,
        overlayColor: "#000",
        overlayOpacity: 0.85,
        titleShow: false
    };
    $('.gallery-icon a').attr('rel', 'post-gallery');
    $("a[rel='gallery'], a[rel='lightbox'], .gallery-icon a, .colorbox").fancybox(fancyboxArgs);

    // Remove margins
    $('.gallery-thumb:nth-child(3n)').addClass('last');

    // Slider Init
    $('.slider').slides({
        play: 9500,
        pause: 2500,
        hoverPause: true,
        effect: 'fade',
        generatePagination: false
    });

    $(window).load(function () {

        // Vertically center all images in the slider
        $('.slides_container').quickEach(function () {
            var containerH = this.height();

            $('img', this).quickEach(function () {
                var imgH = this.height();
                if (imgH != containerH) {
                    var margin = (containerH - imgH) / 2;
                    this.css('margin-top', margin);
                }
            });
        });

        //setIsotope();

        // Filtering
        $('#filtering-nav li a').click(function () {
            is_filtering = true;
            var selector = $(this).attr('data-filter');
            $('#sort, .sort').isotope({ filter: selector });
            is_filtering = false;
            return false;
        });

        // Sticky footer
        //stickyFooter();
    });

    $(window).resize(function () {
        //stickyFooter();
        //setIsotope();
    });
})(jQuery);

// Setup grid structure for blog layout 
// function setIsotope(){
// 	if( jQuery(window).width() > mobile_width && !isotope_set){
        
//         isotope_set = true;
        
// 		// Isotope Init		
// 		jQuery('.grid, #sort').isotope({
// 			itemSelector : '.element-item',
// 			transformsEnabled: false,
// 			masonry: {
// 				//columnWidth : 175 // original
// 				columnWidth : 110   // for iPad
// 			},
// 			onLayout: function(){
//                 centerLayout();
// 			}
// 		});
		
//     }
// }


// function setIsotope(){
//     if( jQuery(window).width() > mobile_width && !isotope_set){
        
//         isotope_set = true;
        
//         // Isotope Init     
//         jQuery('.sort, #sort').isotope({
//             itemSelector : '.box:not(.invis)',
//             transformsEnabled: false,
//             masonry: {
//                 //columnWidth : 175 // original
//                 columnWidth : 110   // for iPad
//             },
//             onLayout: function(){
//                 centerLayout();
//             }
//         });
        
//     }
// }


/*function stickyFooter(){
    jQuery('#footer').css('position', 'relative');
    
    if( jQuery('body').height() < jQuery(window).height() ){
        jQuery('#footer').css({
            'position': 'fixed',
            'bottom': 0,
            'width': '100%'
        });
    }
}*/

/*  Centered Masonry Layout
 **************************************** */
/* jQuery.Isotope.prototype._getCenteredMasonryColumns = function() {
    this.width = this.element.width();
    
    if( this.element.parent().hasClass('timeline')){
        var parentWidth = page_min_width;
    } else {
        var parentWidth = this.element.parent().width();
    }
    
                  // i.e. options.masonry && options.masonry.columnWidth
    var colW = this.options.masonry && this.options.masonry.columnWidth ||
                  // or use the size of the first item
                  this.$filteredAtoms.outerWidth(true) ||
                  // if there's no items, use size of container
                  parentWidth;
    
    var cols = Math.floor( parentWidth / colW );
    cols = Math.max( cols, 1 );

    // i.e. this.masonry.cols = ....
    this.masonry.cols = cols;
    // i.e. this.masonry.columnWidth = ...
    this.masonry.columnWidth = colW;
  };
  
  jQuery.Isotope.prototype._masonryReset = function() {
    // layout-specific props
    this.masonry = {};
    // FIXME shouldn't have to call this again
    this._getCenteredMasonryColumns();
    var i = this.masonry.cols;
    this.masonry.colYs = [];
    while (i--) {
      this.masonry.colYs.push( 0 );
    }
  };

  jQuery.Isotope.prototype._masonryResizeChanged = function() {
    var prevColCount = this.masonry.cols;
    // get updated colCount
    this._getCenteredMasonryColumns();
    return ( this.masonry.cols !== prevColCount );
  };
  
  jQuery.Isotope.prototype._masonryGetContainerSize = function() {
    var unusedCols = 0,
        i = this.masonry.cols;
    // count unused columns
    while ( --i ) {
      if ( this.masonry.colYs[i] !== 0 ) {
        break;
      }
      unusedCols++;
    }
    
    if( !is_filtering ){
        var returnWidth = (this.masonry.cols - unusedCols) * this.masonry.columnWidth;
    
        if(returnWidth < page_min_width && jQuery(window).width() > 768){
            returnWidth = page_min_width
        }
        
        current_page_width = returnWidth;
    } else {
        returnWidth = current_page_width;
    }
    
    
    
    return {
          height : Math.max.apply( Math, this.masonry.colYs ),
          // fit container to columns that have been used;
          width : returnWidth
    };
  };
*/

/* Deleting this all for FUCKING IE!!! */
/*function centerLayout(){
    if( jQuery(window).width() > mobile_width ){
        jQuery('#header .wrap, #breadcrumbs .wrap, #footer .wrap, #filtering-nav, .navigation').css('width', jQuery('.isotope').width() - 10);
    }
}*/