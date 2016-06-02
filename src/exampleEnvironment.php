<?php
namespace WioStruct;

require_once('../../../autoload.php');
require_once('examplePixieConnect.php');

$wioStruct = new WioStruct($qb);



function tab_dump($array, $name = false)
{
    if (!is_array($array))
    {
        echo 'DUMP: not an array<br/>';
        return false;
    }

    $html = '';
    $head = '';
    foreach ($array as $T)
    {
        $head = '';
        $html.='<tr>';
        foreach ($T as $e=>$f)
        {
            $html .='<td>'.$f.'</td>';
            $head .='<th>'.$e.'</th>';
        }
        $html.='</tr>';
    }
    echo '<style>
      body{margin: 0px;}
      div.tab_dump{width: 100%; height: 100%; position: relative; margin: 15px 0px;}
      div.tab_dump::before{width:100%; height:34px; background:#306; content:" "; display:block; position:absolute; top:20px; left:0px; z-index:1; border-top: 4px solid black; border-bottom: 4px solid black;}
      table.tab_dump{background:#306; border-spacing:8px; margin:0 auto; position:relative; z-index:2;}
      table.tab_dump, table.tab_dump th, table.tab_dump td{ border:3px solid black; padding: 1px 3px;}
      table.tab_dump th {background: #ea0;}
      table.tab_dump td {background: #ff0;}
      table.tab_dump td{text-align: center;}
      </style>';
    echo '<div class="tab_dump"><table class="tab_dump">';
    if ($name)
    {
        echo '<tr><th colspan="999">'.$name.'</th></tr>';
    }
    echo '<tr>'.$head.'</tr>'.$html.'</table></div>';
}


function dump_database($pixie)
{
    $tables = [
        'wio_struct_networks',
        'wio_struct_node_types',
        'wio_struct_flag_types',
        'wio_struct_nodes',
        'wio_struct_links',
        'wio_struct_flags'
    ];

    foreach($tables as $table){
        $list = $pixie->table($table)->select('*')->get();
        tab_dump($list,$table);
    }
}
