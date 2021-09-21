<?php
    get_header();
?>

<?php
    if(have_posts()){
        while(have_posts()){
            the_post();

            if (has_post_thumbnail( $post->ID ) ):
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );?>
                <img src="<?php echo $image[0]; ?>" alt="News" class="branch-img">
            <?php endif; ?>
            
            <div class="branch-title"> <?php the_title(); ?> </div>
            <div class="branch-content"> <?php the_content(); ?> </div>
            <?php
        }
    }
?>

<?php
    get_footer();
?>    
