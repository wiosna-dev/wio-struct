<?php
namespace WioStruct;

use \WioStruct\Core\StructDefinition as StructDefinition;

require_once('exampleEnvironment.php');

echo '<!doctype HTML><html><head><meta charset="utf-8"></head><body>';

#
# Setting NETWORKS
#
$wioStruct->structQuery(new StructDefinition)
    ->addNetwork('Szlachetna Paczka')
    ->addNetwork('Akademia Przyszłości');


$networks = $wioStruct->structQuery((new StructDefinition))
    ->getNetworks();

// tab_dump($networks);

#
# Setting NODE TYPES
#

$administrativeDef = (new StructDefinition)
    ->networkName('administrative');

$wioStruct->structQuery($administrativeDef)
    ->addNodeType('country')
    ->addNodeType('state')
    ->addNodeType('city')
    ->addNodeType('School');

$szpNetworkId = $wioStruct->structQuery((new StructDefinition)->networkName('Szlachetna Paczka'))
    ->firstNetwork('id');

$wioStruct->structQuery(
    (new StructDefinition)
        ->networkId($szpNetworkId))
    ->addNodeType('województwo')
    ->addNodeType('region')
    ->addNodeType('rejon');

$wioStruct->structQuery(
    (new StructDefinition)
        ->networkName('Akademia Przyszłości'))
    ->addNodeType('województwo')
    ->addNodeType('region')
    ->addNodeType('kolegium');

$nodeTypes = $wioStruct->structQuery(new StructDefinition)
    ->getNodeTypes();

// tab_dump($nodeTypes);

#
# Setting NODE FLAG TYPES
#

$wioStruct->structQuery(new StructDefinition)
    ->addNodeFlagType('leaders_recrutation_map')
    ->addNodeFlagType('leader_recruited')
    ->addNodeFlagType('main_recrutation_map');

$flagTypes = $wioStruct->structQuery((new StructDefinition))
    ->getNodeFlagTypes();

// tab_dump($flagTypes);


#
# Setting NODES, NODE FLAGS and LINKS
#

$countryDef = (new StructDefinition)
    ->networkName('administrative')
    ->nodeTypeName('country');

$wioStruct->structQuery($countryDef)
    ->addNode('Polska')
    ->addNodeFlag('leaders_recrutation_map')
    ->addNode('Czeska Republika')
    ->addNode('USA');


$stateDef = (new StructDefinition)
    ->networkName('administrative')
    ->nodeTypeName('state');

$polandDef = (new StructDefinition)
    ->networkName('administrative')
    ->nodeTypeName('country')
    ->nodeName('Polska');

$stateAdder = $wioStruct->structQuery($stateDef);

$stateAdder->addNode('Małopolska')
    ->linkParent($polandDef)
    ->addNodeFlag('leaders_recrutation_map');

$stateAdder->addNode('Śląsk')
    ->linkParent($polandDef)
    ->addNodeFlag('leaders_recrutation_map');

$stateAdder->addNode('Kujawsko-Pomorskie')
    ->linkParent($polandDef)
    ->addNodeFlag('leaders_recrutation_map');

#
# Adding City Nodes
#

$malopolskaId = $wioStruct->structQuery(
        (new StructDefinition)
            ->networkName('administrative')
            ->nodeTypeName('state')
            ->nodeName('Małopolska')
    )
    ->firstNode('id');

$slaskId = $wioStruct->structQuery(
        (new StructDefinition)
            ->networkName('administrative')
            ->nodeTypeName('state')
            ->nodeName('Śląsk')
    )
    ->firstNode('id');

$kujPomId = $wioStruct->structQuery(
        (new StructDefinition)
            ->networkName('administrative')
            ->nodeTypeName('state')
            ->nodeName('Kujawsko-Pomorskie')
    )
    ->firstNode('id');


$cityAdder = $wioStruct->structQuery(
    (new StructDefinition)
        ->networkName('administrative')
        ->nodeTypeName('city'));

$cityAdder->addNode('Kraków')
    ->linkParent($malopolskaId)
    ->addNodeFlag('leaders_recrutation_map');

$cityAdder->addNode('Zakopane')
    ->linkParent($malopolskaId);

$cityAdder->addNode('Tarnów')
    ->linkParent($malopolskaId)
    ->addNodeFlag('leaders_recrutation_map');

$cityAdder->addNode('Bochnia')
    ->linkParent($malopolskaId);

$cityAdder->addNode('Brzesko')
    ->linkParent($malopolskaId)
    ->addNodeFlag('leaders_recrutation_map');


$cityAdder->addNode('Katowice')
    ->linkParent($slaskId)
    ->addNodeFlag('leaders_recrutation_map');

$cityAdder->addNode('Gliwice')
    ->linkParent($slaskId);

$cityAdder->addNode('Bielsko-Biała')
    ->linkParent($slaskId)
    ->addNodeFlag('leaders_recrutation_map');

$cityAdder->addNode('Pszczyna')
    ->linkParent($slaskId)
    ->addNodeFlag('leaders_recrutation_map');


$cityAdder->addNode('Toruń')
    ->linkParent($kujPomId)
    ->addNodeFlag('leaders_recrutation_map');

$cityAdder->addNode('Włocławek')
    ->linkParent($kujPomId);

$cityAdder->addNode('Grudziądz')
    ->linkParent($kujPomId)
    ->addNodeFlag('leaders_recrutation_map');

$cityAdder->addNode('Golub-Dobrzyń')
    ->linkParent($kujPomId)
    ->addNodeFlag('leaders_recrutation_map');

#
# Adding School Nodes
#

$schoolAdder = $wioStruct->structQuery(
    (new StructDefinition)
        ->networkName('administrative')
        ->nodeTypeName('School')
    );

$schoolAdder->addNode('SP nr 4')
    ->linkParent(
        (new StructDefinition)
            ->networkName('administrative')
            ->nodeTypeName('city')
            ->nodeName('Kraków')
    )
    ->addNodeFlag('leaders_recrutation_map');


$cityTypeId = $wioStruct->structQuery(
        (new StructDefinition)
            ->networkName('administrative')
            ->networkName('city')
    )
    ->first('id');

$schoolAdder->addNode('SP nr 7')
    ->linkParent(
        (new StructDefinition)
            ->nodeTypeId($cityTypeId)
            ->nodeName('Kraków')
    )
    ->addNodeFlag('leaders_recrutation_map');

$schoolAdder->addNode('SP nr 11')
    ->linkParent(
        (new StructDefinition)
          ->nodeTypeId($cityTypeId)
            ->nodeName('Kraków')
    );


$schoolAdder->addNode('SP nr 2')
    ->linkParent(
        (new StructDefinition)
            ->nodeTypeId($cityTypeId)
            ->nodeName('Toruń')
    )
    ->addNodeFlag('leaders_recrutation_map');

$schoolAdder->addNode('SP nr 5')
    ->linkParent(
        (new StructDefinition)
            ->nodeTypeId($cityTypeId)
            ->nodeName('Bielsko-Biała')
        )
    ->addNodeFlag('leaders_recrutation_map');




$schoolDef = (new StructDefinition)
    ->networkName('administrative')
    ->nodeTypeName('school')
    ->nodeFlagTypeName('leaders_recrutation_map');


$szkoly = $wioStruct->structQuery($schoolDef)
    ->get();

//tab_dump($szkoly);





dump_database($qb);






















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
