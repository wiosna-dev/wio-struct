<?php
namespace WioStruct\Core;

class StructDefinition
{
    public $networkName;
    public $networkId;
    public $nodeTypeName;
    public $nodeTypeId;
    public $nodeName;
    public $nodeId;
    public $flagTypeName;
    public $flagTypeId;
    public $linkParent;
    public $linkChildren;

    function __construct()
    {
        $this->networkName = false;
        $this->networkId = false;
        $this->nodeTypeName = false;
        $this->nodeTypeId = false;
        $this->nodeName = false;
        $this->nodeId = false;
        $this->flagTypeName = false;
        $this->flagTypeId = false;
        $this->linkParent = false;
        $this->linkChildren = false;
    }

    private $values = [
        'Network' => [
            'id' => 'networkId',
            'name' => 'networkName'
        ],
        'NodeType' => [
            'id' => 'nodeTypeId',
            'name' => 'nodeTypeName'
        ],
        'Node' => [
            'id' => 'nodeId',
            'name' => 'nodeName'
        ],
        'FlagType' => [
            'id' => 'flagTypeId',
            'name' => 'flagTypeName'
        ],
        'Link' => [
            'parentId' => 'linkParent',
            'childrenId' => 'linkChildren'
        ]
    ];

    private $columns = [
        'networkId'    => 'wio_struct_networks.id',
        'netowrkName'  => 'wio_struct_networks.name',
        'nodeTypeId'   => 'wio_struct_node_types.id',
        'nodeTypeName' => 'wio_struct_node_types.name',
        'nodeId'       => 'wio_struct_node.id',
        'nodeName'     => 'wio_struct_node.name',
        'flagTypeId'   => 'wio_struct_flag_types.id',
        'flagTypeName' => 'wio_struct_flag_types.name',
    ]

    public function set($tableName, $valueName, $value)
    {
        if (!isset($this->values[ $tableName ][ $valueName ]))
        {
            return false;
        }

        $key = $this->values[ $tableName ][ $valueName ];
        $this->$key = $value;
    }

    public function networkName($name)
    {
        $this->networkName = $name;
        return $this;
    }

    public function networkId($id)
    {
        $this->networkId = $id;
        return $this;
    }


    public function nodeTypeName($name)
    {
        $this->nodeTypeName = $name;
        return $this;
    }

    public function nodeTypeId($id)
    {
        $this->nodeTypeId = $id;
        return $this;
    }


    public function nodeName($name)
    {
        $this->nodeName = $name;
        return $this;
    }

    public function nodeId($id)
    {
        $this->nodeId = $id;
        return $this;
    }


    public function flagTypeName($name)
    {
        $this->flagTypeName = $name;
        return $this;
    }

    public function flagTypeId($id)
    {
        $this->flagTypeId = $id;
        return $this;
    }


    public function linkParent(StructDefinition $nodeDef)
    {
        $this->linkParent = $nodeDef;
        return $this;
    }

    public function linkChildren(StructDefinition $nodeDef)
    {
        $this->linkChildren = $nodeDef;
        return $this;
    }

}
