<?php
class ErrorGeneral extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->render();
	}

	function render()
	{
		$this->view->Render('error/index');
	}
}