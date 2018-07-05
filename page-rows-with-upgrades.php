<?php
/*
 * Template Name: Rows With Upgrades Template
 */
get_header('page'); ?>



<?php get_sidebar("banner");?>
<?php
/*
 *
 */   
get_template_part('loop','article');
display_loop_article(array(
	'post_parent'=>$post->ID,
	'post_type'=>'page',
	'order'=>'ASC',
	'posts_per_page'=>'-1',
	'meta_query' => array(
        array(
            'key' => 'upgrade_check', // name of custom field
            'value' => 'no'
        )
    ),'orderby'=>'menu_order'
));
display_loop_article(array(
	'post_parent'=>$post->ID,
	'post_type'=>'page',
	'order'=>'ASC',
	'posts_per_page'=>'-1',
	'meta_query' => array(
        array(
            'key' => 'upgrade_check', // name of custom field
            'value' => 'yes'
        )
    ),'orderby'=>'menu_order'
));
?>
    

<?php get_footer('page'); ?>