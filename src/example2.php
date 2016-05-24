<?php
namespace WioStruct;

use \WioStruct\Core\StructDefinition as StructDefinition;

require_once('exampleEnvironment.php');

echo '<!doctype HTML><html><head><meta charset="utf-8"></head><body>';



$wojewodztwo = $wioStruct->structQuery(
    (new StructDefinition)
        ->networkName('administrative')
        ->nodeTypeName('state')
    )
    ->get('Node');
// echo '<pre>'.print_r($wojewodztwo,true).'</pre>';


$wios = $wioStruct->structQuery(new StructDefinition())->get('Network');

$networks = $wioStruct->structQuery(
    (new StructDefinition())
        ->networkName('Szlachetna Paczka')
        ->nodeTypeName('rejon')
        ->linkParent(
            (new StructDefinition())
                ->networkName('administrative')
                ->nodeTypeName('state')
        )
    )
    ->get('Node');
echo '<pre>'.print_r($networks,true).'</pre>';
