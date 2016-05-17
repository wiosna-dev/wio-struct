<?php
namespace WioStruct\Core\StructQueryTrait;

trait GetTrait
{

    public function get($mainTable)
    {
        $this->mainTable = $mainTable;
        $this->prepareQuery();

        $this->selectGetColumns();

        $answer = $this->query->get();
        return $answer;
    }

    private function selectGetColumns()
    {
        // no i kurka nie ma tej tablicy
        foreach ($this->joinColumnSelects[ $this->mainTable ] as $getTable => $getColumns)
        {
            if (isset($this->queryTables[ $getTable ]))
            {
                foreach ($getColumns as $columnName => $asName)
                {
                    $this->query->select([$getTable.'.'.$columnName => $asName]);
                }
            }
        }

    }

}
