<?php
class Main extends Controller{
    function __construct(){
        parent::__construct();
    }
    public function render(){
        $this->view->Render('main/index');
    }
    public function login(){
        $this->view->Render('main/login');
    }
}
?>