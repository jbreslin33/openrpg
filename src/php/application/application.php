<?php
include_once(getenv("DOCUMENT_ROOT") . "/src/php/fsm/state_machine.php");
include_once(getenv("DOCUMENT_ROOT") . "/src/php/fsm/state.php");
include_once(getenv("DOCUMENT_ROOT") . "/src/php/application/states/states.php");

//start new session
//session_start();
?>

<?php

class Application 
{

function __construct()
{

	error_log("APPLICATION CONSTRUCTOR");

	//init
	$this->run_once = false;

	$this->mInitialized = 0;

	$this->mDataArray = array();
	$this->mCode = 0;
	$this->mRawData = 0;
	$this->mLogs = true;
	$this->mApplicationStateMachine = new StateMachine($this);
        
	//admin
       	$this->mGLOBAL = new GLOBAL_STATE($this);
        $this->mINIT   = new INIT  ($this);
        $this->mADMIN  = new ADMIN ($this);
        $this->mPLAY   = new PLAY  ($this);
        
        $this->mApplicationStateMachine->setGlobalState($this->mGLOBAL);
        $this->mApplicationStateMachine->changeState($this->mINIT);

	$this->update();
}

public function update()
{
	$this->mApplicationStateMachine->update();
}

//end of class
}
?>
