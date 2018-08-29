<?php 

$map = get_field('link_to_activity_map'); 

?>
<div class="filter-options">
	// Filter Options //
</div>
<div id="the-filter" class="the-filter closed">
<?php 
// Run the filter

if( have_rows('activity') ) : ?>
	
	<div id="filters" class=" ">
		<h2 class="filter-title">Filter By Activity Type:</h2>

		<div class="button-group group1 filters-button-group" data-filter-group="type">
			<button class="filbutton showall is-checked" data-filter="*">show all</button>

			<?php 
			// Set the Array for the whole thing.
			$save = array();
			$first = array();
			$second = array();

			// loop through Activty type first.
			while( have_rows('activity') ) : the_row(); 

				
				$type = get_sub_field('activity_type');

				foreach($type as $act) {
					$actName = $act;
					// echo $str;
					if( !in_array($actName, $first) ) {
						$first[] = $actName;
					}
				}
				
			?>
				
				
			
			<?php 
				endwhile; 

			foreach( $first as $theAct ) { 

				$str = strtolower($theAct);
				?>
			<button class="filbutton " data-filter=".<?php echo $str;?>"><?php echo $theAct; ?></button>
			<?php } //echo $final;?>
		</div>
	
<?php endif; ?>



<div class="clear"></div>
<?php if( have_rows('activity') ) : ?>
	<h2 class="filter-title">Filter By Time:</h2>
		<div class="button-group group2 filters-button-group" data-filter-group="time">
		<button class="filbutton showall is-checked" data-filter="*">show all</button>
			<?php while( have_rows('activity') ) : the_row(); 

				$time = get_sub_field('time_gen');
				$str = strtolower($time);
				$str = sanitize_title_with_dashes($str);

				foreach($time as $t) {
					$timeName = $t;
					// echo $str;
					if( !in_array($timeName, $second) ) {
						$second[] = $timeName;
					}
				}

				// echo '<pre>';
				// print_r($time);
				// echo '</pre>';
				
				endwhile;

				foreach( $second as $theTime ) { 
					// for the link. grab it
					$str = strtolower($theTime);
					// grab the first 4 characters so multi names can still link
					$str = substr($str, 0, 4);
			?>
					<button class="filbutton " data-filter=".<?php echo $str;?>"><?php echo $theTime; ?></button>
			
			<?php } ?>
		</div>
	
<?php endif; ?>
	</div>
	<!-- / #filter -->
</div>

<div class="clear"></div>
<?php //if( have_rows('activity') ) : ?>
<!-- 	<h2>Filter By Location:</h2>
		<div class="button-group filters-button-group"> -->

			<?php ///while( have_rows('activity') ) : the_row(); 

				// $location = get_sub_field('location');
				// $str = strtolower($location);
				// $strS = sanitize_title_with_dashes($str);

				// echo '<pre>';
				// print_r($time);
				// echo '</pre>';
				//if( !in_array($str, $save) ) {
			?>
					<!-- <button class="button " data-filter=".<?php //echo $strS;?>"><?php //echo $location; ?></button> -->
			
			<?php 
				//}
			// Save term in array so we don't use it again.
			//$save[] = $str;

			//endwhile;?>
		<!-- </div> -->
	
<?php //endif; 


// run the fields
$descCount = 0;
if( have_rows('activity') ) : ?>
		<div class="no-results">
		   <div>No results</div>
		</div>
		<div class="tile container filterzz">
		<?php while( have_rows('activity') ) : the_row(); 

			$name = get_sub_field('activity_name');
			$timegen = get_sub_field('time_gen');
			$time = get_sub_field('time');
			$duration = get_sub_field('duration');
			$location = get_sub_field('location');
			$strL = strtolower($location);
			$santiL = sanitize_title_with_dashes($location);
			$type = get_sub_field('activity_type');
			$description = get_sub_field('description');
			$instrName = get_sub_field('instructor_name');
			$instrLink = get_sub_field('instructor_link');
			$instrDescription = get_sub_field('instructor_description');
			$santitime = sanitize_title_with_dashes($timegen);
			$santiName = sanitize_title_with_dashes($instrName);
			if( $description != '' ) {
				$descCount++;
			}
			// $santiDesc = sanitize_title_with_dashes($description);

			// echo '<pre>';
			// print_r($timegen );
			// echo '</pre>';

		?>
		
			<div class=" activity-card element-item 
				<?php //if($str) {
					foreach( $type as $t ) {
						$str = strtolower($t);
						echo $str.' ';
					}

					foreach( $timegen as $tg ) {
						$str = strtolower($tg);
						// grab the first 4 characters so multi names can still link
						$str = substr($str, 0, 4);
						echo $str.' ';
					}
					
					//} ?>
				<?php if($santitime) {echo $santitime.' ';} ?>
				<?php if($santiL) {echo $santiL.' ';} ?>
			" data-category="<?php //echo $str; ?>">
				<h3><?php echo $name; ?></h3>
				
				<?php if( is_page('outdoor-market') ) { ?>
					<div class="desc">
						<span class="upper">Day:</span> <?php echo $timegen[0]; ?>
					</div>
				<?php } ?>

				<div class="desc">
					<span class="upper">Time:</span> <?php echo $time; ?> <?php if($duration) { echo '('.$duration.')';} ?>
				</div>

				<div class="desc"><span class="upper">Location:</span> <?php echo $location; ?> 
					<a target="_blank" href="<?php echo $map; ?>">(Map)</a>
				</div>

				<div class="desc">
					<span class="upper">Type:</span>
					<?php 
					$prefix = $fruitList = '';
					foreach($type as $act) {
						$fruitList .= $prefix . $act;
	    				$prefix = ', ';
						
						} 
						echo $fruitList;?>
				</div>
				
				<?php if( $instrName != '' ) { ?>
					<div class="desc"><span class="upper">Instructor:</span>
					<?php if( $instrDescription != '' ) { ?>
						<a class="instr-desc" href="#<?php echo $santiName; ?>"><?php echo $instrName; ?></a>
					<?php } else {
						echo $instrName;
						} ?>
					</div>
				<?php } ?>
				<?php if( $description != '' ) { ?>
				<div class="act-desc">
					<span class="upper"><a class="pop-desc" href="#desc-<?php echo $descCount; ?>">Information & Description</a></span>
					
					
				</div>
				<?php } ?>

			</div>

			<?php if( $description != '' ) { ?>
			<div style="display: none">
				<div id="desc-<?php echo $descCount; ?>" class="the-pop">
					<?php echo $description; ?>
				</div>
			</div>
			<?php } ?>
			<?php if( $instrDescription != '' ) { ?>
			<div style="display: none">
				<div id="<?php echo $santiName; ?>" class="the-pop">
					<?php echo $instrDescription; ?>
				</div>
			</div>
			<?php } ?>



			
				
			

		<?php endwhile; ?>
		</div>

<?php endif; ?>


