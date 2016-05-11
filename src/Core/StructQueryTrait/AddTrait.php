<?php
namespace WioStruct\Core\StructQueryTrait;

trait AddTrait
{

    private $addingTableSettings =
    [
        'Network' => [
            'columns' => ['name'=>0],
            'check' => ['name']
        ],
        'FlagType' => [
            'columns' => ['name'=>0],
            'check' => ['name']
        ],
        'NodeType' => [
            'requireId' => 'Network',
            'columns' => ['network_id'=>'requiredId', 'name'=>0],
            'check' => ['network_id','name']
        ],
        'Node' => [
            'requireId' => 'NodeType',
            'columns' => ['node_type_id'=>'requiredId', 'name'=>0, 'lat'=>1, 'lng'=>2],
            'check' => ['node_type_id','name']
        ],
        'Flag' => [
            'requireId' => 'Node',
            'columns' => ['node_id'=>'requiredId', 'flag_type_id'=>'requireFlagTypeId', 'flag_data'=>1],
            'check' => ['node_id','flag_type_id']
        ],
        'LinkParent' => [
            'requireId' => 'Node',
            'columns' => ['node_children_id'=>'requiredId','node_parent_id'=>'requireNodeId'],
            'check' => ['node_children_id','node_parent_id']
        ],
        'LinkChildren' => [
            'requireId' => 'Node',
            'columns' => ['node_children_id'=>'requiredId','node_parent_id'=>'requireNodeId'],
            'check' => ['node_children_id','node_parent_id']
        ]
    ];


    public function add($mainTableName, $value0, $value1 = false, $value2 = false)
    {
        $this->pointAtTable = $mainTableName;
        $values = [$value0, $value1, $value2];
        $settings = $this->addingTableSettings[$this->pointAtTable];

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
                ->retriveId($settings['requireId']);
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
            if (is_numeric($column))
            {
                $setValues[$i] = $values[$column];
            }
            if ($column === 'requireFlagTypeId')
            {
                $setValues[$i] = $this->requireFlagTypeId($values[0]);
            }
            if ($column === 'requireNodeId')
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
                           ->table($this->tableNames['FlagType'])
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
                        ->retriveId('Node');
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
