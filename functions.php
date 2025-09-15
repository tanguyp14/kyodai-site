<?php

require_once 'inc-functions/cpt.php';
require_once 'inc-functions/register-menus.php';
require_once 'inc-functions/register-styles.php';
require_once 'inc-functions/register-scripts.php';
require_once 'inc-functions/acf-options-page.php';

/**
 * Essential theme supports
 * */
add_action('after_setup_theme','kyodai_theme_setup');
function kyodai_theme_setup(){
    /** tag-title **/
    add_theme_support( 'title-tag' );

    /** post-thumnails **/
	add_theme_support( 'post-thumbnails' );

	/** editor-styles **/
	add_theme_support( 'editor-styles' );

	/** editor-styles-css **/
	add_editor_style( 'editor.css' );

	/** Load block styles on frontend **/
	add_theme_support( 'wp-block-styles' );

	/** Align wide **/
	add_theme_support( 'align-wide' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}

/**
 * Add custom logo for admin login screen and link to homepage
 */
function kyodai_filter_login_head() {

	if ( has_custom_logo() ) {
		$image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
		?>
		<style type="text/css">
			.login h1 a {
				background-image: url(<?php echo esc_url( $image[0] ); ?>);
				-webkit-background-size: contain;
				background-size: contain;
				height: 80px;
				width: 200px;
			}
		</style>
		<?php
	}
}
add_action( 'login_head', 'kyodai_filter_login_head', 100 );

function kyodai_new_wp_login_url() {
	return home_url();
}
add_filter('login_headerurl', 'kyodai_new_wp_login_url');



/**
 * Format a given value by removing uppercase letters, replacing spaces with dashes, and replacing single quotes with underscores.
 *
 * @param string $value The value to format.
 * @return string The formatted value.
 */
function formatValue($value) {
	$formattedValue = strtolower($value); // Convert to lowercase
	$formattedValue = str_replace(' ', '-', $formattedValue); // Replace spaces with dashes
	$formattedValue = str_replace("'", '_', $formattedValue); // Replace single quotes with underscores

	return $formattedValue;
}

function autoriser_upload_json($mime_types) {
    // Ajout du type MIME pour les fichiers JSON
    $mime_types['json'] = 'application/json';
    return $mime_types;
}
add_filter('upload_mimes', 'autoriser_upload_json');

// Désactiver la vérification MIME pour les fichiers JSON uniquement
function desactiver_verification_json($data, $file, $filename, $mimes) {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if ($ext === 'json') {
        $data['ext'] = 'json';
        $data['type'] = 'application/json';
    }
    return $data;
}
add_filter('wp_check_filetype_and_ext', 'desactiver_verification_json', 10, 4);


remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');

// Désactiver l'ajout d'auteur automatique dans les balises Open Graph
remove_action('wp_head', 'wp_author_meta_tag');

// Handler AJAX pour filtrer les prestations
function filter_prestations_ajax() {
    $category = sanitize_text_field($_GET['category']);
    
    $args = array(
        'post_type' => 'prestation',
        'posts_per_page' => -1,
    );
    
    // Si ce n'est pas "all", on filtre par taxonomie
    if ($category !== 'all') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'category', // Utilise la taxonomie 'category' que vous avez sélectionnée
                'field'    => 'slug',
                'terms'    => $category,
            )
        );
    }
    
    $prestations_query = new WP_Query($args);
    
    if ($prestations_query->have_posts()) : ?>
        <ul class="prestations-list">
            <?php while ($prestations_query->have_posts()) : $prestations_query->the_post(); ?>
                <li class="prestation-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="prestation-image">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>
                        <h3 class="prestation-title"><?php the_title(); ?></h3>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p>Aucune prestation trouvée pour cette catégorie.</p>
    <?php endif;
    
    wp_die(); // Important pour terminer la requête AJAX
}

// Hook pour les utilisateurs connectés et non connectés
add_action('wp_ajax_filter_prestations', 'filter_prestations_ajax');
add_action('wp_ajax_nopriv_filter_prestations', 'filter_prestations_ajax');


/**
 * Autorise l'upload de fichiers SVG + sécurise l'affichage
 */
function allow_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');

/**
 * Nettoie les SVG uploadés pour éviter les failles XSS
 */
function sanitize_svg($file) {
    $svg_path = $file['tmp_name'];
    if (!empty($svg_path) && $file['type'] === 'image/svg+xml') {
        $svg_content = file_get_contents($svg_path);
        // Supprime les balises script/onload malveillantes
        $svg_content = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $svg_content);
        $svg_content = preg_replace('/on\w+="[^"]*"/', '', $svg_content);
        file_put_contents($svg_path, $svg_content);
    }
    return $file;
}
add_filter('wp_handle_upload', 'sanitize_svg');