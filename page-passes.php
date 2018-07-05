 <?php
/*
 * Template Name: Passes 
*/
get_header('page'); ?>



 <?php get_sidebar("banner");?>


<!-- removes the faetured image if custom field is set -->
<div class="wrap">    
    <div id="page">
        <div class="box-content post" style="margin-top:10px;">
        	<?php if(have_posts()) : while(have_posts()) : the_post() ?>
			


            <h1 class="widget-title">Pass Options</h1>
            <div class="page-entry">
            	
                
				<?php the_content(); ?>
                
                
            </div><!-- #page-entry -->
           
                
            <?php endwhile; endif; ?>
        </div>
        
    </div> <!--page -->

<div id="sidebar">
<div class="sidebar-item box-content">
<h1 class="widget-title">Pass Activities</h1>

<!--start pass activities grid -->            	
<div id="pass-table">                
<table>

<tbody><tr>
<th style="border-right: 2px solid #c2c2c2;"><a href="/water-activities/whitewater-activities/">Whitewater</a></th>
<th style="border-right: 2px solid #c2c2c2;">Qualifiers</th>
<th>Duration</th>
</tr>

<tr>
<td style="border-right: 2px solid #c2c2c2;"><a href="/water-activities/whitewater-activities/#family-rafting">Family Rafting</a></td>
<td style="border-right: 2px solid #c2c2c2;">8 years old</td>
<td>Up to 90 minutes</td>
</tr>

<tr>
<td style="border-right: 2px solid #c2c2c2;"><a href="/water-activities/whitewater-activities/#adventure-rafting">Adventure Rafting</a></td>
<td style="border-right: 2px solid #c2c2c2;">11 years old</td>
<td>Up to 90 minutes</td>
</tr>

<tr>
<td style="border-right: 2px solid #c2c2c2;"><a href="/water-activities/whitewater-activities/#rodeo-rafting">Rodeo Rafting Upgrade ($15)</a></td>
<td style="border-right: 2px solid #c2c2c2;">16 years old</td>
<td>Up to 90 minutes</td>
</tr>

<tr>
<td style="border-right: 2px solid #c2c2c2;"><a href="/water-activities/whitewater-activities/#whitewater-kayaking">Whitewater Kayaking</a></td>
<td style="border-right: 2px solid #c2c2c2;">Skill Check</td>
<td>2 or more hours</td>
</tr>

<tr>
<td style="border-right: 2px solid #c2c2c2;"><a href="/water-activities/whitewater-activities/#whitewater-sup">Whitewater Stand-up Paddle Boarding</a></td>
<td style="border-right: 2px solid #c2c2c2;">Skill Check</td>
<td>2 or more hours</td>
</tr>


<!-- flatwater -->
<tr>
<th style="border-right: 2px solid #c2c2c2;"><a href="/water-activities/flatwater-activities/">Flatwater</a></th>
<th style="border-right: 2px solid #c2c2c2;"></th>
<th></th>
</tr>

<tr>
<td style="border-right: 2px solid #c2c2c2;"><a href="/water-activities/flatwater-activities/#flatwater-kayaking">Flatwater Kayaking</a></td>
<td style="border-right: 2px solid #c2c2c2;">8 years old</td>
<td>Up to 90 minutes</td>
</tr>

<tr>
<td style="border-right: 2px solid #c2c2c2;"><a href="water-activities/flatwater-activities/#stand-up-paddle-boarding">Stand-up Paddle Boarding</a></td>
<td style="border-right: 2px solid #c2c2c2;">8 years old</td>
<td>Up to 90 minutes</td>
</tr>
<tr></tr>

<!-- land -->
 <tr>
<th style="border-right: 2px solid #c2c2c2;"><a href="/land-activities/">Land</a></th>
<th style="border-right: 2px solid #c2c2c2;"></th>
<th></th>
</tr>

<tr>
<td style="border-right: 2px solid #c2c2c2;"><a href="/land-activities/ziplines/#mega-zip">Mega Zip</a></td>
<td style="border-right: 2px solid #c2c2c2;">70 to 300 pounds</td>
<td>Up to 30 minutes</td>
</tr>


<tr>
<td style="border-right: 2px solid #c2c2c2;"><a href="/land-activities/ropes/#long-point-obstacle-challenge">Obstacle Course</a></td>
<td style="border-right: 2px solid #c2c2c2;">5 years old</td>
<td>Up to 1 hour</td>
</tr>

<tr>
<td style="border-right: 2px solid #c2c2c2;"><a href="/land-activities/climbing/">Climbing</a></td>
<td style="border-right: 2px solid #c2c2c2;">45 to 275 pounds</td>
<td>Up to 30 minutes</td>
</tr>

<tr>
<td style="border-right: 2px solid #c2c2c2;"><a href="/land-activities/ropes/#adventure-course">Adventure Course</a></td>
<td style="border-right: 2px solid #c2c2c2;">45 to 275 pounds</td>
<td>Up to 30 minutes</td>
</tr>

<tr>
<td style="border-right: 2px solid #c2c2c2;"><a href="/land-activities/ropes/">Ridge Traverse</a></td>
<td style="border-right: 2px solid #c2c2c2;">45 to 275 pounds</td>
<td>Up to 30 minutes</td>
</tr>

<tr>
<td style="border-right: 2px solid #c2c2c2;"><a href="/land-activities/ropes/#ridge-course">Ridge Course</a></td>
<td style="border-right: 2px solid #c2c2c2;">45 to 275 pounds</td>
<td>Up to 30 minutes</td>
</tr>

<tr>
<td style="border-right: 2px solid #c2c2c2;"><a href="/land-activities/ropes/#canyon-crossing">Canyon Crossing</a></td>
<td style="border-right: 2px solid #c2c2c2;">45 to 275 pounds</td>
<td>Up to 30 minutes</td>
</tr>

<tr>
<td style="border-right: 2px solid #c2c2c2;"><a href="/land-activities/ropes/#canyon-spur">Canyon Spur</a></td>
<td style="border-right: 2px solid #c2c2c2;">45 to 275 pounds</td>
<td>Up to 30 minutes</td>
</tr>

<tr>
<td style="border-right: 2px solid #c2c2c2;"><a href="/land-activities/ziplines/#canyon-zip">Canyon Zip</a></td>
<td style="border-right: 2px solid #c2c2c2;">45 to 275 pounds</td>
<td>Up to 30 minutes</td>
</tr>

<tr>
<td style="border-right: 2px solid #c2c2c2;"><a href="/land-activities/ropes/#double-cross">Double Cross</a></td>
<td style="border-right: 2px solid #c2c2c2;">45 to 275 pounds</td>
<td>Up to 30 minutes</td>
</tr>

<tr>
<td style="border-right: 2px solid #c2c2c2;"><a href="/land-activities/trails/#mountain-biking">Mountain Biking</a></td>
<td style="border-right: 2px solid #c2c2c2;">4 feet tall</td>
<td>Up to 2 hours</td>
</tr>

<tr>
<td style="border-right: 2px solid #c2c2c2;"><a href="/land-activities/trails/#mountain-biking-upgrade">Mountain Biking Upgrade (from $10)</a></td>
<td style="border-right: 2px solid #c2c2c2;">5 feet tall</td>
<td>Up to 2 hours</td>
</tr>

<tr>
<td style="border-right: 2px solid #c2c2c2;"><a href="/land-activities/ropes/#river-course">River Course</a></td>
<td style="border-right: 2px solid #c2c2c2;">45 to 275 pounds</td>
<td>Up to 30 minutes</td>
</tr>

<tr>
<td style="border-right: 2px solid #c2c2c2;"><a href="/land-activities/ropes/#triple-track">Triple Track</a></td>
<td style="border-right: 2px solid #c2c2c2;">45 to 275 pounds</td>
<td>Up to 30 minutes</td>
</tr>

<tr>
<td style="border-right: 2px solid #c2c2c2;"><a href="/land-activities/ropes/#hawk-jump">Hawk Jump</a></td>
<td style="border-right: 2px solid #c2c2c2;">45 to 275 pounds</td>
<td>Up to 30 minutes</td>
</tr>
  </tbody></table>


</div>

<!-- end pass activities grid -->           
                
           
</div>
        
	
    

  <div class="sidebar-item box-content">
<h3 class="widget-title">More Pass Info</h3>

 <h4>Upgrades</h4>
<p>Looking to upgrade your experience? We offer upgrades that get you closer to the action with: full suspension and 29er mountain bikes and <a href="/whitewater-activities">rodeo rafting</a>. Upgrades can be purchased on-site and over the phone at 704.391.3900.</p>
<br />
<h4>Notes on Activities</h4>
<p>Please be aware that all of our activities have capacity limits and are subject to seasonal, weather and other limitations that may cause activities to close without advance notice. Please see the <a href="/hours-of-operation/">Activities Schedule</a> for more information on activity availability. Refunds and rain checks are not available.</p><br>
<!--<p>Due to high demand, all raft reservations made between 11:00am and 4:00pm on Saturdays from Memorial Day through Labor Day will require a $5.00 reservation fee per person in order to provide a trip option for as many guests as possible.</p><br>
<p>AllSport Pass Holders may book into the next available rafting trip at no additional charge outside of this time frame.</p><br>
<p>Only one raft trip per person is allowed on Saturdays from Memorial Day through Labor Day.</p>-->



</div><!-- passes  -->


</div> <!--sidebar -->           
    
</div><!-- #wrap -->
<?php get_footer('page'); ?>