<?php
namespace WioStruct\ErrorLog;

abstract class AbstractErrorLog{

    abstract function errorLog($message);

    abstract function showLog();
}
