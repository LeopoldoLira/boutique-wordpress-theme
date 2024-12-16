<?php get_header(); ?>


<!-- Hero Section -->
<section class='hero-section'>
    <?
        $HERO_IMAGE = get_field('hero_image');
        $HERO_SUB_HEADING = get_field('hero_sub_heading');
        $HERO_HEADING = get_field('hero_heading');
        $HERO_CTA = get_field('hero_cta');
    ?>
    <div class='hero-section__text'>
        <h1><?=$HERO_HEADING?></h1>
        <p><?=$HERO_SUB_HEADING?></p>
        <a href='/catalogo'><?=$HERO_CTA?></a>
    </div>
    <div class='hero-section__image'>
        <div>
            <img src='<?=$HERO_IMAGE;?>' alt='Hero Background'/>
        </div>
    </div>
</section>


<!-- Brands slider Section -->
<section class='brands-slider'>
    <div class='brands-slider__track'>
        <?
                    // Check if the rows of the repeater exists.
            if( have_rows('home_images_slider') ):

                // If they exists loop through all the values available within the repeater
                while( have_rows('home_images_slider') ) : the_row();

                    // Load the values of each individual value for each row
                    $HOME_SINGLE_SLIDE = get_sub_field('home_single_slide');
                    ?>
                        <div class="brands-slider__track-slide">
                            <img src='<?=$HOME_SINGLE_SLIDE;?>' alt="">
                        </div>
                    <?
                // End loop.
                endwhile;

            endif;
        ?>

    </div>
</section>


<section class='clothes-section'>
    <div class='clothes-section__heading'>
        <h2>Newest Merchandise</h2>
    </div>
</section>



<!-- Slider main container -->
<div class="swiper">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper ">
    <!-- Slides -->

    <?
            $LOOP = new WP_Query( array(
                'post_type' => 'product',
                'posts_per_page' => 10,
            ));

            if( $LOOP->have_posts()):
                while($LOOP->have_posts()): $LOOP-> the_post();
                
                $PRODUCT_DISPLAY_IMAGE = get_field('product_display_image');
                $PRODUCT_NAME = get_field('product_name');
                $PRODUCT_PRICE = get_field('product_price');
        ?>

                <div class='swiper-slide'>
                    <article>
                        <a href='<?=the_permalink();?>'>
                            <img src="<?=$PRODUCT_DISPLAY_IMAGE?>" alt=".">
                        </a>
                        <div>
                            <h2><?=$PRODUCT_NAME;?></h2>
                            <span>$ <?=$PRODUCT_PRICE;?></span>
                        </div>
                    </article>
                </div>

                <?
        endwhile;

        wp_reset_postdata(); // Reset the global $post object

    endif;
    ?>
  </div>

  <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>



<section class="season-promo-section">
    <?
        $COLLECTION_IMAGE = get_field('collection_image');
        $COLLECTION_HEADING = get_field('collection_titulo');
        $COLLECTION_PROMO = get_field('collection_promo');
        $COLLECTION_DATE = get_field('collection_date');
        $COLLECTION_TERMS = get_field('collection_terms');
    ?>
    <div class="season-promo-section__wrapper">
        <div class="season-promo-section__wrapper-image">
            <img src="<?=$COLLECTION_IMAGE?>" alt="">
        </div>
        <div class="season-promo-section__wrapper-promo">
            <h2><?=$COLLECTION_HEADING?></h2>
            <h3><?=$COLLECTION_PROMO?></h3>
            <p><?=$COLLECTION_DATE?></p>
            <span><?=$COLLECTION_TERMS?></span>
            <a href="/catalogo">Check Catalogue Now</a>
        </div>

    </div>
</section>


<?php get_footer(); ?>