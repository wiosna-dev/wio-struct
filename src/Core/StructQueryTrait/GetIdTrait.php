<?php
namespace WioStruct\Core\StructQueryTrait;

trait GetIdTrait
{

    public function getId($mainTable)
    {
        $this->mainTable = $mainTable;
        $gettingIds = $this->gettingIds[ $this->mainTable ];

        foreach ($gettingIds as &$gettingId)
        {
            if (!$this->checkValues($gettingId))
            {
                continue;
            }

            if ($gettingId['table'] === false)
            {
                $variableName = $gettingId['values'][0];
                return $this->structDefinition->$variableName;
            }

            $this->setQueryTable();

            if (isset($gettingId['join']))
            {
                $this->setQueryJoins($gettingId['join']);
            }

            $this->setQueryValues($gettingId['values']);

            $this->query->select($this->tableNames[ $this->mainTable ]['table'].'.id');

            $answer = $this->query->first();

            if (isset($answer->id))
            {
                return $answer->id;
            }

            return false;
        }
        return false;
    }

    private function checkValues(&$gettingId)
    {
        foreach ($gettingId['values'] as $value)
        {
            if ($this->structDefinition->$value === false)
            {
                return false;
            }
        }
        return true;
    }
}
