<?php
//установка часового пояса
//date_default_timezone_set("Europe/Kiev");


print time();
echo '<br>';
//$tomorrow = time()+(24*60*60);
//echo $tomorrow;
//
//echo '<br>';
//
//echo date("I ds FY h:i:s A");
//echo '<br>';
//echo date("Today d.m.Y");
echo'<hr>';

$now = new DateTime();
echo $now->format(DATE_ATOM);
echo '<br>';
echo $now->getTimestamp();
