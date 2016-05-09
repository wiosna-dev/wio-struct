<?php
namespace WioStruct\Core;


trait ProccessingArraysTrait
{
    private $tableNames = [
        'Network'       => 'wio_struct_networks',
        'NodeType'      => 'wio_struct_node_types',
        'Node'          => 'wio_struct_nodes',
        'Flag'          => 'wio_struct_flags',
        'FlagType'      => 'wio_struct_flag_types',
        'Link'          => 'wio_struct_links',
        'LinkParent'    => 'wio_struct_links',
        'LinkChildren'  => 'wio_struct_links'
    ];

    private $tableColumns = [
        'Network' => [
            0 => 'name'
        ],
        'NodeType' => [
            0 => 'name',
            'required' => [
                'Network' => 'network_id'
            ]
        ],
        'Node' => [
            0 => 'name',
            1 => 'lat',
            2 => 'lng',
            'required' => [
                'NodeType' => 'node_type_id'
            ]
        ],
        'FlagType' => [
            0 => 'name'
        ],
        'Flag' => [
            0 => 'flag_data',
            'required' => [
                'FlagType' => 'flag_type_id'
            ]
        ],
        'LinkParent' => [
            0 => 'node_parent_id',
            'required' => [
                'Node' => 'node_children_id'
            ]
        ],
    ];


    private $structDefinitionVariables = [
        'networkName' => [
            'table'  => ['Network' => 'name']
        ],
        'networkId' => [
            'table'  => ['Network' => 'id'],
            'usedIn' => ['NodeType' => 'network_id']
        ],
        'nodeTypeName' => [
            'table'  => ['NodeType' => 'name']
        ],
        'nodeTypeId' => [
            'table'  => ['NodeType' => 'id'],
            'usedIn' => ['Node' => 'node_type_id']
        ],
        'nodeName' => [
            'table'  => ['Node' => 'name']
        ],
        'nodeId' => [
            'table'  => ['Node' => 'id'],
            'usedIn' => ['Flag' => 'node_id']
        ],
        'flagTypeName' => [
            'table'  => ['FlagType' => 'name']
        ],
        'flagTypeId' => [
            'table'  => ['FlagType' => 'id'],
            'usedIn' => ['Flag' => 'flag_type_id']
        ],
        'linkParent' => [
            'table'  => ['Link' => 'node_parent_id']
        ],
        'linkChildren' => [
            'table'  => ['Link' => 'node_children_id']
        ]
    ];

    private $possibleJoins = [
        'Node' => [
            'NodeType' => [
                'NodeType' => ['node_type_id','id']
            ],
            'Network' => [
                'NodeType' => ['node_type_id','id'],
                'Network' => ['network_id','id']
            ]
        ],
        'NodeType' => [
            'Network' => [
                'Network' => ['network_id','id']
            ]
        ]
    ];

}
