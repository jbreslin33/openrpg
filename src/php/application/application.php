<?php
include_once(getenv("DOCUMENT_ROOT") . "/src/php/fsm/state_machine.php");
include_once(getenv("DOCUMENT_ROOT") . "/src/php/fsm/state.php");
include_once(getenv("DOCUMENT_ROOT") . "/src/php/application/states/states.php");

class Application 
{

function __construct()
{
	$this->mLogs = true;

	//states
	$this->mApplicationStateMachine = new StateMachine($this);

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
