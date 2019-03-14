<?php
/*
 * Template Name: Passes 
*/
get_header('page'); ?>
<?php get_sidebar("banner"); ?>

    <header class="post">
        <h1><?php the_title(); ?></h1>
    </header>
    
    <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        <section class="post top-level-content <?php echo $post->post_name; ?>">
            <?php the_content(); ?>
        </section>
    <?php endwhile; endif; ?>


    <?php
    /*

            Query the All Access Passes

    */
    $wp_query = new WP_Query();
    $wp_query->query(array(
        'post_type'=>'pass',
        'posts_per_page' => -1,
        'paged' => $paged,
        'tax_query' => array(
            array(
                'taxonomy' => 'pass_type', 
                'field' => 'slug',
                'terms' => array( 'all-access-pass' ) 
            )
        )
    ));
    if ($wp_query->have_posts()) : 
        
        $term = get_queried_object();
        $image = get_field('featured_image', $term);
    ?>
    <section class="post container passes post-noborder ">
        <article class="post row <?php echo $post->post_name; ?>">
            <header>
                <h1>All Access Passes</h1>
            </header>
            <?php 
            /*
            * Display the video or post_thumbnail featured image (if any)
            */
            // $image = $section['image'];
            if($image){ ?>
                <figure class="featured_image">
                    <img src="<?php echo $image['sizes']['medium'];?>">
                </figure>
            <?php } 
            /*
            * Display the title of the post and the content
            */
            ?>
            <section class="copy">
                <ul class="top-level-menu">
                <?php 
                    while ($wp_query->have_posts()) : $wp_query->the_post(); 

                    $buyLink = get_field('buy_link');
                    $price = get_field('price');
                    $desc = get_field('description');
                ?>

                    <li class="top-level-item">
                        <div class="title  " >
                            <div class="pass-title">
                                <span class="indicator-plus wow rollIn"data-wow-delay=".5s">+</span><span class="indicator-min">-</span> <?php the_title(); ?> - <?php echo $price; ?>
                            </div>
                            
                            <div class="pass-button">
                                <a href="<?php echo $buyLink; ?>">BUY</a>
                            </div>
                        </div><!--.title-->

                        <div class="pass-desc">
                            <?php echo $desc; ?>
                        </div>

                        <?php if( have_rows('activities') ) : ?>
                            <table class="sub-menu">

                                <thead>

                                    <tr>
                                        <th>Activities</th>
                                        <th>Difficulty</th>
                                        <th>Qualifiers</th>
                                    </tr>
                                </thead>
                                <tbody>
                                                    
                                                

                            <?php while( have_rows('activities') ) : the_row(); 

                                $name = get_sub_field('name');
                                $difficulty = get_sub_field('difficulty');
                                $qualifiers = get_sub_field('qualifiers');
                                $show = get_sub_field('show');
                            ?>
                            <?php 
                                
                                if(strcmp('no',$show)!==0){?>
                                    <tr>
                                        <?php // fields
                                        // $name = $act['name'];
                                        // $difficulty = $act['difficulty'];
                                        // $qualifiers = $act['qualifiers'];
                                        $beg = in_array( 'Easy', $difficulty );
                                        $int = in_array( 'Intermediate', $difficulty );
                                        $adv = in_array( 'Difficult', $difficulty );?>

                                        <td>
                                            <?php if($name) echo $name;?>
                                        </td>
                                        <td>
                                            <div class="difficulty">
                                                <div class="diff-icon">
                                                    <?php if( $beg ) { ?>
                                                        <img class="activity-key" src="<?php bloginfo('template_url'); ?>/images/diff-easy.png" />
                                                    <?php } ?>
                                                </div>
                                                <div class="diff-icon">
                                                    <?php if( $int ) { ?>
                                                        <img class="activity-key" src="<?php bloginfo('template_url'); ?>/images/diff-med.png" />
                                                    <?php } ?>
                                                </div>
                                                <div class="diff-icon">
                                                    <?php if( $adv ) { ?>
                                                        <img class="activity-key" src="<?php bloginfo('template_url'); ?>/images/diff-advanced.png" />
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if($qualifiers) echo $qualifiers;?>
                                        </td>
                                    </tr>
                                <?php } //endif for $show ?>
                            <?php endwhile; ?>
                                </tbody>
                            </table> 
                        <?php endif; ?>

                    </li>
                    

                    
                    

                <?php endwhile; ?>
                </ul>
            </section>
        </article>
        </section>
    <?php endif; ?>

    <?php
    /*

            Query the Single Access Passes

    */
    $wp_query = new WP_Query();
    $wp_query->query(array(
        'post_type'=>'pass',
        'posts_per_page' => -1,
        'paged' => $paged,
        'tax_query' => array(
            array(
                'taxonomy' => 'pass_type', 
                'field' => 'slug',
                'terms' => array( 'single-activity-pass' ) 
            )
        )
    ));
    if ($wp_query->have_posts()) : 
        
        $term = get_queried_object();
        $image = get_field('featured_image', $term);
    ?>
    <section class="post container passes post-noborder ">
        <article class="post row <?php echo $post->post_name; ?>">
            <header>
                <h1>Single Activity Passes</h1>
            </header>
            <?php 
            /*
            * Display the video or post_thumbnail featured image (if any)
            */
            // $image = $section['image'];
            if($image){ ?>
                <figure class="featured_image">
                    <img src="<?php echo $image['sizes']['medium'];?>">
                </figure>
            <?php } 
            /*
            * Display the title of the post and the content
            */
            ?>
            <section class="copy">
                <ul class="top-level-menu">
                <?php 
                    while ($wp_query->have_posts()) : $wp_query->the_post(); 

                    $buyLink = get_field('buy_link');
                    $price = get_field('price');
                    $desc = get_field('description');
                ?>

                    <li class="top-level-item">
                        <div class="title  " >
                            <div class="pass-title">
                                <span class="indicator-plus wow rollIn"data-wow-delay=".5s">+</span><span class="indicator-min">-</span> <?php the_title(); ?> - <?php echo $price; ?>
                            </div>
                            
                            <div class="pass-button">
                                <a href="<?php echo $buyLink; ?>">BUY</a>
                            </div>
                        </div><!--.title-->

                        <div class="pass-desc">
                            <?php echo $desc; ?>
                        </div>

                        <?php if( have_rows('activities') ) : ?>
                            <table class="sub-menu">

                                <thead>

                                    <tr>
                                        <th>Activities</th>
                                        <th>Difficulty</th>
                                        <th>Qualifiers</th>
                                    </tr>
                                </thead>
                                <tbody>
                                                    
                                                

                            <?php while( have_rows('activities') ) : the_row(); 

                                $name = get_sub_field('name');
                                $difficulty = get_sub_field('difficulty');
                                $qualifiers = get_sub_field('qualifiers');
                                $show = get_sub_field('show');
                            ?>
                            <?php 
                                
                                if(strcmp('no',$show)!==0){?>
                                    <tr>
                                        <?php // fields
                                        // $name = $act['name'];
                                        // $difficulty = $act['difficulty'];
                                        // $qualifiers = $act['qualifiers'];
                                        $beg = in_array( 'Easy', $difficulty );
                                        $int = in_array( 'Intermediate', $difficulty );
                                        $adv = in_array( 'Difficult', $difficulty );?>

                                        <td>
                                            <?php if($name) echo $name;?>
                                        </td>
                                        <td>
                                            <div class="difficulty">
                                                <div class="diff-icon">
                                                    <?php if( $beg ) { ?>
                                                        <img class="activity-key" src="<?php bloginfo('template_url'); ?>/images/diff-easy.png" />
                                                    <?php } ?>
                                                </div>
                                                <div class="diff-icon">
                                                    <?php if( $int ) { ?>
                                                        <img class="activity-key" src="<?php bloginfo('template_url'); ?>/images/diff-med.png" />
                                                    <?php } ?>
                                                </div>
                                                <div class="diff-icon">
                                                    <?php if( $adv ) { ?>
                                                        <img class="activity-key" src="<?php bloginfo('template_url'); ?>/images/diff-advanced.png" />
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if($qualifiers) echo $qualifiers;?>
                                        </td>
                                    </tr>
                                <?php } //endif for $show ?>
                            <?php endwhile; ?>
                                </tbody>
                            </table> 
                        <?php endif; ?>

                    </li>
                    

                    
                    

                <?php endwhile; ?>
                </ul>
            </section>
        </article>
        </section>
    <?php endif; ?>

<?php get_footer('page'); ?>