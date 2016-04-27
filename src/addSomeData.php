<?php
namespace WioStruct;

require_once('index.php');

echo '<!doctype HTML><html><bead><meta charset="utf-8">';

//echo 'getNetworks:';
//var_dump($wioStruct->getNetworks());

$szpId = $wioStruct->addNetwork('Szlachetna paczka');
$apId = $wioStruct->addNetwork('Akademia Przyszłości');

$wioStruct->getNetworkId('Szlachetna paczka');

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


$linkId = $wioStruct->addLink(
    ['nodeName'=>'Małopolska','nodeTypeName'=>'Rada Wojewódzka','networkName'=>'Akademia Przyszłości'],
    ['nodeName'=>'Kolegium A','nodeTypeName'=>'Kolegium','networkName'=>'Akademia Przyszłości']
);
$linkId = $wioStruct->addLink(
    ['nodeName'=>'Małopolska','nodeTypeName'=>'Rada Wojewódzka','networkName'=>'Akademia Przyszłości'],
    ['nodeName'=>'Kolegium B','nodeTypeName'=>'Kolegium','networkName'=>'Akademia Przyszłości']
);
$linkId = $wioStruct->addLink(
    ['nodeName'=>'Małopolska','nodeTypeId'=>$radyId],
    ['nodeName'=>'Kolegium C','nodeTypeId'=>$kolegiaId]
);

$krajeId  = $wioStruct->getNodeTypeId(['networkId'=>$admId],'Kraj');
$wojewId  = $wioStruct->getNodeTypeId(['networkId'=>$admId],'Województwo');
$miastaId = $wioStruct->getNodeTypeId(['networkId'=>$admId],'Miasto');
$szkolyId = $wioStruct->getNodeTypeId(['networkId'=>$admId],'Szkoła');

$kraj1 = $wioStruct->addNode(['nodeTypeId'=>$krajeId],'Polska');
$kraj2 = $wioStruct->addNode(['nodeTypeId'=>$krajeId],'Czechy');


$woj1 = $wioStruct->addNode(['nodeTypeId'=>$wojewId],'Małopolska');
$wioStruct->addLink(['nodeId'=>$kraj1],['nodeId'=>$woj1]);

$woj2 = $wioStruct->addNode(['nodeTypeId'=>$wojewId],'Kujawsko-Pomorskie');
$wioStruct->addLink(['nodeId'=>$kraj1],['nodeId'=>$woj2]);

$woj3 = $wioStruct->addNode(['nodeTypeId'=>$wojewId],'Morawy');
$wioStruct->addLink(['nodeId'=>$kraj2],['nodeId'=>$woj3]);

$woj4 = $wioStruct->addNode(['nodeTypeId'=>$wojewId],'Pardubice');
$wioStruct->addLink(['nodeId'=>$kraj2],['nodeId'=>$woj4]);


$miasto1 = $wioStruct->addNode(['nodeTypeId'=>$miastaId],'Kraków');
$wioStruct->addLink(['nodeId'=>$woj1],['nodeId'=>$miasto1]);

$miasto2 = $wioStruct->addNode(['nodeTypeId'=>$miastaId],'Tarnów');
$wioStruct->addLink(['nodeId'=>$woj1],['nodeId'=>$miasto2]);

$miasto3 = $wioStruct->addNode(['nodeTypeId'=>$miastaId],'Brzesko');
$wioStruct->addLink(['nodeId'=>$woj1],['nodeId'=>$miasto3]);

$miasto4 = $wioStruct->addNode(['nodeTypeId'=>$miastaId],'Bydgoszcz');
$wioStruct->addLink(['nodeId'=>$woj2],['nodeId'=>$miasto4]);

$miasto5 = $wioStruct->addNode(['nodeTypeId'=>$miastaId],'Toruń');
$wioStruct->addLink(['nodeId'=>$woj2],['nodeId'=>$miasto5]);

$miasto6 = $wioStruct->addNode(['nodeTypeId'=>$miastaId],'Bohumin');
$wioStruct->addLink(['nodeId'=>$woj3],['nodeId'=>$miasto6]);

$miasto7 = $wioStruct->addNode(['nodeTypeId'=>$miastaId],'Ostrava');
$wioStruct->addLink(['nodeId'=>$woj3],['nodeId'=>$miasto7]);

$miasto8 = $wioStruct->addNode(['nodeTypeId'=>$miastaId],'Pardubice');
$wioStruct->addLink(['nodeId'=>$woj4],['nodeId'=>$miasto8]);


$szkola1 = $wioStruct->addNode(['nodeTypeId'=>$szkolyId],'Szkoła A');
$wioStruct->addLink(['nodeId'=>$miasto1],['nodeId'=>$szkola1]);

$szkola2 = $wioStruct->addNode(['nodeTypeId'=>$szkolyId],'Szkoła B');
$wioStruct->addLink(['nodeId'=>$miasto1],['nodeId'=>$szkola2]);

$szkola3 = $wioStruct->addNode(['nodeTypeId'=>$szkolyId],'Szkoła C');
$wioStruct->addLink(['nodeId'=>$miasto1],['nodeId'=>$szkola3]);

$szkola4 = $wioStruct->addNode(['nodeTypeId'=>$szkolyId],'Czeska szkoła jedzenia sera');
$wioStruct->addLink(['nodeId'=>$miasto6],['nodeId'=>$szkola4]);


echo '<table>';
echo $wioStruct->showLinksWithNodes();
echo '</table>';
