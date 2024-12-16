<?php
/*
Template Name: Contact Us

*/

?>

<?php get_header();?>

<section class='contact-container'>
    <div class='contact-container__text'>
        <h1>With the best location, for your next Look!</h1>
        <p>Central Street of Masatepe, from Bautista Shrine half block to the south, next to Hotchicken.</p>
        <h2>We are waiting for you!</h2>
        <div class='contact-container__text--form'>
        <?= do_shortcode('[contact-form-7 id="9dc1ba7" title="Contact Form"]');?>
        </div>
    </div>
    <div class='contact-container__iframe'>
        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d243.99213293204235!2d-86.14394132912527!3d11.913847254429227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1stemplo%20bautista%20masatepe!5e0!3m2!1ses!2sni!4v1722568058836!5m2!1ses!2sni" 
                width="600" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</section>


<?php get_footer();?>