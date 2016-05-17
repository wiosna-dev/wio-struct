<?php
namespace WioStruct\Core\StructQueryTrait;

trait ProccessingArraysTrait
{
    private $tableNames = [
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
        'LinkParent' => [
            'table' => 'wio_struct_links',
            'as' => 'LinkParent'
        ],
        'LinkChildren' => [
            'table' => 'wio_struct_links',
            'as' => 'LinkChildren'
        ]
    ];

    private $structDefinitionTableColumns = [
        'networkId' => [
            'Network' => 'id',
            'NodeType' => 'netowrk_id'
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
        'flagTypeId' => [
            'FlagType' => 'id',
            'Flag' => 'flag_type_id'
        ],
        'flagTypeName' => [
            'FlagType' => 'name'
        ]
    ];

    private $joinKeys = [
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
        'LinkChildren' => [
            0 => 'node_children_id',
            'required' => [
                'Node' => 'node_parent_id'
            ]
        ]
    ];

    private $addingTableSettings = [
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
            'check' => ['node_type_id','name']
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

    private $getColumns = [
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
            ]
        ]
    ];


    private $gettingIds =
    [
        'Network' => [
            [
                'values' => ['networkId'],
                'table'  => false,
            ],
            [
                'values' => ['networkName'],
                'table'  => 'Network'
            ]
        ],
        'FlagType' => [
            [
                'values' => ['flagTypeId'],
                'table'  => false,
            ],
            [
                'values' => ['flagTypeName'],
                'table'  => 'FlagType'
            ]
        ],
        'NodeType' => [
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
        'Node' => [
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
}
