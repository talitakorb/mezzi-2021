<?php


function afc_posts_relacionados() {
    $limitpost = 3;
    $relatedtitle = '';

    global $post;

    // categorias
    $categories = get_the_category($post->ID, 'blog');
    $category_ids = array();


    
    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
    $args_cat = array( 
        'category__in' => $category_ids, 
        'post_type' => 'blog',
        'post__not_in' => array($post->ID, 'blog'), 
        'posts_per_page'=> $limitpost, 
        'ignore_sticky_posts'=> 1 );
    $my_query_cat = new WP_Query($args_cat);

    // por tags
    $tags = wp_get_post_tags($post->ID);
    $tag_ids = array();
    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
    $args_tags = array( 
        'tag__in' => $tag_ids, 
        'post_type' => 'blog',
        'post__not_in' => array($post->ID), 
        'posts_per_page'=> $limitpost, 
        'ignore_sticky_posts'=> 1 );
    $my_query_tags = new WP_Query($args_tags);





    // SE TEM CATEGORIA TAL
    if ($my_query_cat->have_posts()) {
        echo "<section class='wrap-posts-relacionados'><h2 class='h2-continue-lendo'>Continue lendo...</h2>
        <ul>\n";
        echo $relatedtitle; echo "\n"; $i = 1;
        while ($my_query_cat->have_posts()) { $my_query_cat->the_post(); 
        ?>

        <li class="post-individual">
            <?php if (existeImagem()) { ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <div class="img-post" style="background-image: url(<?php echo the_post_thumbnail_url( 'full' ); ?>)">
                    </div>             
                </a>
                <div class="categ"><?php echo get_the_date(); ?></div>  
            <?php } else { ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <div class="img-post" style="background-image: url(<?php bloginfo('url'); ?>/wp-content/themes/werner-2020/img/if.png)">     
                    </div>
                </a>  
                <div class="categ"><?php echo get_the_date(); ?></div>                  
            <?php } ?>

            <div class="texto">
                <header class="header">
                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">                     
                        <h1 class="titulo-post">
                            <?php the_title(); ?>
                        </h1> 

                        <div class="descricao"><?php the_excerpt(); ?></div> 
                    </a>
                </header>
            </div>
        </li>

        <?php $i++; }
        echo "
        </ul>
        </section>";
    }

    // SE NAO TEM CATEGORIA TAL, VAI POR TAG TAL
    elseif ($my_query_tags->have_posts()) {
        echo "<section class='wrap-posts-relacionados'><h2 class='h2-continue-lendo'>Continue lendo...</h2>
        <ul>\n";
        echo $relatedtitle; echo "\n"; $i = 1;
        while ($my_query_tags->have_posts()) { $my_query_tags->the_post(); ?>

        <li class="post-individual">
            <?php if (existeImagem()) { ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <div class="img-post" style="background-image: url(<?php echo the_post_thumbnail_url( 'full' ); ?>)">
                    </div>             
                </a>
                <div class="categ"><?php echo get_the_date(); ?></div>  
            <?php } else { ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                    <div class="img-post" style="background-image: url(<?php bloginfo('url'); ?>/wp-content/themes/werner-2020/img/if.png)">     
                    </div>
                </a>  
                <div class="categ"><?php echo get_the_date(); ?></div>                  
            <?php } ?>

            <div class="texto">
                <header class="header">
                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">                     
                        <h1 class="titulo-post">
                            <?php the_title(); ?>
                        </h1> 

                        <div class="descricao"><?php the_excerpt(); ?></div> 
                    </a>
                </header>
            </div>
        </li>

        <?php $i++; }
        echo "
        </ul>
        </section>";
    }

    else {}
    wp_reset_query();
}


?>