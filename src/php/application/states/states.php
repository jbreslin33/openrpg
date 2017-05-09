<?php
include_once(getenv("DOCUMENT_ROOT") . "/src/php/application/application.php");
include_once(getenv("DOCUMENT_ROOT") . "/src/php/fsm/state.php");


class GLOBAL_STATE extends State
{

function __construct()
{

}

public function enter($bapplication)
{

}
public function execute($bapplication)
{
}
public function bexit($bapplication)
{

}

}//end class

class INIT extends State
{

function __construct()
{

}

public function enter($bapplication)
{
	if ($bapplication->mLogs == true)	
	{
		error_log('INIT Enter');
	}
}
public function execute($bapplication)
{
	if ($bapplication->mLogs == true)	
	{
		error_log('INIT Execute');
 		$bapplication->mApplicationStateMachine->changeState($bapplication->mADMIN);
	}
}
public function bexit($bapplication)
{
	if ($bapplication->mLogs == true)	
	{
		error_log('INIT Exit');
	}
}

}//end class

class ADMIN extends State
{

function __construct()
{

}

public function enter($bapplication)
{
        if ($bapplication->mLogs == true)
        {
                error_log('ADMIN Enter');
        }
}
public function execute($bapplication)
{
        if ($bapplication->mLogs == true)
        {
                error_log('ADMIN Execute');
        }
}
public function bexit($bapplication)
{
        if ($bapplication->mLogs == true)
        {
                error_log('ADMIN Exit');
        }
}

}//end class

class PLAY extends State
{

function __construct()
{

}

public function enter($bapplication)
{
        if ($bapplication->mLogs == true)
        {
                error_log('PLAY Enter');
        }
}
public function execute($bapplication)
{
        if ($bapplication->mLogs == true)
        {
                error_log('PLAY Execute');
        }
}
public function bexit($bapplication)
{
        if ($bapplication->mLogs == true)
        {
                error_log('PLAY Exit');
        }
}

}//end class



?>



