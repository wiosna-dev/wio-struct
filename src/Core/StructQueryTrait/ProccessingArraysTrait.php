<?php
namespace WioStruct\Core\StructQueryTrait;

trait ProccessingArraysTrait
{
    private $tableNames =
    [
        'Network' => [
            'table' => 'wio_struct_networks',
            'as' => 'Network'
        ],
        'NodeType' => [
            'table' => 'wio_struct_node_types',
            'as' => 'NodeType'
        ],
        'Node' => [
            'table' => 'wio_struct_nodes',
            'as' => 'Node'
        ],
        'Flag' => [
            'table' => 'wio_struct_flags',
            'as' => 'Flag'
        ],
        'FlagType' => [
            'table' => 'wio_struct_flag_types',
            'as' => 'FlagType'
        ],
        'Link' => [
            'table' => 'wio_struct_links',
            'as' => 'Link'
        ],
        'LinkParent' => [
            'table' => 'wio_struct_links',
            'as' => 'LinkParent'
        ],
        'LinkChildren' => [
            'table' => 'wio_struct_links',
            'as' => 'LinkChildren'
        ]
    ];

    // used by StructQuery->addSimpleStructDefinitionValues
    private $structDefinitionValues =
    [
        'networkId' => [
            'Network' => 'id',
            'NodeType' => 'network_id'
        ],
        'networkName' => [
            'Network' => 'name'
        ],
        'nodeTypeId' => [
            'NodeType' => 'id',
            'Node' => 'node_type_id'
        ],
        'nodeTypeName' => [
            'NodeType' => 'name'
        ],
        'nodeId' => [
            'Node' => 'id',
            'Flag' => 'node_id',
            'LinkParent' => 'node_parent_id',
            'LinkChildren' => 'node_children_id'
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
            'FlagType' => 'id',
            'Flag' => 'flag_type_id'
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
            'Node1' => 'node_children_id',
            'Node2' => 'node_parent_id'
        ],
        'linkChildren' => [
            'Prefix' => 'Children',
            'Node1' => 'node_parent_id',
            'Node2' => 'node_children_id'
        ]
    ];

    // used by StructQuery->setQueryJoins
    private $joinKeys =
    [
        'Node' => [
          'NodeType' => ['node_type_id','id'],
          'Flag' => ['id','node_id']
        ],
        'NodeType' => [
            'Network' => ['network_id','id']
        ],
        'Flag' => [
            'Node' => ['node_id','id'],
            'FlagType' => ['flag_type_id','id']
        ],
        'FlagType' => [
            'Flag' => ['id','flag_type_id']
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
            'columns' => ['network_id'=>'requiredId', 'name'=>0],
            'check' => ['network_id','name']
        ],
        'Node' => [
            'requireId' => 'NodeType',
            'columns' => ['node_type_id'=>'requiredId', 'name'=>0, 'lat'=>1, 'lng'=>2],
            'check' => ['node_type_id','name','lat','lng']
        ],
        'Flag' => [
            'requireId' => 'Node',
            'columns' => ['node_id'=>'requiredId', 'flag_type_id'=>'requireFlagTypeId', 'flag_data'=>1],
            'check' => ['node_id','flag_type_id']
        ],
        'LinkParent' => [
            'requireId' => 'Node',
            'columns' => ['node_children_id'=>'requiredId','node_parent_id'=>'requireNodeId'],
            'check' => ['node_children_id','node_parent_id']
        ],
        'LinkChildren' => [
            'requireId' => 'Node',
            'columns' => ['node_children_id'=>'requiredId','node_parent_id'=>'requireNodeId'],
            'check' => ['node_children_id','node_parent_id']
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
                'NodeType' => ['node_type_id','id']
            ],
            'Network' => [
                'NodeType' => ['node_type_id','id'],
                'Network' => ['network_id','id']
            ],
            'FlagType' => [
                'Flag' => ['id','node_id'],
                'FlagType' => ['flag_type_id','id'],
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
}
