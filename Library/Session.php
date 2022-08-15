<?php 

class Session{
    public static function start(){
        @session_start();
    }

    public static function getSession($name){
        if(isset($_SESSION[$name])){
            return $_SESSION[$name];
        }
    }

    public static  function setSession($name, $data){
        return $_SESSION[$name] = $data;
    }

    public static function destroy(){
        @session_destroy();
    }
}

?>