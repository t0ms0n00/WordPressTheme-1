<?php
    get_header();
?>

<?php
    if(have_posts()){
        while(have_posts()){
            the_post();
            ?>

            <div class="news-head">
                <div class="news-title"> <?php the_title(); ?> </div>
                <div class="news-date"> <?php echo get_the_date(); ?> </div>
            </div>

            <?php if (has_post_thumbnail( $post->ID ) ):
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                <img src="<?php echo $image[0]; ?>" alt="News" class="news-main-img">
            <?php endif; ?>
            
            <div class="news-content"> <?php the_content(); ?> </div>
            <?php
        }
    }
?>

<?php
    get_footer();
?>    
