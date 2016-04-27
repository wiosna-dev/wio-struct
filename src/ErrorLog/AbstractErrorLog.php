<?php
namespace WioStruct\ErrorLog;

abstract class AbstractErrorLog{
    private $isRunning;

    abstract function errorLog($message);

    abstract function showLog();

    abstract function off();

    abstract function on();
}
