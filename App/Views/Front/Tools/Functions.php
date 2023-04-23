<?php

// To truncates a given text to a specified character limit and adds '...' at the end.

function truncateText($text, $limit)
{
    if (strlen($text) > $limit) {
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' ')) . '...';
    }
    return $text;
}
