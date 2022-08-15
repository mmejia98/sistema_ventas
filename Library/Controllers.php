<?php

class Controllers extends AnonymousClasses{
    public function __construct(){
        date_default_timezone_set('America/El_Salvador');
        Session::start();
        $this->loadClassmodels();
        $this->role = new Roles();
        $this->view = new Views();
    }

    public function loadClassmodels(){
        $class = get_class($this);  
        $array = explode("Controller", $class);
        $model = $array[0].'_model';
        $path = 'Models/'.$model.'.php';
        if(file_exists($path)){
            require $path;
            $this->model = new $model();
        }
    }
}

?>