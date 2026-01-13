<?php 
/**
 * Template Name: Подбор услуги
 */
get_header();
?>

<main role="main" class="selection">
    <div class="selection__bg">
    <div class="selection__bg-image"></div>
    </div>

    <div class="container">
    <div class="selection__container">
        <h1 class="selection__main-title">Подобрать услугу</h1>

        <?php get_template_part('template-parts/calculator/params'); ?>

        <button
        class="selection__result-btn disabled"
        data-modal-open="selectionResultModal"
        disabled
        >
        <span>Результат</span>
        </button>
    </div>
    </div>
</main>

<?php 
get_template_part('template-parts/calculator/result-modal'); 
get_footer(); 
?>