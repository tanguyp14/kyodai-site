<?php

get_header();
?>

<div class="prestation-mobile-logo">
    <a href="<?php echo esc_url(home_url('/')); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/image/LOGO_KYO.png" alt="<?php bloginfo('name'); ?>">
    </a>
</div>

<?php
the_content();

get_footer();
