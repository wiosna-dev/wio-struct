<?php
namespace WioStruct\Core;

class StructQuery
{
    use NetworkTrait;
    use NodeTypeTrait;
    use NodeTrait;
    use LinkTrait;

    private $structDefinition;
    private $errorLog;
    private $qb;

    function __construct(\WioStruct\Core\StructDefinition $structDefinition, $errorLog, $qb)
    {
        $this->structDefinition = $structDefinition;
        $this->errorLog = $errorLog;
        $this->qb = $qb;
    }


    public function newQuery(\WioStruct\Core\StructDefinition $structDefinition)
    {
        return new StructQuery($structDefinition,$this->errorLog,$this->qb);
    }


    public function get()
    {


    }

    public function first()
    {

    }

}
