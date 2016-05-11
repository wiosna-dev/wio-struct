<?php
namespace WioStruct\Core;

class StructQuery
{
    use StructQueryTrait\AddTrait;
    use StructQueryTrait\IdRetriverTrait;
    use StructQueryTrait\PrepareQueryTrait;
    use StructQueryTrait\ProccessingArraysTrait;


    private $structDefinition;
    private $errorLog;
    private $qb;

    private $recentlyAdded;
    private $pointAtTable;

    private $query;

    function __construct(\WioStruct\Core\StructDefinition $structDefinition, $errorLog, $qb)
    {
        $this->structDefinition = $structDefinition;
        $this->errorLog = $errorLog;
        $this->qb = $qb;

        $this->pointAtTable = false;
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

    public function get($mainTableName, $selects = false)
    {
        $this->pointAtTable = $mainTableName;
        $this->prepareQuery();

        if ($selects !== false)
        {

        }

        return $this->query->get();
    }

    public function getId($mainTableName)
    {


    }

    public function first($mainTableName, $selects = false)
    {
        $this->pointAtTable = $mainTableName;
        $this->prepareQuery();

        // string with single column name of mainTable (like 'id')
        if (is_string($selects))
        {
            $this->query->select($this->tableNames[ $this->pointAtTable ].'.'.$selects);
            if ($this->pointAtTable == 'LinkParent')
            {
                // var_dump($this->structDefinition);
                // $this->printQuery();

            }
            $answer = $this->query->first();

            if ($selects !== false and isset($answer->$selects))
            {
                return $answer->$selects;
            }
            if ($answer === null)
            {
                return false;
            }
            return $answer;
        }
        else
        {
            // we got selects as structure maybe
        }

        return $this->query->first();
    }
}
