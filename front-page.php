<?php
    get_header();
?>

<section id="welcome-container">
    <div class="main-slider">
        <!--Slide One-->
        <div class="card main-card" style="background: url(<?php bloginfo('template_url'); ?>/assets/images/header_bg.jpg) no-repeat center center; background-size: cover;">
            <div class="main-card-inner">
                <h1> Twoje zdrowie ma dla nas </h1>
                <h2> najwyższy priorytet </h2>
                <a href="<?php echo get_page_link( get_page_by_title( "O nas" )->ID ); ?>"> Czytaj więcej </a>
            </div>
        </div>
        <!--Slide Two-->
        <div class="card main-card" style="background: url(<?php bloginfo('template_url'); ?>/assets/images/header_bg.jpg) no-repeat center center; background-size: cover;">
            <div class="main-card-inner">
                <h1> Twoje zdrowie ma dla nas </h1>
                <h2> najwyższy priorytet </h2>
                <a href="<?php echo get_page_link( get_page_by_title( "O nas" )->ID ); ?>"> Czytaj więcej </a>
            </div>
        </div>
        <!--Slide Three-->
        <div class="card main-card" style="background: url(<?php bloginfo('template_url'); ?>/assets/images/header_bg.jpg) no-repeat center center; background-size: cover;">
            <div class="main-card-inner">
                <h1> Twoje zdrowie ma dla nas </h1>
                <h2> najwyższy priorytet </h2>
                <a href="<?php echo get_page_link( get_page_by_title( "O nas" )->ID ); ?>"> Czytaj więcej </a>
            </div>
        </div>
    </div>
</section>

<section id="desc">
    <div class="two-col-grid">
        <div class="left">
            <h1> Witaj w naszej przychodni </h1>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vel facilisis ligula. Etiam sit amet venenatis est. Praesent vitae tristique eros. Fusce a placerat urna, vitae faucibus mi. Fusce et pulvinar dolor. Etiam dictum diam sed ante sollicitudin maximus. Quisque purus erat, tincidunt vel purus vel, interdum imperdiet nisi. Duis eu dolor convallis, aliquam nisi consequat, aliquet eros.</p>
            <img src="<?php bloginfo('template_url'); ?>/assets/images/w_doc.jpg" alt="doctor">
        </div>
        <div class="right">
            <img src="<?php bloginfo('template_url'); ?>/assets/images/w_patient.jpg" alt="patient">
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vel facilisis ligula. Etiam sit amet venenatis est. Praesent vitae tristique eros. Fusce a placerat urna, vitae faucibus mi. Fusce et pulvinar dolor. Etiam dictum diam sed ante sollicitudin maximus. Quisque purus erat, tincidunt vel purus vel, interdum imperdiet nisi. Duis eu dolor convallis, aliquam nisi consequat, aliquet eros.</p>
            <a href="<?php echo get_page_link( get_page_by_title( "Galeria" )->ID ); ?>"> Czytaj więcej </a>
        </div>
    </div>
</section>

<section id="visit">
    <div class="two-col-grid">
        <div class="left">
            <i class="fa fa-phone"></i>
            <h1> Umów swoją wizytę już dziś </h1>
            <h2> Zostaw do siebie kontakt, a oddzwonimy </h2>
            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vel facilisis ligula. </p>
            <a href="<?php echo get_page_link( get_page_by_title( "Kontakt" )->ID ); ?>"> Dowiedz się więcej </a>
        </div>
        <div class="right">
            <img src="<?php bloginfo('template_url'); ?>/assets/images/register.jpg" alt="register_now">
        </div>
    </div>
    <img src="<?php bloginfo('template_url'); ?>/assets/images/phone.png" alt="phone">
</section>

<section id="counters">
    <div class="counters-deck">
        <div class="card description-card">
            <p> <b> Przemawia za nami </b> wiedza i doświaczenie </p>
        </div>
        <div class="card counter-card">
            <div class="counter-icon"> <i class="fa fa-calendar"></i> </div>
            <div class="counter" data-target="20"> 0 </div>
            <p> Lat działalności </p>
        </div>
        <div class="card counter-card">
            <div class="counter-icon"><i class="fa fa-user-md"></i> </div>
            <div class="counter" data-target="8"> 0 </div>
            <p> Lekarzy specjalistów </p>
        </div>
        <div class="card counter-card">
            <div class="counter-icon"> <i class="fa fa-stethoscope"></i> </div>
            <div class="counter" data-target="12"> 0 </div>
            <p> Poradni specjalistycznych </p>
        </div>
        <div class="card counter-card">
            <div class="counter-icon"> <i class="fa fa-users "></i> </div>
            <div class="counter" data-target="30000"> 0 </div>
            <p> Zadowolonych pacjentów </p>
        </div>
    </div>
</section>

<section id="branches">
    <p>Nasze poradnie</p>
    <div class="branches-grid">
        <?php
            $args = [
                'post_type' => 'branches',
                'post_status' => 'publish',
                'posts_per_page' => '-1',
                'order' => 'ASC',
            ];
            $loop = new WP_Query($args);
        ?>
        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
            <a href="<?php echo get_post_permalink() ?>">
                <div class="branch-elem">
                    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                        <div class="img-cont"> <img src="<?php echo $image[0]; ?>" alt="Branch"> </div>
                    <?php endif; ?>

                    <p> <?php the_title(); ?> </p>
                </div> 
            </a>
        <?php endwhile; wp_reset_query(); ?>
    </div>
</section>

<section id="articles">
    <div class="two-col-grid">
    <div class="left">

        <?php
            $args = [
                'post_type' => 'news',
                'post_status' => 'publish',
                'posts_per_page' => '1',
                'order' => 'DESC',
            ];
            $loop = new WP_Query($args);
        ?>
        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                <img src="<?php echo $image[0]; ?>" alt="News" class="for-mobile">
            <?php endif; ?>
            
            <p class="the-date"> <?php echo get_the_date(); ?> </p>
            <h1> <?php the_title(); ?> </h1>
            <p> <?php the_excerpt(); ?> </p>

            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                <img src="<?php echo $image[0]; ?>" alt="News" class="larger">
            <?php endif; ?>
        <?php endwhile; wp_reset_query(); ?>

    </div>
    <div class="right">

        <?php
            $args = [
                'post_type' => 'news',
                'post_status' => 'publish',
                'posts_per_page' => '3',
                'order' => 'DESC',
                'offset' => '1',
            ];
            $loop = new WP_Query($args);
        ?>
        <?php while ($loop->have_posts()) : $loop->the_post(); ?>
            <div class="mini-post">
                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                    <img src="<?php echo $image[0]; ?>" alt="News">
                <?php endif; ?>
                <div class="content">
                    <p class="the-date"> <?php echo get_the_date(); ?> </p>
                    <h1> <?php the_title(); ?> </h1>
                    <p> <?php the_excerpt(); ?> </p>
                </div>
            </div>
            
        <?php endwhile; wp_reset_query(); ?>
        
        <a href="<?php echo get_post_type_archive_link( "news" ); ?>"> Więcej wiadomości </a>

    </div>
</section>

<?php
    get_footer();
?>    
