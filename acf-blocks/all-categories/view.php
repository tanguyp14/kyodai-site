<!-- <?php
// $fields = get_fields();
// extract($fields);
?> -->
<section class="paiheme_all_categories">
<?php
$exclude_term = get_term_by('name', 'Non classé', 'product_cat');
$product_categories = get_terms('product_cat', array('hide_empty' => 0, 'exclude' => array($exclude_term->term_id)));

foreach ($product_categories as $product_category) {
        $cat_thumb_id = get_term_meta($product_category->term_id, 'thumbnail_id', true);

        $term_link = get_term_link($product_category, 'product_cat');
        
        echo '<a href="' . $term_link . '">';

        if ($cat_thumb_id) {
                $shop_catalog_img = wp_get_attachment_image_src($cat_thumb_id, 'full');
                echo '<img src="' . $shop_catalog_img[0] . '" alt="' . $product_category->name . '">';
        } else {
                echo '<div style="background-color: var(--grey-ll);"></div>'; // Remplacez 300px par la hauteur souhaitée
        }

        echo '<h2>' . $product_category->name . '</h2>';
        echo '</a>';
}
?>
</section>
