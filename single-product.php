<?php
/*
Template Name: Single Products

*/

?>

<?php get_header();?>


<?
// Getting the Custom Fields to render each product Individually

$SINGLE_PRODUCT_DISPLAY_IMAGE = get_field('product_display_image');
$SINGLE_PRODUCT_NAME = get_field('product_name');
$SINGLE_PRODUCT_DESCRIPTION = get_field('product_description');
$SINGLE_PRODUCT_PRICE = get_field('product_price');

?>

<main class='product-container'>
    <div class='product-container__wrapper'>
        <div class='product-container__wrapper--image'>
            <img src="<?=$SINGLE_PRODUCT_DISPLAY_IMAGE?>" alt=".">
        </div>

        <div class='product-container__wrapper--info'>    
            <h1><?=$SINGLE_PRODUCT_NAME?></h1>
            <p><?=$SINGLE_PRODUCT_DESCRIPTION?></p>
            <span>$ <?=$SINGLE_PRODUCT_PRICE?></span>
            <a target='_blank' href='https://wa.me/+50558600000'>Quote</a>
        </div>
    </div>
</main>


<?php get_footer();?>