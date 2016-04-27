<?php
namespace WioStruct\ErrorLog;


class ErrorLog extends AbstractErrorLog
{
    private $isRunning;
    private $messages;

    function __construct()
    {
        $this->isRunning = true;
        $this->messages = [];
    }

    public function errorLog($message)
    {
        if(!$this->isRunning)
        {
            return true;
        }
        $this->messages[] = $message;
    }

    function __destruct()
    {
        $this->showLog();
    }

    public function showLog()
    {
        if (count($this->messages))
        {
            echo '<br/><b> Error Log: </b><br/>';
            foreach ($this->messages as $m)
            {
                echo $m.'<br/>';
            }
        }
    }

    public function on()
    {
        $this->isRunning = true;
    }

    public function off()
    {
        $this->isRunning = false;
    }


}
