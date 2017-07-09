<?php

require __DIR__.'/../vendor/autoload.php';

$debug = true;

$rae = new \RAE\RAE($debug);

$search = $rae->searchWord('hola');
$wordId = $search->getRes()[0]->getId();

$result = $rae->fetchWord($wordId);
$defintions = $result->getDefinitions();

$i = 1;
foreach ($defintions as $definition) {
    echo $i.'. Tipo: '.$definition->getType()."\n";
    echo '   Definición: '.$definition->getDefinition()."\n\n";
    $i++;
}
