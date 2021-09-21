<?php

function cardiomed_theme_support(){
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'cardiomed_theme_support');

function cardiomed_menus(){
    $locations = [
        'primary' => 'Desktop Primary Top Sidebar',
        'footer' => 'Footer Menu Items'
    ];
    register_nav_menus($locations);
}

add_action('init', 'cardiomed_menus');

function cardiomed_register_styles(){
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style( 'slick-css', untrailingslashit( get_template_directory_uri() ) . '/assets/src/library/css/slick.css', [], false, 'all' );
    wp_enqueue_style( 'slick-theme-css', untrailingslashit( get_template_directory_uri() ) . '/assets/src/library/css/slick-theme.css', ['slick-css'], false, 'all' );
    wp_enqueue_style('cardiomed-fa', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css", array(), '4.7.0', 'all');
    wp_enqueue_style('cardiomed-bootstrap', "https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css", array(), '4.5.2', 'all');
    wp_enqueue_style('cardiomed-custom', get_template_directory_uri() . "/style.css", array(), $version, 'all');
}

add_action('wp_enqueue_scripts', 'cardiomed_register_styles');

function cardiomed_register_scripts(){
    wp_enqueue_script('cardiomed-jquery', "https://code.jquery.com/jquery-3.6.0.min.js", array(), "3.6.0", true);
    wp_enqueue_script('cardiomed-bootstrap', "https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js", array(), "4.5.2", true);
    wp_enqueue_script('cardiomed-popper', "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js", array(), "1.16.0", true);
    wp_enqueue_script( 'slick-js', untrailingslashit( get_template_directory_uri() ) . '/assets/src/library/js/slick.min.js', ['jquery'], false , true );
    wp_enqueue_script( 'cardiomed-carousel-js', untrailingslashit( get_template_directory_uri() ) . '/assets/src/carousel/index.js', ['jquery', 'slick-js'], filemtime( untrailingslashit( get_template_directory() ) . '/assets/src/carousel/index.js' ), true );
    wp_enqueue_script( 'cardiomed-counter-js', untrailingslashit( get_template_directory_uri() ) . '/assets/js/counter.js', ['jquery'], filemtime( untrailingslashit( get_template_directory() ) . '/assets/js/counter.js' ), true );
}

add_action('wp_enqueue_scripts', 'cardiomed_register_scripts');

function new_excerpt_more($more) {
    global $post;
    return '… <a href="'. get_permalink($post->ID) . '">' . 'Czytaj więcej' . '</a>';
}

add_filter('excerpt_more', 'new_excerpt_more');

function cardiomed_widgets_init(){
    register_sidebar([
        'name' => esc_html__('Adres', 'cardiomed'),
        'id' => 'address',
        'description' => esc_html__( 'Wpisz swój adres'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ]);
    register_sidebar([
        'name' => esc_html__('Godziny otwarcia', 'cardiomed'),
        'id' => 'open-hours',
        'description' => esc_html__( 'Wpisz godziny otwarcia'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ]);
    register_sidebar([
        'name' => esc_html__('Telefon', 'cardiomed'),
        'id' => 'phone',
        'description' => esc_html__( 'Wpisz swój telefon'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ]);
    register_sidebar([
        'name' => esc_html__('Kod pocztowy', 'cardiomed'),
        'id' => 'postal-code',
        'description' => esc_html__( 'Wpisz kod pocztowy'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ]);
    register_sidebar([
        'name' => esc_html__('Mail kontaktowy', 'cardiomed'),
        'id' => 'contact-mail',
        'description' => esc_html__( 'Wpisz adres mail'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ]);
    register_sidebar([
        'name' => esc_html__('Zdjęcia do galerii', 'cardiomed'),
        'id' => 'gallery-photos',
        'description' => esc_html__( 'Dodaj zdjęcia do galerii'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ]);
    register_sidebar([
        'name' => esc_html__('Szukaj', 'cardiomed'),
        'id' => 'search-for',
        'description' => esc_html__( 'Widżet w którym ustawiamy tytuł wyszukiwarki'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ]);
}

add_action('widgets_init', 'cardiomed_widgets_init');

function create_post_type() {
    register_post_type( 'news',
        array(
            'labels' => array(
                'name' => __( 'News' ),
                'singular_name' => __( 'News' )
            ),
        'public' => true,
        'has_archive' => true,
        )
    );
    register_post_type( 'branches',
        array(
            'labels' => array(
                'name' => __( 'Branches' ),
                'singular_name' => __( 'Branch' )
            ),
        'public' => true,
        'has_archive' => true,
        )
    );
}

add_action( 'init', 'create_post_type' );

?>