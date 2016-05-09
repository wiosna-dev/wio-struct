<?php
namespace WioStruct\Core;

class StructQuery
{
    use ProccessingArraysTrait;
    use PrepareQueryTrait;

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

    public function add($mainTableName, $value0, $value1 = false, $value2 = false)
    {
        $this->pointAtTable = $mainTableName;

        $structDefinition = clone $this->structDefinition;
        $structDefinition->set($mainTableName,$this->tableColumns[ $mainTableName ][0],$value0);

        $tableId = $this->newQuery($structDefinition)
            ->first($mainTableName,'id');

        if ($tableId === false)
        {
            $values = $this->prepareValues($value0,$value1,$value2);
            if ($values)
            {
                $this->setQueryTable();

                $this->printQuery();
                var_dump($values);
                $this->query->insert($values);
            }
            else
            {
                $this->errorLog->errorLog('Not able to set proper values.');
            }
        }
        else
        {
            $this->errorLog->errorLog('We already have "'.print_r($value0,true).'" [id:'.$tableId.'] in table '.$mainTableName.'.');
        }

        return $this;
    }

    private function prepareValues($value0, $value1, $value2)
    {
        $values = [];
        $tableColumns = $this->tableColumns[ $this->pointAtTable ];

        for ($i=0; $i<3; ++$i)
        {
            $valueName = 'value'.$i;
            $value = $$valueName;
            if (is_a($value, '\WioStruct\Core\StructDefinition'))
            {
                $value = $this->newQuery($value)
                    ->first('Node','id');
            }


            echo $i.': '.print_r($$valueName,true).'<br/>';
            if (($$valueName !== false) and isset($tableColumns[$i]))
            {
                $values[ $tableColumns[$i] ] = $value;
            }
        }

        if (isset($tableColumns['required']))
        {
            foreach ($tableColumns['required'] as $requiredTable => $requiredColumn)
            {
                $tableId = $this->newQuery(clone $this->structDefinition)
                    ->first($requiredTable,'id');

                $values[ $requiredColumn ] = $tableId;
            }
        }

        return $values;
    }


    public function get($mainTableName, $selects = false)
    {
        $this->pointAtTable = $mainTableName;
        $this->prepareQuery();

        $this->errorLog->showLog();
        $this->printQuery();
        return $this->query->get();
    }


    public function first($mainTableName, $selects = false)
    {
        $this->pointAtTable = $mainTableName;
        $this->prepareQuery();

        // string with single column name of mainTable (like 'id')
        if (is_string($selects))
        {
            $this->query->select($this->tableNames[ $this->pointAtTable ].'.'.$selects);

            //  $this->printQuery();
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
