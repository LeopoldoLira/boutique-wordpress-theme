<?php
/*
Template Name: Products
*/

get_header(); ?>

<main class='catalogue-container'>
    <aside>
        <?= get_search_form(); ?>
    </aside>
    <section class='catalogue-container__products' id="products-list">
        <?php
            $LOOP = new WP_Query(array(
                'post_type' => 'product',
                'posts_per_page' => -1,
            ));

            if ($LOOP->have_posts()) :
                while ($LOOP->have_posts()) : $LOOP->the_post();
                    $PRODUCT_DISPLAY_IMAGE = get_field('product_display_image');
                    $PRODUCT_NAME = get_field('product_name');
                    $PRODUCT_PRICE = get_field('product_price');
        ?>
                    <div>
                        <article>
                            <a href='<?= the_permalink(); ?>'>
                                <img src="<?= $PRODUCT_DISPLAY_IMAGE ?>" alt=".">
                            </a>
                            <div>
                                <h2><?= $PRODUCT_NAME; ?></h2>
                                <span>$ <?= $PRODUCT_PRICE; ?></span>
                            </div>
                        </article>
                    </div>
        <?php
                endwhile;
                wp_reset_postdata();
            endif;
        ?>
    </section>
</main>

<script>
    document.getElementById('product-search-form').addEventListener('submit', function(event) {
        event.preventDefault();
        var searchQuery = document.querySelector('.search-field').value;
        
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '<?php echo esc_url(home_url('/')); ?>wp-admin/admin-ajax.php?action=search_products&query=' + searchQuery, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                document.getElementById('products-list').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    });
</script>

<?php get_footer(); ?>
