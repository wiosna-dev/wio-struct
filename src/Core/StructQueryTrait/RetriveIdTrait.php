<?php
namespace WioStruct\Core\StructQueryTrait;

trait RetriveIdTrait
{

    private $retrievingIdPossibilities =
    [
        'Network' =>
        [
            [
                'values' => ['networkId'],
                'table'  => false,
            ],
            [
                'values' => ['networkName'],
                'table'  => 'Network'
            ]
        ],
        'FlagType' =>
        [
            [
                'values' => ['flagTypeId'],
                'table'  => false,
            ],
            [
                'values' => ['flagTypeName'],
                'table'  => 'FlagType'
            ]
        ],
        'NodeType' =>
        [
            [
                'values' => ['nodeTypeId'],
                'table'  => false,
            ],
            [
                'values' => ['nodeTypeName','networkId'],
                'table'  => 'NodeType'
            ],
            [
                'values' => ['nodeTypeName','networkName'],
                'table'  => 'NodeType',
                'join'   => ['Network']
            ]
        ],
        'Node' =>
        [
            [
                'values' => ['nodeId'],
                'table'  => false,
            ],
            [
                'values' => ['nodeName','nodeTypeId'],
                'table'  => 'Node'
            ],
            [
                'values' => ['nodeName','nodeTypeName','networkId'],
                'table'  => 'Node',
                'join'   => ['NodeType']
            ],
            [
                'values' => ['nodeName','nodeTypeName','networkName'],
                'table'  => 'Node',
                'join'   => ['NodeType','Network']
            ]
        ]
    ];

    private function retriveId($mainTable)
    {
        $this->pointAtTable = $mainTable;
        $retrievingIdPossibilities = $this->retrievingIdPossibilities[ $this->pointAtTable ];

        foreach ($retrievingIdPossibilities as &$retrievingIdPossibility)
        {
            if (!$this->checkValues($retrievingIdPossibility))
            {
                continue;
            }

            if ($retrievingIdPossibility['table'] === false)
            {
                $variableName = $retrievingIdPossibility['values'][0];
                return $this->structDefinition->$variableName;
            }

            $this->setQueryTable();

            if (isset($retrievingIdPossibility['join']))
            {
                $this->setQueryJoins($retrievingIdPossibility['join']);
            }

            $this->setQueryValues($retrievingIdPossibility['values']);

            $this->query->select($this->tableNames[ $this->pointAtTable ].'.id');

            $answer = $this->query->first();

            if (isset($answer->id))
            {
                return $answer->id;
            }

            return false;
        }
        return false;
    }

    private function checkValues(&$retrievingIdPossibility)
    {
        foreach ($retrievingIdPossibility['values'] as $value)
        {
            if ($this->structDefinition->$value === false)
            {
                return false;
            }
        }
        return true;
    }
}
