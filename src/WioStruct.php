<?php
namespace WioStruct;

use \WioStruct\ErrorLog\ErrorLog;
use \WioStruct\Core\StructQuery;
class WioStruct
{

    public $qb;
    public $errorLog;

    function __construct(\Pixie\QueryBuilder\QueryBuilderHandler $qb)
    {
        $this->qb = $qb;
        $this->errorLog = new ErrorLog();
    }


    public function structQuery(\WioStruct\Core\StructDefinition $structDefinition)
    {
        return new StructQuery($structDefinition, $this->errorLog, $this->qb);
    }

}
