<?php
    get_header();
?>

<?php
    if(have_posts()){
        while(have_posts()){
            the_post();
            ?>

            <div class="news-head">
                <div class="news-title archive-title"> <?php the_title(); ?> </div>
            </div>

            <div class="archive-article">
                <?php if (has_post_thumbnail( $post->ID ) ):
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                    <img src="<?php echo $image[0]; ?>" onerror="this.style.display='none'" class="article-img">
                <?php endif; ?>
                
                <div class="news-content"> <?php the_excerpt(); ?> </div>
            </div>
            <?php
        }
    }
?>

<div class="pagination">
    <?php the_posts_pagination() ?>
</div>

<?php
    get_footer();
?>    
