<?php

declare(strict_types=1);

\defined('ABSPATH') || exit('File cannot be opened directly!');

/**
 * In this file can be added more Custom Patterns.
 * Each Pattern should be in the separate directory.
 */
foreach (\glob(get_stylesheet_directory()  . '\/patterns\/**\/*.php') as $patern) {
    include_once $patern;
}
