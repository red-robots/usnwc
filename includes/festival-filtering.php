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
			
			$santitime = sanitize_title_with_dashes($timegen);

			// echo '<pre>';
			// print_r($type );
			// echo '</pre>';

		?>

			<div class="tile activity-card element-item 
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
				<div class="desc"><span class="upper">Time:</span> <?php echo $time; ?> <?php if($duration) { echo '('.$duration.')';} ?></div>
				<div class="desc"><span class="upper">Location:</span> <?php echo $location; ?> 
				<a target="_blank" href="<?php echo $map; ?>">(Map)</a>
				</div>
				<div class="desc"><span class="upper">Type:</span>
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
					<span class="upper">Description:</span>
					<?php echo $description; ?>
				</div>
				<?php } ?>
				<?php if( $instrName != '' ) { ?>
					<div class="desc"><span class="upper">Intructor:</span> <?php echo $instrName; ?>
				<?php } ?>
			</div>
				
			

		<?php endwhile; ?>
		</div>

<?php endif; ?>



<!-- 

<div class="container">				
	<div id="filters" style="background-color: #fff; position: relative;">
	  <div id="options-wrap">
			<div id="options">
			    <ul class="nav nav-pills" id="myTab">
			      <li class="active artist artist-nav"><a href="#artist" data-toggle="tab">Artists</a></li>
			      <li class="medium medium-nav"><a href="#medium" data-toggle="tab">Medium</a></li>
			      <li class="colour colour-nav"><a href="#colour" data-toggle="tab">Colour</a></li>
			      <li class="size size-nav"><a href="#size" data-toggle="tab">Size</a></li>
			      <li class="subject subject-nav"><a href="#subject" data-toggle="tab">Subject</a></li>
			      <li class="price price-nav"><a href="#price" data-toggle="tab">Price</a></li>
			      <li class="sale sale-nav"><a href="#sale" data-toggle="tab">Sale Items</a></li>
			    </ul>
			    <div class="tab-content">
				    <div class="tab-pane active" id="artist">
				      <div class="option-combo artist" id="artists">
				        <div class="filter option-set" data-filter-group="artist">
				          <a class="artist artist1" id="artist1" data-filter-value=".artist1"><label class="artist" for="artist1">artist 1</label></a>
				          <a class="artist artist2" id="artist2" data-filter-value=".artist2"><label class="artist" for="artist2">artist 2</label></a>
				          <a class="artist artist3" id="artist3" data-filter-value=".artist3"><label class="artist" for="artist3">artist 3</label></a>
				          <a class="artist artist4" id="artist4" data-filter-value=".artist4"><label class="artist" for="artist4">artist 4</label></a>
				        </div>
				      </div>
				    </div>
			      	<div class="option-combo medium tab-pane" id="medium">
				        <div class="filter option-set" data-filter-group="medium">
				          <a class="medium medium1" id="medium1" data-filter-value=".medium1"><label class="medium" for="medium1">medium 1</label></a>
				          <a class="medium medium2" id="medium2" data-filter-value=".medium2"><label class="medium" for="medium2">medium 2</label></a>
				          <a class="medium medium3" id="medium3" data-filter-value=".medium3"><label class="medium" for="medium3">medium 3</label></a>
				          <a class="medium medium4" id="medium4" data-filter-value=".medium4"><label class="medium" for="medium4">medium 4</label></a>
				        </div>
				    </div>
				    <div class="option-combo colour tab-pane" id="colour">
				        <div class="filter option-set" data-filter-group="colour">
				          <a class="colour colour-blue" id="colour-blue" data-filter-value=".colour-blue"><label class="colour" for="colour-blue">blue</label></a>
				          <a class="colour colour-green" id="colour-green" data-filter-value=".colour-green"><label class="colour" for="colour-green">green</label></a>
				          <a class="colour colour-red" id="colour-red" data-filter-value=".colour-red"><label class="colour" for="colour-red">red</label></a>
				          <a class="colour colour-yellow" id="colour-yellow" data-filter-value=".colour-yellow"><label class="colour" for="colour-yellow">yellow</label></a>
				        </div>
				      </div>
				      <div class="option-combo size tab-pane" id="size">
				        <div class="filter option-set" data-filter-group="size">
				          <a class="size size-small" id="size-small" data-filter-value=".size-small"><label class="size" for="size-small">size-small</label></a>
				          <a class="size size-medium" id="size-medium" data-filter-value=".size-medium"><label class="size" for="size-medium">size-medium</label></a>
				          <a class="size size-large" id="size-large" data-filter-value=".size-large"><label class="size" for="size-large">size-large</label></a>
				          <a class="size size-giant" id="size-giant" data-filter-value=".size-giant"><label class="size" for="size-giant">size-giant</label></a>
				        </div>
				      </div>
				      <div class="option-combo subject tab-pane" id="subject">
				        <div class="filter option-set" data-filter-group="subject">
				          <a class="subject subject-abstract" id="subject-abstract" data-filter-value=".subject-abstract"><label class="subject" for="subject-abstract">abstract</label></a>
				          <a class="subject subject-figurative" id="subject-figurative" data-filter-value=".subject-figurative"><label class="subject" for="subject-figurative">figurative</label></a>
				          <a class="subject subject-landscape" id="subject-landscape" data-filter-value=".subject-landscape"><label class="subject" for="subject-landscape">landscape</label></a>
				          <a class="subject subject-floral" id="subject-floral" data-filter-value=".subject-floral"><label class="subject" for="subject-floral">floral</label></a>
				          <a class="subject subject-architectural" id="subject-architectural" data-filter-value=".subject-architectural"><label class="subject" for="subject-architectural">architectural</label></a>
				        </div>
				      </div>
				      
				      <div class="option-combo subject tab-pane" id="price">
				        <div class="filter option-set" data-filter-group="price">
				          <a class="price price-below-150" id="price-below-150" data-filter-value=".price-below-150"><label class="price" for="price-below-150">< $150</label></a>
				          <a class="price price-150-499" id="price-150-499" data-filter-value=".price-150-499"><label class="price" for="price-150-499">$150-$499</label></a>
				          <a class="price price-500-999" id="price-500-999" data-filter-value=".price-500-999"><label class="price" for="price-500-999">$500-$999</label></a>
				          <a class="price price-1000-1500" id="price-1000-1500" data-filter-value=".price-1000-1500"><label class="price" for="price-1000-1500">$1000-$1500</label></a>
				          <a class="price price-above-1500" id="price-above-1500" data-filter-value=".price-above-1500"><label class="price" for="price-above-1500">$1500+</label></a>
				        </div>
				      </div>
				      
				      <div class="option-combo sale tab-pane" id="sale">
				      	<div class="filter option-set" data-filter-group="sale">
				          <a class="sale sale-on" id="sale-on" data-filter-value=".sale-on"><label class="sale" for="sale-on">on sale</label></a>
				        </div>
				      </div>
				</div>
			</div>
		</div>
		<hr/>
		<div class="container filter-display-container">
	  		<p id="filter-display"></p>
	  		<p id="filter-counter"></p>
	  	</div>
	  	<hr/>
		<div id="filter-container" style="position: relative; overflow: hidden; height: 2214px; width: 909px;" class="isotope">
			<div id="art">
				<a href="work">
					<img class="item artist1 medium1 colour-red size-small subject-abstract price-below-150" src="static/assets/filter/ART-01024.jpeg">
				</a>
				<a href="work">
					<img class="item artist2 medium1 colour-red size-small subject-figurative price-below-150" src="static/assets/filter/ART-01038.jpeg">
				</a>
				<a href="work">
					<img class="item artist3 medium1 colour-red size-small subject-landscape price-below-150" src="static/assets/filter/ART-01070.jpeg">
				</a>
				<a href="work">
					<img class="item artist4 medium1 colour-green size-small subject-landscape price-below-150" src="static/assets/filter/ART-01164.jpeg">
				</a>
				<a href="work">
					<img class="item artist1 medium1 colour-red size-small subject-landscape price-below-150" src="static/assets/filter/ART-01244.jpeg">
				</a>
				<a href="work">
					<img class="item artist2 medium1 colour-red size-small subject-floral price-below-150" src="static/assets/filter/ART-01598.jpeg">
				</a>
				<a href="work">
					<img class="item artist3 medium1 colour-yellow size-small subject-figurative sale-on price-below-150" src="static/assets/filter/ART-01630.jpeg">
				</a>
				<a href="work">
					<img class="item artist4 medium1 colour-red size-small subject-figurative price-below-150" src="static/assets/filter/ART-01631.jpeg">
				</a>
				<a href="work">
					<img class="item artist1 medium1 colour-blue size-small subject-architectural price-below-150" src="static/assets/filter/ART-01642.jpeg">
				</a>
				<a href="work">
					<img class="item artist2 medium1 colour-red size-small subject-landscape price-below-150" src="static/assets/filter/ART-01682.jpeg">
				</a>
				<a href="work">
					<img class="item artist3 medium1 colour-red size-small subject-landscape price-below-150" src="static/assets/filter/ART-01684.jpeg">
				</a>
				<a href="work">
					<img class="item artist4 medium4 colour-red size-small subject-landscape price-below-150" src="static/assets/filter/ART-01685.jpeg">
				</a>
				<a href="work">
					<img class="item artist1 medium1 colour-red size-medium subject-landscape price-150-499" src="static/assets/filter/ART-01731.jpeg">
				</a>
				<a href="work">
					<img class="item artist2 medium1 colour-red size-small subject-architectural price-below-150" src="static/assets/filter/ART-01764.jpeg">
				</a>
				<a href="work">
					<img class="item artist3 medium1 colour-red size-large sale subject-floral price-500-999" src="static/assets/filter/ART-01766.jpeg">
				</a>
				<a href="work">
					<img class="item artist4 medium1 colour-red size-small subject-abstract price-below-150" src="static/assets/filter/ART-01770.jpeg">
				</a>
				<a href="work">
					<img class="item artist1 medium1 colour-red size-giant subject-landscape price-1000-1500" src="static/assets/filter/ART-01791.jpeg">
				</a>
				<a href="work">
					<img class="item artist2 medium1 colour-red size-small subject-landscape price-below-150" src="static/assets/filter/ART-01828.jpeg">
				</a>
				<a href="work">
					<img class="item artist3 medium3 colour-red size-small subject-landscape price-below-150" src="static/assets/filter/ART-01903.jpeg">
				</a>
				<a href="work">
					<img class="item artist4 medium2 colour-red size-small subject-figurative price-above-1500" src="static/assets/filter/ART-01918.jpeg">
				</a>
			</div>
		</div>
	</div>
</div>
 -->