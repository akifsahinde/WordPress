<?php
/**
* Child theme stylesheet einbinden in Abhängigkeit vom Original-Stylesheet
*/

function child_theme_styles() {
wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
wp_enqueue_style( 'child-theme-css', get_stylesheet_directory_uri() .'/style.css' , array('parent-style'));

}
add_action( 'wp_enqueue_scripts', 'child_theme_styles' );


/**
* Google Fonts aus dem Haupttheme entfernen
*/

function removeGoogleFonts(){
		global $wp_styles;
			$regex = '/fonts\.googleapis\.com\/css\?family/i';
			foreach($wp_styles->registered as $registered) {

				if( preg_match($regex, $registered->src) ) {
					wp_dequeue_style($registered->handle);
				}
			}
		}
add_action('wp_enqueue_scripts', 'removeGoogleFonts', 999);

/**
 *  Einträge und Ressourcen-Hinweise, wie wp.org verbergen
 */
remove_action('wp_head', 'wp_resource_hints', 2);

/**
 *  Um den Device Pixel von Jetpack zu deaktivieren reicht folgende Code-Zeile
 */
function tj_dequeue_devicepx() {
    wp_dequeue_script( 'devicepx' );
}
add_action( 'wp_enqueue_scripts', 'tj_dequeue_devicepx' );

/**
* IP-Adressen bei Kommentaren entfernen
*/

function wp_remove_commentip( $comment_author_ip ) {
return '';
}
add_filter( 'pre_comment_user_ip', 'wp_remove_commentip' );

?>
