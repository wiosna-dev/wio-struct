<?php
namespace WioStruct\Core\StructQueryTrait;

trait SetQueryTrait
{

    private $queryTables = [];

    private function setQueryTable()
    {
        $tableData = $this->tableNames[ $this->mainTable ];

        $this->query = $this->qb->table([$tableData['table'] => $tableData['as']]);
        $this->queryTables[$tableData['as']] = true;
    }

    private function joinlessSetQueryTable()
    {
        $tableData = $this->tableNames[ $this->mainTable ];

        $this->query = $this->qb->table($tableData['table']);
        $this->queryTables[$tableData['as']] = true;
    }

    private function setQueryJoins($joinsTable)
    {
        $tableA = $this->tableNames[ $this->mainTable ];

        foreach ($joinsTable as $tableName)
        {
            $tableB = $this->tableNames[$tableName];
            if (isset($this->joinKeys[ $tableA['as'] ][ $tableB['as'] ]))
            {
                $joinProps = $this->joinKeys[ $tableA['as'] ][ $tableB['as'] ];
                $this->query->join(
                    [$tableB['table'], $tableB['as']],
                    $tableA['as'].'.'.$joinProps[0],
                    '=',
                    $tableB['as'].'.'.$joinProps[1]
                );
                $this->queryTables[ $tableB['as'] ] = true;
            }
            else
            {
                $this->errorLog->errorLog('Unable to Join '.$tableA['as'].' and '.$tableB['as'].'.');
                return false;
            }

            $tableA = $tableB;
        }
    }

    private function setQueryValues($values)
    {
        foreach ($values as $valueName)
        {
            $value = $this->structDefinition->$valueName;

            $valueColumn = -221;
            foreach ($this->structDefinitionValues[$valueName] as $table => $column)
            {
                if (isset($this->queryTables[$table]))
                {
                    $valueColumn = $column;
                    break;
                }
            }
            $this->query->where($table.'.'.$valueColumn, $value);
        }

    }

}
