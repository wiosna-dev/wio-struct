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
    public $nodeLat;
    public $nodeLng;
    public $linkParent;
    public $linkChildren;

    function __construct()
    {
        $this->networkId = false;
        $this->networkName = false;
        $this->nodeTypeId = false;
        $this->nodeTypeName = false;
        $this->nodeId = false;
        $this->nodeName = false;
        $this->nodeLat = false;
        $this->nodeLng = false;
        $this->flagTypeId = false;
        $this->flagTypeName = false;
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
            'name' => 'nodeName',
            'lat' => 'nodeLat',
            'lng' => 'nodeLng'
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

    public function set($tableName, $valueName, $value)
    {
        if (!isset($this->values[ $tableName ][ $valueName ]))
        {
            return false;
        }

        $key = $this->values[ $tableName ][ $valueName ];
        $this->$key = $value;
    }

    public function networkId($id)
    {
      $this->networkId = $id;
      return $this;
    }

    public function networkName($name)
    {
        $this->networkName = $name;
        return $this;
    }


    public function nodeTypeId($id)
    {
        $this->nodeTypeId = $id;
        return $this;
    }

    public function nodeTypeName($name)
    {
      $this->nodeTypeName = $name;
      return $this;
    }

    public function nodeId($id)
    {
      $this->nodeId = $id;
      return $this;
    }

    public function nodeName($name)
    {
        $this->nodeName = $name;
        return $this;
    }

    public function nodeLatLng($lat,$lng)
    {
        $this->nodeLat = $lat;
        $this->nodeLng = $lng;
        return $this;
    }

    public function flagTypeId($id)
    {
      $this->flagTypeId = $id;
      return $this;
    }

    public function flagTypeName($name)
    {
        $this->flagTypeName = $name;
        return $this;
    }

    public function linkParent($nodeDef)
    {
        $this->linkParent = $nodeDef;
        return $this;
    }

    public function linkChildren($nodeDef)
    {
        $this->linkChildren = $nodeDef;
        return $this;
    }

}
