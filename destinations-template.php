<?php
/*
* template Name: Destinations Template;
*/

get_header();

?>


<style>
    .post-container {
        display: flex;
        margin-top: 3rem;
        margin-bottom: 3rem;
        flex-wrap: wrap;
        justify-content: space-evenly;

    }

    .post-content {

        flex-basis: 25%;
        height: 100%;
        border: 1px solid rgba(0, 0, 0, .1);
        overflow: hidden;
        

    }

    .image-link {
        position: relative;
    }

    .image-link:after {
        content: "";
        position: absolute;
        width: 100%;
        top: 0;
        min-height: 177.8px;
        background: black;
        overflow: hidden;
        bottom: 0;
        left: 0;
        margin: auto;
        right: 0;
        opacity: 0;
        transition: opacity 0.2s ease-in;
    }

    .image-link:hover:after {
        opacity: 60%;
    }

    .read-more-btn {
        font-size: 13px;
        color: rgb(26, 56, 90);
    }

    .post-content .post-inner-content {
        padding: 2rem 1.5rem 4rem 1.5rem;
    }

    .post-content .post-inner-content h3 {
        margin-bottom: 0.5rem;
    }

    .post-content p {
        display: -webkit-box;
        overflow: hidden;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        margin-bottom: 0;
    }
</style>





<div class="container">
    <div class="row post-container">
        <?php

        $args = array(

            'post_type' => 'destinations',

            'post_status' => 'publish',

            'orderby' => 'date',

            'order' => 'DESC',

            'posts_per_page' => 20,

            'paged' => $paged,

        );

        ?>
        <?php



        $loop = new WP_Query($args);

        if ($loop->have_posts()) {

            while ($loop->have_posts()) : $loop->the_post(); ?>
                <div class="post-content">

                    <a class="image-link" href="<?php echo get_permalink() ?>"> <?php the_post_thumbnail(); ?></a>


                    <div class="post-inner-content">



                        <h3>
                            <a href=" <?php echo get_permalink() ?>"> <?php the_title(); ?> </a>
                        </h3>

                        <?php the_excerpt(); ?>

                        <a class="read-more-btn" href="<?php echo get_permalink() ?>"> Read More </a>



                    </div>
                </div>


        <?php

            endwhile;
        }
        wp_reset_query(); ?>

    </div>
</div>


<?php

get_footer();
