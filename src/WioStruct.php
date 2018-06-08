<?php
namespace WioStruct;

use \WioStruct\ErrorLog\ErrorLog;
use \WioStruct\Core\StructQuery;
use \WioStruct\Core\StructLink;
class WioStruct
{

    public $qb;
    public $errorLog;

    function __construct(\Pixie\QueryBuilder\QueryBuilderHandler $qb)
    {
        if (false === defined('HYDRA_DATABASE')) {
            throw new \Exception('HYDRA_DATABASE constant is not defined.');
        }
        $this->qb = $qb;
        $this->errorLog = new ErrorLog();
    }


    public function structQuery(\WioStruct\Core\StructDefinition $structDefinition)
    {
        return new StructQuery($structDefinition, $this->errorLog, $this->qb);
    }

    public function structLink()
    {
        return new StructLink($this->errorLog, $this->qb);
    }

}
