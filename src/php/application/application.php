<?php
include_once(getenv("DOCUMENT_ROOT") . "/src/php/fsm/state_machine.php");
include_once(getenv("DOCUMENT_ROOT") . "/src/php/fsm/state.php");
include_once(getenv("DOCUMENT_ROOT") . "/src/php/application/states/application_states.php");
//include_once(getenv("DOCUMENT_ROOT") . "/src/php/database_connection.php");


//start new session
session_start();

if (!isset($_SESSION["APPLICATION"]))
{
        $APPLICATION = new Application();
	$_SESSION["APPLICATION"] = $APPLICATION;
}
else
{
	$APPLICATION = $_SESSION["APPLICATION"];
}	

if (isset($_GET["code"]))
{
	$APPLICATION->mCode = $_GET["code"];

	if ($APPLICATION->mCode > 0 && $APPLICATION->mCode < 1000)
	{
		$APPLICATION->mEvaluationsID = $APPLICATION->mCode;
	}  
}

unset($APPLICATION->mDataArray);
$APPLICATION->mDataArray = array();

if ($APPLICATION->mCode == 117)
{
	$APPLICATION->mLogin->mUsername = $_GET["username"]; 
	$APPLICATION->mLogin->mPassword = $_GET["password"]; 
}
if ($APPLICATION->mCode == 217)
{
	$APPLICATION->mLogin->mUsername = $_GET["username"]; 
	$APPLICATION->mLogin->mPassword = $_GET["password"]; 
}

if ($APPLICATION->mCode == 101)
{
        $APPLICATION->mDataArray[] = "101";
        $APPLICATION->mDataArray[] = $_GET["itemattemptid"];
        $APPLICATION->mDataArray[] = $_GET["transactioncode"];
        $APPLICATION->mDataArray[] = $_GET["answer"];
        $APPLICATION->mDataArray[] = $_GET["highest"];
        $APPLICATION->mDataArray[] = $_GET["teammateid"];
}

//update
$APPLICATION->update();	
$APPLICATION->mCode = 0;

?>

<?php

class Application 
{

function __construct()
{
	//init
	$this->run_once = false;

	$this->mInitialized = 0;

	$this->mDataArray = array();
	$this->mCode = 0;
	$this->mRawData = 0;
	$this->mLogs = false;
	$this->mApplicationStateMachine = new StateMachine($this);
        
	//admin
       	$this->mGLOBAL_APPLICATION   = new GLOBAL_APPLICATION        ($this);
        $this->mINIT_APPLICATION     = new INIT_APPLICATION          ($this);
        
        $this->mApplicationStateMachine->setGlobalState($this->mGLOBAL_APPLICATION);
        $this->mApplicationStateMachine->changeState($this->mINIT_APPLICATION);

	$this->mLogin  = new Login($this);	
	//$this->mSignup  = new Signup($this);	
	
	$this->update();
}

public function update()
{
	$this->mApplicationStateMachine->update();
}

//end of class
}
?>
