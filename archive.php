<?php
/**
 * Diese Codezeilen für Archive.php zeigen eine einfache Möglichkeit für die Ausgabe eines Kategorie-Titels und einer 
 * Kategorie-Description in WordPress. Der Titel ist ein <div> Element eingebettet mit einer Ausrichtung und Klasse. 
 * Außerdem wird die <h1> dem Kategorie-Titel zugewiesen. Der Eintrag unter WordPress in der Kategorie, dient als 
 * Kategorie Description. Dieser kann ebenfalls ausgegeben werden. Es wurde im gleichen <div> abgelegt, könnte aber 
 * auch eine eigene Klasse und Ausrichtung zugewiesen bekommen.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @link        https://www.akifsahin.de
 * @author      Akif Sahin <kontakt@akifsahin.de>
 * @copyright   Copyright (c) 2018, Akif Sahin
 */

echo '<div align="center" class="hentry"><h1>';
echo single_cat_title();
echo '</h1>';
echo category_description();
echo '</div>';
?>
