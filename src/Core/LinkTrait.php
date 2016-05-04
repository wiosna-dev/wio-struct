<?php
namespace WioStruct\Core;

trait LinkTrait
{

    function linkParent($structDefinition)
    {
        $secondNodeId = false;
        if (is_a($structDefinition, 'StructDefinition'))
        {

        }
        else
        {
            $secondNodeId = $structDefinition;
        }

        return $this;
    }

    function linkChildren(StructDefinition $structDefinition)
    {

        return $this;
    }




}
