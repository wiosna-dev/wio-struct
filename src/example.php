<?php
namespace WioStruct;

use \WioStruct\Core\StructDefinition as StructDefinition;

require_once('exampleEnvironment.php');

echo '<!doctype HTML><html><head><meta charset="utf-8"></head><body>';


$wioStruct->structQuery(new StructDefinition)
    ->addNetwork('Szlachetna Paczka')
    ->addNetwork('Akademia Przyszłości');


$administrativeDef = (new StructDefinition)
    ->networkName('administrative');

$wioStruct->structQuery($administrativeDef)
    ->addNodeType('Country')
    ->addNodeType('State')
    ->addNodeType('City')
    ->addNodeType('School');

$szpNetworkId = $wioStruct->structQuery((new StructDefinition)->networkName('Szlachetna Paczka'))
    ->firstNetwork('id');

$wioStruct->structQuery((new StructDefinition)->networkId($szpNetworkId))
    ->addNodeType('województwo')
    ->addNodeType('region')
    ->addNodeType('rejon');

$wioStruct->structQuery((new StructDefinition)->networkName('Akademia Przyszłości'))
    ->addNodeType('województwo')
    ->addNodeType('region')
    ->addNodeType('kolegium');


$networks = $wioStruct->structQuery((new StructDefinition))
    ->getNetworks();

tab_dump($networks);



$nodeTypes = $wioStruct->structQuery((new StructDefinition))
    ->getNodeTypes();

tab_dump($nodeTypes);


die('<br/><br/> --Script End');

// pobranie rejonów do mapy
$areasToShowOnMapDef = (new StructDefinition)
  ->networkName('Szlachetna Paczka')
  ->nodeTypeName('rejon');



$areasArray = $wioStruct->structQuery($areasToShowOnMapDef)->get();


// import rejonów do mapy
// csv-states:
// śląskie
// małopolska

$polandNodeDef = (new StructDefinition)
    ->networkName('administrative')
    ->nodeName('Polska');

$query = (new StructDefinition)
    ->networkName('administrative')
    ->nodeTypeName('województwo');


$states = ['Małopolskie','Śląskie','Kujawsko-Pomorskie'];


foreach ($states as $state) {

    $wioStruct->structQuery($query)
        ->addNode($state)
        ->addParent($polandNodeDef);
        // ->addChildren($query2)
        // // ->addLink((new Link($query1, $query2))
        // ->addFlag($query3,'flag_data');

}


$stateDef = (new StructDefinition)
    ->networkName('administrative')
    ->nodeTypeName('województwo')
    ->nodeName('małopolskie');

$schoolsDef = (new StructDefinition)
    ->networkName('AP')
    ->linkParent($stateDef)
    ->flagName('wyświetlanie na mapie')
    ->nodeTypeName('szkoła');


$wynik = $wioStruct->structQuery($schoolsDef)->get();
