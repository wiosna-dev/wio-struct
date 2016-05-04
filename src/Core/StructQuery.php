<?php
namespace WioStruct\Core;

class StructQuery
{
    use NetworkTrait;
    use NodeTypeTrait;
    use NodeTrait;
    use LinkTrait;
    use NodeFlagTrait;
    use NodeFlagTypeTrait;


    private $structDefinition;
    private $errorLog;
    private $qb;

    private $recentlyAdded;

    function __construct(\WioStruct\Core\StructDefinition $structDefinition, $errorLog, $qb)
    {
        $this->structDefinition = $structDefinition;
        $this->errorLog = $errorLog;
        $this->qb = $qb;

        $this->recentlyAdded = false;
    }


    public function newQuery(\WioStruct\Core\StructDefinition $structDefinition)
    {
        return new StructQuery($structDefinition,$this->errorLog,$this->qb);
    }

    private function recentAdd($inserts)
    {
        $this->recentlyAdded = $inserts;
    }

    public function get()
    {


    }

    public function first()
    {

    }

}
