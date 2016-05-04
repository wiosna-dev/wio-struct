<?php
namespace WioStruct\Core;

trait NodeFlagTypeTrait
{


    function addNodeFlagType($name)
    {
        $this->errorLog->off();
        $structDef = (new StructDefinition)
            ->nodeFlagTypeName($name);
        $nodeFlagTypeId = $this->newQuery($structDef)
            ->firstNodeFlagType('id');
        $this->errorLog->on();

        if ($nodeFlagTypeId === false)
        {
            $data = ['name' => $name];
            $insertId = $this->qb->table('wio_struct_node_flag_types')->insert($data);
        }
        else
        {
            $this->errorLog->errorLog('Notice: NodeFlagType "'.$name.'" [id:'.$nodeFlagTypeId.'] already exists.');
        }

        return $this;
    }


    function getNodeFlagTypes($selects = false)
    {
        $query = $this->qb->table('wio_struct_node_flag_types');

        if ($this->structDefinition->nodeFlagTypeId !== false)
        {
            $query->where('id', $this->structDefinition->nodeFlagTypeId);
        }
        if ($this->structDefinition->nodeFlagTypeName !== false)
        {
            $query->where('name', $this->structDefinition->nodeFlagTypeName);
        }

        if ($selects == false)
        {
            $query->select('*');
        }
        else
        {
            $query->select($selects);
        }

        return $query->get();
    }

    function firstNodeFlagType($selects = false){
        $query = $this->qb->table('wio_struct_node_flag_types');

        if ($this->structDefinition->nodeFlagTypeId !== false)
        {
            $query->where('id', $this->structDefinition->nodeFlagTypeId);
        }

        if ($this->structDefinition->nodeFlagTypeName !== false)
        {
            $query->where('name', $this->structDefinition->nodeFlagTypeName);
        }

        if ($selects == false)
        {
            $query->select('*');
        }
        else
        {
            $query->select($selects);
        }

        $answer = $query->first();

        if ($selects !== false and isset($answer->$selects))
        {
            return $answer->$selects;
        }
        if ($answer === null)
        {
            return false;
        }


    }

}
