<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<meta name="author" content="Tomasz Boroń">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <?php
        wp_head();
    ?>
</head>
<body>
    <section id="navigation">
        <nav class="navbar navbar-expand-md" id="my-nav">
        <div class="menu-container">
        <nav class="navbar navbar-expand-md">
            <!-- Brand/logo -->
            <?php
                if (function_exists('the_custom_logo')){
                    the_custom_logo();
                }
            ?>
            
            <!-- Links -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">

                <?php
                    wp_nav_menu([
                        'menu' => 'primary',
                        'container' => '',
                        'theme_location' => 'primary',
                        'items_wrap' => '<ul id="" class="navbar-nav ml-auto">%3$s</ul>'
                    ]);
                ?>

                <div class="my-widgets-inner">
                    <div class="widget"> 
                        <i class="fa fa-map-marker"></i> 
                        <div>
                            <p> Tarnów </p>
                            <?php dynamic_sidebar('address') ?> 
                        </div> 
                    </div>
                    <div class="widget"> 
                        <i class="fa fa-clock-o"></i> 
                        <div> 
                            <p> Godziny otwarcia </p>
                            <?php dynamic_sidebar('open-hours') ?> 
                        </div> 
                    </div>
                    <div class="widget"> 
                        <i class="fa fa-phone"></i> 
                        <div> 
                            <p> Rejestracja </p>
                            <?php dynamic_sidebar('phone') ?> 
                        </div> 
                    </div>
                </div>
            </div>
        </nav>
        </div>
        </nav>
        <div class="my-widgets-outer">
            <div class="widget"> 
                <i class="fa fa-map-marker"></i> 
                <div>
                    <p> Tarnów </p>
                    <?php dynamic_sidebar('address') ?> 
                </div> 
            </div>
            <div class="widget"> 
                <i class="fa fa-clock-o"></i> 
                <div> 
                    <p> Godziny otwarcia </p>
                    <?php dynamic_sidebar('open-hours') ?> 
                </div> 
            </div>
            <div class="widget"> 
                <i class="fa fa-phone"></i> 
                <div> 
                    <p> Rejestracja </p>
                    <?php dynamic_sidebar('phone') ?> 
                </div> 
            </div>
        </div>
        
        <div class="branch-links">

        <?php
        $loop = new WP_Query([
            'post_type' => 'branches', 
            'posts_per_page' => -1
        ]);
        while ( $loop->have_posts() ){
            $loop->the_post();
            the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); 
        }?>
        
        </div>
    </section>