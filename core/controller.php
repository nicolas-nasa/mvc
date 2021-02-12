<?php

class controller {
    //carrega as views
    public function loadView($viewName ,  $viewData = array()) {
        extract($viewData);
        require 'views/'.$viewName.'.php';
    }
    //cria um template
    public function loadTemplate ($viewName ,  $viewData = array()) {
        require 'views/template.php';
    }
    // carrega o template
    public function loadViewInTemplate($viewName ,  $viewData = array()){
        extract($viewData);
        require 'views/'.$viewName.'.php';
    }
}