</div><!-- .main-content -->
<?php if ( ! empty( wp_get_nav_menu_items( 'partnerzy' ) ) ) {
    ?>
    <section class="bsk-partners <?= is_single() ? 'bg-color-white' : 'bg-color-light-sand' ?>">
        <div class="container bsk-ads py-3 py-sm-5">
            <h2 class="bsk-ads__title mb-3 mb-sm-5">
                Nasi Partnerzy
            </h2>
            <?php
            wp_nav_menu( array(
                'menu' => 'partnerzy',
                'menu_class' => 'list-unstyled row justify-content-center',
                'container' => false,
                'walker' => new ACF_Walker_Nav_Menu(),
            ) );
            ?>
        </div>
    </section>
<?php } ?>
<div class="bsk-facebook-box">
    <button class="bsk-facebook-box__button filter-sepia"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/fb.jpg"></button>
    <div class="bsk-facebook-box__fb-like-box fb-like-box" data-href="https://www.facebook.com/BOXERNIA.SERCA.KRAKOWA" data-width="300" data-height="500" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
</div>

<?php
// echo "id: ".get_current_blog_id()
?>

<?php
// switch_to_blog(1);
?>

<button class="bsk-btn-back-to-top" aria-label="Back to top"></button>

<footer class="bsk-footer py-5">
    <div class="container text-center text-lg-start">
        <div class="row">
            <div class="col-sm-6 col-lg-3 mb-3">
                <h2 class="h4 mb-3">Kontakt</h2>
                <address>
                    <?php echo wpautop(get_option('footer_field_1')); ?>
                </address>
                <img class="filter-sepia" src="<?=get_bloginfo('template_directory') ?>/assets/images/logo6.png" alt="BSK Boxernia" />
            </div>
            <div class="col-sm-6 col-lg-3 mb-3">
                <h2 class="h4 mb-3">Social linki</h2>
                <?php wp_nav_menu( array(
                    'menu' => 'socials',
                    'container' => 'nav'
                ));  ?>
            </div>
            <div class="col-sm-6 col-lg-3 mb-3">
                <h2 class="h4 mb-3">Menu główne</h2>
                <?php wp_nav_menu( array(
                    'menu' => 'main-menu',
                    'container' => 'nav',
                    'menu_class' => 'ajax-menu',
                ));  ?>
            </div>
            <div class="col-sm-6 col-lg-3 mb-3">
                <h2 class="h4 mb-3">Witryna</h2>
                <?php wp_nav_menu( array(
                    'menu' => 'footer-menu',
                    'container' => 'nav',
                    'menu_class' => 'ajax-menu',
                ));  ?>
            </div>
            <div class="col bsk-footer__copyright">
                <p class="pt-3 mb-0"><?php echo get_option('footer_field_2'); ?></p>
            </div>
        </div>
    </div>
</footer>

<?php
// restore_current_blog();
?>
<?php wp_footer(); ?>
<div class="bsk-cookies-banner py-3 py-md-5">
    <div class="container text-center">
        <?php if(get_current_blog_id() == 1) {?>
            <p>Ta strona używa plików cookies do celów statystycznych.</p>
            <p>
                <button class="bsk-btn-1 bsk-cookies-banner__accept-cookies-btn">Akceptuj</button> lub
                <button class="bsk-btn-1 bsk-cookies-banner__reject-cookies-btn">Odrzuć</button>
            </p>
        <?php } else { ?>
            <p>This website uses cookies for statistical purposes.</p>
            <p>
                <button class="bsk-btn-1 bsk-cookies-banner__accept-cookies-btn">Accept</button> or
                <button class="bsk-btn-1 bsk-cookies-banner__reject-cookies-btn">Reject</button>
            </p>
        <?php }?>
    </div>
</div>
<!--<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>-->
<script type="module" src="<?=get_bloginfo('template_directory') ?>/assets/js/scripts/swiper-bundle.min.js"></script>
<script type="module" src="<?=get_bloginfo('template_directory') ?>/assets/js/scripts.js"></script>
<script>



</script>
</body>
</html>