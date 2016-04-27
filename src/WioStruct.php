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
        Networks table
    */

    public function getNetworks()
    {
        $query = $this->qb->table('wio_struct_networks');
        return $query->get();
    }

    public function addNetwork($name)
    {
        $this->errorLog->off();
        $networkId = $this->getNetworkId($name);
        $this->errorLog->on();

        if ($networkId === false)
        {
            $data = ['name' => $name];
            $insertId = $this->qb->table('wio_struct_networks')->insert($data);
            return $insertId;
        }
        else
        {
            $this->errorLog->errorLog('Notice: Nerwork "'.$name.'" [id:'.$networkId.'] already exists.');
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

    private function settingsGetNetworkSubquery($settings)
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
        NodeTypes table
    */

    public function addNodeType($settings, $name)
    {
        $this->errorLog->off();
        $nodeTypeId = $this->getNodeTypeId($settings, $name);
        $this->errorLog->on();

        if ($nodeTypeId === false)
        {
            $networkId = $this->settingsGetNetworkId($settings);

            if ($networkId === false)
            {
                $this->errorLog->errorLog('addNodeType: no given network.');
                return false;
            }


            $data = ['network_id' => $networkId, 'name' => $name];
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

    public function getNodeTypes($settings = [])
    {
        $subQuery = false;
        if (!empty($settings))
        {
            $subQuery = $this->settingsGetNetworkSubquery($settings);
        }

        if (is_numeric($subQuery))
        {
            $query = $this->qb->table('wio_struct_node_types')
                ->where('network_id', $subQuery);
        }
        elseif ($subQuery !== false)
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

    private function settingsGetNodeTypeSubquery($settings)
    {
        if (isset($settings['nodeTypeId']))
        {
            return $settings['nodeTypeId'];
        }
        elseif (isset($settings['nodeTypeName']))
        {
            $subQuery = $this->settingsGetNetworkSubquery($settings);

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
        $settings['nodeName'] = $name;
        $this->errorLog->off();
        $nodeId = $this->getNodeId($settings);
        $this->errorLog->on();

        if ($nodeId === false)
        {
            $nodeTypeId = $this->settingsGetNodeTypeId($settings);

            if ($nodeTypeId === false)
            {
                $this->errorLog->errorLog('addNode: no given nodeType.');
                return false;
            }

            $data = [
                'node_type_id' => $nodeTypeId,
                'name' => $name,
                'lat' => $lat,
                'lng' => $lng
            ];
            $insertId = $this->qb->table('wio_struct_nodes')->insert($data);
            return $insertId;
        }
        else
        {
            $this->errorLog->errorLog('Notice: Node "'.$name.'" [id:'.$nodeId.'] already exists.');
            return $nodeId;
        }
    }

    public function getNodeId($settings)    // aka. settingsGetNodeId()
    {
        if (isset($settings['nodeId']))
        {
            return $settings['nodeId'];
        }
        $name = $settings['nodeName'];
        $subQuery = $this->settingsGetNodeTypeSubquery($settings);

        if (is_numeric($subQuery))
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

    public function getNodeById($nodeId)
    {
        $query = $this->qb->table('wio_struct_nodes')
            ->select('id')
            ->where('id',$nodeId);
        return $query->first();
    }

    public function getNodes($settings = [])
    {
        $subQuery = false;
        if (!empty($settings))
        {
            $subQuery = $this->settingsGetNodeTypeSubquery($settings);
        }

        if (is_numeric($subQuery))
        {
            $query = $this->qb->table('wio_struct_nodes')
                ->where('node_type_id', $subQuery);
        }
        elseif ($subQuery !== false)
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

    public function changeNodeData($settings, $data)
    {
        if (isset($settings['nodeId']))
        {
            $nodeId = $settings['nodeId'];
        }
        else
        {
            $nodeId = $this->getNodeId($settings);
        }
        $this->qb->table('wio_struct_nodes')->where('id',$nodeId)->update($data);
    }

    private function settingsGetNodeSubquery($settings)
    {
        if (isset($settings['nodeId']))
        {
            return $settings['nodeId'];
        }
        elseif (isset($settings['nodeName']))
        {
            $query = $this->qb->table('wio_struct_nodes')
                ->select('id')
                ->where('name',$settings['nodeName']);

            $subQuery = $this->settingsGetNodeTypeSubquery($settings);

            if (is_numeric($subQuery))
            {
                $query->where('node_type_id',$subQuery);
            }
            else
            {
                $query->where($this->qb->raw('node_type_id = '.$subQuery));
            }
            return $query;
        }
        else
        {
            $this->errorLog->errorLog('No "nodeId" or "nodeName" in $settings');
            return false;
        }


    }


    public function getLoseNodes($settings = []){}
    public function getClosestNode($lat, $lng, $settings = []){}



    /*
        Links table
    */
    public function getLinkId($parentId,$childrenId)
    {
        $query = $this->qb->table('wio_struct_links')
            ->select('id')
            ->where('node_parent_id',$parentId)
            ->where('node_children_id',$childrenId);

        return $query->first();
    }

    public function addLink($parentSettings,$childrenSettings)
    {
        $this->errorLog->off();
        $parentId = $this->getNodeId($parentSettings);
        $childrenId = $this->getNodeId($childrenSettings);
        $this->errorLog->on();

        $linkId = $this->getLinkId($parentId,$childrenId);

        if ($linkId === null)
        {
            $data = [
                'node_parent_id' => $parentId,
                'node_children_id' => $childrenId,
                'auto_generated' => 0
            ];
            $insertedId = $this->qb->table('wio_struct_links')->insert($data);
            $this->generateAutoLinks($parentId,$childrenId);
            return $insertedId;
        }
        else
        {
            $this->errorLog->errorLog('Notice: Link [id:'.$linkId->id.'] already exists.');
            return $linkId->id;
        }
    }

    private function generateAutoLinks($parentId,$nodeId)
    {
        $otherParents = $this->getNodeParentLinks(['nodeId'=>$parentId]);

        foreach ($otherParents as $aParent)
        {
            $linkId = $this->getLinkId($aParent->node_parent_id,$nodeId);
            if ($linkId === null)
            {
                $data = [
                    'node_parent_id' => $aParent->node_parent_id,
                    'node_children_id' => $nodeId,
                    'auto_generated' => 1
                ];
                $this->qb->table('wio_struct_links')->insert($data);
            }
        }
    }

    private function removeAutoGeneratedLinks($nodeId)
    {
        $this->qb->table('wio_struct_links')
            ->where('node_children_id',$nodeId)
            ->where('auto_generated',1)
            ->delete();
    }

    public function getNodeParentLinks($settings)
    {
        $nodeId = $this->getNodeId($settings);

        $query = $this->qb->table('wio_struct_links')
            ->where('node_children_id',$nodeId)
            ->select('node_parent_id');

        if (isset($settings['linkAutoGenerated']))
        {
            $query->where('auto_generated',$settings['linkAutoGenerated']);
        }

        return $query->get();
    }

    # Testing Method
    public function showLinksWithNodes($settings = [])
    {
        $nodeTypesTable = $this->getNodeTypes();
        $nodesTable = $this->getNodes();

        $nodeTypes = [];
        foreach ($nodeTypesTable as $nodeType)
        {
            $nodeTypes[ $nodeType->id ]=$nodeType;
        }

        $nodes = [];
        foreach ($nodesTable as $node)
        {
            $nodes[ $node->id ]=$node;
        }

        $query = $this->qb->table('wio_struct_links')->select('*');
        $links = $query->get();

        $html = '';
        foreach ($links as $link)
        {
            $html .= '<tr><td>#'.$link->id.'</td>';
            $html .= '<td>('.$nodeTypes[ $nodes[ $link->node_parent_id ]->node_type_id ]->name.')</td>';
            $html .= '<td>'.$nodes[ $link->node_parent_id ]->name.'</td>';
            if ($link->auto_generated==0)
            {
                $html .='<td><strong>===&gt;</strong></td>';
            }
            else
            {
                $html .='<td>--&gt;</td>';
            }
            $html .= '<td>('.$nodeTypes[ $nodes[ $link->node_children_id ]->node_type_id ]->name.')</td>';
            $html .= '<td>'.$nodes[ $link->node_children_id ]->name.'</td>';
            $html .= '</tr>';

        }

        return $html;
    }


    /*
      NodeFlagTypes table
    */
    public function getNodeFlagsTypes()
    {
        $query = $this->qb->table('wio_struct_node_flags_types');
        return $query->get();
    }

    public function addNodeFlagsType($name)
    {
        $this->errorLog->off();
        $nodeFlagsTypeId = $this->getNodeFlagsTypeId($name);
        $this->errorLog->on();

        if ($nodeFlagsTypeId === false)
        {
            $data = ['name' => $name];
            $insertId = $this->qb->table('wio_struct_node_flags_types')->insert($data);
            return $insertId;
        }
        else
        {
            $this->errorLog->errorLog('Notice: NodeFlagsType "'.$name.'" [id:'.$nodeFlagsTypeId.'] already exists.');
            return $nodeFlagsTypeId;
        }
    }

    public function getNodeFlagsTypeId($name)
    {
        $query = $this->qb->table('wio_struct_node_flags_types')->select('id')->where('name',$name);
        $row = $query->first();

        if ($row != null)
        {
            return $row->id;
        }
        else
        {
            $this->errorLog->errorLog('getNodeFlagsTypeId: NodeFlagsType "'.$name.'" not found.');
            return false;
        }
    }

    private function settingsGetNodeFlagTypeSubquery($settings)
    {
        if (isset($settings['nodeFlagsTypeId']))
        {
            return $settings['nodeFlagsTypeId'];
        }
        elseif (isset($settings['nodeFlagsTypeName']))
        {
            return $this->qb->table('wio_struct_networks')->select('id')->where('name',$settings['nodeFlagsTypeName']);
        }
        else
        {
            $this->errorLog->errorLog('No "nodeFlagsTypeId" or "nodeFlagsTypeName" in $settings');
            return false;
        }
    }

    private function settingsGetNodeFlagTypeId($settings)
    {
        if (isset($settings['nodeFlagsTypeId']))
        {
            return $settings['nodeFlagsTypeId'];
        }
        elseif (isset($settings['nodeFlagsTypeName']))
        {
            return $this->getNodeFlagsTypeId($settings['nodeFlagsTypeName']);
        }
        else
        {
            $this->errorLog->errorLog('No "nodeFlagsTypeId" or "nodeFlagsTypeName" in $settings');
            return false;
        }

    }


    /*
      NodeFlags table
    */


    public function addNodeFlag($settings, $flagData)
    {
        $this->errorLog->off();
        $nodeFlagId = $this->getNodeFlagId($settings, $flagData);
        $this->errorLog->on();

        if ($nodeFlagId === false)
        {
            $nodeFlagsTypeId = $this->settingsGetNodeFlagTypeId($settings);

            if ($nodeFlagsTypeId === false)
            {
                $this->errorLog->errorLog('addNodeFlag: no given nodeFlagsType.');
                return false;
            }

            $nodeId = $this->getNodeId($settings);

            if ($nodeId === false)
            {
                $this->errorLog->errorLog('addNodeFlag: no given Node.');
                return false;
            }

            $data = [
                'node_id' => $nodeId,
                'node_flag_type_id' => $nodeFlagsTypeId,
                'flag_data' => $flagData
            ];
            $insertId = $this->qb->table('wio_struct_node_flags')->insert($data);
            return $insertId;
        }
        else
        {
            $this->errorLog->errorLog('Notice: NodeFlag "'.$flagData.'" [id:'.$nodeFlagId.'] already exists.');
            return $nodeFlagId;
        }
    }

    public function getNodeFlagId($settings, $flagData)
    {
        $subQuery = $this->settingsGetNodeFlagTypeSubquery($settings);

        if (is_numeric($subQuery))
        {
            $query = $this->qb->table('wio_struct_node_flags')
                ->select('id')
                ->where('node_flag_type_id', $subQuery)
                ->where('flag_data', $flagData);
        }
        elseif ($subQuery !== false)
        {
            $query = $this->qb->table('wio_struct_node_flags')
                ->select('id')
                ->where($this->qb->raw('node_flag_type_id = ' . $this->qb->subQuery($subQuery)))
                ->where('flag_data',$flagData);
        }
        else
        {
            $this->errorLog->errorLog('getNodeFlagId: No "nodeFlagsTypeId" or "nodeFlagsTypeName" found in $settings.');
            return false;
        }

        $subQuery2 = false;
        if (!empty($settings))
        {
            $subQuery2 = $this->settingsGetNodeSubquery($settings);
        }

        if (is_numeric($subQuery2))
        {
            $query->where('node_id', $subQuery2);
        }
        elseif ($subQuery2 !== false)
        {
            $query->where($this->qb->raw('node_id = ' . $this->qb->subQuery($subQuery2)));
        }
        else
        {
            $this->errorLog->errorLog('getNodeFlagId: No "nodeId" or "nodeName" found in $settings.');
            return false;
        }


        $row = $query->first();

        if ($row != null)
        {
            return $row->id;
        }
        else
        {
            $this->errorLog->errorLog('getNodeFlagId: NodeFlag "'.$flagData.'" not found.');
            return false;
        }
    }

    public function getNodeFlags($settings = [])
    {
        $subQuery = false;
        if (!empty($settings))
        {
            $subQuery = $this->settingsGetNodeFlagTypeSubquery($settings);
        }

        if (is_numeric($subQuery))
        {
            $query = $this->qb->table('wio_struct_node_flags')
                ->where('node_flag_type_id', $subQuery);
        }
        elseif ($subQuery !== false)
        {
            $query = $this->qb->table('wio_struct_node_flags')
                ->where($this->qb->raw('node_flag_type_id = ' . $this->qb->subQuery($subQuery)));
        }
        else
        {
            $query = $this->qb->table('wio_struct_node_flags');
        }

        $subQuery2 = false;
        if (!empty($settings))
        {
            $subQuery2 = $this->settingsGetNodeSubquery($settings);
        }

        if (is_numeric($subQuery2))
        {
            $query->where('node_id', $subQuery2);
        }
        elseif ($subQuery2 !== false)
        {
            $query->where($this->qb->raw('node_id = ' . $this->qb->subQuery($subQuery2)));
        }

        return $query->get();
    }


/* Notes:
- do we want IDs from Links outside?
- we don't want error messages of searching the IDs from adding functions

*/
}
