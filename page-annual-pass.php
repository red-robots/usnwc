 <?php
/*
 * Template Name: Annual Pass
 */

get_header('page'); ?>

<?php while( have_posts() ) : the_post();

		$offerOneTitle = get_field('offer_1_title');
		$offerOneLink = get_field('offer_1_link');
		$offerTwoTitle = get_field('offer_2_title');
		$offerTwoLink  = get_field('offer_2_link');

	get_sidebar("banner");?>

	<article class="post">
		<header>
			<h1><?php the_title();?></h1>
		</header>
		
		<section class="content"><?php the_content(); ?></section>
	</article>
	<section class="ann-pass">
		<section class="offers">
			<div class="option">
				<h2><?php echo $offerOneTitle; ?></h2>
				<div class="button">
					<a href="<?php echo $offerOneLink; ?>">BUY</a>
				</div>
			</div>
			<div class="option">
				<h2><?php echo $offerTwoTitle; ?></h2>
				<div class="button">
					<a href="<?php echo $offerTwoLink; ?>">BUY</a>
				</div>
			</div>
		</section>

		<?php if( have_rows('stats') ) : ?>
		<section class="stats">
			<?php while( have_rows('stats') ) : the_row(); 
				$icon = get_sub_field('icon');
				$num = get_sub_field('number');
				$txt = get_sub_field('text');
			?>
				<div class="stat">
					<div class="image">
						<img  src="<?php echo $icon['url']; ?>"  alt="<?php echo $icon['alt']; ?>">
					</div>
					<div class="number">
						<?php echo $num; ?>
					</div>
					<div class="txt">
						<?php echo $txt; ?>
					</div>
				</div>
			<?php endwhile; ?>
		</section>
		<?php endif; ?>
	</section>
	
	<div class="clear"></div>

	<?php 
		$gallery = get_field('slider'); 
		if( $gallery ) :
	?>
		<section class="small-flex">
			<div class="flexslider">
				<ul class="slides">
					<?php foreach( $gallery as $img ) : ?>
						<li>
							<img src="<?php echo $img['url']; ?>">
							<?php if($img['caption']) { ?>
								<div class="desc"><?php echo $img['caption']; ?></div>
							<?php } ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</section>
		
	<?php endif; ?>

	<div class="clear"></div>

<?php endwhile;
 get_footer('page'); ?>