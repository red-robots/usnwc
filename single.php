<?php
/* Single Post Template
 * @since   1.0
 * @alter   2.0
*/
get_header(); 

global $post;

?>

<?php get_sidebar("banner");?>
<?php while(have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
		<header>
			<?php the_title( '<h1 class="entry-title product_title">', '</h1>' ); ?>
		</header>		        	        
		<?php the_content(); ?>
   		<?php comments_template(); ?>
   	</article>
<?php endwhile; //end of if have posts
get_footer(); 
?>