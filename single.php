<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WPThemeE
 */

get_header();
?>

<main>
    <?php

    // Latest blog post 
    $post_args = array(
        'post_type' => 'post', // Replace 'your_custom_post_type' with the name of your custom post type
        'p' => get_the_ID(), // Fetch the current post ID
    );


    $blog_article = get_field('blog_article');

    $post_query = new WP_Query($post_args);


    function icon($icon)
    {
        $image_url = get_template_directory_uri() . $icon;
        return $image_url;
    }


    $query = new WP_Query(array(

        'posts_per_page' => 4,
        'orderby' => 'date',
        'order' => 'DESC',
    ));

    $single_post_quotes  = get_field('single_post_quotes');
    $quotes_image = get_field('quotes_image');


    $career_title = get_field('career_title', 250);
    $career_description = get_field('career_description', 250);
    $career_position = get_field('career_position', 250);


    $career_quotes_image = get_field('career_quotes_image', 250);
    $career_quotes_description = get_field('career_quotes_description', 250);
    $career_quotes_name = get_field('career_quotes_name', 250);


    ?>

    <!-- hero section -->

    <?php
    if ($post_query->have_posts()) :
        while ($post_query->have_posts()) : $post_query->the_post();
            $thumbnail_id = get_post_thumbnail_id();
            $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'full');
    ?>
            <section class="blog__article-hero overlay-1 " style="background-image: url('<?php echo esc_url($thumbnail_url[0]); ?>');">
                <div class="container case__study-back-btn" ">
					<a href="/blog/#all_blog"><img alt="back-arrow" style="z-index:99" src="<?php echo esc_url(icon('/assets/images/case-study/back-arrow.png')); ?>" />
                    <span style="z-index:99">All blog articles</span></a>
                </div>
                <div class="container hero__content">

                    <div>
                        <div>
                            <h1 class="hero__content--heading blog-article-section-h1">
                                <?php the_title(); ?>
                            </h1>
                        </div>
                        <div class="hero__content--author-tags">
                            <p class="hero__content--text blog-article-single-subtitle">
                                Written by <a href="#"><?php the_author(); ?></a> <?php the_date(); ?>
                            </p>
                            <?php
                            $tags = get_tags();

                            if ($tags) {
                                echo '<h3 class="hero__content--text">Tags: ';
                                foreach ($tags as $index => $tag) {
                                    // Don't create anchor tags
                                    echo ($index > 0 ? ', ' : '') . $tag->name;
                                }
                                echo '</h3>';
                            } else {
                                echo '<h3 class="hero__content--text">No tags found.</h3>';
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </section>

            <!-- blog article section -->
            <section class="blog__article-content">
                <div class="blog__article--social-media" style="display:none">
                    <div class="contact-form--socials-icons">
                        <a href="#">
                            <img alt="social icon" src="<?php echo esc_url(icon('/assets/images/contact/facebook-circle.svg')) ?>" /></a>
                        <a href="#">
                            <img alt="social icon" src="<?php echo esc_url(icon('/assets/images/contact/linkedin.svg')); ?>" /></a>
                        <a href="#">
                            <img alt="social icon" src="<?php echo esc_url(icon('/assets/images/contact/twitter.svg')); ?>" /></a>
                        <a href="#">
                            <img alt="social icon" src="<?php echo esc_url(icon('/assets/images/contact/whatsapp-circle.svg')); ?>" /></a>
                    </div>
                </div>
                <div class="container">
                    <div class="blog__article-content--inner">
                        <div class="blog__article-content--text__section">
                            <div class="blog__article-content--text-wrapper">

                                <div class="blog__article-content--text">

                                    <p class="blog__article-content--text">
                                        <?php the_content(); ?>

                                    </p>

                                </div>
                                <br />

                            </div>
                        <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                        <p><?php __('No posts found'); ?></p>
                    <?php endif; ?>
                    <div class="blog__card-right">
                        <div class="top-blog__article-card">
                            <div class="top-blog__article-card--text">
                                <h3 class="top-blog__article-card--heading">
                                    TOP Blog Articles:
                                </h3>
                                <ul>

                                    <?php
                                    if ($blog_article) {
                                        if (have_rows('blog_article')) :
                                            while (have_rows('blog_article')) : the_row();
                                                $title = get_sub_field('block_article_data');
                                                $post_id = $title->ID;
                                                $post_link = get_permalink($post_id);
                                                
                                    ?>
                                              <?php if (!empty($title->post_title)) : ?>
    <li class="">
        <a href="<?php echo esc_url($post_link); ?>"><?php echo $title->post_title; ?></a>
    </li>
<?php endif; ?>
                                            <?php
                                            endwhile;
                                        else :
                                            echo 'No posts found';
                                        endif;
                                    } else {
                                        if ($query->have_posts()) :
                                            while ($query->have_posts()) : $query->the_post();
                                            ?>
                                                <li class="">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </li>
                                    <?php
                                            endwhile;
                                        else :
                                            echo 'No posts found';
                                        endif;
                                    }
                                    ?>




                                </ul>
                            </div>
                        </div>
                        <?php if (have_rows('career_position', 250)) : ?>
                            <div class="top-blog__article-card bg-red">
                                <div class="top-blog__article-card--text">
                                    <h3 class="top-blog__article-card--heading-2">
                                        <?php echo $career_title; ?>
                                    </h3>
                                    <ul>
                                        <?php while (have_rows('career_position', 250)) : the_row(); ?>
                                            <?php
                                            $location = get_sub_field('location');
                                            $job_position = get_sub_field('job_position');

                                            $apply_link = get_sub_field('apply_link');
                                            ?>
                                            <li class="top-blog-article-card-li">
                                                <span class="top-blog-article-card-location"> <?php echo $location; ?></span>
                                                <p class="about__careers--content__text-address">
                                                    <?php echo $job_position; ?>
                                                </p>
                                                <br /><a href="<?php echo esc_url($apply_link); ?>" class="top-blog-article-card-li-a font-primary">Apply now ></a>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                        </div>
                    </div>

                    <?php if (!empty($quotes_image) && !empty($single_post_quotes)) : ?>
                        <div class="blog__article-bottom-content">
                            <div>
                                <img alt="" src="<?php echo esc_url($quotes_image); ?>" />
                            </div>
                            <h2 class="blog__article-content--heading">
                                <?php echo $single_post_quotes; ?>
                            </h2>
                        </div>
                    <?php else : ?>
                        <div style="display: none;"></div>
                    <?php endif; ?>

                </div>
            </section>
</main>

<?php
get_footer();