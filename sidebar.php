<?php 
/**
 * Sidebar.php
 *
 */ 
global $sidebar;
global $is_tribe;
?>

<?php if(is_single()){
	dynamic_sidebar( 'post-sidebar' );
} ?>    
<?php if(is_page('special-events')) { ?>
	<section class="sidebar post container event-venues">
		<header>
			<h1>Event Venues</h1>  
    		</header>
		<p class="event-venues">Whether you need a traditional meeting space or are looking for something a little different, we have the space to suit your needs. Both indoor and open-aired facilities offer groups of any size a venue to meet in a unique and memorable environment.</p>
		<hr class="event-venues" />	
		<table class="event-venues" border="0">
			<tbody>
				<tr>
					<td><a name="1raft pavilion"></a>
						<img class="venue-image" src="/wp-content/uploads/2015/07/Raft-Pavilion.jpg" alt="" />
						<h2>The Raft Pavilion</h2>
						<p style="text-align: left;">Offering the largest venue space at the USNWC, the Raft Pavilion opens to the Upper Pond where rafters begin their excursions. This rustic setting includes open ceilings and barn doors that lead to the attached canopy area.</p>
						<p style="text-align: left;">Capacity: Ceremony up to 400 people; Reception up to 450 people</p>
						<hr />
						</td>
				</tr>
				<tr>
					<td><a name="1conference center"></a>
						<img class="venue-image" src="/wp-content/uploads/2015/05/ConferenceCenter.jpg" alt="" />
						<h2>Conference Center</h2>
						<p style="text-align: left;"><!--<a href="http://usnwc.org/visit/virtual-tour/conference-center/">	<img class="alignleft size-full wp-image-5626" title="U.S. National Whitewater Center | Virtual Tour" src="/wp-content/uploads/2014/11/virtual-tour-small.jpg" alt="" width="200" height="120" /></a>-->This premiere indoor space overlooks the entire facility including the world’s largest man-made whitewater river. The Conference Center includes private restrooms and can be set up with complete audio/visual packages.</p>
						<p style="text-align: left;">Capacity: Ceremony up to 200 people; Reception up to 180 people</p>
						<hr />
					</td>
				</tr>
				<tr>
					<td><a name="1adventure pavilion"></a>
						<img class="venue-image" src="/wp-content/uploads/2015/05/Adventure_Pavilion.jpg" alt="" />
						<h2>Adventure Pavilion</h2>
						<p style="text-align: left;"><!--<a href="http://usnwc.org/tour/adventure-pavilion/"><img class="alignleft size-full wp-image-5615" title="adventure-pavilion" src="/wp-content/uploads/2014/11/adventure-pavilion.jpg" alt="" width="200" height="120" /></a>-->The Adventure Pavilion is a 1,400 square foot open-air, covered venue that overlooks the USNWC and can be setup for a capacity of up to 150 people.</p>
						<hr />

					</td>
				</tr>
				<tr>
					<td><a name="1river's edge bar and grill"></a>
						<img class="venue-image" src="/wp-content/uploads/2015/05/REBAG.jpg" alt="" />
						<h2>River's Edge Bar &amp; Grill</h2>
						<p style="text-align: left;"><!--<a href="http://usnwc.org/visit/virtual-tour/food-beverage/"><img class="alignleft wp-image-5617 size-full" title="River's Edge Bar &amp; Grill | Virtual Tour" src="/wp-content/uploads/2014/11/restaaurant.jpg" alt="" width="200" height="120" /></a>-->Typically serving as our primary dining location, this venue is one of the few with both indoor and outdoor seating. River’s Edge Bar and Grill offers access to the dining room and bar as well as the surrounding patio and is suited for countless event layouts.</p>
						<p style="text-align: left;">Capacity: Reception – Up to 200 people</p>
						<p style="text-align: left;">*Unavailable Saturdays May-September</p>
						<hr />
					</td>
				</tr>
				<tr>
					<td><a name="1river's edge terrace"></a>
						<img class="venue-image" src="/wp-content/uploads/2015/05/TheTerrace.jpg" alt="" />
						<h2>The Terrace</h2>
						<p style="text-align: left;"><!--<a href="http://usnwc.org/tour/terrace/"><img class="alignleft size-full wp-image-5620" title="River's Edge Terrace | Virtual Tour" src="/wp-content/uploads/2014/11/terrace.jpg" alt="" width="200" height="120" /></a>-->This venue offers an unparalleled view of the USNWC. Looking down onto the water, this space allows guests to take in the full excitement of the rapids while maintaining the intimacy of a small event. The Terrace rental allows access to private restrooms inside the Conference Center.		</p>
						<p style="text-align: left;">Capacity: Ceremony up to 50 people; Reception up to 50 people</p>
						<hr />
					</td>
				</tr>
				<tr>
					<td><a name="1tented sites"></a>
						<img class="venue-image" src="https://usnwc.org/wp-content/uploads/2017/02/BigDropTents.jpg" alt="" />
						<h2>Big Drop Tents</h2>
						<p style="text-align: left;"><!--<a href="http://usnwc.org/tour/hospitality-tents/"><img class="alignleft size-full wp-image-5621" title="USNWC Hospitality Tents | Virtual Tour" src="/wp-content/uploads/2014/11/hosp-tents.jpg" alt="" width="200" height="120" /></a>-->These tented sites are located alongside the most exciting stretch of the world’s largest man-made river. The Big Drop Tents will place your event in the center of the activity, providing an entertaining view for your guests. With up to three tents available, this space can accommodate a wide range of party sizes.</p>
						<p style="text-align: left;">Capacity: Ceremony – 100 people per tent; Reception – 50 people per tent</p>
						<hr />
					</td>
				</tr>
				<tr>
					<td><a name="1riverjam stage"></a>
						<img class="venue-image" src="/wp-content/uploads/2015/07/RiverJam_Stage.jpg" alt="" />
						<h2>River Jam Center Stage</h2>
						<p style="text-align: left;">Truly embracing the whitewater experience, this wooden stage extends over the USNWC Competition Channel. A backdrop of rafters and kayakers makes the River Center Stage a unique setting for smaller ceremonies.</p>
						<p style="text-align: left;">Capacity: Ceremony – up to 60 people</p>
						<p style="text-align: left;">*unavailable Saturdays May-September</p>
					</td>
				</tr>
			</tbody>
		</table>
	</section>
<?php } ?>
<?php if(is_page('outfitters')) { ?>
	<section class="sidebar post container our-brands">
		<header>
			<h1>Our Brands</h1>  
    		</header>
		<div class="icon container outfitters">

		<!-- <a href="https://www.astraldesigns.com/" target="_blank"><div class="icon"><img src="<?php bloginfo('template_url'); ?>/images/outfitters/Astral_Logo.png" alt="Astral"></div></a> -->

		
		
		
		
		
		
		
		
		
			<a href="https://www.altrarunning.com/" target="_blank"><div class="icon"><img src="https://usnwc.org/wp-content/uploads/2018/02/Altra_Logo.png" alt="altra logo"></div></a>
			<a href="http://www.arcteryx.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/ARCLOGO.png" alt="arc'teryx logo"></div></a>
			<a href="https://www.astraldesigns.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/Astral_Logo.png" alt="astral logo"></div></a>
			<!-- <a href="http://www.atpaddles.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/AT_Paddles.png" alt="at paddles logo"></div></a> -->
			<a href="http://blackdiamondequipment.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/BlackDiamond.png" alt="black diamond logo"></div></a>
			<a href="http://www.chacos.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/Chaco_logo.png" alt="chaco logo"></div></a>
			<a href="http://www.dagger.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/Dagger_Logo.png" alt="dagger logo"></div></a>
			<a href="https://www.eaglesnestoutfittersinc.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/Eno_logo.png" alt="eno logo"></div></a>
			<a href="http://www.evolvsports.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/Evolv.logo_.png" alt="evolv logo"></div></a>
			<!-- <a href="http://www.farmtofeet.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/FarmToFeet.png" alt="farm to feet logo"></div></a> -->
			<a href="http://www.freestyleusa.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/FreestyleLogo.png" alt="freestyle logo"></div></a>
			<a href="http://www.giant-bicycles.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/Giant.png" alt="giant logo"></div></a>
			<!-- <a href="http://www.goalzero.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/Goal_Zero.png" alt="goal zero logo"></div></a> -->
			<a href="https://gopro.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/GoPro_Logo.png" alt="gopro logo"></div></a>
			<!-- <a href="https://www.harimari.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/Hari-Marii_Logo.png" alt="hari mari logo"></div></a> -->
			<a href="https://www.hokaoneone.com/" target="_blank"><div class="icon"><img src="<?php bloginfo('template_url'); ?>/images/outfitters/Hoka.png" alt="Hoka"></div></a>
			
			<a href="https://immersionresearch.com/" target="_blank"><div class="icon"><img src="<?php bloginfo('template_url'); ?>/images/outfitters/IR_ImmersionReasearch.png" alt="Immersion Reasearch"></div></a>
			<a href="https://www.inov-8.com/us" target="_blank"><div class="icon"><img src="<?php bloginfo('template_url'); ?>/images/outfitters/inov-8.png" alt="Inov8"></div></a>
			<!-- <a href="http://jacksonkayak.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/JacksonKayaks.png" alt="jackson kayak logo"></div></a> -->
			<a href="http://www.jetboil.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/JetBoil.png" alt="jetboil logo"></div></a>
			<a href="https://www.kuhl.com/" target="_blank"><div class="icon"><img src="<?php bloginfo('template_url'); ?>/images/outfitters/KUHL.png" alt="KUHL"></div></a>
			<a href="http://www.kavu.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/KAVUCircle_Logo.png" alt="kavu logo"></div></a>
			<a href="https://kokatat.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/Kokatat.png" alt="kokatat logo"></div></a>
			<a href="http://www.sportiva.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/LaSportiva_Logo.png" alt="la sportiva logo"></div></a>
			<a href="https://www.liquidlogickayaks.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/LiquidLogic_Logo.png" alt="liquid logic logo"></div></a>
			<a href="https://www.llmapparel.com/" target="_blank"><div class="icon"><img src="<?php bloginfo('template_url'); ?>/images/outfitters/LLM.png" alt="LLM"></div></a>
			<a href="http://www.mountainkhakis.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/mountainkhakisLogo.png" alt="mountain khakis logo"></div></a>
			<a href="http://www.cascadedesigns.com/msr" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/MSR.png" alt="msr logo"></div></a>
			<a href="http://www.nemoequipment.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/NEMO_logo.png" alt="nemo logo"></div></a>
			<a href="http://www.nrs.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/NRS_Logo.png" alt="nrs logo"></div></a>
			<a href="http://www.ospreypacks.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/Osprey.png" alt="osprey logo"></div></a>
			<a href="http://www.pyranha.com/" target="_blank"><div class="icon"><img src="<?php bloginfo('template_url'); ?>/images/outfitters/Pyranah.png" alt="Pyranah"></div></a>
			<a href="http://www.patagonia.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/Patagonia_Logo.png" alt="patagonia logo"></div></a>
			<a href="http://www.pearlizumi.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/IP_logo.png" alt="pearl izumi logo"></div></a>
			<a href="https://www.petzl.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/PETZL_black.png" alt="petzl logo"></div></a>
			<a href="http://www.prana.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/Prana.png" alt="prana logo"></div></a>
			<a href="https://recoverbrands.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/RecoverLogo.png" alt="recover logo"></div></a>
			<a href="http://www.ruffwear.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/Ruffwear.png" alt="ruffwear logo"></div></a>
			<!-- <a href="http://www.salewa.us/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/Salewa.png" alt="salewa logo"></div></a> -->
			<a href="http://www.salomon.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/SalomonLogo.png" alt="salomon logo"></div></a>
			<a href="http://www.smithoptics.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/Smith_Logo.png" alt="smith logo"></div></a>
			<a href="http://www.sterlingrope.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/Sterling.png" alt="sterling logo"></div></a>
			<a href="http://www.suncloudoptics.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/SuncloudLogo2015.png" alt="suncloud logo"></div></a>
			<!-- <a href="https://www.suunto.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/Suunto.png" alt="suunto logo"></div></a> -->
			<a href="http://www.teva.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/Teva.png" alt="teva logo"></div></a>
			<!-- <a href="https://www.thenorthface.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/TheNorthFace_logo.png" alt="the north face logo"></div></a> -->
			<!-- <a href="http://www.cascadedesigns.com/Therm-a-Rest" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/Thermarest.png" alt="thermarest logo"></div></a> -->
			<!-- <a href="http://www.toadandco.com/" target="_blank"><div class="icon"><img src="/wp-content/uploads/2016/03/ToadCo_Logo.png" alt="toad&amp;co logo"></div></a> -->
			
			<a href="https://unitedbyblue.com/" target="_blank"><div class="icon"><img src="<?php bloginfo('template_url'); ?>/images/outfitters/UnitedByBlue.png" alt="United By Blue"></div></a>
			<a href="http://www.wernerpaddles.com/" target="_blank"><div class="icon"><img src="<?php bloginfo('template_url'); ?>/images/outfitters/WearnerPaddles.png" alt="Wearner Paddles"></div></a>
			<a href="https://www.drybags.com/" target="_blank"><div class="icon"><img src="<?php bloginfo('template_url'); ?>/images/outfitters/Watershed.png" alt="Watershed"></div></a>
		</div>
	</section>
<?php }?>

<?php if(is_page('directions')) { ?>  
	<section class="sidebar container post map">
		<header>
			<h1>Map</h1>  
    	</header>
		<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=5000+Whitewater+Center+Parkway+Charlotte,+NC++28214&amp;sll=37.0625,-95.677068&amp;sspn=42.901912,72.949219&amp;ie=UTF8&amp;hq=5000+Whitewater+Center+Parkway&amp;hnear=Charlotte,+NC+28214&amp;ll=35.272251,-81.005458&amp;spn=0.04651,0.089003&amp;output=embed"></iframe><br />
        <p>View <a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=5000+Whitewater+Center+Parkway+Charlotte,+NC++28214&amp;sll=37.0625,-95.677068&amp;sspn=42.901912,72.949219&amp;ie=UTF8&amp;hq=5000+Whitewater+Center+Parkway&amp;hnear=Charlotte,+NC+28214&amp;ll=35.272251,-81.005458&amp;spn=0.04651,0.089003" style="color:#0000FF;text-align:right" target="_blank">U.S National Whitewater Center</a> in a larger map</p>
	</section><!-- widget -->
<?php } ?> 

<?php if(is_page('accommodations')) { ?>  
	<section class="sidebar container post map">
		<header>
			<h1>Map</h1>  
    	</header>
		<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/d/u/0/embed?mid=1eEmoWNEfw3TjvzZRr2dXalm0MfPES76l"></iframe><br />
        <p><a href="https://www.google.com/maps/d/u/0/embed?mid=1eEmoWNEfw3TjvzZRr2dXalm0MfPES76l" style="color:#0000FF;text-align:right" target="_blank">View accomodations</a> in a larger map</p>
	</section><!-- widget -->
<?php } ?> 

<?php  // Box of links on contact page ?>
<?php if ( is_page('contact') ) { ?>
	<section class="sidebar post container contact-links">
		<header>
			<h1>Contact Links</h1>
		</header>
		<div class="icon container">
			<a href="mailto:info@usnwc.org"><div class="icon"><img src="<?php bloginfo(url); ?>/wp-content/uploads/2015/09/Mail_Icon.png"><header><h2>Email</h2></header></div></a>
			<a href="tel:+17043913900"><div class="icon"><img src="<?php bloginfo(url); ?>/wp-content/uploads/2015/09/Phone_Icon.png"><header><h2>Call</h2></header></div></a>
			<a href="<?php bloginfo(url); ?>/employment"><div class="icon"><img src="<?php bloginfo(url); ?>/wp-content/uploads/2015/09/Employment_icon.png"><header><h2>Employment</h2></header></div></a>
			<a href="<?php bloginfo(url); ?>/request-for-donation"><div class="icon"><img src="<?php bloginfo(url); ?>/wp-content/uploads/2015/09/Donation_request.png"><header><h2>Requests for Donation</h2></header></div></a>
			<a href="<?php bloginfo('url'); ?>/band-submission-form"><div class="icon"><img src="<?php bloginfo(url); ?>/wp-content/uploads/2015/09/Band_submission_icon.png"><header><h2>Band Submission</h2></header></div></a>
			<a href="<?php bloginfo('url'); ?>/feedback/"><div class="icon"><img src="<?php bloginfo(url); ?>/wp-content/uploads/2015/09/Feedback_Icon.png"><header><h2>Feedback Form</h2></header></div></a>
			<a href="http://eepurl.com/dppKBv" target="_blank"><div class="icon"><img src="<?php bloginfo(url); ?>/wp-content/uploads/2015/09/Newsletter_Signup.png"><header><h2>Newsletter Sign-Up</h2></header></div></a>
			<a href="https://usnwc.org/sponsorship-vendor-submission/" ><div class="icon"><img src="<?php bloginfo(url); ?>/wp-content/uploads/2015/09/canopy.png"><header><h2>Sponsorship Vendor Submission</h2></header></div></a>
			</div>
    </section>
    <section class="sidebar post container social-links">
		<header>
			<h1>Social Links</h1>
		</header>
		<div class="icon container">
			<a href="https://facebook.com/usnwc" target="_blank"><div class="icon"><img src="https://usnwc.org/wp-content/uploads/2016/10/Facebook.png" alt="Facebook Icon"><header><h2>Facebook</h2></header></div></a>
			<a href="https://twitter.com/usnwc" target="_blank"><div class="icon"><img src="https://usnwc.org/wp-content/uploads/2016/10/Twiiter.png" alt="Twitter Icon"><header><h2>Twitter</h2></header></div></a>
			<a href="https://instagram.com/usnwc" target="_blank"><div class="icon"><img src="https://usnwc.org/wp-content/uploads/2016/10/Insta.png" alt="Instagram Icon"><header><h2>Instagram</h2></header></div></a>
			<a href="https://www.linkedin.com/company/u-s--national-whitewater-center?trk=biz-companies-cym" target="_blank"><div class="icon"><img src="https://usnwc.org/wp-content/uploads/2016/10/LinkedIn.png" alt="LinkedIn Icon"><header><h2>LinkedIn</h2></header></div></a>
			<a href="https://vimeo.com/usnwc" target="_blank"><div class="icon"><img src="https://usnwc.org/wp-content/uploads/2016/10/Vimeo.png" alt="Vimeo Icon"><header><h2>Vimeo</h2></header></div></a>
			<a href="https://www.youtube.com/user/theusnwc" target="_blank"><div class="icon"><img src="https://usnwc.org/wp-content/uploads/2017/05/YouTube.png" alt="YouTube Icon"><header><h2>YouTube</h2></header></div></a>
		</div>
	</section>
<?php } // End contact ?>
<?php  // Hours of Operation important info ?>
<?php if ( is_page('calendar') || $is_tribe) {
	if($sidebar==="top"){?>
		<section class="post sidebar container rafting-notice">
			<header>
				<h1>Weather Notice-January 23rd, 2016</h1>
			</header>
			<article class="row">
				<figure>
					<img src="/wp-content/uploads/2015/09/Exclamation.png">
				</figure>
				<section class="copy">
					<p>Due to severe weather, all activities have been suspended for Saturday January 23rd, 2016.</p>
				</section>
				<!--<div><div class="register-button"><a href="http://store.usnwc.org/ecom/ItemList.aspx?node_id=2203252" target="_blank">Book Reservation</a></div></div>-->
			</article>
		</section>
	<?php }
	if($sidebar==="bottom"){?>
		<article class="post sidebar hours-of-operation">
			<header>
				<h1>Hours of Operation</h1>
			</header>
			<h2>COVID-19 Information</h2>
			<ul>
				<li>Guest Services queue areas and Activity queue areas  have been lengthened to encourage adequate spacing between individuals.</li>
				<li>Per current policy and procedure, disinfection all equipment will take place pre and post use - based on guidance from the manufacturers to ensure both cleanliness and integrity of the gear.</li>
				<li>There will be continuous disinfection of surfaces, counters and door handles.</li>
				<li>Annual Passholders will redeem their pass verbally rather than utilizing fingerprint scanners.</li>
				<!-- <li>Guests will be required to attach their own wristbands upon purchasing a pass.</li> -->
				<li>All retail operations have lowered capacity by at least 25% and taken measures to promote social distancing.</li>
				<!-- <li>Only to-go food and beverage options are currently available.  No indoor/outdoor restaurant seating areas are currently available.</li> -->
			</ul>
			<h2>When are we open?</h2>
			<ul>
				<li>Our main gate and trails are open, weather permitting, 365 days a year.</li>
				<li>The availability of our activities and related operating hours vary with the seasons. Day-of activity availability is accessed through the <a href="https://usnwc.org/visit/daily-activity-schedule/">Activity Schedule</a>; other daily hours of operation, such as food and beverage, can be found on the <a href="https://usnwc.org/calendar/">Calendar</a>.</li>
				<li>Operating hours can be added or extended for groups and events. For more information, please call our Group and Event Planners at 704.391.3900 or submit an inquiry on the <a href="https://usnwc.org/visit/groups/">Groups page</a>.</li>
				<li>All activity availability, schedules and hours are subject to change without notice.</li>
				<li>For other questions about activities at the USNWC, please visit our <a href="https://usnwc.org/visit/faqs/">Frequently Asked Questions</a>.</li>
			</ul>
			<h2>What activities will be open when I visit?</h2>
			<ul>
				<li>Due to the seasonality of the USNWC, activities will be limited in their availability, particularly in the months after Labor Day and before Memorial Day.</li>
				<li>Because the timing and availability of our activities can change from day to day, the <a href="https://usnwc.org/visit/daily-activity-schedule/">Activity Schedule</a> is the best resource for day-of activity information.</li>
				<li>Activity lines may close prior to pass hours.</li>
			</ul>
			<h2>Notes about the weather:</h2>
			<ul>
				<li>Events and programming operate rain or shine unless otherwise stated by USNWC Staff.</li>
				<li>In the event of adverse weather, some or all activities may not be available.</li>
				<li>Please check weather conditions before purchasing any activity pass.</li>
				<li>Refunds and rain checks are not available.</li>
			</ul>
		</article>
	<?php }
} //end of calendar ?>

<?php if(is_page('about')){?>
    <?php if ( get_field('mission_statement') ) { ?>
   		<article class="post sidebar mission-statement">
   			<header>
   				<h1>Mission Statement</h1>
   			</header>
        	<?php the_field('mission_statement'); ?>
    	</article>
	<?php } ?> 
	<a name="video"></a>
	<article class="post sidebar video">
		<header>
			<h1>Whitewater Story</h1>
		</header>
		<div class="iframe-dynamic">
			<iframe src="https://player.vimeo.com/video/232487883?title=0&byline=0&portrait=0" width="640" height="338" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div><!--.iframe-dynamic-->
	</article>
<?php }?>
<?php if(is_page(62)){
	if($sidebar==="top"){?>
		<section class="post container sidebar rafting-notice">
			<header>
				<h1>Weather Notice-January 23rd, 2016</h1>
			</header>
			<article class="row">
				<figure>
					<img src="/wp-content/uploads/2015/09/Exclamation.png">
				</figure>
				<section class="copy">
					<p>Due to severe weather, all activities have been suspended for Saturday January 23rd, 2016.</p>
				</section>
				<!--<div><div class="register-button"><a href="http://store.usnwc.org/ecom/ItemList.aspx?node_id=2203252" target="_blank">Book Reservation</a></div></div>-->
			</article>
		</section>
	<?php }
	if($sidebar==="bottom"){?>
	<section class="post container sidebar pass-activities">
		<header>
			<h1>Pass Activities</h1>
		</header>
		<div id="pass-table">                
			<table>
				<tbody>
					<tr>
						<th><a href="/water-activities/whitewater-activities/">Whitewater</a></th>
						<th>Qualifiers</th>
						<th>Duration</th>
					</tr>
					<tr>
						<td><a href="/water-activities/whitewater-activities/#family-rafting">Family Rafting</a></td>
						<td>8 years old</td>
						<td>Up to 90 minutes</td>
					</tr>
					<tr>
						<td><a href="/water-activities/whitewater-activities/#adventure-rafting">Adventure Rafting</a></td>
						<td>11 years old</td>
						<td>Up to 90 minutes</td>
					</tr>
					<tr>
						<td><a href="/water-activities/whitewater-activities/#rodeo-rafting">Rodeo Rafting Upgrade ($15)</a></td>
						<td>16 years old</td>
						<td>Up to 90 minutes</td>
					</tr>
					<tr>
						<td><a href="/water-activities/whitewater-activities/#whitewater-kayaking">Whitewater Kayaking</a></td>
						<td>Prerequisite</td>
						<td>2 or more hours</td>
					</tr>
					<tr>
						<td><a href="/water-activities/whitewater-activities/#whitewater-sup">Whitewater Stand-up Paddle Boarding</a></td>
						<td>Prerequisite</td>
						<td>2 or more hours</td>
					</tr>
					<tr>
						<th><a href="/water-activities/flatwater-activities/">Flatwater - Catawba River</a></th>
						<th></th>
						<th></th>
					</tr>
					<tr>
						<td><a href="/water-activities/flatwater-activities/#flatwater-kayaking">Flatwater Kayaking</a></td>
						<td>8 years old</td>
						<td>Up to 90 minutes</td>
					</tr>
					<tr>
						<td><a href="/water-activities/flatwater-activities/#stand-up-paddle-boarding">Stand-up Paddle Boarding</a></td>
						<td>8 years old</td>
						<td>Up to 90 minutes</td>
					</tr>
					<tr></tr>
					<tr>
						<th><a href="/land-activities/">Land</a></th>
						<th></th>
						<th></th>
					</tr>
					<tr>
						<td><a href="/land-activities/ziplines/#figure-8">Figure 8</a></td>
						<td>70 to 265 pounds</td>
						<td>Up to 30 minutes</td>
					</tr>
					<tr>
						<td><a href="/land-activities/ziplines/#double-down">Double Down</a></td>
						<td>70 to 265 pounds</td>
						<td>Up to 30 minutes</td>
					</tr>
					<tr>
						<td><a href="/land-activities/climbing/#deep-water-solo">Deep Water Solo</a></td>
						<td>8 years old, swim skill</td>
						<td>Up to 30 minutes</td>
					</tr>
					<tr>
						<td><a href="/land-activities/ropes/#long-point-obstacle-challenge">Obstacle Course</a></td>
						<td>5 years old</td>
						<td>Up to 1 hour</td>
					</tr>
					<tr>
						<td><a href="/land-activities/climbing/">Climbing</a></td>
						<td>45 to 275 pounds</td>
						<td>Up to 30 minutes</td>
					</tr>
					<tr>
						<td><a href="/land-activities/ropes/#adventure-course">Adventure Course</a></td>
						<td>45 to 275 pounds</td>
						<td>Up to 30 minutes</td>
					</tr>
					<tr>
						<td><a href="/land-activities/ropes/">Ridge Traverse</a></td>
						<td>45 to 275 pounds</td>
						<td>Up to 30 minutes</td>
					</tr>
					<tr>
						<td><a href="/land-activities/ropes/#ridge-course">Ridge Course</a></td>
						<td>45 to 275 pounds</td>
						<td>Up to 30 minutes</td>
					</tr>
					<tr>
						<td><a href="/land-activities/ropes/#canyon-crossing">Canyon Crossing</a></td>
						<td>45 to 275 pounds</td>
						<td>Up to 30 minutes</td>
					</tr>
					<tr>
						<td><a href="/land-activities/ropes/#canyon-spur">Canyon Spur</a></td>
						<td>45 to 275 pounds</td>
						<td>Up to 30 minutes</td>
					</tr>
					<tr>
						<td><a href="/land-activities/ziplines/#canyon-zip">Canyon Zip</a></td>
						<td>45 to 275 pounds</td>
						<td>Up to 30 minutes</td>
					</tr>
					<tr>
						<td><a href="/land-activities/ropes/#double-cross">Double Cross</a></td>
						<td>45 to 275 pounds</td>
						<td>Up to 30 minutes</td>
					</tr>
					<tr>
						<td><a href="/land-activities/trails/#mountain-biking">Mountain Biking</a></td>
						<td>4 feet tall</td>
						<td>Up to 2 hours</td>
					</tr>
					<tr>
						<td><a href="/land-activities/ropes/#river-course">River Course</a></td>
						<td>45 to 275 pounds</td>
						<td>Up to 30 minutes</td>
					</tr>
					<tr>
						<td><a href="/land-activities/ropes/#triple-track">Triple Track</a></td>
						<td>45 to 275 pounds</td>
						<td>Up to 30 minutes</td>
					</tr>
					<tr>
						<td><a href="/land-activities/ropes/#hawk-jump">Hawk Jump</a></td>
						<td>70 to 265 pounds</td>
						<td>Up to 30 minutes</td>
					</tr>
	  			</tbody>
	  		</table>
		</div>
	</section>          
	<!-- <article class="post sidebar more-pass-info">
		<header>
			<h1 class="widget-title">More Pass Info</h1>
		</header>
		<h2>Upgrades</h2>
		<p>Looking to upgrade your experience? We offer upgrades that get you closer to the action with: full suspension and 29er mountain bikes and <a href="/whitewater-activities">rodeo rafting</a>. Upgrades can be purchased on-site and over the phone at 704.391.3900.</p>
		<h2>Notes on Activities</h2>
		<p>Please be aware that all of our activities have capacity limits and are subject to seasonal, weather and other limitations that may cause activities to close without advance notice. Please see the <a href="/hours-of-operation/">Activities Schedule</a> for more information on activity availability. Refunds and rain checks are not available.</p>
	</article> -->
	<?php } 
}?>
