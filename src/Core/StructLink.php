<?php
namespace WioStruct\Core;

class StructLink
{
    private $errorLog;
    private $qb;

    private $query;

    function __construct($errorLog, $qb)
    {
        $this->errorLog = $errorLog;
        $this->qb = $qb;
    }

    public function checkLink($parentId,$childrenId)
    {
        $linkId = $this->qb->table('wio_struct_links')
                            ->where('node_parent_id',$parentId)
                            ->where('node_children_id',$childrenId)
                            ->select('id')
                            ->first();

        if ($linkId != null)
        {
            return $linkId->id;
        }
        return false;
    }

}
