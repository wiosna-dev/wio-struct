<?php
namespace WioStruct\Core;

trait NodeTypeTrait
{

    public function addNodeType($name)
    {
        $this->errorLog->off();
        $structDef = (clone $this->structDefinition);
        $structDef->nodeTypeName($name);
        $nodeTypeId = $this->newQuery($structDef)
            ->firstNodeType('id');
        $this->errorLog->on();

        if ($nodeTypeId === false)
        {
            $networkId = $this->newQuery(clone $this->structDefinition)
                ->firstNetwork('id');

            if ($networkId === false)
            {
                $this->errorLog->errorLog('addNodeType: no given network.');
                return false;
            }


            $data = ['network_id' => $networkId, 'name' => $name];
            $insertId = $this->qb->table('wio_struct_node_types')->insert($data);
        }
        else
        {
            $this->errorLog->errorLog('Notice: NodeType "'.$name.'" [id:'.$nodeTypeId.'] already exists.');
        }

        return $this;
    }

    public function getNodeTypeId($settings, $name)
    {
        $subQuery = $this->settingsGetNetworkSubquery($settings);

        if (is_numeric($subQuery))
        {
            $query = $this->qb->table('wio_struct_node_types')
                ->select('id')
                ->where('network_id', $subQuery)
                ->where('name', $name);
        }
        else
        {
            $query = $this->qb->table('wio_struct_node_types')
                ->select('id')
                ->where($this->qb->raw('network_id = ' . $this->qb->subQuery($subQuery)))
                ->where('name',$name);
        }
        $row = $query->first();

        if ($row != null)
        {
            return $row->id;
        }
        else
        {
            $this->errorLog->errorLog('getNodeTypeId: NodeType "'.$name.'" not found.');
            return false;
        }
    }

    public function getNodeTypes($selects = false)
    {

        $query = $this->qb->table('wio_struct_node_types');

        if ($this->structDefinition->networkId !== false)
        {
            $query->where('network_id', $this->structDefinition->networkId);
        }

        if ($this->structDefinition->networkName !== false)
        {
            $subQuery = $this->qb->table('wio_struct_networks')
                ->select('id')
                ->where('name', $this->structDefinition->networkName);
            $query->where($this->qb->raw('network_id = '.$this->qb->subQuery($subQuery)));
        }


        if ($selects === false)
        {
            $query->select('*');
        }
        else
        {
            $query->select($selects);
        }

        return $query->get();
    }



    public function firstNodeType($selects = false)
    {
        $query = $this->qb->table('wio_struct_node_types');

        if ($this->structDefinition->networkId !== false)
        {
            $query->where('network_id', $this->structDefinition->networkId);
        }

        if ($this->structDefinition->networkName !== false)
        {
            $subQuery = $this->qb->table('wio_struct_networks')
                ->select('id')
                ->where('name', $this->structDefinition->networkName);
            $query->where($this->qb->raw('network_id = '.$this->qb->subQuery($subQuery)));
        }

        if ($this->structDefinition->nodeTypeId !== false)
        {
            $query->where('id', $this->structDefinition->networkId);
        }

        if ($this->structDefinition->nodeTypeName !== false)
        {
            $query->where('name',$this->structDefinition->nodeTypeName);
        }


        if ($selects === false)
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

        return $answer;
    }

    private function subQueryAddNodeType2node(&$query)
    {
        if($this->structDefinition->nodeTypeId !== false)
        {
            $query->where('node_type_id', $this->structDefinition->nodeTypeId);
        }

        if($this->structDefinition->nodeTypeName !== false)
        {
            $this->subQueryAddNetwork2nodeType();
          $subQuery = $this->qb->table('wio_struct_node_types')
              ->select('id')
              ->where('name', $this->structDefinition->nodeTypeName);
          $query->where($this->qb->raw('node_type_id = '.$this->qb->subQuery($subQuery)));


        }

    }

}
