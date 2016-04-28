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
    public $flagName;
    public $flagId;
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
        $this->flagName = false;
        $this->flagId = false;
        $this->linkParent = false;
        $this->linkChildren = false;
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


    public function flagName($name)
    {
        $this->flagName = $name;
        return $this;
    }

    public function flagId($id)
    {
        $this->flagId = $id;
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
