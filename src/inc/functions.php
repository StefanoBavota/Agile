<?php

function esc_html($str)
{
    return htmlspecialchars($str);
}

function random_string()
{
    return substr(md5(mt_rand()), 0, 20);
}