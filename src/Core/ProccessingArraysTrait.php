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
        ],
    ];

    private $joinKeys = [
        'wio_struct_node_type' => [
            'wio_struct_networks' => 'wio_struct_node_type.network_id = wio_struct_networks.id'
        ],
        'wio_struct_nodes' => [
            'wio_struct_node_types' => 'wio_struct_nodes.node_type_id = wio_struct_node_types.id'
        ],
    ]

    private $getIdIdeas = [
        'Network' =>
        [
            [
                'values' => ['networkId'],
                'table'  => false,
            ],
            [
                'values' => ['networkName'],
                'table'  => 'wio_struct_networks'
            ]
        ]
        'FlagType' =>
        [
            [
                'values' => ['flagTypeId'],
                'table'  => false,
            ],
            [
                'values' => ['flagTypeName'],
                'table'  => 'wio_struct_flag_types'
            ]
        ]
        'NodeType' =>
        [
            [
                'values' => ['nodeTypeId'],
                'table'  => false,
            ],
            [
                'values' => ['nodeTypeName','networkId'],
                'table'  => 'wio_struct_node_types'
            ],
            [
                'values' => ['nodeTypeName','networkName'],
                'table'  => 'wio_struct_node_types',
                'join'   => ['wio_struct_networks']
            ]
        ],
        'Node' =>
        [
            [
                'values' => ['nodeId'],
                'table'  => false,
            ],
            [
                'values' => ['nodeName','nodeTypeId'],
                'table'  => 'wio_struct_nodes'
            ],
            [
                'values' => ['nodeName','nodeTypeName','networkId'],
                'table'  => 'wio_struct_nodes',
                'join'   => ['wio_struct_node_types']
            ],
            [
                'values' => ['nodeName','nodeTypeName','networkName'],
                'table'  => 'wio_struct_nodes',
                'join'   => ['wio_struct_node_types','wio_struct_networks']
            ]
        ]
    ];

    // require - fields got from structure
    private $addinArray = [
        'Network' => [
            'columns' => [0=>'name'],
            'check' => ['name']
        ],
        'FlagType' => [
            'columns' => [0=>'name'],
            'check' => ['name']
        ],
        'NodeType' => [
            'requireId' => 'Network',
            'columns' => [0=>'name'],
            'check' => ['network_id','name']
        ],
        'Node' => [
            'requireId' => 'NodeType',
            'columns' => [0=>'name',1=>'lat',2=>'lng'],
            'check' => ['node_type_id','name']
        ],
        'Flag' => [
            'requireId' => 'Node',
            'columns' => [0=>'requireFlagTypeId'],
            'check' => ['node_id','name']
        ],
        'LinkParent' => [
            'requireId' => 'Node',
            'columns' => [0=>'requireNodeId'],
            'check' => []
        ],
        'LinkChildren' => [
            'requireId' => 'Node',
            'columns' => [0=>'requireNodeId'],
            'check' => []
        ]
    ]
}


/*
add('Network',name)
    -> check if "name" is in Network

add('FlagType',name)
    -> check if "name" is in FlagType

add('NodeType',name)
    -> we need NetworkId, or we can get it with networkName
    -> we check if "name" is in NodeType with NetworkId

add('Node',name)
    -> we need NodeTypeId, or we get it from NodeTypeName + NetworkId or NodeTypeName + NetworkName
    -> we check if "name" is in Node with NodeTypeId


add('Flag',flag_data)
    -> we need InsertedNode
    -> we need FlagTypeId or we get it from FlagTypeName
    -> we check if "flag_data" is in Flag with FlagTypeId

add('LinkParent',ID/Struct)
    -> we need 2 IDs, we need both of them to be checked as proper
    -> we need InsertedNode

add('LinkChildren',name)
*/
