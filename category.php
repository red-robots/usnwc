<?php
/* Category Archive
 *
 * @since   1.0
 * @alter   1.6
 * Altered by Fritz Healy 7/24/2015
 */ ?>
<?php 
if (is_category('daily-grid')) {
	header("Location: http://usnwc.org/daily-activity-schedule/");
	exit;
}
elseif (is_category('completed')||is_category('thursday-events')) {
	header("Location: http://usnwc.org/riverjam/");
	exit;
}
elseif (!is_category('riverjam')){
	header("Location: http://usnwc.org/404/");
	exit;	
}
elseif (is_category('riverjam')||is_category('completed')||is_category('thursday-events')) {
	header("Location: http://usnwc.org/riverjam/");
	exit;
	get_header('category'); ?>
	<?php $post = get_post('522');
	setup_postdata($post);
	get_sidebar("banner");
	wp_reset_postdata();?>
	<header class="post"><h1>River Jam</h1></header>
	<section class="post river-jam">
        	<p>Join us on Thursday and Saturday nights from  May through  September for River Jam, the USNWC’s weekly concert series.  A talented line-up of national musical acts provide the perfect back drop for a fun summer evening outdoors.  Bring your friends, enjoy our large food and craft beer selection, and take in the sights and sounds of River Jam.</p>
        	<h2>Event Details:</h2>
        	<ul>
          		<li>Time: 7:00 p.m. – 10:00 p.m.</li>
			<li>Dates: Thursdays and Saturdays, May - September</li>
			<li>Price: Free ($5 per vehicle parking fee)</li>
			<li>Join us at 6:30 PM on Thursdays for <a href="http://usnwc.org/play/whitewater-race-series/recurring/river-jam-run/">River Jam Run</a>, <a href="http://usnwc.org/play/whitewater-race-series/open-water-swim/">Open Water Swim</a>, <a href="http://usnwc.org/summer-yoga-series/">Summer Yoga</a>, and <a href="http://usnwc.org/big-water/">Big Water Sessions</a></li>
       		</ul>
    	</section>       
	<?php
	/*
	 * The call to get_template_part gets the template function display_loop_tile
	 * which queries the posts based on the supplied args
	 * The arguments for the query are supplied as arguments for the function.
	 * The loop cleans up and resets the query after it is called
	 */
	 get_template_part('loop','tile');
	 display_loop_tile(array('cat'=>'5','post_type'=>'post','order'=>'ASC','orderby'=>'menu_order','posts_per_page'=>'-1'));
	?>
	<?php get_footer('category'); ?>
<?php  } ?>