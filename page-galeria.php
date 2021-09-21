<?php
    get_header();
?>

<?php
    if(have_posts()){
        while(have_posts()){
            the_post();
            dynamic_sidebar('gallery-photos');
        }
    }
?>

<?php
    get_footer();
?>    
