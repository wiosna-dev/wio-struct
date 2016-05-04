<?php
namespace WioStruct\Core;

trait NodeTrait
{

    public function addNode($name, $lat = 0, $lng = 0)
    {
        $this->errorLog->off();
        $structDef = (clone $this->structDefinition);
        $structDef->nodeName($name);
        $nodeId = $this->newQuery($structDef)
            ->firstNode('id');
        $this->errorLog->on();

            if ($nodeId === false)
            {
                $nodeTypeId = $this->newQuery(clone $this->structDefinition)
                    ->firstNodeType('id');

                if ($nodeTypeId === false)
                {
                    $this->errorLog->errorLog('addNode: no given nodeType.');
                    return false;
                }


                $data = ['node_type_id' => $nodeTypeId, 'name' => $name, 'lat' => $lat, 'lng' => $lng];
                $insertId = $this->qb->table('wio_struct_nodes')->insert($data);

                $this->recentAdd(['nodes' => [$insertId]]);
            }
            else
            {
                $this->errorLog->errorLog('Notice: Node "'.$name.'" [id:'.$nodeId.'] already exists.');
            }

        return $this;
    }


    public function getNodes($selects = false)
    {
        $query = $this->qb->table('wio_struct_nodes');

        $this->subQueryAddNodeType($query);

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


    public function firstNode($selects = false)
    {
        $query = $this->qb->table('wio_struct_nodes');

        $this->subQueryAddNodeType2node($query);

        if($this->structDefinition->nodeTypeId !== false)
        {
            $query->where('node_type_id', $this->structDefinition->nodeTypeId);
        }
        if($this->structDefinition->nodeTypeName !== false)
        {
          $subQuery = $this->qb->table('wio_struct_node_types')
              ->select('id')
              ->where('name', $this->structDefinition->nodeTypeName);
          $query->where($this->qb->raw('network_id = '.$this->qb->subQuery($subQuery)));


        }

        return $query->first();
    }
}
