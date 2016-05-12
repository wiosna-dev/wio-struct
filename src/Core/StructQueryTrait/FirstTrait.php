<?php
namespace WioStruct\Core\StructQueryTrait;

trait FirstTrait
{


    public function first($mainTableName, $selects = false)
    {
        $this->pointAtTable = $mainTableName;
        $this->prepareQuery();

        // string with single column name of mainTable (like 'id')
        if (is_string($selects))
        {
            $this->query->select($this->tableNames[ $this->pointAtTable ].'.'.$selects);
            if ($this->pointAtTable == 'LinkParent')
            {
                // var_dump($this->structDefinition);
                // $this->printQuery();

            }
            $answer = $this->query->first();

            if ($selects !== false and isset($answer->$selects))
            {
                return $answer->$selects;
            }
            if ($answer === null)
            {
                return false;
            }
            return $answer;
        }
        else
        {
            // we got selects as structure maybe
        }

        return $this->query->first();
    }
}
