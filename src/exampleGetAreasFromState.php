<?php
namespace WioStruct;

use \WioStruct\Core\StructDefinition as StructDefinition;

require_once('exampleEnvironment.php');

echo '<!doctype HTML><html><head><meta charset="utf-8"></head><body>';



$wyniki = $wioStruct = new SturctQuery(
        (new StructDefinition)
        ->networkName('Szlachetna Paczka')
        ->nodeTypeName('rejon')
        ->linkParent(
            (new StructDefinition)
            ->netowrkName('Szlachetna Paczka')
            ->nodeTypeName('województwo')
        )
    )->get('Node');
//    )->get('Node',['NodeType']);

/*
  TODO:
  ->linit()
  ->order()
  ->groupBy() - dla wybranego StructDefinition



*/

?>
