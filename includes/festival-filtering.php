<?php 

$map = get_field('link_to_activity_map'); 

?>
<section class="the-filter">
<?php 
// Run the filter

if( have_rows('activity') ) : ?>
	<div id="filters">
		<h2>Filter By Activity Type:</h2>

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
	<h2>Filter By Time:</h2>
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
				//if( !in_array($str, $save) ) {
				endwhile;

				foreach( $second as $theTime ) { 

				$str = strtolower($theTime);
			?>
					<button class="filbutton " data-filter=".<?php echo $str;?>"><?php echo $theTime; ?></button>
			
			<?php 
				}
			// Save term in array so we don't use it again.
			//$save[] = $str;

			?>
		</div>
	
<?php endif; ?>
	</div>
	<!-- / #filter -->
</section>

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

			// echo '<pre>';
			// print_r($type );
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
						echo $str.' ';
					}
					
					//} ?>
				<?php if($santitime) {echo $santitime.' ';} ?>
				<?php if($santiL) {echo $santiL.' ';} ?>
			" data-category="<?php //echo $str; ?>">
				<h3><?php echo $name; ?></h3>
				
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
				<?php if( $description != '' ) { ?>
				<div class="act-desc">
					<span class="upper"><a class="pop-desc" href="#read-desc">Information & Description</a></span>
					<div style="display: none">
						<div id="read-desc">
							<?php echo $description; ?>
						</div>
					</div>
					
				</div>
				<?php } ?>
				<?php if( $instrName != '' ) { ?>
					<div class="desc"><span class="upper">Instructor:</span>
					<?php if( $instrDescription != '' ) { ?>
					<a class="instr-desc" href="#instr-desc"><?php echo $instrName; ?></a>
					<?php } else {
						echo $instrName;
						} ?>
					</div>
				<?php } ?>
					<div style="display: none">
						<div id="instr-desc">
							<?php echo $instrDescription; ?>
						</div>
					</div>
			</div>

			
				
			

		<?php endwhile; ?>
		</div>

<?php endif; ?>


