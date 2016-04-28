<?php
namespace WioStruct;

use \WioStruct\Core\StructDefinition as StructDefinition;

require_once('exampleEnvironment.php');

echo '<!doctype HTML><html><head><meta charset="utf-8"></head><body>';


// pobranie rejonów do mapy
$areasToShowOnMapDef = (new StructDefinition)
  ->networkName('Szlachetna Paczka')
  ->nodeTypeName('rejon');


$wioStruct->structQuery(new StructDefinition)->addNetwork('Akademia Przyszłości');

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
