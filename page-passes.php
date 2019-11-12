<?php
/*
 * Template Name: Passes 
*/
get_header('page'); 



$flexsliderAA = get_field('all_access_slider');
$flexsliderSA = get_field('single_activity_slider');
$allIntro = get_field('intro_text_all');
$singleIntro = get_field('intro_text_single');
$section_title = get_field('section_title');
$section_desc = get_field('section_desc');
$title_day = get_field('title_day');
$price_day = get_field('price_day');
$buy_link_day = get_field('buy_link_day');
$desc_day = get_field('desc_expand_day');
$title_two = get_field('title_two');
$price_two = get_field('price_two');
$buy_link_two = get_field('buy_link_two');
$desc_two = get_field('desc_expand_two');
$title_ann = get_field('title_ann');
$price_ann = get_field('price_ann');
$buy_link_ann = get_field('buy_link_ann');
$desc_ann = get_field('desc_expand_ann');

        ?>
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
        'post_type'=>'activity',
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
            include( locate_template( 'includes/all-access-flexslider.php', false, false ) );
            /*
            * Display the video or post_thumbnail featured image (if any)
            */
            // $image = $section['image'];
            if($image){ ?>
                <!-- <figure class="featured_image">
                    <img src="<?php echo $image['sizes']['medium'];?>">
                </figure> -->
            <?php } 
            /*
            * Display the title of the post and the content
            */
            ?>
            <section class="copy center">
                
                <section class="passdesc">
                    <?php echo $allIntro; ?>
                </section>

               <ul class="top-level-menu">
                    <li class="top-level-items">
                        <div class="title  " >
                            <div class="pass-title">
                            <?php echo $title_day; ?> - <?php echo $price_day; ?>
                            </div>
                            <div class="pass-button track-day">
                                <a href="<?php echo $buy_link_day; ?>">BUY</a>
                            </div>
                        </div>
                        <div class="pass-desc">
                            <?php echo $desc_day; ?>
                        </div>
                    </li>
                    <li class="top-level-items">
                       <div class="title  " >
                            <div class="pass-title">
                            <?php echo $title_two; ?> - <?php echo $price_two; ?>
                            </div>
                            <div class="pass-button track-two-day">
                                <a href="<?php echo $buy_link_two; ?>">BUY</a>
                            </div>
                        </div>
                        <div class="pass-desc">
                            <?php echo $desc_two; ?>
                        </div>
                    </li>
                    <li class="top-level-items">
                       <div class="title  " >
                            <div class="pass-title ">
                                <?php echo $title_ann; ?> - <?php echo $price_ann; ?></div>
                            <div class="pass-button track-annual">
                                <a href="<?php echo $buy_link_ann; ?>">BUY</a>
                            </div>
                        </div>
                        <div class="pass-desc">
                            <?php echo $desc_ann; ?>
                        </div>
                    </li>
                    </ul>

                    <section class="passdesc">
                        <h3><?php echo $section_title; ?></h3>
                        <?php echo $section_desc; ?>
                    </section>
                  
                    
               <ul class="top-level-menu">
                <?php 
                    while ($wp_query->have_posts()) : $wp_query->the_post(); 
                    $what = sanitize_title_with_dashes( get_the_title() );
                    $buyLink = get_field('buy_link');
                    $price = get_field('price');
                    $desc = get_field('description');
                    $click = 'track-' . sanitize_title_with_dashes( get_the_title() );
                ?>
                <?php if( $what !== 'lights' ) { ?>
                    <li class="top-level-item">
                        <div class="title  <?php echo $click; ?>" >
                            <div class="">
                                <span class="indicator-plus wow rollIn"data-wow-delay=".5s">+</span><span class="indicator-min">-</span> <?php the_title(); ?> <?php echo $price; ?>
                            </div>
                            
                            <!-- <div class="pass-button">
                                <a href="<?php //echo $buyLink; ?>">BUY</a>
                            </div> -->
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
                <?php } ?>

                    
                    

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
        'post_type'=>'activity',
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
            
            include( locate_template( 'includes/single-activity-flexslider.php', false, false ) );
            /*
            * Display the video or post_thumbnail featured image (if any)
            */
            // $image = $section['image'];
            if($image){ ?>
                <!-- <figure class="featured_image">
                    <img src="<?php echo $image['sizes']['medium'];?>">
                </figure> -->
            <?php } 
            /*
            * Display the title of the post and the content
            */
            ?>
            <section class="copy center">
                <section class="passdesc">
                    <?php echo $singleIntro; ?>
                </section>

                <ul class="top-level-menu">
                <?php 
                    $showbutt = array();
                    $shobtn = '';
                    // function in_array_any($needles, $haystack) {
                    //    return !empty(array_intersect($needles, $haystack));
                    // }
                    while ($wp_query->have_posts()) : $wp_query->the_post(); 
                    $what = sanitize_title_with_dashes( get_the_title() );
                    $buyLink = get_field('buy_link');
                    $price = get_field('price');
                    $desc = get_field('description');
                    $click = 'track-' . sanitize_title_with_dashes( get_the_title() );
                    $showbutt[] = $click;
                    if( in_array('track-ice-skating', $showbutt) ) {
                        $shobtn = 'noshow';
                        unset($showbutt);
                        $showbutt = array();
                    }
                    if( in_array('track-lights', $showbutt) ) {
                        $shobtn = 'noshow';
                        unset($showbutt);
                        $showbutt = array();
                    }
                    // echo '<pre>';
                    // print_r($showbutt);
                    // echo '</pre>';
                ?>
                 <?php if( $what !== 'lights' ) { ?>
                    <li class="top-level-item">
                        <div class="title  " >
                            <div class="pass-title <?php echo $click; ?>">
                                <span class="indicator-plus wow rollIn"data-wow-delay=".5s">+</span><span class="indicator-min">-</span> <?php the_title(); ?> - <?php echo $price; ?>
                            </div>
                            
                            <?php if( $shobtn !== 'noshow' ) { ?>
                            <div class="pass-button <?php echo $click; ?>">
                                <a href="<?php echo $buyLink; ?>">BUY</a>
                            </div>
                            <?php } ?>
                        </div><!--.title-->

                        <div class="pass-desc">
                            <?php echo $desc; ?>
                        </div>

                        <?php if( have_rows('activities') ) : ?>
                            <table class="sub-menu ">

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
                    
                    <?php } // hide lights endif; ?>
                    
                    

                <?php endwhile; ?>
                </ul>
            </section>
        </article>
        </section>
    <?php endif; ?>

<?php get_footer('page'); ?>