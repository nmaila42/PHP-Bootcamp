#!/usr/bin/php
<?php
   $i = 1;
   $cup = explode(" ",$argv[1]);
   while ($cup[$i])
   {
       print $cup[$i]. " ";
       $i++;
   }
  echo $cup[0];
  echo "\n";
?>