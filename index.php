<?php
/* 
 * Template Name: Home
 * Frontpage (Blog)
 *
 * @since   1.0
 * @alter   1.6
*/

get_header(); ?>

<?php $post = get_post('13459');
setup_postdata($post);
get_sidebar("banner");
?>



<?php if( have_rows('promotional_cards') ): ?>
	<section class="cards">
		<?php while( have_rows('promotional_cards') ): the_row();
			$title = get_sub_field('title');
			$subTitle = get_sub_field('sub_title');
			$image = get_sub_field('graphic');
			$link = get_sub_field('link');
		?>

			<div class="card">
				<?php if( $link ) { ?><a href="<?php echo $link; ?>"><?php } ?>
					<?php if( $image ) { ?><img src="<?php echo $image['url']; ?>"><?php } ?>
					<div class="card-overlay">
						<?php if( $title ) { ?><h2><?php echo $title; ?></h2><?php } ?>
						<?php if( $subTitle ) { ?><h3><?php echo $subTitle; ?></h3><?php } ?>
					</div>
				<?php if( $link ) { ?></a><?php } ?>
			</div>

		<?php endwhile; ?>
	</section>
<?php endif; ?>

<?php get_footer(); ?>