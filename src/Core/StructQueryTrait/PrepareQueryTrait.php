<?php
namespace WioStruct\Core\StructQueryTrait;

trait PrepareQueryTrait
{
    private $tablePrefix = '';
    private $currentStrDef;

    private function prepareQuery($tablePrefix = '', $currentStrDef = false)
    {
        $this->tablePrefix = $tablePrefix;

        if ($currentStrDef)
        {
            $this->currentStrDef = $currentStrDef;
        }
        else
        {
            $this->currentStrDef = $this->structDefinition;
        }

        if ($this->tablePrefix == '')
        {
            $this->setQueryTable();
        }

        $this->addSimpleStructDefinitionValues();

        $this->addAdvancedStructDefinitionValues();
    }


    private function addSimpleStructDefinitionValues()
    {
        foreach ($this->structDefinitionValues as $varName => $varProperties)
        {
            if ($this->currentStrDef->$varName === false)
            {
                continue;
            }

            $variable = $this->currentStrDef->$varName;

            $table = each($varProperties);
            $tableName = $table['key'];
            $tableVariableName = $table['value'];

            if ($tableName == $this->mainTable)
            {
                $this->query->where($this->tablePrefix.$this->tableNames[$tableName]['as'].'.'.$tableVariableName, $variable);
            }
            else
            {
                if ($this->tryQueryJoin($tableName, $tableVariableName, $variable))
                {
                    $this->query->where($this->tablePrefix.$this->tableNames[$tableName]['as'].'.'.$tableVariableName, $variable);
                }
            }
        }

    }

    private function tryQueryJoin($tableName, $tableVariableName, $variable)
    {
        if (isset($this->queryTables[ $this->tablePrefix.$tableName ]))
        {
            return true;
        }
        else
        {
            if (isset($this->possibleJoins[$this->mainTable][$tableName]))
            {
                $this->queryJoin($tableName, $tableVariableName, $variable);
                return true;
            }
            $this->errorLog->errorLog('Not possible to join table '.$this->mainTable.' with StructDefinition variable '.$tableName.':'.$tableVariableName.'.');
            return false;
        }

    }

    private function queryJoin($tableName, $tableVariableName, $variable)
    {
        $joinData = $this->possibleJoins[ $this->mainTable ][ $tableName ];

        $leftTableName = $this->mainTable;
        foreach ($joinData as $rightTableName=>$joinKeys)
        {
            $tableA = $this->tableNames[$leftTableName];
            $tableB = $this->tableNames[$rightTableName];
            $this->query->join(
                [ $tableB['table'] => $this->tablePrefix.$tableB['as'] ],
                $this->tablePrefix.$tableA['as'].'.'.$joinKeys[0],
                '=',
                $this->tablePrefix.$tableB['as'].'.'.$joinKeys[1]
            );

            $this->queryTables[$this->tablePrefix.$rightTableName] = true;

            $leftTableName = $rightTableName;
        }
    }

    private function addAdvancedStructDefinitionValues()
    {
        foreach ($this->structDefinitionAdvancedValues as $varName => $varTab)
        {
            if ($this->currentStrDef->$varName === false)
            {
                continue;
            }

            if (is_numeric($this->currentStrDef->$varName))
            {
                $this->addLinkAsId($varName,$this->currentStrDef->$varName);
                continue;
            }

            $this->addLinkAsStructure($varName,$varTab);
        }
    }

    private function addLinkAsId($varName,$id)
    {
        $newPrefix = $varTab['Prefix'].$this->tablePrefix;

        $tableLink = $this->tableNames['Link'];
        $tableNode = $this->tableNames['Node'];

        $this->query->join(
            [ $tableLink['table'] => $newPrefix.$tableLink['as'] ],
            $this->tablePrefix.$tableNode['as'].'.id',
            '=',
            $newPrefix.$tableLink['as'].'.'.$varTab['Node1']
        );
        $this->queryTables[$newPrefix.'Link'] = true;

        $this->query->where($newPrefix.$tableLink['as'].'.'.$varTab['Node1'],$id);
    }

    private function addLinkAsStructure($varName,$varTab)
    {
        $newStrDef = $this->structDefinition->$varName;

        $newPrefix = $varTab['Prefix'].$this->tablePrefix;

        $tableLink = $this->tableNames['Link'];
        $tableNode = $this->tableNames['Node'];

        $this->query->join(
            [ $tableLink['table'] => $newPrefix.$tableLink['as'] ],
            $this->tablePrefix.$tableNode['as'].'.id',
            '=',
            $newPrefix.$tableLink['as'].'.'.$varTab['Node1']
        );
        $this->queryTables[$newPrefix.'Link'] = true;

        $this->query->join(
            [ $tableNode['table'] => $newPrefix.$tableNode['as'] ],
            $newPrefix.$tableNode['as'].'.id',
            '=',
            $newPrefix.$tableLink['as'].'.'.$varTab['Node2']
        );
        $this->queryTables[$newPrefix.'Node'] = true;


        $oldPrefix = $this->tablePrefix;
        $oldStrDef = $this->currentStrDef;

        $this->prepareQuery($newPrefix, $newStrDef);

        $this->tablePrefix = $oldPrefix;
        $this->currentStrDef = $oldStrDef;
    }
}
