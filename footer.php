






<footer class='footer'>
    <div class='footer__floating-button'>
        <a target='_blank' href='https://wa.me/+50558600000'>
            <img src='/wp-content/themes/darlingboutique/assets/images/whatsapplogo.png'/>
        </a>
    </div>

    <?
        $FOOTER_LOGO = get_field('header_logo','option');
    ?>

    <div class="footer__container">
        <div class='footer__container--brand'>
            <div class='footer__container--brand-logo'>
                <img src="<?=$FOOTER_LOGO;?>" alt="">
            </div>
            <div class='footer__container--brand-social'>
                <p>
                    Discover effortles glamour at darlingboutique!<br/>
                    Shop chic, sophisticated clothing for every <br/>
                    ocassion. From formal shirts to stunning <br/>
                    dresses, we've got you covered. Upgrade <br/>
                    your style with ease - shop now!
                </p>
                <div>
                    <picture>
                        <img src="http://darlingboutique.local/wp-content/uploads/2024/07/instagram-svgrepo-com.png" alt="Facebook Hyperlink">
                    </picture>
                    <picture>
                        <img src="http://darlingboutique.local/wp-content/uploads/2024/07/facebook-svgrepo-com.png" alt="Instagram Hyperlink">
                    </picture>
                </div>
            </div>
        </div>
        <div class='footer__container--sitemap'>
            <h2>Sitemap</h2>
            <nav>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/catalogo">Catalogue</a></li>
                    <li><a href="/contacto">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </div>


<?php wp_footer();?>


<script defer>
    const swiper = new Swiper('.swiper', {
    slidesPerView: 4,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
});
</script>
</body>
</html>