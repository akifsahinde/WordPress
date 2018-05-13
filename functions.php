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
 *  Fonts in das eigene Theme integrieren, über eine Funktion für das im Einsatz befindliche Theme. In diesem Fall Tabor
*/

if ( ! function_exists( 'tabor_fonts_url' ) ) :
	/**
	 * Register custom fonts.
	 */
	function tabor_fonts_url() {
		$fonts_url = '';

		/*
		 * Translators: If there are characters in your language that are not
		 * supported by Heebo, translate this to 'off'. Do not translate
		 * into your own language.
		 */
		$heebo = esc_html_x( 'on', 'Heebo font: on or off', 'tabor' );

		/*
		 * Translators: If there are characters in your language that are not
		 * supported by Lora, translate this to 'off'. Do not translate
		 * into your own language.
		 */
		$lora = esc_html_x( 'on', 'Lora font: on or off', 'tabor' );

		if ( 'off' !== $heebo || 'off' !== $lora ) {
			$font_families = array();

			if ( 'off' !== $heebo ) {
				$font_families[] = 'Heebo:400,500,800';
			}

			if ( 'off' !== $lora ) {
				$font_families[] = 'Lora:400,400i,700';
			}

			$query_args = array(
				'family' => rawurlencode( implode( '|', $font_families ) ),
				'subset' => rawurlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $query_args, 'https://www.akifsahin.de/css' );
		}

		return esc_url_raw( $fonts_url );
	}
endif;
