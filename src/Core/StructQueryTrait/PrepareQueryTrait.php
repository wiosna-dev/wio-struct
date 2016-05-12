<?php
namespace WioStruct\Core\StructQueryTrait;

trait PrepareQueryTrait
{

    private $joinsMade = [];

    private $queryTables = [];

    private function setQueryTable()
    {
        if (!isset($this->tableNames[ $this->pointAtTable ]))
        {
            $this->errorLog->errorLog('Unknown table '.$this->pointAtTable.' in database.');
            return false;
        }

        $this->query = $this->qb->table($this->tableNames[ $this->pointAtTable ]);
        $this->queryTables[$this->pointAtTable] = true;
    }

    private function setQueryJoins($joinsTable)
    {
        $tableA = $this->tableNames[ $this->pointAtTable ];

        foreach ($joinsTable as $tableName)
        {
            $tableB = $this->tableNames[$tableName];
            if (isset($this->joinKeys[$tableA][$tableB]))
            {
                $joinProps = $this->joinKeys[$tableA][$tableB];
                $this->query->join($tableB, $joinProps[0], $joinProps[1], $joinProps[2]);
                $this->queryTables[$tableName] = true;
            }
            else
            {
                $this->errorLog->errorLog('Unable to Join '.$tableA.' and '.$tableB.'.');
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
            foreach ($this->structDefinitionTableColumns[$valueName] as $table => $column)
            {
                if (isset($this->queryTables[$table]))
                {
                    $valueColumn = $column;
                    break;
                }
            }
            $this->query->where($valueColumn, $value);
        }

    }


    private function prepareQuery()
    {
        $this->setQueryTable();

        $this->prepareLinkDefinitions();

        foreach ($this->structDefinitionVariables as $varName => $varProperties)
        {
            // var_dump($varName);
            // var_dump($this->structDefinition->$varName);
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
            $this->queryTables[$rightTableName] = true;

            $leftTableName = $rightTableName;
        }
    }



    private function prepareLinkDefinitions()
    {
        $toCheck =
        [
            'linkParent'   => 'parent',
            'linkChildren' => 'children'
        ];
        $toRetrieve =
        [
            'networkId'    => 'NetworkId',
            'networkName'  => 'NetworkName',
            'nodeTypeId'   => 'NodeTypeId',
            'nodeTypeName' => 'NodeTypeName',
            'nodeId'       => 'NodeId',
            'nodeName'     => 'NodeName',
            'flagTypeId'   => 'FlagTypeId',
            'flagTypeName' => 'FlagTypeName'
        ];

        foreach ($toCheck as $variable => $prefix)
        {
            $struct = $this->structDefinition->$variable;
            if ($struct)
            {
                foreach ($toRetrieve as $name => $newName)
                {
                    if ($struct->$name)
                    {
                        $nameWithPrefix = $prefix.$newName;
                        $this->structDefinition->$nameWithPrefix = $struct->$name;
                    }
                }
            }
        }
    }


    private function printQuery()
    {
        $q = $this->query->getQuery();
        echo $q->getRawSql().'<br/>';
    }
}

/*
SELECT
  Nodes.`id` as NodeId,
  Nodes.`name` as NodeName,
  Nodes.`lat` as NodeLat,
  Nodes.`lng` as NodeLng,
  NodeTypes.`name` as NodeType,
  Networks.`name` as Network
FROM `wio_struct_nodes` as Nodes
  INNER JOIN `wio_struct_node_types` as NodeTypes
    ON Nodes.`node_type_id` = NodeTypes.`id`
  INNER JOIN `wio_struct_networks` as Networks
    ON NodeTypes.`network_id` = Networks.`id`
  INNER JOIN `wio_struct_links` as Links
  	ON Nodes.`id` = Links.`node_children_id`
  INNER JOIN `wio_struct_nodes` as ParentNodes
  	ON ParentNodes.`id` = Links.`node_parent_id`
  INNER JOIN `wio_struct_node_types` as ParentNodeTypes
  	ON ParentNodeTypes.`id` = ParentNodes.`node_type_id`
  INNER JOIN `wio_struct_networks` as ParentNetworks
  	ON ParentNetworks.`id` = ParentNodeTypes.`network_id`
WHERE Networks.name = 'administrative'
  AND NodeTypes.name = 'city'
  AND ParentNodes.name = 'Śląsk'
  AND ParentNodeTypes.name = 'state'
  AND ParentNetworks.name = 'administrative'

  */
