<?php

/**
 * Convert array to json.
 *
 * @param  $value
 */
function setJsonData($value)
{
    array_walk_recursive($value, function (&$item, $key) {
        $item = null === $item ? '' : $item;
    });
    return $value;
}
