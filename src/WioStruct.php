<?php
namespace WioStruct;

use \WioStruct\ErrorLog\ErrorLog;
class WioStruct
{

    public $qb;

    public $errorLog;

    function __construct(\Pixie\QueryBuilder\QueryBuilderHandler $qb)
    {
        $this->qb = $qb;

        $this->errorLog = new ErrorLog();
    }

    /*
    * Network table
    */

    public function getNetworks()
    {
        $query = $this->qb->table('wio_struct_networks');
        return $query->get();
    }

    public function addNetwork($name)
    {
        $networkId = $this->getNetworkId($name);

        if ($networkId === false)
        {
            $data = array('name' => $name);
            $insertId = $this->qb->table('wio_struct_networks')->insert($data);
            return $insertId;
        }
        else
        {
            $this->errorLog->errorLog('Notice: Network "'.$name.'" [id:'.$networkId.'] already exists.');
            return $networkId;
        }
    }

    public function getNetworkAdministrativeId()
    {
        return 1;
    }

    public function getNetworkId($name)
    {
        $query = $this->qb->table('wio_struct_networks')->select('id')->where('name',$name);
        $row = $query->first();

        if ($row != null)
        {
            return $row->id;
        }
        else
        {
            $this->errorLog->errorLog('getNetworkId: Network "'.$name.'" not found.');
            return false;
        }
    }

    private function settingsGetNetworkSubQuery($settings)
    {
        if (isset($settings['networkId']))
        {
            return $settings['networkId'];
        }
        elseif (isset($settings['networkName']))
        {
            return $this->qb->table('wio_struct_networks')->select('id')->where('name',$settings['networkName']);
        }
        else
        {
            $this->errorLog->errorLog('No "networkId" or "networkName" in $settings');
            return false;
        }
    }

    private function settingsGetNetworkId($settings)
    {
        if (isset($settings['networkId']))
        {
            return $settings['networkId'];
        }
        elseif (isset($settings['networkName']))
        {
            return $this->getNetworkId($settings['networkName']);
        }
        else
        {
            $this->errorLog->errorLog('No "networkId" or "networkName" in $settings');
            return false;
        }
    }

    /*
        NodeType table
    */

    public function addNodeType($settings, $name)
    {
        $nodeTypeId = $this->getNodeTypeId($settings, $name);

        if ($nodeTypeId === false)
        {
            $networkId = $this->settingsGetNetworkId($settings);

            if ($networkId === false)
            {
                $this->errorLog->errorLog('addNodeType: no given network.');
                return false;
            }


            $data = array('network_id' => $networkId, 'name' => $name);
            $insertId = $this->qb->table('wio_struct_node_types')->insert($data);
            return $insertId;
        }
        else
        {
            $this->errorLog->errorLog('Notice: NodeType "'.$name.'" [id:'.$nodeTypeId.'] already exists.');
            return $nodeTypeId;
        }
    }

    public function getNodeTypeId($settings, $name)
    {
        $subQuery = $this->settingsGetNetworkSubQuery($settings);

        if(is_numeric($subQuery))
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

    public function getNodeTypes($settings = [])
    {
        $subQuery = $this->settingsGetNetworkSubQuery($settings);

        if(is_numeric($subQuery))
        {
            $query = $this->qb->table('wio_struct_node_types')
                ->where('network_id', $subQuery);
        }
        elseif($subQuery !== false)
        {
            $query = $this->qb->table('wio_struct_node_types')
                ->where($this->qb->raw('network_id = ' . $this->qb->subQuery($subQuery)));
        }
        else
        {
            $query = $this->qb->table('wio_struct_node_types');
        }

        return $query->get();
    }

    private function settingsGetNodeTypeSubQuery($settings)
    {
        if (isset($settings['nodeTypeId']))
        {
            return $settings['nodeTypeId'];
        }
        elseif (isset($settings['nodeTypeName']))
        {
            $subQuery = $this->settingsGetNetworkSubQuery($settings);

            if (is_numeric($subQuery))
            {
                return $this->qb->table('wio_struct_node_types')
                    ->select('id')
                    ->where('network_id',$subQuery)
                    ->where('name',$settings['nodeTypeName']);
            }
            else
            {
                return $this->qb->table('wio_struct_node_types')
                    ->select('id')
                    ->where($this->qb->raw('network_id = ' . $this->qb->subQuery($subQuery)))
                    ->where('name',$settings['nodeTypeName']);
            }
        }
        else
        {
            $this->errorLog->errorLog('No "nodeTypeId" or "nodeTypeName" in $settings');
            return false;
        }
    }

    private function settingsGetNodeTypeId($settings)
    {
        if (isset($settings['nodeTypeId']))
        {
            return $settings['nodeTypeId'];
        }
        elseif (isset($settings['nodeTypeName']))
        {
            return $this->getNodeTypeId($settings,$settings['nodeTypeName']);
        }
        else
        {
            $this->errorLog->errorLog('No "nodeTypeId" or "nodeTypeName" in $settings');
            return false;
        }
    }

    /*
        Nodes table
    */

    public function addNode($settings, $name, $lat = 0, $lng = 0)
    {
        $nodeId = $this->getNodeId($settings, $name);

        if ($nodeId === false)
        {
            $nodeTypeId = $this->settingsGetNodeTypeId($settings);

            if ($nodeTypeId === false)
            {
                $this->errorLog->errorLog('addNode: no given nodeType.');
                return false;
            }

            $data = array('node_type_id' => $nodeTypeId, 'name' => $name, 'lat' => $lat, 'lng' => $lng);
            $insertId = $this->qb->table('wio_struct_nodes')->insert($data);
            return $insertId;
        }
        else
        {
            $this->errorLog->errorLog('Notice: NodeType "'.$name.'" [id:'.$nodeId.'] already exists.');
            return $nodeId;
        }


    }

    public function getNodeId($settings, $name)
    {
        $subQuery = $this->settingsGetNodeTypeSubQuery($settings);

        if(is_numeric($subQuery))
        {
            $query = $this->qb->table('wio_struct_nodes')
                ->select('id')
                ->where('node_type_id', $subQuery)
                ->where('name', $name);
        }
        else
        {
            $query = $this->qb->table('wio_struct_nodes')
                ->select('id')
                ->where($this->qb->raw('node_type_id = ' . $this->qb->subQuery($subQuery)))
                ->where('name',$name);
        }
        $row = $query->first();

        if ($row != null)
        {
            return $row->id;
        }
        else
        {
            $this->errorLog->errorLog('getNodeId: Node "'.$name.'" not found.');
            return false;
        }
    }

    public function getNodes($settings = [])
    {
        $subQuery = $this->settingsGetNodeTypeSubQuery($settings);

        if(is_numeric($subQuery))
        {
            $query = $this->qb->table('wio_struct_nodes')
                ->where('node_type_id', $subQuery);
        }
        elseif($subQuery !== false)
        {
            $query = $this->qb->table('wio_struct_nodes')
                ->where($this->qb->raw('node_type_id = ' . $this->qb->subQuery($subQuery)));
        }
        else
        {
            $query = $this->qb->table('wio_struct_nodes');
        }

        return $query->get();
    }


    public function getClosestNode($lat, $lng, $settings = []){}


    # getLoseNodes

}
