<?php
namespace WioStruct\Core\StructQueryTrait;

trait AddTrait
{

    public function add($mainTable, $value0, $value1 = false, $value2 = false)
    {
        $this->mainTable = $mainTable;
        $values = [$value0, $value1, $value2];
        $settings = $this->addingTableSettings[ $this->mainTable ];

        if ($this->getRequiredColumns($settings, $values) === false)
        {
            $this->errorLog->errorLog('Cannot get required values.');
            return $this;
        }

        if ($this->isAlreadySet($settings, $values))
        {
            if ($this->valuesAreOk($settings,$values))
            {
                $this->setQueryTable();
                $this->joinlessSetQueryTable();
                $idInserted = $this->query->insert($values);

                if ($mainTableName == 'Node')
                {
                    $this->structDefinition->nodeId($idInserted);
                }
            }
        }
        else
        {
            $this->errorLog->errorLog('We already have "'.print_r($value0,true).'" in table '.$mainTableName.'.');
        }

        return $this;
    }


    private function getRequiredColumns($settings, &$values)
    {
        $setValues=[];

        // Getting required ID
        $requiredId = false;
        if (isset($settings['requireId']))
        {
            $requiredId = $this->newQuery(clone $this->structDefinition)
                ->getId($settings['requireId']);
            if ($requiredId === false)
            {
                return false;
            }
        }

        // Getting column values
        foreach ($settings['columns'] as $i => $column)
        {
            if ($column === 'requiredId')
            {
                $setValues[$i] = $requiredId;
            }
            elseif (is_numeric($column))
            {
                $setValues[$i] = $values[$column];
            }
            elseif ($column === 'requireFlagTypeId')
            {
                $setValues[$i] = $this->requireFlagTypeId($values[0]);
            }
            elseif ($column === 'requireNodeId')
            {
                $setValues[$i] = $this->requireNodeId($values[0]);
            }
        }

        $values = $setValues;
    }

    private function requireFlagTypeId($flagTypeData)
    {
        if (is_numeric($flagTypeData))
        {
            return $flagTypeData;
        }

        if (is_string($flagTypeData))
        {
            $answer = $this->qb
                           ->table($this->tableNames['FlagType']['table'])
                           ->where('name', $flagTypeData)
                           ->select('id')
                           ->first();

            if (isset($answer->id))
            {
                return $answer->id;
            }
            return false;
        }
    }

    private function requireNodeId($nodeData)
    {
        if (is_numeric($nodeData))
        {
            return $nodeData;
        }

        if (is_a($nodeData, 'WioStruct\Core\StructDefinition'))
        {
            return $this->newQuery($nodeData)
                        ->getId('Node');
        }
    }

    private function isAlreadySet(&$settings, &$values)
    {
        $this->setQueryTable();
        foreach ($settings['check'] as $column)
        {
            $this->query->where($column, $values[$column]);
        }

        $answer = $this->query->select('id')->first();

        if ($answer === null)
        {
            return true;
        }
        return false;
    }

    private function valuesAreOk(&$settings, &$values)
    {
        foreach ($settings['check'] as $column)
        {
            if ($values[$column] === false)
            {
                return false;
            }
        }
        return true;
    }

}
