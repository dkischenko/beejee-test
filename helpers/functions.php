<?php
/**
 * Helper method for debug
 *
 * @param $var
 * @param bool $die
 */
function dd($var, $die = false): void
{
    print_r('<pre>');
    print_r($var);
    print_r('</pre>');
    if ($die) {
        die();
    }
}

/**
 * Trim string
 * @param string $string String to trim
 * @param int    $length Length of result
 * @return string
 */
function trimString($string, $length): string
{
    return mb_strimwidth($string, 0 , $length, "...");
}

/**
 * Reload page after form submit
 *
 * @param $location
 */
function page_redirect($location)
{
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$location.'">';
    exit;
}

/**
 * Replace bad symbols
 *
 * @param string $string
 * @return string
 */
function replace_symbols(string $string):string
{
    return htmlspecialchars(trim(strip_tags($string)));
}