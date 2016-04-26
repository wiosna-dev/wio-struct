<?php
namespace WioStruct;

require_once('index.php');

echo '<!doctype HTML><html><bead><meta charset="utf-8">';

//echo 'getNetworks:';
//var_dump($wioStruct->getNetworks());

$szpId = $wioStruct->addNetwork('Szlachetna paczka');
$apId = $wioStruct->addNetwork('Akademia Przyszłości');

$wioStruct->getNetworkId('Szlachetna paczka');

$apId;

$wioStruct->getNetworkAdministrativeId();

$admId = $wioStruct->getNetworkAdministrativeId();

$wioStruct->addNodeType(['networkId'=>$admId],'Kraj');
$wioStruct->addNodeType(['networkId'=>$admId],'Województwo');
$wioStruct->addNodeType(['networkId'=>$admId],'Miasto');
$wioStruct->addNodeType(['networkName'=>'administrative'],'Szkoła');


$wioStruct->addNodeType(['networkName'=>'Akademia Przyszłości'],'Rada Wojewódzka');
$wioStruct->addNodeType(['networkName'=>'Akademia Przyszłości'],'Kolegium');
$wioStruct->addNodeType(['networkId'=>$apId],'Rada Regionu');

$wioStruct->addNodeType(['networkName'=>'Szlachetna paczka'],'Rada Wojewódzka');
$wioStruct->addNodeType(['networkId'=>$szpId],'Rejon');




// echo 'getNodeTypes:';
// var_dump($wioStruct->getNodeTypes());
//
//
// echo 'getNodeTypes: (SZP)';
// var_dump($wioStruct->getNodeTypes(['networkId'=>$szpId]));
//
// echo 'getNodeTypes: (AP)';
// var_dump($wioStruct->getNodeTypes(['networkName'=>'Akademia Przyszłości']));



$wioStruct->addNode(['nodeTypeId'=>6], 'Kolegium numer X');
$wioStruct->addNode(['nodeTypeName'=>'Kolegium','networkId'=>$apId], 'Kolegium numer Y');
$wioStruct->addNode(['nodeTypeName'=>'Kolegium','networkName'=>'Akademia Przyszłości'], 'Kolegium numer Z');

echo 'getNodes:';
var_dump($wioStruct->getNodes());

echo 'getNodes: (AP)';
var_dump($wioStruct->getNodes(['nodeTypeId'=>6]));

echo 'getNodes: (AP)';
var_dump($wioStruct->getNodes(['nodeTypeName'=>'Kolegium','networkId'=>$apId]));

echo 'getNodes: (AP)';
var_dump($wioStruct->getNodes(['nodeTypeName'=>'Kolegium','networkName'=>'Akademia Przyszłości']));
