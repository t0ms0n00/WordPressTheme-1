<footer>
    <div class="footer-content" style="background: url(<?php bloginfo('template_url'); ?>/assets/images/footer_bg.jpg) no-repeat right center; background-size: cover;">
        <div class="contacts">
            <div class="contact-data">
                <div> <h4> <b> Kardiomed </b> </h4> </div>
                <div>
                    <?php dynamic_sidebar('address') ?>
                    <?php dynamic_sidebar('postal-code') ?>
                </div>
                <div>
                    <div class="leftfloater"> <p> Telefon: </p> <?php dynamic_sidebar('phone') ?> </div>
                    <div class="leftfloater"> <p> Mail: </p> <?php dynamic_sidebar('contact-mail') ?> </div>
                </div>
            </div>
            <div class="branches">
                <?php
                    $args = [
                        'post_type' => 'branches',
                        'post_status' => 'publish',
                        'posts_per_page' => '-1',
                        'orderby' => 'title',
                        'order' => 'ASC',
                    ];
                    $loop = new WP_Query($args);
                ?>
                <ul>
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    
                    <li> <a href="<?php echo get_post_permalink() ?>"> <?php the_title(); ?> </a> </li>

                <?php endwhile; wp_reset_query(); ?>
                </ul>
            </div>
        </div>
        <div class="form">
            <p> <b> Formularz kontaktowy </b> </p>
            <?php echo do_shortcode( '[contact-form-7 id="73" title="Kardiomed"]'); ?>
        </div>
        <div class="created-by">
            <div> Wykonanie strony <a href="mailto: tomek.b13@interia.pl"> Tomasz Boroń </a> </div>
            <div class="search-form"> <?php dynamic_sidebar('search-for') ?> </div>
        </div>
    </div>
</footer>

<?php
    wp_footer();
?>
</body>
</html>
