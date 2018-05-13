<?php
/**
 * Diese Codezeilen für Archive.php zeigen eine einfache Möglichkeit für die Ausgabe eines Kategorie-Titels und einer 
 * Kategorie-Description in WordPress. Der Titel ist in ein <div> Element eingebettet mit einer Ausrichtung und Klasse. 
 * Außerdem wird die <h1> dem Kategorie-Titel zugewiesen. Die eingetragene Beschreibung im WordPress-Backend in der Kategorie, dient als 
 * Kategorie Description. Dieser kann ebenfalls ausgegeben werden. Es wurde im gleichen <div> abgelegt, könnte aber 
 * auch eine eigene Klasse und Ausrichtung zugewiesen bekommen.
 * 
 * Arbeit basiert auf dem Haupttemplate von Rich Tabor (Tabor)
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package     Tabor
 * @link        https://themebeans.com/themes/tabor
 * @author      Rich Tabor of ThemeBeans <hello@themebeans.com>
 * @copyright   Copyright (c) 2018, ThemeBeans of Inventionn
 * @license     GPL-3.0
 *
 * @link        https://www.akifsahin.de
 * @author      Akif Sahin <kontakt@akifsahin.de>
 * @copyright   Copyright (c) 2018, Akif Sahin
 */

get_header();

echo '<div align="center" class="hentry"><h1>';
echo single_cat_title();
echo '</h1>';
echo category_description();
echo '</div>';

if ( have_posts() ) :

	while ( have_posts() ) :

		the_post();

		get_template_part( 'components/post/content', get_post_format() );

	endwhile;

	the_posts_pagination(
		array(
			'prev_text'          => wp_kses( tabor_get_svg( array( 'icon' => 'left' ) ), tabor_svg_allowed_html() ) . '<span class="screen-reader-text">' . __( 'Previous page', 'tabor' ) . '</span>',
			'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'tabor' ) . '</span>' . wp_kses( tabor_get_svg( array( 'icon' => 'right' ) ), tabor_svg_allowed_html() ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'tabor' ) . ' </span>',
		)
	);

else :
	get_template_part( 'components/post/content', 'none' );
endif;

get_footer();
