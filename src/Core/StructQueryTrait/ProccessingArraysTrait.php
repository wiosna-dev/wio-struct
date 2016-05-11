<?php
namespace WioStruct\Core\StructQueryTrait;


trait ProccessingArraysTrait
{

    private $structDefinitionColumns =
    [
        'networkId'    => 'wio_struct_networks.id',
        'networkName'  => 'wio_struct_networks.name',
        'nodeTypeId'   => 'wio_struct_node_types.id',
        'nodeTypeName' => 'wio_struct_node_types.name',
        'nodeId'       => 'wio_struct_nodes.id',
        'nodeName'     => 'wio_struct_nodes.name',
        'flagTypeId'   => 'wio_struct_flag_types.id',
        'flagTypeName' => 'wio_struct_flag_types.name'
    ];
    private $structDefinitionTableColumns =
    [
        'networkId' =>
        [
            'Network' => 'wio_struct_networks.id',
            'NodeType' => 'wio_struct_node_types.netowrk_id'
        ],
        'networkName' =>
        [
            'Network' => 'wio_struct_networks.name'
        ],
        'nodeTypeId' =>
        [
            'NodeType' => 'wio_struct_node_types.id',
            'Node' => 'wio_struct_nodes.node_type_id'
        ],
        'nodeTypeName' =>
        [
            'NodeType' => 'wio_struct_node_types.name'
        ],
        'nodeId' =>
        [
            'Node' => 'wio_struct_nodes.id',
            'Flag' => 'wio_struct_flags.node_id',
            'LinkParent' => 'wio_sturct_links.node_parent_id',
            'LinkChildren' => 'wio_sturct_links.node_children_id'
        ],
        'nodeName' =>
        [
            'Node' => 'wio_struct_nodes.name',
        ],
        'flagTypeId' =>
        [
            'FlagType' => 'wio_struct_flag_types.id',
            'Flag' => 'wio_struct_flags.flag_type_id'
        ],
        'flagTypeName' =>
        [
            'FlagType' => 'wio_struct_flag_types.name'
        ]
    ];


    private $tableNames =
    [
        'Network'       => 'wio_struct_networks',
        'NodeType'      => 'wio_struct_node_types',
        'Node'          => 'wio_struct_nodes',
        'Flag'          => 'wio_struct_flags',
        'FlagType'      => 'wio_struct_flag_types',
        'Link'          => 'wio_struct_links',
        'LinkParent'    => 'wio_struct_links',
        'LinkChildren'  => 'wio_struct_links'
    ];

    private $joinKeys =
    [
        'wio_struct_node_types' =>
        [
            'wio_struct_networks' => ['wio_struct_node_types.network_id','=','wio_struct_networks.id']
        ],
        'wio_struct_nodes' =>
        [
            'wio_struct_node_types' => ['wio_struct_nodes.node_type_id','=','wio_struct_node_types.id']
        ]
    ];

    private $tableColumns =
    [
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
        ]
    ];


    private $structDefinitionVariables =
    [
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

    private $possibleJoins =
    [
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
        ],
        'LinkParent' => [
            'Node' => [
                'Node' => ['node_parent_id','id']
            ],
            'NodeType' => [
                'Node' => ['node_parent_id','id'],
                'NodeType' => ['node_type_id','id']
            ],
            'Network' => [
                'Node' => ['node_parent_id','id'],
                'NodeType' => ['node_type_id','id'],
                'Network' => ['network_id','id']
            ]
        ]
    ];

}
