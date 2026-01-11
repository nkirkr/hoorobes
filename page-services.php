<?php 
/**
 * Template Name: Услуги
 */
get_header();
?>

<main role="main" class="services-page">
    
    <?php 
        get_template_part('template-parts/services/hero');
        get_template_part('template-parts/services/catalog');
    ?>
    
</main>

<?php get_footer(); ?>