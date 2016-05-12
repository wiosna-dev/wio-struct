<?php
namespace WioStruct\Core\StructQueryTrait;

trait GetTrait
{


    private $joinColumnSelects = [
        'Node' =>
        [
            'Node' =>
            [
                'wio_struct_nodes.id' => 'NodeId',
                'wio_struct_nodes.name' => 'NodeName',
                'wio_struct_nodes.lat' => 'NodeLat',
                'wio_struct_nodes.lng' => 'NodeLng',
            ],
            'NodeType' =>
            [
                'wio_struct_node_types.name' => 'NodeType',
            ],
            'Network' =>
            [
                'wio_struct_networks.name' => 'Network'
            ],
            'Flag' =>
            [
                'wio_struct_flags.flag_data' => 'FlagData'
            ],
            'FlagType' =>
            [
                'wio_struct_flag_types.name' => 'FlagType'
            ]
        ]
    ];

    public function get($mainTableName, $selects = false)
    {
        $this->pointAtTable = $mainTableName;
        $this->prepareQuery();

        if ($selects !== false)
        {

        }
        else
        {
            $this->selectJoinColumns();
        }

        $answer = $this->query->get();
//        $this->printQuery();
        return $answer;
    }

    private function selectJoinColumns()
    {
        foreach ($this->joinColumnSelects[ $this->pointAtTable ] as $joinTable => $joinColumns)
        {
            if (isset($this->queryTables[ $joinTable ]))
            {
                foreach ($joinColumns as $columnName => $asName)
                {
                    $this->query->select($this->qb->raw($columnName.' as '.$asName));
                }
            }
        }

    }

}
