<?php
namespace WioStruct\Core\StructQueryTrait;

trait ProccessingArraysTrait
{
    private $tableNames =
    [
        'Network' => [
            'table' => 'hydra.wio_struct_node_networks',
            'as' => 'Network'
        ],
        'NodeType' => [
            'table' => 'hydra.wio_struct_node_types',
            'as' => 'NodeType'
        ],
        'Node' => [
            'table' => 'hydra.wio_struct_nodes',
            'as' => 'Node'
        ],
        'Flag' => [
            'table' => 'hydra.wio_struct_node_flags',
            'as' => 'Flag'
        ],
        'FlagType' => [
            'table' => 'hydra.wio_struct_node_flag_types',
            'as' => 'FlagType'
        ],
        'Link' => [
            'table' => 'hydra.wio_struct_node_links',
            'as' => 'Link'
        ],
        'LinkParent' => [
            'table' => 'hydra.wio_struct_node_links',
            'as' => 'LinkParent'
        ],
        'LinkChildren' => [
            'table' => 'hydra.wio_struct_node_links',
            'as' => 'LinkChildren'
        ]
    ];

    // used by StructQuery->addSimpleStructDefinitionValues
    private $structDefinitionValues =
    [
        'networkId' => [
            'Network' => 'node_network_id',
            'NodeType' => 'node_network_id'
        ],
        'networkName' => [
            'Network' => 'name'
        ],
        'nodeTypeId' => [
            'NodeType' => 'node_type_id',
            'Node' => 'node_type_id'
        ],
        'nodeTypeName' => [
            'NodeType' => 'name'
        ],
        'nodeId' => [
            'Node' => 'node_id',
            'Flag' => 'node_id',
            'LinkParent' => 'parent_node_id',
            'LinkChildren' => 'child_node_id'
        ],
        'nodeName' => [
            'Node' => 'name',
        ],
        'nodeLat' => [
            'Node' => 'lat'
        ],
        'nodeLng' => [
            'Node' => 'lng'
        ],
        'flagTypeId' => [
            'FlagType' => 'node_flag_type_id',
            'Flag' => 'node_flag_type_id'
        ],
        'flagTypeName' => [
            'FlagType' => 'name'
        ]
    ];

    // used by StructQuery->addAdvancedStructDefinitionValues
    private $structDefinitionAdvancedValues =
    [
        'linkParent' => [
            'Prefix' => 'Parent',
            'Node1' => 'child_node_id',
            'Node2' => 'parent_node_id'
        ],
        'linkChildren' => [
            'Prefix' => 'Children',
            'Node1' => 'parent_node_id',
            'Node2' => 'child_node_id'
        ]
    ];

    // used by StructQuery->setQueryJoins
    private $joinKeys =
    [
        'Node' => [
          'NodeType' => ['node_type_id','node_type_id'],
          'Flag' => ['node_id','node_id']
        ],
        'NodeType' => [
            'Network' => ['node_network_id','node_network_id']
        ],
        'Flag' => [
            'Node' => ['node_id','node_id'],
            'FlagType' => ['node_flag_type_id','node_flag_type_id']
        ],
        'FlagType' => [
            'Flag' => ['node_flag_type_id','node_flag_type_id']
        ]
    ];

    // used by StructQuery->add
    private $addingTableSettings =
    [
        'Network' => [
            'columns' => ['name'=>0],
            'check' => ['name']
        ],
        'FlagType' => [
            'columns' => ['name'=>0],
            'check' => ['name']
        ],
        'NodeType' => [
            'requireId' => 'Network',
            'columns' => ['node_network_id'=>'requiredId', 'name'=>0],
            'check' => ['node_network_id','name']
        ],
        'Node' => [
            'requireId' => 'NodeType',
            'columns' => ['node_type_id'=>'requiredId', 'name'=>0, 'lat'=>1, 'lng'=>2],
            'check' => ['node_type_id','name','lat','lng']
        ],
        'Flag' => [
            'requireId' => 'Node',
            'columns' => ['node_id'=>'requiredId', 'node_flag_type_id'=>'requireFlagTypeId', 'flag_data'=>1],
            'check' => ['node_id','node_flag_type_id']
        ],
        'LinkParent' => [
            'requireId' => 'Node',
            'columns' => ['child_node_id'=>'requiredId','parent_node_id'=>'requireNodeId'],
            'check' => ['child_node_id','parent_node_id']
        ],
        'LinkChildren' => [
            'requireId' => 'Node',
            'columns' => ['child_node_id'=>'requiredId','parent_node_id'=>'requireNodeId'],
            'check' => ['child_node_id','parent_node_id']
        ]
    ];


    // used by StructQuery->get => StructQuery->getColumnsSelects
    private $getColumns =
    [
        'Node' => [
            'Node' => [
                'id' => 'NodeId',
                'name' => 'NodeName',
                'lat' => 'NodeLat',
                'lng' => 'NodeLng',
            ],
            'NodeType' => [
                'name' => 'NodeType',
            ],
            'Network' => [
                'name' => 'Network'
            ],
            'Flag' => [
                'flag_data' => 'FlagData'
            ],
            'FlagType' => [
                'name' => 'FlagType'
            ],
            'ParentNode' => [
                'id' => 'ParentNodeId',
                'name' => 'ParentNodeName'
            ],
            'ParentNodeType' => [
                'id' => 'ParentNodeTypeId',
                'name' => 'ParentNodeTypeName'
            ],
            'ParentNetwork' => [
                'id' => 'ParentNetworkId',
                'name' => 'ParentNetworkName'
            ],
            'ChildrenNode' => [
                'id' => 'ChildrenNodeId',
                'name' => 'ChildrenNodeName'
            ],
            'ChildrenNodeType' => [
                'id' => 'ChildrenNodeTypeId',
                'name' => 'ChildrenNodeTypeName'
            ],
            'ChildrenNetwork' => [
                'id' => 'ChildrenNetworkId',
                'name' => 'ChildrenNetworkName'
            ]
        ],
        'NodeType' => [
            'NodeType' => [
                'id'  => 'NodeTypeId',
                'network_id'  => 'NodeTypeNetworkId',
                'name' => 'NodeType',
            ],
            'Network' => [
                'id' => 'NetworkId',
                'name' => 'NetworkName'
            ]
        ],
        'Network' => [
            'Network' => [
                'id' => 'NetworkId',
                'name' => 'NetworkName'
            ]
        ]
    ];

    // used by StructQuery->getId
    private $gettingIds =
    [
        'Network' =>
        [
            [
                'values' => ['networkId'],
                'table'  => false,
            ],
            [
                'values' => ['networkName'],
                'table'  => 'Network'
            ]
        ],
        'FlagType' =>
        [
            [
                'values' => ['flagTypeId'],
                'table'  => false,
            ],
            [
                'values' => ['flagTypeName'],
                'table'  => 'FlagType'
            ]
        ],
        'NodeType' =>
        [
            [
                'values' => ['nodeTypeId'],
                'table'  => false,
            ],
            [
                'values' => ['nodeTypeName','networkId'],
                'table'  => 'NodeType'
            ],
            [
                'values' => ['nodeTypeName','networkName'],
                'table'  => 'NodeType',
                'join'   => ['Network']
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
                'table'  => 'Node'
            ],
            [
                'values' => ['nodeName','nodeTypeName','networkId'],
                'table'  => 'Node',
                'join'   => ['NodeType']
            ],
            [
                'values' => ['nodeName','nodeTypeName','networkName'],
                'table'  => 'Node',
                'join'   => ['NodeType','Network']
            ]
        ]
    ];

    // used by StructQuery->tryQueryJoin adn StructQuery->queryJoin
    private $possibleJoins = [
        'Node' => [
            'NodeType' => [
                'NodeType' => ['node_type_id','node_type_id']
            ],
            'Network' => [
                'NodeType' => ['node_type_id','node_type_id'],
                'Network' => ['node_network_id','node_network_id']
            ],
            'FlagType' => [
                'Flag' => ['node_id','node_id'],
                'FlagType' => ['node_flag_type_id','node_flag_type_id'],
            ]

        ],
        'NodeType' => [
            'Network' => [
                'Network' => ['node_network_id','node_network_id']
            ]
        ],
        'LinkParent' => [
            'Node' => [
                'Node' => ['parent_node_id','node_id']
            ],
            'NodeType' => [
                'Node' => ['parent_node_id','node_id'],
                'NodeType' => ['node_type_id','node_type_id']
            ],
            'Network' => [
                'Node' => ['parent_node_id','node_id'],
                'NodeType' => ['node_type_id','node_type_id'],
                'Network' => ['node_network_id','node_network_id']
            ]
        ],
    ];
}
