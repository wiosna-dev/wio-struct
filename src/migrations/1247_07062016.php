<?php

use \WioStruct\Core\StructDefinition as StructDefinition;

require_once('../../../../autoload.php');
require_once('../examplePixieConnect.php');

$wioStruct = new WioStruct\WioStruct($qb);

$administrativeDef = (new StructDefinition)
    ->networkName('administrative');

$powiatId = $wioStruct->structQuery(
        (new StructDefinition)
            ->networkName('administrative')
            ->nodeTypeName('powiat')
        )->getId('NodeType');

$cityId = $wioStruct->structQuery(
        (new StructDefinition)
            ->networkName('administrative')
            ->nodeTypeName('city')
        )->getId('NodeType');

$testId = $wioStruct->structQuery(
    (new StructDefinition)
        ->nodeTypeId($cityId)
        ->nodeName('Aleksandrów Łódzki')
    )->getId('Node');

if ($testId) {
    $wioStruct->structQuery(
        (new StructDefinition)
            ->nodeId($testId)
        )->add('Flag','mapa_liderow_2016_miasto_ap');

    echo 'all done';
    exit;
} else {
    echo 'run again to flag Aleksandrów Łódzki';
}


$powId = $wioStruct->structQuery(
    (new StructDefinition)
        ->nodeTypeId($powiatId)
        ->nodeName('zgierski')
    )->getId('Node');

$wioStruct->structQuery((new StructDefinition)->nodeTypeId($cityId))
    ->add('Node', 'Aleksandrów Łódzki', 51.819444, 19.304444)
    ->add('LinkParent', $powId);
