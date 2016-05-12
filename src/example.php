<?php
namespace WioStruct;

use \WioStruct\Core\StructDefinition as StructDefinition;

require_once('exampleEnvironment.php');

echo '<!doctype HTML><html><head><meta charset="utf-8"></head><body>';

//*
#
# Setting NETWORKS
#
$wioStruct->structQuery(new StructDefinition)
    ->add('Network','Szlachetna Paczka')
    ->add('Network','Akademia Przyszłości');


// $networks = $wioStruct->structQuery((new StructDefinition))
//     ->get('Network');
//
// tab_dump($networks,'Networks');

#
# Setting NODE TYPES
#

$administrativeDef = (new StructDefinition)
    ->networkName('administrative');

$wioStruct->structQuery($administrativeDef)
    ->add('NodeType', 'country')
    ->add('NodeType', 'state')
    ->add('NodeType', 'city')
    ->add('NodeType', 'School');

$szpNetworkId = $wioStruct->structQuery(
    (new StructDefinition)
        ->networkName('Szlachetna Paczka')
    )->first('Network','id');

$wioStruct->structQuery(
    (new StructDefinition)
        ->networkId($szpNetworkId))
    ->add('NodeType', 'województwo')
    ->add('NodeType', 'region')
    ->add('NodeType', 'rejon');

$wioStruct->structQuery(
    (new StructDefinition)
        ->networkName('Akademia Przyszłości'))
    ->add('NodeType', 'województwo')
    ->add('NodeType', 'region')
    ->add('NodeType', 'kolegium');

// $nodeTypes = $wioStruct->structQuery(new StructDefinition)
//     ->get('NodeType');
//
// tab_dump($nodeTypes);


#
# Setting NODE FLAG TYPES
#

$wioStruct->structQuery(new StructDefinition)
    ->add('FlagType','leaders_recrutation_map')
    ->add('FlagType','leader_recruited')
    ->add('FlagType','main_recrutation_map');

// $flagTypes = $wioStruct->structQuery(new StructDefinition)
//     ->get('FlagType');
//
// tab_dump($flagTypes);


#
# Setting NODES, NODE FLAGS and LINKS
#

$countryDef = (new StructDefinition)
    ->networkName('administrative')
    ->nodeTypeName('country');

$wioStruct->structQuery($countryDef)
    ->add('Node','Polska')
    ->add('Flag','leaders_recrutation_map')
    ->add('Node','Czeska Republika')
    ->add('Node','USA');


$stateDef = (new StructDefinition)
    ->networkName('administrative')
    ->nodeTypeName('state');

$polandDef = (new StructDefinition)
    ->networkName('administrative')
    ->nodeTypeName('country')
    ->nodeName('Polska');

$stateAdder = $wioStruct->structQuery($stateDef);


// tab_dump($wioStruct->structQuery((new StructDefinition))->get('Node'));


$stateAdder->add('Node','Małopolska')
    ->add('LinkParent',$polandDef)
    ->add('Flag','leaders_recrutation_map');

$stateAdder->add('Node','Śląsk')
    ->add('LinkParent',$polandDef)
    ->add('Flag','leaders_recrutation_map');

$stateAdder->add('Node','Kujawsko-Pomorskie')
    ->add('LinkParent',$polandDef)
    ->add('Flag','leaders_recrutation_map');

#
# Adding City Nodes
#

$malopolskaId = $wioStruct->structQuery(
        (new StructDefinition)
            ->networkName('administrative')
            ->nodeTypeName('state')
            ->nodeName('Małopolska')
    )
    ->first('Node','id');

$slaskId = $wioStruct->structQuery(
        (new StructDefinition)
            ->networkName('administrative')
            ->nodeTypeName('state')
            ->nodeName('Śląsk')
    )
    ->first('Node','id');

$kujPomId = $wioStruct->structQuery(
        (new StructDefinition)
            ->networkName('administrative')
            ->nodeTypeName('state')
            ->nodeName('Kujawsko-Pomorskie')
    )
    ->first('Node','id');


$cityAdder = $wioStruct->structQuery(
    (new StructDefinition)
        ->networkName('administrative')
        ->nodeTypeName('city'));

$cityAdder->add('Node','Kraków')
    ->add('LinkParent',$malopolskaId)
    ->add('Flag','leaders_recrutation_map');

$cityAdder->add('Node','Zakopane')
    ->add('LinkParent',$malopolskaId);

$cityAdder->add('Node','Tarnów')
    ->add('LinkParent',$malopolskaId)
    ->add('Flag','leaders_recrutation_map');

$cityAdder->add('Node','Bochnia')
    ->add('LinkParent',$malopolskaId);

$cityAdder->add('Node','Brzesko')
    ->add('LinkParent',$malopolskaId)
    ->add('Flag','leaders_recrutation_map');


$cityAdder->add('Node','Katowice')
    ->add('LinkParent',$slaskId)
    ->add('Flag','leaders_recrutation_map');

$cityAdder->add('Node','Gliwice')
    ->add('LinkParent',$slaskId);

$cityAdder->add('Node','Bielsko-Biała')
    ->add('LinkParent',$slaskId)
    ->add('Flag','leaders_recrutation_map');

$cityAdder->add('Node','Pszczyna')
    ->add('LinkParent',$slaskId)
    ->add('Flag','leaders_recrutation_map');


$cityAdder->add('Node','Toruń')
    ->add('LinkParent',$kujPomId)
    ->add('Flag','leaders_recrutation_map');

$cityAdder->add('Node','Włocławek')
    ->add('LinkParent',$kujPomId);

$cityAdder->add('Node','Grudziądz')
    ->add('LinkParent',$kujPomId)
    ->add('Flag','leaders_recrutation_map');

$cityAdder->add('Node','Golub-Dobrzyń')
    ->add('LinkParent',$kujPomId)
    ->add('Flag','leaders_recrutation_map');

#
# Adding School Nodes
#

$schoolAdder = $wioStruct->structQuery(
    (new StructDefinition)
        ->networkName('administrative')
        ->nodeTypeName('School')
    );

$schoolAdder->add('Node','SP nr 4')
    ->add('LinkParent',
        (new StructDefinition)
            ->networkName('administrative')
            ->nodeTypeName('city')
            ->nodeName('Kraków')
    )
    ->add('Flag','leaders_recrutation_map');


$cityTypeId = $wioStruct->structQuery(
        (new StructDefinition)
            ->networkName('administrative')
            ->nodeTypeName('city')
    )
    ->first('NodeType','id');

$schoolAdder->add('Node','SP nr 7')
    ->add('LinkParent',
        (new StructDefinition)
            ->nodeTypeId($cityTypeId)
            ->nodeName('Kraków')
    )
    ->add('Flag','leaders_recrutation_map','takie tam');

$schoolAdder->add('Node','SP nr 11')
    ->add('LinkParent',
        (new StructDefinition)
          ->nodeTypeId($cityTypeId)
            ->nodeName('Kraków')
    );


$schoolAdder->add('Node','SP nr 2')
    ->add('LinkParent',
        (new StructDefinition)
            ->nodeTypeId($cityTypeId)
            ->nodeName('Toruń')
    )
    ->add('Flag','leaders_recrutation_map');

$schoolAdder->add('Node','SP nr 5')
    ->add('LinkParent',
        (new StructDefinition)
            ->nodeTypeId($cityTypeId)
            ->nodeName('Bielsko-Biała')
        )
    ->add('Flag','leaders_recrutation_map');


$szkoly = $wioStruct->structQuery(
    (new StructDefinition)
        ->networkName('administrative')
        ->nodeTypeName('school')
        ->flagTypeName('leaders_recrutation_map')
    )->get('Node');

tab_dump($szkoly);

// */

$szkoly = $wioStruct->structQuery(
    (new StructDefinition)
        ->networkName('administrative')
        ->nodeTypeName('school')
        ->linkParent(
            (new StructDefinition)
                ->networkName('administrative')
                ->nodeTypeName('city')
                ->nodeName('Kraków')
        )
    )->get('Node');

tab_dump($szkoly);


dump_database($qb);
