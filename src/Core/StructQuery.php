<?php
namespace WioStruct\Core;

class StructQuery
{
    use NetworkTrait;
    use LinkTrait;
    use NodeTrait;

    private $structDefinition;
    private $errorLog;
    private $qb;

    function __construct(\WioStruct\Core\StructDefinition $structDefinition, $errorLog, $qb)
    {
        $this->structDefinition = $structDefinition;
        $this->errorLog = $errorLog;
        $this->qb = $qb;
    }


    public function get()
    {


    }

    public function first()
    {

    }

}
