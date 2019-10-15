#!/usr/bin/php
<?php
if ($argc > 1)
{
    $array = [];
    $i = 1;
    while ($i < $argc)
    {
        $orig_str = trim($argv[$i]);
        $temp = array_filter(explode(" ", $orig_str), strlen);
        $array = array_merge($array, $temp);
        $i++;
    }
    sort($array);
    foreach($array as $str)
        print_r("$str\n");
}
?>