<?php 
/**
 * Template Name: Главная страница
 */
get_header();
?>

<main role="main">
    
    <?php 
        get_template_part('template-parts/home/hero');
        get_template_part('template-parts/home/what-we-made');
        get_template_part('template-parts/home/about');
        get_template_part('template-parts/home/team');
        get_template_part('template-parts/home/reviews');
    ?>
    
</main>

<?php get_footer(); ?>