#!/usr/bin/php
<?php
function ft_is_sort($array) {
   $a = $array;
   $b = $array;
   sort($b);
   if ($a == $b){
       return true;
   } else {
       return false;
   }
}
?>