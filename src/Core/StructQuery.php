<?php
namespace WioStruct\Core;

class StructQuery
{
    use StructQueryTrait\AddTrait;
    use StructQueryTrait\GetTrait;
    use StructQueryTrait\GetIdTrait;

    use StructQueryTrait\SetQueryTrait;
    use StructQueryTrait\PrepareQueryTrait;

    use StructQueryTrait\ProccessingArraysTrait;

    private $structDefinition;
    private $errorLog;
    private $qb;

    private $mainTable;
    private $query;

    function __construct(\WioStruct\Core\StructDefinition $structDefinition, $errorLog, $qb)
    {
        $this->structDefinition = $structDefinition;
        $this->errorLog = $errorLog;
        $this->qb = $qb;

        $this->mainTable = false;
        $this->recentlyAdded = false;
    }


    public function newQuery(\WioStruct\Core\StructDefinition $structDefinition)
    {
        return new StructQuery($structDefinition,$this->errorLog,$this->qb);
    }


    private function printQuery()
    {
        $q = $this->query->getQuery();
        echo $q->getRawSql().'<br/>';
    }

}
