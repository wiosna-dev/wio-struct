<?php
namespace WioStruct\Core;

trait NetworkTrait
{

    function addNetwork($name)
    {
        $this->errorLog->off();
        $structDef = (new StructDefinition)
            ->networkName($name);
        $networkId = $this->newQuery($structDef)
            ->firstNetwork('id');
        $this->errorLog->on();

        if ($networkId === false)
        {
            $data = ['name' => $name];
            $insertId = $this->qb->table('wio_struct_networks')->insert($data);
        }
        else
        {
            $this->errorLog->errorLog('Notice: Nerwork "'.$name.'" [id:'.$networkId.'] already exists.');
        }

        return $this;
    }

    function getNetworks($selects = false)
    {
        $query = $this->qb->table('wio_struct_networks');

        if($this->structDefinition->networkId !== false)
            $query->where('id', $this->structDefinition->networkId);

        if($this->structDefinition->networkName !== false)
            $query->where('name', $this->structDefinition->networkName);

        if( $selects == false)
        {
            $query->select('*');
        }
        else
        {
            $query->select($selects);
        }

        return $query->get();
    }


    function firstNetwork($selects = false)
    {
        $query = $this->qb->table('wio_struct_networks');

        if ($this->structDefinition->networkId !== false)
        {
            $query->where('id', $this->structDefinition->networkId);
        }

        if ($this->structDefinition->networkName !== false)
        {
            $query->where('name', $this->structDefinition->networkName);
        }

        if ( $selects == false)
        {
            $query->select('*');
        }
        else
        {
            $query->select($selects);
        }

        $answer = $query->first();

        if($selects !== false and isset($answer->$selects))
        {
            return $answer->$selects;
        }
        if($answer === null)
        {
            return false;
        }

        return $answer;
    }

}
