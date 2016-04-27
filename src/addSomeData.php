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


$radyId = $wioStruct->addNodeType(['networkName'=>'Akademia Przyszłości'],'Rada Wojewódzka');
$regionyId = $wioStruct->addNodeType(['networkId'=>$apId],'Rada Regionu');
$wioStruct->addNodeType(['networkName'=>'Akademia Przyszłości'],'Kolegium');

$wioStruct->addNodeType(['networkName'=>'Szlachetna paczka'],'Rada Wojewódzka');
$wioStruct->addNodeType(['networkId'=>$szpId],'Rejon');

$kolegiaId = $wioStruct->getNodeTypeId(['networkName'=>'Akademia Przyszłości'],'Kolegium');

// echo 'getNodeTypes:';
// var_dump($wioStruct->getNodeTypes());
//
//
// echo 'getNodeTypes: (SZP)';
// var_dump($wioStruct->getNodeTypes(['networkId'=>$szpId]));
//it
// echo 'getNodeTypes: (AP)';
// var_dump($wioStruct->getNodeTypes(['networkName'=>'Akademia Przyszłości']));



$wioStruct->addNode(['nodeTypeId'=>$kolegiaId], 'Kolegium numer X');
$wioStruct->addNode(['nodeTypeName'=>'Kolegium','networkId'=>$apId], 'Kolegium numer Y');
$wioStruct->addNode(['nodeTypeName'=>'Kolegium','networkName'=>'Akademia Przyszłości'], 'Kolegium numer Z');

$wioStruct->addNode(['nodeTypeId'=>$kolegiaId], 'Kolegium A');
$wioStruct->addNode(['nodeTypeId'=>$kolegiaId], 'Kolegium B');
$wioStruct->addNode(['nodeTypeId'=>$kolegiaId], 'Kolegium C');

$wioStruct->addNode(['nodeTypeId'=>$radyId], 'Małopolska');
$wioStruct->addNode(['nodeTypeId'=>$radyId], 'Kujawsko-Pomorskie');

$wioStruct->addNode(['nodeTypeId'=>$regionyId], 'Kraków Jeden');
$wioStruct->addNode(['nodeTypeId'=>$regionyId], 'Kraków i Okolice');
$wioStruct->addNode(['nodeTypeId'=>$regionyId], 'Tarnów');
$wioStruct->addNode(['nodeTypeId'=>$regionyId], 'Tarnów Północ');



// echo 'getNodes:';
// var_dump($wioStruct->getNodes());
//
// echo 'getNodes: (AP)';
// var_dump($wioStruct->getNodes(['nodeTypeId'=>$kolegiaId]));
// var_dump($wioStruct->getNodes(['nodeTypeName'=>'Kolegium','networkId'=>$apId]));
// var_dump($wioStruct->getNodes(['nodeTypeName'=>'Kolegium','networkName'=>'Akademia Przyszłości']));



// $kolegiumZ = $wioStruct->getNodeId(['nodeTypeId'=>$kolegiaId,'nodeName'=>'Kolegium numer Z']);
// var_dump($wioStruct->getNodeById($kolegiumZ));
//
// $wioStruct->changeNodeData(['nodeId'=>$kolegiumZ],['lat'=>55.4]);
// $wioStruct->changeNodeData(['nodeName'=>'Kolegium numer Z','nodeTypeId'=>$kolegiaId],['lng'=>55.4]);
// $wioStruct->changeNodeData(['nodeName'=>'Kolegium numer Z','nodeTypeName'=>'Kolegium','networkId'=>$apId],['name'=>'Kolegium w Januszewie']);
// var_dump($wioStruct->getNodeById($kolegiumZ));
//
// $kolegiumY = $wioStruct->getNodeId(['nodeTypeId'=>$kolegiaId,'nodeName'=>'Kolegium numer Y']);
//
// $wioStruct->changeNodeData(['nodeName'=>'Kolegium numer Y','nodeTypeName'=>'Kolegium','networkName'=>'Akademia Przyszłości'],['name'=>'Kolegium Matematyczne','lat'=>2.7182818,'lng'=>3.14159265]);
// var_dump($wioStruct->getNodeById($kolegiumY));


$linkId = $wioStruct->setLink(
    ['nodeName'=>'Małopolska','nodeTypeName'=>'Rada Wojewódzka','networkName'=>'Akademia Przyszłości'],
    ['nodeName'=>'Kolegium A','nodeTypeName'=>'Kolegium','networkName'=>'Akademia Przyszłości']
);
$linkId = $wioStruct->setLink(
    ['nodeName'=>'Małopolska','nodeTypeName'=>'Rada Wojewódzka','networkName'=>'Akademia Przyszłości'],
    ['nodeName'=>'Kolegium B','nodeTypeName'=>'Kolegium','networkName'=>'Akademia Przyszłości']
);
$linkId = $wioStruct->setLink(
    ['nodeName'=>'Małopolska','nodeTypeId'=>$radyId],
    ['nodeName'=>'Kolegium C','nodeTypeId'=>$kolegiaId]
);
