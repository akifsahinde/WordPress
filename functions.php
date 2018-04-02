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