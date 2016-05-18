<?php
namespace WioStruct\Core\StructQueryTrait;

trait LinksPrepareTrait
{


    private function LinksPrepare($parentId,$childrenId)
    {
        // getting parents of parent
        $parents = $this->query->table('wio_struct_links')
                          ->select('node_parent_id')
                          ->where('node_children_id',$parentId)
                          ->get();
        $parentIds = [];
        foreach ($parents as $parent)
        {
            $parentIds[] = $parent->node_parent_id;
        }

        // getting childrens of children
        $childrens = $this->query->table('wio_struct_links')
                          ->select('node_children_id')
                          ->where('node_parent_id',$childrenId)
                          ->get();
        $childrenIds = [];
        foreach ($childrens as $children)
        {
            $childrenIds[] = $children->node_children_id;
        }

        // Creating table of all needed links
        $autoLinks = [];
        foreach ($parentIds as $pId)
        {
            $autoLinks[] = ['pId'=>$pId, 'cId'=>$childrenId];
        }
        foreach ($childrenIds as $cId)
        {
            $autoLinks[] = ['pId'=>$parentId, 'cId'=>$cId];
        }
        foreach ($parentIds as $pId)
        {
            foreach ($childrenIds as $cId)
            {
                $autoLinks[] = ['pId'=>$pId, 'cId'=>$cId];
            }
        }

        foreach ($autoLinks as $autoLink)
        {
            $isThere = $this->query->table('wio_struct_links')
                        ->where('node_parent_id',$autoLink['pId'])
                        ->where('node_children_id',$autoLink['cId'])
                        ->get();
            if ($isThere == null)
            {
                $data =
                [
                    'node_parent_id' => $autoLink['pId'],
                    'node_children_id' => $autoLink['cId'],
                    'auto_generated' => '1'
                ];
                $this->query->table('wio_struct_links')
                      ->insert($data);

            }
        }
    }

}
