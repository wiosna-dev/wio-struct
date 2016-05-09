<?php
namespace WioStruct\Core;

trait PrepareQueryTrait{

    private $joinsMade = [];


    private function setQueryTable()
    {
        if (!isset($this->tableNames[ $this->pointAtTable ]))
        {
            $this->errorLog->errorLog('Unknown table '.$this->pointAtTable.' in database.');
            return false;
        }

        $this->query = $this->qb->table($this->tableNames[ $this->pointAtTable ]);


    }

    private function prepareQuery()
    {
        $this->setQueryTable();

        foreach ($this->structDefinitionVariables as $varName => $varProperties)
        {
            if ($this->structDefinition->$varName === false)
            {
                continue;
            }

            $variable = $this->structDefinition->$varName;

            $table = each($varProperties['table']);
            $tableName = $table['key'];
            $tableVariableName = $table['value'];

            if ($tableName == $this->pointAtTable)
            {
                $this->query->where($this->tableNames[$tableName].'.'.$tableVariableName,$variable);
            }
            else
            {
                if ($this->queryTryJoin($tableName, $tableVariableName, $variable))
                {
                    $this->query->where($this->tableNames[$tableName].'.'.$tableVariableName, $variable);
                }
            }

        }
    }

    private function queryTryJoin($tableName, $tableVariableName, $variable)
    {
        if (isset($this->joinsMade[ $tableName ]))
        {
            return true;
        }
        else
        {
            if (isset($this->possibleJoins[$this->pointAtTable][$tableName]))
            {
                $this->queryJoin($tableName, $tableVariableName, $variable);
                return true;
            }
            $this->errorLog->errorLog('Not possible to join table '.$this->pointAtTable.' with StructDefinition variable '.$tableName.':'.$tableVariableName.'.');
            return false;
        }

    }

    private function queryJoin($tableName, $tableVariableName, $variable)
    {
        $joinData = $this->possibleJoins[ $this->pointAtTable ][ $tableName ];

        $leftTableName = $this->pointAtTable;
        foreach ($joinData as $rightTableName=>$joinKeys)
        {
            $this->query->join(
                $this->tableNames[$rightTableName],
                $this->tableNames[$leftTableName].'.'.$joinKeys[0],
                '=',
                $this->tableNames[$rightTableName].'.'.$joinKeys[1]
            );

            $this->joinsMade[$rightTableName] = true;

            $leftTableName = $rightTableName;
        }
    }

    private function printQuery()
    {
        $q = $this->query->getQuery();
        echo $q->getRawSql().'<br/>';
    }
}
