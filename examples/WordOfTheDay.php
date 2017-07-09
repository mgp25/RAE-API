<?php

require __DIR__.'/../vendor/autoload.php';

$debug = true;

$rae = new \RAE\RAE($debug);

$wotd = $rae->getWordOfTheDay();

$word = explode(',', $wotd->getHeader());
echo 'La palabra del día es: '.$word[0]."\n";
